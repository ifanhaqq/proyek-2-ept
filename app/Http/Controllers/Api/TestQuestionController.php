<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TestQuestionResource;
use App\Models\TestQuestion;
use Illuminate\Http\Request;

class TestQuestionController extends Controller
{
    public function index()
    {

    }

    public function show($question_id)
    {
        $testQuestion = TestQuestion::where('question_id', $question_id)->first();

        return new TestQuestionResource(true, 'Success', $testQuestion);
    }
}
