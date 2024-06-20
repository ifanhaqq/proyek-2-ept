<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\ListeningAudio;
use App\Models\TestQuestion;
use App\Models\TestResult;
use App\Models\TestScore;
use App\Models\TestWave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TestTakerController extends Controller
{

    public function index()
    {
        $data = [
            'title' => "Welcome to Polindra TOEFL Test Prediction",
            'name' => Auth::user()->name
        ];
        return view('pages.user.home', $data);
    }

    public function handleToken(Request $request)
    {
        $token = $request->token;
        $questions = TestWave::where('token', $token)->get()->count();

        // User entered the wrong token
        if ($questions < 1) {
            return redirect()->route('user.dashboard')->with('sweetalert', [
                'icon' => 'error',
                'title' => 'You entered the wrong token!'
            ]);
        }

        // User already taken the test  
        $wave_id = TestWave::where('token', $token)->get('wave_id')->value('wave_id');

        $checkUser = TestScore::where("wave_id", $wave_id)->where("user_id", Auth::user()->id)->count();

        if ($checkUser > 0) {
            return redirect()->route('user.dashboard')->with('sweetalert', [
                'icon' => 'error',
                'title' => 'You already taken this test!'
            ]);
        }



        Session::put('wave_id', $wave_id);

        return redirect()->route('start-test', 'credentials');

    }

    public function startTest($index)
    {
        $data = [
            'title' => 'Start Test',
            'audioTest' => 'audio-test.mp3'
        ];

        switch ($index) {
            case 'rules':
                return view("pages.user.test-start-1", $data);
            case 'credentials':
                return view("pages.user.test-start-2", $data);
            case 'audio-test':
                return view("pages.user.test-start-3", $data);
        }
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
            return redirect()->route('start-test', 'credentials')->with('failed', "Use the same name as the name you used when registering!");
        } else if ($request->nim !== Auth::user()->nim) {
            return redirect()->route('start-test', 'credentials')->with('failed', "Use the same NIM as the NIM you used when registering!");
        } else if ($request->email !== Auth::user()->email) {
            return redirect()->route('start-test', 'credentials')->with('failed', "Use the same email as the email you used when registering!");
        }

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

        return redirect()->route('start-test', 'rules');
    }

    public function gimmickLoading(Request $request)
    {
        $this->submit($request);

        $data = [
            'section' => $request->section
        ];

        return view('pages.user.loading-screen', $data);
    }

    public function sectionsHandler(Request $request)
    {

        if ($request->section === 'listening') {
            return redirect()->route('grammar-section');
        } else if ($request->section === 'grammar') {
            return redirect()->route('reading-section');
        }
    }

    public function listeningSection()
    {

        $wave = TestWave::where('wave_id', Session::get('wave_id'))->first();
        $audio = ListeningAudio::where('audio_id', $wave->audio_id)->first();
        $guide = Guide::where('guide_id', $wave->guide_id)->first();

        $qs = TestQuestion::where('wave_id', Session::get('wave_id'))
            ->where('section', 'listening')->get();

        $data = [
            'questions' => $qs,
            'title' => 'Listening Section',
            'number' => 0,
            'audio' => $audio,
            'user_id' => Auth::user()->id,
            'guide' => $guide->listening_guide
        ];

        $count = count($data['questions']);
        $data['count'] = $count;

        return view('pages.user.section1', $data);
    }

    public function grammarSection(Request $request)
    {
        $this->submit($request);

        $wave = TestWave::where('wave_id', Session::get('wave_id'))->first();
        $guide = Guide::where('guide_id', $wave->guide_id)->first();

        $qs = TestQuestion::where('section', 'grammar')
            ->where('wave_id', Session::get('wave_id'))
            ->inRandomOrder()->get();

        $data = [
            'questions' => $qs,
            'number' => 0,
            'user_id' => Auth::user()->id,
            'title' => 'Grammar Section',
            'guide' => $guide->grammar_guide
        ];

        $count = count($data['questions']);
        $data['count'] = $count;

        return view('pages.user.section2', $data);
    }

    public function readingSection()
    {

        $wave = TestWave::where('wave_id', Session::get('wave_id'))->first();
        $guide = Guide::where('guide_id', $wave->guide_id)->first();

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
            'title' => 'Reading Section',
            'guide' => $guide->reading_guide
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

        TestResult::where("wave_id", Session::get('wave_id'))->where("user_id", Auth::user()->id)->delete();

        $data = [
            'result' => TestScore::where('user_id', Auth::user()->id)->where('wave_id', Session::get('wave_id'))->latest()->first()
        ];


        Session::forget("wave_id");
        return view('pages.user.test-score', $data);


    }

    public function testHistory()
    {
        $testResults = DB::table('test_scores')->where('user_id', Auth::user()->id)
            ->join('test_waves', 'test_scores.wave_id', '=', 'test_waves.wave_id')
            ->select('test_scores.*', 'test_waves.title')
            ->get()
            ->toArray();

        $data = [
            "testResults" => $testResults,
        ];

        return view("pages.user.test-history", $data);
    }

    public function historyDetail($id)
    {
        $data = [
            "detail" => TestScore::where("id", $id)->first()
        ];

        return view("pages.user.test-history-detail", $data);
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
