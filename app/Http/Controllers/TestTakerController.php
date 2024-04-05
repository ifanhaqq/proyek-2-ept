<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestTakerController extends Controller
{
    public function index()
    {
        return view('pages.user.home');
    }
}
