<?php

namespace App\Http\Controllers;

use App\Models\ListeningAudio;
use App\Models\ReadingSection;
use App\Models\TestQuestion;
use App\Models\TestWave;
use App\Models\User;

use Illuminate\Http\Request;

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

        return redirect()->route('admin.dashboard');
    }

    public function manageTest()
    {

        $data = [
            'testWaves' => TestWave::get()
        ];
        return view('pages.admin.manage-test', $data);
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

        return redirect()->route('manage-test');
    }

    public function deleteWave(Request $request)
    {
        $wave = TestWave::find($request->wave_id, 'wave_id');

        $wave->delete();

        return redirect()->route('manage-test');
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

            return redirect()->route('manage-wave', $request->wave_id);


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

            return redirect()->route('manage-wave', $request->wave_id);

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

                return redirect()->route('manage-wave', $request->wave_id);
            } else {
                return redirect()->route('manage-wave', $request->wave_id);
            }

        }
    }

    public function updateQuestion(Request $request)
    {

    }
}
