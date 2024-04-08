@extends('layouts.start-test-layout')
@section('content')
    <div class="container mt-5 test-box">
        <form action="" method="">
            @csrf
            <input type="hidden" id="max_params" value="{{ $count }}">
            <ul id="list_question">
                @foreach ($questions as $qs)
                    <input type="hidden" value="{{ $number++ }}">
                    <input type="hidden" id="params" value="{{ $number }}">

                    <li id="no{{ $number}}">
                        <div class="text-center">
                            <h4 class="main-font">Short conversation 1-2</h4>
                            <audio controls src="{{ asset("storage/audio/{$qs['question']}") }}"></audio>
                        </div>
                        <ol>
                            <li></li>
                        </ol>
                        <div class="options">
                            <label class="btn btn-light">
                                <input type="radio" name="answer" value="A"> {{ $qs['question_ch1']}}
                            </label>
                            <label class="btn btn-light">
                                <input type="radio" name="answer" value="B"> {{ $qs['question_ch2']}}
                            </label>
                            <label class="btn btn-light">
                                <input type="radio" name="answer" value="C"> {{ $qs['question_ch3']}}
                            </label>
                            <label class="btn btn-light">
                                <input type="radio" name="answer" value="D"> {{ $qs['question_ch4']}}
                            </label>
                        </div>
                    </li>
                @endforeach
                <div class="row text-center mt-lg-5">
                    <div class="col-3" id="margin"></div>
                    <div class="col" id="prev">
                        <button type="button" class="btn btn-dark text-left">Previous</button>
                    </div>
                    <div class="col" id="next">
                        <button type="button" class="btn btn-dark text-left">Next</button>
                    </div>
                    <div class="col" id="submit_button">
                        <button type="submit" class="btn btn-dark text-left">Next section</button>
                    </div>
                </div>
    </div>
    </ul>
    </form>








    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('js/listeningSection.js') }}"></script>
@endsection
