<?php

namespace App\Http\Controllers\design_pattern;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class GuideTest extends Controller
{
    public abstract function create(Request $request);
}
