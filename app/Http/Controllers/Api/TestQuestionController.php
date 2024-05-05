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

    public function showReadingQuestion($question_id, $reading_id)
    {
        $testQuestion = TestQuestion::select('test_questions.*', 'reading_sections.*')
                        ->join('reading_sections', 'test_questions.reading_id', '=', 'reading_sections.reading_id')
                        ->where('test_questions.question_id', $question_id)->where('reading_sections.reading_id', $reading_id)
                        ->first();

        return new TestQuestionResource(true, 'Success', $testQuestion);
    }
}
