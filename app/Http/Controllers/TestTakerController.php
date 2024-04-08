<?php

namespace App\Http\Controllers;

use App\Models\TestQuestion;
use Illuminate\Http\Request;

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
            'number' => 0
        ];

        $count = count($data['questions']);
        $data['count'] = $count;

        return view('pages.user.section1', $data);
    }

    public function dump()
    {
        $qs = TestQuestion::where('section', 'listening')->inRandomOrder()->get();

        $data = [
            'qs' => $qs,
        ];

        return view('dump', $data);
    }
}
