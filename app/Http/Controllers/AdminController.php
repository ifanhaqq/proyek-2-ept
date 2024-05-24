<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        $data = [
            'title' => 'Admin dashboard',
            'totalTest' => count(TestWave::get()),
            'totalTestTaker' => count(User::where('role', 'user')->get())
        ];
        return view('pages.admin.home', $data);
    }

    public function storeTestWave(Request $request)
    {
        $audio = $request->file('audio_wave');
        $audioFileName = $request->token . '_audio.' . $audio->getClientOriginalExtension();

        $manualIncrementAudioTable = count(ListeningAudio::get()) + 1;


        $newAudio = new ListeningAudio;

        $newAudio->audio_id = $manualIncrementAudioTable;
        $newAudio->audio_title = $audioFileName;

        $newTest = new TestWave;

        $newTest->title = $request->test_name;
        $newTest->token = $request->token;
        $newTest->description = $request->description;
        $newTest->audio_id = $manualIncrementAudioTable;

        $newAudio->save();
        $newTest->save();
        $audio->storeAs('public/audio', $audioFileName);

        return redirect()->route('manage-test')->with('success', 'Test wave added succesfully!');
    }

    public function manageTest()
    {

        $data = [
            'testWaves' => TestWave::get()
        ];
        return view('pages.admin.manage-test', $data);
    }

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

    public function testScores($index)
    {
        $testScore = TestScore::where('id', $index)->first();

        $data = [
            'testScore' => $testScore,
        ];

        return view('pages.admin.test-taker-score', $data);
    }

    public function manageWave($wave_id)
    {
        $testQuestions = new TestQuestion;
        $data = [
            'waveInfos' => TestWave::where('wave_id', $wave_id)->first(),
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

        $wave->delete();

        return redirect()->route('manage-test')->with('success', 'Test wave deleted succesfully!');
    }

    public function storeQuestion(Request $request)
    {
        // dd($request);
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
}
