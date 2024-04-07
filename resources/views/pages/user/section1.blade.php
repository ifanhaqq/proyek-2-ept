@extends('layouts.start-test-layout')
@section('content')
    <div class="container mt-5 test-box ">
        <form action="" method="">
            <div class="text-center">
                <h4 class="main-font">Short conversation 1-2</h4>
                <audio controls>
                    <source src="horse.ogg" type="audio/ogg">
                    <source src="horse.mp3" type="audio/mpeg">
                    Your browser does not support the audio tag.
                </audio>
            </div>
            <ol>
                <li></li>
            </ol>
            <div class="options">
                <label class="btn btn-light">
                    <input type="radio" name="answer" value="A"> A. Lock the computer lab later
                </label>
                <label class="btn btn-light">
                    <input type="radio" name="answer" value="B"> B. Leave with the man
                </label>
                <label class="btn btn-light">
                    <input type="radio" name="answer" value="C"> C. Buy a new lock for the computer lab
                </label>
                <label class="btn btn-light">
                    <input type="radio" name="answer" value="D"> D. Show the man where the lab is
                </label>
            </div>
            <div class="row text-center mt-lg-5">
                <div class="col-3"></div>
                <div class="col-3">
                    <a href="#" class="btn btn-dark text-left">Previous</a>
                </div>
                <div class="col-3">
                    <a href="#" class="btn btn-dark text-left">Next</a>
                </div>
            </div>
        </form>

    </div>
@endsection
