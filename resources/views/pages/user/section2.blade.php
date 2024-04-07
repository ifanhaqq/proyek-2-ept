@extends('layouts.start-test-layout')
@section('content')
    <div class="container mt-5 test-box ">
        <form action="" method="">
            <ol>
                <li>Refrigerating meats ________ the spread of bacteria.</li>
            </ol>
            <div class="options">
                <label class="btn btn-light">
                    <input type="radio" name="answer" value="A"> A. slows
                </label>
                <label class="btn btn-light">
                    <input type="radio" name="answer" value="B"> B. slowing
                </label>
                <label class="btn btn-light">
                    <input type="radio" name="answer" value="C"> C. to slow
                </label>
                <label class="btn btn-light">
                    <input type="radio" name="answer" value="D"> D. is slowed
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
