<?php

namespace App\Http\Controllers;

use App\Models\TestQuestion;
use App\Models\TestResult;
use App\Models\TestScore;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TestTakerController extends Controller
{
    public function index()
    {
        return view('pages.user.home');
    }

    public function startTest($index)
    {
        return view("pages.user.test-start-$index");
        // switch ($index) {
        //     case 1:
        //         return view('pages.user.test-start-1');
        //     case 2:
        //         return view('pages.user.test-start-2');
        //     case 3:
        //         return view('pages.user.test-start-3');
        // }
    }

    public function sectionGuide(Request $request, $index)
    {
        if (!$request->start_test) {
            $this->submit($request);

            return view("pages.user.section$index-guide");
            
        } 
        else {
            return view("pages.user.section$index-guide");
        }
        
    }

    public function tempScore(Request $request)
    {
        $testScore = new TestScore;

        $testScore->user_id = Auth::user()->id;
        $testScore->wave_id = 1;
        $testScore->name = $request->name;
        $testScore->nim = $request->nim;
        $testScore->email = $request->email;
        $testScore->score = 0;
        $testScore->proficiency_level = "not finished yet";

        $testScore->save();

        return redirect()->route('start-test', 3);
    }

    public function listeningSection()
    {
        function putAsset($param)
        {
            return asset("storage/audio/$param");
        }

        $qs = TestQuestion::where('section', 'listening')->inRandomOrder()->get();

        $data = [
            'questions' => $qs,
            'number' => 0,
            'user_id' => Auth::user()->id,
        ];

        $count = count($data['questions']);
        $data['count'] = $count;

        return view('pages.user.section1', $data);
    }

    public function grammarSection()
    {
        $qs = TestQuestion::where('section', 'grammar')->inRandomOrder()->get();

        $data = [
            'questions' => $qs,
            'number' => 0,
            'user_id' => Auth::user()->id,
        ];

        $count = count($data['questions']);
        $data['count'] = $count;

        return view('pages.user.section2', $data);
    }

    public function readingSection()
    {
        $qs = DB::table('test_questions')
            ->join('reading_sections', 'test_questions.reading_id', '=', 'reading_sections.reading_id')
            ->select('test_questions.*', 'reading_sections.text')
            ->inRandomOrder()
            ->get()
            ->toArray();

        $data = [
            'questions' => $qs,
            'number' => 0,
            'user_id' => Auth::user()->id,
        ];

        $count = count($data['questions']);
        $data['count'] = $count;

        return view('pages.user.section3', $data);
    }

    public function submit(Request $request)
    {
        $correctAnswer = TestQuestion::where('wave_id', '1')->get();

        for ($i = 1; $i <= $request->count; $i++) {
            $result = new TestResult;
            $question_id = $request->input('question_id_' . $i);
            $answer = $request->input('choice_' . $i);
            $correctAnswer = TestQuestion::where('question_id', $question_id)
                ->get()->value('correct_answer');

            $result->question_id = $question_id;
            $result->wave_id = $request->wave_id;
            $result->user_id = $request->user_id;
            $result->section = $request->section;
            $result->answer = $answer;

            ($answer === $correctAnswer) ? $result->status = 'correct' : $result->status = 'incorrect';

            $result->save();
        }
    }

    public function score(Request $request)
    {

        $this->submit($request);

        function convertScore($questionAmount, $convertRate) {
            return $convertRate / $questionAmount;
        }

        function countCorrectAnswer($section) {
            return count(TestResult::where('wave_id', 1)
                                   ->where('user_id', 3)
                                   ->where('section', $section)
                                   ->where('status', 'correct')
                                   ->get());
        }

        function countAmountSection($section) {
            return count(
                TestQuestion::where('wave_id', 1)->where('section', $section)->get()
            );
        }

        $convertListening = convertScore(countAmountSection('listening'), 68) * countCorrectAnswer('listening');
        $convertGrammar = convertScore(countAmountSection('grammar'), 68) * countCorrectAnswer('grammar');
        $convertReading = convertScore(countAmountSection('reading'), 68) * countCorrectAnswer('reading');
        
        $finalScore = (($convertGrammar + $convertReading + $convertListening) * 10) / 3;

        $scoreResult = TestScore::where('user_id', Auth::user()->id)->where('wave_id', 1)->first();
        $scoreResult->listening = round($convertListening);
        $scoreResult->grammar = round($convertGrammar);
        $scoreResult->reading = round($convertReading);
        $scoreResult->score = round($finalScore);
        $scoreResult->test_date = today();
        $scoreResult->save();

        $data = [
            'result' => TestScore::where('user_id', Auth::user()->id)->where('wave_id', 1)->first()
        ];

        return view('pages.user.test-score', $data);


    }

    public function dumpPost(Request $request)
    {
        $this->submit($request);

        echo "Submitted succesfully";

    }

    public function dumpGet()
    {
        $correctAnswer = TestQuestion::where('question_id', 3)
            ->get();

        dd($correctAnswer);
    }
}
