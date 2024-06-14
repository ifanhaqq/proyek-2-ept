<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\ListeningAudio;
use App\Models\ReadingSection;
use App\Models\TestQuestion;
use App\Models\TestScore;
use App\Models\TestWave;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Admin's home page
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $data = [
            'title' => 'Admin dashboard',
            'totalTest' => count(TestWave::get()),
            'totalTestTaker' => count(User::where('role', 'user')->get())
        ];
        return view('pages.admin.home', $data);
    }

    /*
    |--------------------------------------------------------------------------
    | Admin's page for managing tests
    |--------------------------------------------------------------------------
    */

    public function manageTest()
    {

        $data = [
            'testWaves' => TestWave::get()
        ];
        return view('pages.admin.manage-test', $data);
    }

    /*
    |--------------------------------------------------------------------------
    | Admin's page for test taker results
    |--------------------------------------------------------------------------
    */

    public function testResults()
    {
        $testScores = TestScore::orderBy('test_date', 'desc')->get();

        foreach ($testScores as $testScore) {
            $testScore['test_date'] = Carbon::parse($testScore['test_date'])->format('F jS Y');

            $testScore['title'] = TestWave::where('wave_id', $testScore['wave_id'])->get()->value('title');
        }

        $data = [
            'testScores' => $testScores,
            'title' => 'Test Results',
            'number' => 1
        ];

        return view('pages.admin.test-taker-result', $data);
    }

    /*
    |--------------------------------------------------------------------------
    | Admin's page for detail of each of the tests' result
    |--------------------------------------------------------------------------
    */

    public function testScores($index)
    {
        $testScore = TestScore::where('id', $index)->first();

        $data = [
            'testScore' => $testScore,
        ];

        return view('pages.admin.test-taker-score', $data);
    }

    /*
    |--------------------------------------------------------------------------
    | Admin's page of the detailed wave management
    |--------------------------------------------------------------------------
    */

    public function manageWave($wave_id)
    {
        $waveInfos = TestWave::where('wave_id', $wave_id)->first();

        $data = [
            'waveInfos' => $waveInfos,
            'guideInfo' => Guide::where('guide_id', $waveInfos->guide_id)->first(),
            'audioFile' => TestWave::select('test_waves.*', 'listening_audios.*')
                ->where('wave_id', $wave_id)
                ->join('listening_audios', 'test_waves.audio_id', '=', 'listening_audios.audio_id')
                ->first(),
            'listeningQuestions' => TestQuestion::where('wave_id', $wave_id)
                ->where('section', 'listening')
                ->get(),
            'grammarQuestions' => TestQuestion::where('wave_id', $wave_id)
                ->where('section', 'grammar')
                ->get(),
            'readingQuestions' => TestQuestion::select('test_questions.*', 'reading_sections.*')
                ->where('wave_id', $wave_id)
                ->join('reading_sections', 'test_questions.reading_id', '=', 'reading_sections.reading_id')
                ->get(),
            'number' => 0
        ];

        return view('pages.admin.manage-test2', $data);
    }

    /*
    |--------------------------------------------------------------------------
    | Test wave's CRUD
    |--------------------------------------------------------------------------
    |
    | Below is the wave's CRUD codes....
    | 
    | 
    |
    */

    public function storeTestWave(Request $request)
    {
        $audio = $request->file('audio_wave');
        $audioFileName = $request->token . '_audio.' . $audio->getClientOriginalExtension();

        $manualIncrementAudioTable = count(ListeningAudio::get()) + 1;
        $manualIncrementGuideTable = count(Guide::get()) + 1;

        $newAudio = new ListeningAudio;
        $newAudio->audio_id = $manualIncrementAudioTable;
        $newAudio->audio_title = $audioFileName;

        $newGuide = new Guide;
        $newGuide->guide_id = $manualIncrementGuideTable;
        $newGuide->listening_guide = "Please input your listening guide!";
        $newGuide->grammar_guide = "Please input your structure & written expression guide!";
        $newGuide->reading_guide = "Please input your reading guide!";

        $newTest = new TestWave;
        $newTest->title = $request->test_name;
        $newTest->token = $request->token;
        $newTest->description = $request->description;
        $newTest->audio_id = $manualIncrementAudioTable;
        $newTest->guide_id = $manualIncrementGuideTable;

        $newAudio->save();
        $newGuide->save();
        $newTest->save();
        $audio->storeAs('public/audio', $audioFileName);

        return redirect()->route('manage-test')->with('success', 'Test wave added succesfully!');
    }

    public function updateWave(Request $request)
    {
        $testWave = TestWave::where('wave_id', $request->wave_id)->first();

        $testWave->token = $request->token;
        $testWave->title = $request->title;
        $testWave->description = $request->description;

        $testWave->save();

        return redirect()->route('manage-wave', $request->wave_id)->with('success-update', 'Test wave updated succesfully!');
    }

    public function deleteWave(Request $request)
    {
        $wave = TestWave::find($request->wave_id, 'wave_id');

        DB::delete("DELETE FROM test_questions WHERE wave_id = ?", [$request->wave_id]);

        $wave->delete();

        return redirect()->route('manage-test')->with('success', 'Test wave deleted succesfully!');
    }

    /*
    |--------------------------------------------------------------------------
    | Question CRUD
    |--------------------------------------------------------------------------
    |
    | Below is the question's CRUD codes....
    | 
    | 
    |
    */

    public function storeQuestion(Request $request)
    {
        $testQuestion = new TestQuestion;

        $audio_id = TestWave::where('wave_id', $request->wave_id)->value('audio_id');



        if ($request->addQuestionSection == 'listening') {


            $testQuestion->wave_id = $request->wave_id;
            $testQuestion->audio_id = $audio_id;
            $testQuestion->section = $request->addQuestionSection;
            $testQuestion->question_ch1 = $request->choice_1;
            $testQuestion->question_ch2 = $request->choice_2;
            $testQuestion->question_ch3 = $request->choice_3;
            $testQuestion->question_ch4 = $request->choice_4;

            $testQuestion->correct_answer = $request->input("choice_$request->correct_answer");

            $testQuestion->save();

            return redirect()->route('manage-wave', $request->wave_id)->with('success', 'Question added sucesfully!');


        } else if ($request->addQuestionSection == 'grammar') {
            $testQuestion->wave_id = $request->wave_id;

            $testQuestion->section = $request->addQuestionSection;
            $testQuestion->question = $request->question;

            $testQuestion->question_ch1 = $request->choice_1;
            $testQuestion->question_ch2 = $request->choice_2;
            $testQuestion->question_ch3 = $request->choice_3;
            $testQuestion->question_ch4 = $request->choice_4;
            $testQuestion->correct_answer = $request->input("choice_$request->correct_answer");

            $testQuestion->save();

            return redirect()->route('manage-wave', $request->wave_id)->with('success', 'Question added sucesfully!');

        } else if ($request->addQuestionSection == 'reading') {

            $readingSection = new ReadingSection;
            $readingId = count(ReadingSection::get()) + 1;

            $readingSection->reading_id = $readingId;
            $readingSection->text = $request->readingTextQuestion;

            $readingSection->save();
            // dd($request);

            $testQuestion->wave_id = $request->wave_id;
            $testQuestion->reading_id = $readingId;

            $testQuestion->section = $request->addQuestionSection;
            $testQuestion->question = $request->question;

            $testQuestion->question_ch1 = $request->choice_1;
            $testQuestion->question_ch2 = $request->choice_2;
            $testQuestion->question_ch3 = $request->choice_3;
            $testQuestion->question_ch4 = $request->choice_4;

            $testQuestion->correct_answer = $request->input("choice_$request->correct_answer");

            $testQuestion->save();

            if ($request->questionElemParam > 1) {
                // dd($request);
                for ($i = 2; $i <= $request->questionElemParam; $i++) {
                    $testQuestion = new TestQuestion;

                    $testQuestion->wave_id = $request->wave_id;
                    $testQuestion->reading_id = $readingId;

                    $testQuestion->section = $request->addQuestionSection;
                    $testQuestion->question = $request->input("question_$i");

                    $correctAnswer = $request->input("correct_answer_$i");

                    $testQuestion->question_ch1 = $request->input("choice_1_" . $i);
                    $testQuestion->question_ch2 = $request->input("choice_2_$i");
                    $testQuestion->question_ch3 = $request->input("choice_3_$i");
                    $testQuestion->question_ch4 = $request->input("choice_4_$i");
                    $testQuestion->correct_answer = $request->input("choice_" . $correctAnswer . "_$i");

                    $testQuestion->save();
                }

                return redirect()->route('manage-wave', $request->wave_id)->with('success', 'Question added sucesfully!');
            } else {
                return redirect()->route('manage-wave', $request->wave_id)->with('success', 'Question added sucesfully!');
            }

        }
    }

    public function updateQuestion(Request $request)
    {

        // dd($request);
        $question = TestQuestion::where("question_id", $request->question_id)->first();

        $question->question_ch1 = $request->choice_1;
        $question->question_ch2 = $request->choice_2;
        $question->question_ch3 = $request->choice_3;
        $question->question_ch4 = $request->choice_4;

        $question->correct_answer = $request->input("choice_$request->correct_answer");

        if ($request->section == 'grammar') {
            $question->question = $request->question;
        } else if ($request->section == 'reading') {
            $readingText = ReadingSection::where('reading_id', $request->reading_id)->first();

            $readingText->text = $request->text;
            $question->question = $request->question;
            $readingText->save();
        }

        $question->save();

        return redirect()->route('manage-wave', $request->wave_id)->with("success", "Question updated succesfully!");

    }

    public function deleteQuestion(Request $request)
    {
        $question = TestQuestion::find($request->question_id, 'question_id');

        $question->delete();

        return redirect()->route('manage-wave', $request->wave_id)->with("success", "Question deleted sucessfully!");
    }

    /*
    |--------------------------------------------------------------------------
    | Test's guide CRUD
    |--------------------------------------------------------------------------
    |
    | Below is the test guide's CRUD codes....
    | 
    | 
    |
    */

    public function storeGuide(Request $request, $guide_id)
    {
        $guide = Guide::where('guide_id', $guide_id)->first();

        switch ($request->section_guide) {
            case 'listening':
                $guide->listening_guide = $request->text;
                break;

            case 'reading':
                $guide->reading_guide = $request->text;
                break;

            case 'grammar':
                $guide->grammar_guide = $request->text;
                break;
        }

        $guide->save();

        $wave_id = TestWave::where('guide_id', $guide_id)->get('wave_id')->value('wave_id');

        return redirect()->route('manage-wave', $wave_id)->with('guide-success', 'Text guide successfully updated!');

    }

    /*
    |--------------------------------------------------------------------------
    | Admin's page of the test preview feature
    |--------------------------------------------------------------------------
    */

    public function testRules($wave_id)
    {
        $data = [
            'wave_id' => $wave_id
        ];
        return view("pages.admin.test-rules", $data);
    }

    public function listeningGuidePreview($wave_id)
    {
        $wave = TestWave::where('wave_id', $wave_id)->first();
        $guide = Guide::where('guide_id', $wave->guide_id)->first();

        $data = [
            'guide' => $guide,
            'wave_id' => $wave_id
        ];

        return view('pages.admin.test-guide-listening-preview', $data);
    }

    public function grammarGuidePreview($wave_id)
    {
        $wave = TestWave::where('wave_id', $wave_id)->first();
        $guide = Guide::where('guide_id', $wave->guide_id)->first();

        $data = [
            'guide' => $guide->grammar_guide,
            'wave_id' => $wave_id
        ];

        return view('pages.admin.test-guide-grammar-preview', $data);
    }

    public function readingGuidePreview($wave_id)
    {
        $wave = TestWave::where('wave_id', $wave_id)->first();
        $guide = Guide::where('guide_id', $wave->guide_id)->first();

        $data = [
            'guide' => $guide->reading_guide,
            'wave_id' => $wave_id
        ];

        return view('pages.admin.test-guide-reading-preview', $data);
    }

    public function listeningPreview($wave_id)
    {

        $wave = TestWave::where('wave_id', $wave_id)->first();
        $audio = ListeningAudio::where('audio_id', $wave->audio_id)->first();
        $guide = Guide::where('guide_id', $wave->guide_id)->first();

        $qs = TestQuestion::where('wave_id', $wave_id)
            ->where('section', 'listening')->get();

        $data = [
            'questions' => $qs,
            'title' => 'Listening Section',
            'number' => 0,
            'audio' => $audio,
            'guide' => $guide->listening_guide,
            'wave_id' => $wave_id
        ];

        $count = count($data['questions']);
        $data['count'] = $count;

        return view('pages.admin.test-listening-preview', $data);
    }

    public function grammarPreview($wave_id)
    {
        $qs = TestQuestion::where('section', 'grammar')
            ->where('wave_id', $wave_id)
            ->inRandomOrder()->get();
        $wave = TestWave::where('wave_id', $wave_id)->first(); 
        $guide = Guide::where('guide_id', $wave->guide_id)->first();

        $data = [
            'questions' => $qs,
            'number' => 0,
            'title' => 'Grammar Section',
            'guide' => $guide->grammar_guide,
            'wave_id' => $wave_id
        ];

        $count = count($data['questions']);
        $data['count'] = $count;

        return view('pages.admin.test-grammar-preview', $data);
    }

    public function readingPreview($wave_id)
    {
        $wave = TestWave::where('wave_id', $wave_id)->first();
        $guide = Guide::where('guide_id', $wave->guide_id)->first();

        $qs = DB::table('test_questions')->where('wave_id', $wave_id)
            ->join('reading_sections', 'test_questions.reading_id', '=', 'reading_sections.reading_id')
            ->select('test_questions.*', 'reading_sections.text')
            ->inRandomOrder()
            ->get()
            ->toArray();
        $data = [
            'questions' => $qs,
            'number' => 0,
            'guide' => $guide->reading_guide,
            'title' => 'Reading Section',
            'wave_id' => $wave_id
        ];

        $count = count($data['questions']);
        $data['count'] = $count;

        return view('pages.admin.test-reading-preview', $data);
    }
}
