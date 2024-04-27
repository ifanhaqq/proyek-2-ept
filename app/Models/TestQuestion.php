<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TestQuestion extends Model
{
    use HasFactory;

    protected $table = 'test_questions';

    protected $primaryKey = 'question_id';

    public function readingSection()
    {
        return $this->belongsTo(ReadingSection::class, 'reading_id');
    }
}
