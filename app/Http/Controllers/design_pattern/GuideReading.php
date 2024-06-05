<?php

namespace App\Http\Controllers\design_pattern;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guide;

class GuideReading extends GuideTest
{
    public function create(Request $request)
    {
        $newGuide = new Guide;

        $newGuide->text = $request->text;
        $newGuide->section = 'reading';

        $newGuide->save();

        return redirect()->route("manage-test");
    }
}
