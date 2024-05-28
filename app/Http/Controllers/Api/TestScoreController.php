<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TestScore;
use Illuminate\Http\Request;

class TestScoreController extends Controller
{
    public function getScore(Request $request)
    {
        $user_id = $request->user()->id;

        $scores = TestScore::where('user_id', $user_id)->get();

        return response()->json([
            "user_id" => $user_id,
            "test_scores" => $scores
        ]);
    }
}
