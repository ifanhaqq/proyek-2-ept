<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestQuestionResource extends JsonResource
{

    public $status;
    public $message;
    public $resource;

    public function __construct($status, $message, $resource)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'question_id' => $this->question_id,
            'wave_id' => $this->wave_id,
            'reading_id' => $this->reading_id,
            'section' => $this->section,
            'text' => $this->text,
            'question' => $this->question,
            'question_ch1' => $this->question_ch1,
            'question_ch2' => $this->question_ch2,
            'question_ch3' => $this->question_ch3,
            'question_ch4' => $this->question_ch4,
            'correct_answer' => $this->correct_answer,
        ];

        
    }
}
