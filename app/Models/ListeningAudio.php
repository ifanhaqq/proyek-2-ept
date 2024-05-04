<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListeningAudio extends Model
{
    use HasFactory;

    protected $table = 'listening_audios';

    protected $primaryKey = 'audio_id';
}
