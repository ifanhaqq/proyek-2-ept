@extends('layouts.start-test-layout2')
@section('content')
    <div class="container mt-5 test-box">
        <form action="{{ route('section-guide', 2) }}" method="POST">
            @csrf
            <input type="hidden" name="count" id="max_params" value="{{ $count }}">
            <ul id="list_question">
                <div class="text-center">
                    <audio controls src="{{ asset("storage/audio/{$audio->audio_title}") }}"></audio>
                </div>
                @foreach ($questions as $qs)

                    

                    <input type="hidden" value="{{ $number++ }}">
                    <input type="hidden" id="params" value="{{ $number }}">
                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                    <input type="hidden" name="section" value="{{ $qs['section'] }}">
                    <input type="hidden" name="question_id_{{ $number }}" value="{{ $qs['question_id'] }}">

                    <li id="no{{ $number }}">
                        <div class="checkbox-wrapper">
                            <input type="checkbox" id="checkbox-{{ $number }}">
                            <label for="checkbox-{{ $number }}">Still not sure</label>
                        </div>
                        <p>{{ $number }}.</p>
                        <div class="options">
                            <label class="btn btn-light">
                                <input type="radio" class="radio_{{ $number }}" name="choice_{{ $number }}" value="{{ $qs['question_ch1'] }}">
                                {{ $qs['question_ch1'] }}
                            </label>
                            <label class="btn btn-light">
                                <input type="radio" class="radio_{{ $number }}" name="choice_{{ $number }}" value="{{ $qs['question_ch2'] }}">
                                {{ $qs['question_ch2'] }}
                            </label>
                            <label class="btn btn-light">
                                <input type="radio" class="radio_{{ $number }}" name="choice_{{ $number }}" value="{{ $qs['question_ch3'] }}">
                                {{ $qs['question_ch3'] }}
                            </label>
                            <label class="btn btn-light">
                                <input type="radio" class="radio_{{ $number }}" name="choice_{{ $number }}" value="{{ $qs['question_ch4'] }}">
                                {{ $qs['question_ch4'] }}
                            </label>
                        </div>
                    </li>
                @endforeach
            </ul>
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
        </form>

        <div class="flex-container mt-4" id="button-wrapper">
            @for ($i = 1; $i <= $count; $i++)
                <button class="btn btn-outline-dark mb-2 ms-1 me-1" id="nav-button-{{ $i }}" style="invert(1)">{{ $i }}</button>
            @endfor
        </div>
    </div>
    
@endsection
