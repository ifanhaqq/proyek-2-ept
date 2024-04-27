<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ReadingSection extends Model
{
    use HasFactory;

    protected $table = 'reading_sections';
    protected $primaryKey = 'reading_id';

    public function questions(): HasMany
    {
        return $this->hasMany(TestQuestion::class, 'reading_id');
    }
}
