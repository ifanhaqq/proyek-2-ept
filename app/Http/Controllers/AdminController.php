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
        dd($request);
    }

    public function updateQuestion(Request $request)
    {

    }
}
