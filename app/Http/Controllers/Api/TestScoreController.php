<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TestScore;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestScoreController extends Controller
{

    public function index()
    {
        try {
            $scores = TestScore::get();
        } catch (\Throwable $th) {
            return response()->json([
                "status" => 400,
                "message" => $th
            ]);
        }

        return response()->json([
            "status" => 200,
            "message" => "Data successfully fetched!",
            "data" => $scores
        ]);
    }
    public function store(Request $request)
    {

        try {
            $testScore = new TestScore;

            $testScore->user_id = Auth::user()->id;
            $testScore->name = $request->name;
            $testScore->wave_id = 3;
            $testScore->nim = $request->nim;
            $testScore->email = $request->email;
            $testScore->listening = $request->listening;
            $testScore->grammar = $request->grammar;
            $testScore->reading = $request->reading;
            $testScore->score = ($request->grammar * 10) + ($request->reading * 10) + ($request->listening * 10);
            $testScore->proficiency_level = "master";
            $testScore->test_date = Carbon::now()->toDateString();
            $testScore->created_at = Carbon::now();
            $testScore->updated_at = Carbon::now();

            $testScore->save();

        } catch (\Throwable $th) {
            return response()->json([
                "status" => 400,
                "message" => $th
            ]);
        }



        return response()->json([
            "status" => 200,
            "message" => "Data sucessfully submitted!",

        ]);


    }
    public function getScore($id)
    {
        try {

            $scores = TestScore::where('id', $id)->get();

        } catch (\Throwable $th) {
            return response()->json([
                "status" => 400,
                "message" => $th
            ]);
        }
        return response()->json([
            "status" => 200,
            "message" => "Fetching successfully",
            "data" => $scores
        ]);
    }

    public function updateScore(Request $request, $id)
    {

        try {
            $testScore = TestScore::find($id);

            $testScore->grammar = $request->grammar;
            $testScore->listening = $request->listening;
            $testScore->reading = $request->reading;
            $testScore->score = ($request->grammar * 10) + ($request->reading * 10) + ($request->listening * 10);

            $testScore->save();

        } catch (\Throwable $th) {
            return response()->json([
                "status" => 400,
                "message" => $th
            ]);
        }


        return response()->json([
            "status" => 200,
            "message" => "Data successfully updated!",

        ]);
    }

    public function deleteScore($id)
    {

        try {
            $testScore = TestScore::find($id);

            $testScore->delete();
        } catch (\Throwable $th) {
            return response()->json([
                "status" => 400,
                "message" => $th
            ]);
        }


        return response()->json([
            "status" => 200,
            "message" => "Data successfully deleted!",

        ]);
    }

}
