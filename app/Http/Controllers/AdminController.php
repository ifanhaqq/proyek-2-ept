<?php

namespace App\Http\Controllers;

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
        $newTest = new TestWave;

        $newTest->title = $request->test_name;
        $newTest->token = $request->token;

        $newTest->save();

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
            'listeningQuestions' => TestQuestion::where('wave_id', $wave_id)
                ->where('section', 'listening')
                ->get(),
            'grammarQuestions' => TestQuestion::where('wave_id', $wave_id)
                ->where('section', 'grammar')
                ->get(),
            'readingQuestions' => TestQuestion::where('reading_id', 1)->get(),
            'number' => 0
        ];


        return view('pages.admin.manage-test2', $data);
    }

    public function updateWave(Request $request)
    {
        $testWave = TestWave::where('wave_id', $request->wave_id)->first();

        $testWave->token = $request->token;
        $testWave->title = $request->title;

        $testWave->save();

        return redirect()->route('manage-test');
    }

    public function storeQuestion(Request $request)
    {
        
    }

    public function updateQuestion(Request $request)
    {

    }
}
