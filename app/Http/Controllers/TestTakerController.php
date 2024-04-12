<?php

namespace App\Http\Controllers;

use App\Models\TestQuestion;
use App\Models\TestResult;
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
        switch ($index) {
            case 1:
                return view('pages.user.test-start-1');
            case 2:
                return view('pages.user.test-start-2');
            case 3:
                return view('pages.user.test-start-3');
        }
    }

    public function listeningSection()
    {
        function putAsset($param) {
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
        
        for ($i = 1; $i <= $request->count; $i++) {
            $result = new TestResult;

            $result->wave_id = $request->wave_id;
            $result->user_id = $request->user_id;
            $result->section = $request->section;
            $result->answer = $request->input('choice_' . $i);
            $result->question_id = $request->input('question_id_' . $i);  
            $result->save();
        }
    }

    public function dump(Request $request)
    {
        $this->submit($request);

        echo "Submitted succesfully";
        
    }
}
