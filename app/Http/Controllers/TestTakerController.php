<?php

namespace App\Http\Controllers;

use App\Models\ListeningAudio;
use App\Models\TestQuestion;
use App\Models\TestResult;
use App\Models\TestScore;
use App\Models\TestWave;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class TestTakerController extends Controller
{

    public function index()
    {
        $data = [
            'title' => "Welcome to Polindra TOEFL Test Prediction"
        ];
        return view('pages.user.home', $data);
    }

    public function handleToken(Request $request)
    {
        $token = $request->token;
        $questions = TestWave::where('token', $token)->get()->count();

        // get questions based on token
        if ($questions < 1) {
            return redirect()->route('user.dashboard');
        } else {
            $wave_id = TestWave::where('token', $token)->get('wave_id')->value('wave_id');
            
            Session::put('wave_id', $wave_id);

            return redirect()->route('start-test', 1);
        }

    }

    public function startTest($index)
    {
        $data = [
            'title' => 'Start Test'
        ];
        return view("pages.user.test-start-$index", $data);
    }



    public function sectionGuide(Request $request, $index)
    {
        $data = [
            'title' => "Instructions"
        ];

        if (!$request->start_test) {
            $this->submit($request);

            return view("pages.user.section$index-guide", $data);

        } else {
            return view("pages.user.section$index-guide", $data);
        }

    }

    public function tempScore(Request $request)
    {
        // Filter the requests
        if ($request->name !== Auth::user()->name) {
            return redirect()->route('start-test', 2)->with('failed', "Use the same name as the name you used when registering!");
        } else if ($request->nim !== Auth::user()->nim) {
            return redirect()->route('start-test', 2)->with('failed', "Use the same NIM as the NIM you used when registering!");
        } else if ($request->email !== Auth::user()->email) {
            return redirect()->route('start-test', 2)->with('failed', "Use the same email as the email you used when registering!");
        }

        dd($request);



        $testScore = new TestScore;

        $testScore->user_id = Auth::user()->id;
        $testScore->wave_id = Session::get('wave_id');
        $testScore->name = $request->name;
        $testScore->nim = $request->nim;
        $testScore->email = $request->email;
        $testScore->score = 0;
        $testScore->listening = 0;
        $testScore->grammar = 0;
        $testScore->reading = 0;
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

        $wave = TestWave::where('wave_id', Session::get('wave_id'))->first();
        $audio = ListeningAudio::where('audio_id', $wave->audio_id)->first();

        $qs = TestQuestion::where('wave_id', Session::get('wave_id'))
            ->where('section', 'listening')
            ->inRandomOrder()->get();

        $data = [
            'questions' => $qs,
            'title' => 'Listening Section',
            'number' => 0,
            'audio' => $audio,
            'user_id' => Auth::user()->id,
        ];

        $count = count($data['questions']);
        $data['count'] = $count;

        return view('pages.user.section1', $data);
    }

    public function grammarSection()
    {

        $qs = TestQuestion::where('section', 'grammar')
            ->where('wave_id', Session::get('wave_id'))
            ->inRandomOrder()->get();

        $data = [
            'questions' => $qs,
            'number' => 0,
            'user_id' => Auth::user()->id,
            'title' => 'Grammar Section'
        ];

        $count = count($data['questions']);
        $data['count'] = $count;

        return view('pages.user.section2', $data);
    }

    public function readingSection()
    {

        $qs = DB::table('test_questions')->where('wave_id', Session::get('wave_id'))
            ->join('reading_sections', 'test_questions.reading_id', '=', 'reading_sections.reading_id')
            ->select('test_questions.*', 'reading_sections.text')
            ->inRandomOrder()
            ->get()
            ->toArray();
        $data = [
            'questions' => $qs,
            'number' => 0,
            'user_id' => Auth::user()->id,
            'title' => 'Reading Section'
        ];

        $count = count($data['questions']);
        $data['count'] = $count;

        return view('pages.user.section3', $data);
    }

    public function submit(Request $request)
    {

        for ($i = 1; $i <= $request->count; $i++) {
            $result = new TestResult;
            $question_id = $request->input('question_id_' . $i);
            $answer = $request->input('choice_' . $i);
            $correctAnswer = TestQuestion::where('question_id', $question_id)
                ->get()->value('correct_answer');

            $result->question_id = $question_id;
            $result->wave_id = Session::get('wave_id');
            $result->user_id = $request->user_id;
            $result->section = $request->section;
            $result->answer = $answer;

            ($answer === $correctAnswer) ? $result->status = 'correct' : $result->status = 'incorrect';

            $result->save();
        }
    }

    public function convertScore($questionAmount, $convertRate)
    {
        return $convertRate / $questionAmount;
    }

    public function countCorrectAnswer($section)
    {
        return count(TestResult::where('wave_id', Session::get('wave_id'))
               ->where('user_id', Auth::user()->id)
               ->where('section', $section)
               ->where('status', 'correct')
               ->get());
    }

    public function score(Request $request)
    {
        // $dump = 31 + (0 * (37/50));
        // dd(round($dump));

        $this->submit($request);

        $convertListening = $this->convertScore(50, 37) * $this->countCorrectAnswer('listening') + 31;
        $convertGrammar = $this->convertScore(40, 37) * $this->countCorrectAnswer('grammar') + 31;
        $convertReading = $this->convertScore(50, 36) * $this->countCorrectAnswer('reading') + 31;

        $finalScore = (($convertGrammar + $convertReading + $convertListening) * 10) / 3;

        $scoreResult = TestScore::where('user_id', Auth::user()->id)->where('wave_id', Session::get('wave_id'))->first();
        $scoreResult->listening = round($convertListening);
        $scoreResult->grammar = round($convertGrammar);
        $scoreResult->reading = round($convertReading);
        $scoreResult->score = round($finalScore);
        $scoreResult->test_date = today();
        $scoreResult->save();

        $data = [
            'result' => TestScore::where('user_id', Auth::user()->id)->where('wave_id', Session::get('wave_id'))->first()
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

        $convertListening = $this->convertScore(50, 37) * $this->countCorrectAnswer('listening') + 31;
        $convertGrammar = $this->convertScore(40, 37) * $this->countCorrectAnswer('grammar') + 31;
        $convertReading = $this->convertScore(50, 36) * $this->countCorrectAnswer('reading') + 31;

        $finalScore = (($convertGrammar + $convertReading + $convertListening) * 10) / 3;

        $scoreResult = TestScore::where('user_id', Auth::user()->id)->where('wave_id', Session::get('wave_id'))->first();
        $scoreResult->listening = round($convertListening);
        $scoreResult->grammar = round($convertGrammar);
        $scoreResult->reading = round($convertReading);
        $scoreResult->score = round($finalScore);
        $scoreResult->test_date = today();
        $scoreResult->save();

        $data = [
            'result' => TestScore::where('user_id', Auth::user()->id)->where('wave_id', Session::get('wave_id'))->first()
        ];

        return view('pages.user.test-score', $data);
    }
}
