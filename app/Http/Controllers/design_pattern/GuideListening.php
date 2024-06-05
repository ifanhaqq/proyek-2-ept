<?php

namespace App\Http\Controllers\design_pattern;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GuideListening extends GuideTest
{
    public function create(Request $request)
    {
        $newGuide = new Guide;

        $newGuide->text = $request->text;
        $newGuide->section = 'listening';

        $newGuide->save();

        return redirect()->route("manage-test");
    }
}
