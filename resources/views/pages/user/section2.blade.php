@extends('layouts.start-test-layout2')
@section('content')
    <div class="container ">
        <div class="d-flex mt-5 ">
            <!-- Button trigger modal -->
            <div class="me-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Click here for the instruction!
                </button>
            </div>
            <div class="">
                <form name="cd" id="cd">
                    <input type="hidden" name="" id="timeExamLimit" value="25">
                    <input type="hidden" id="timeLimit" value="3">
                    <label>Remaining Time : </label>
                    <input style="border:none;background-color: transparent;color:#333e5d;font-size: 25px;" name="disp"
                        id="timer" type="text" class="clock" id="txt" value="00:00" size="5"
                        readonly="true" />
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5 test-box ">
        <form action="{{ route('loading-screen') }}" method="POST" id="testForm">
            @csrf
            <input type="hidden" name="count" id="max_params" value="{{ $count }}">
            <ul id="list_question">
                @foreach ($questions as $qs)
                    <input type="hidden" value="{{ $number++ }}">
                    <input type="hidden" id="params" value="{{ $number }}">
                    <input type="hidden" id="user_id" name="user_id" value="{{ $user_id }}">
                    <input type="hidden" id="section" name="section" value="{{ $qs['section'] }}">
                    <input type="hidden" id="question_id_{{ $number }}" name="question_id_{{ $number }}"
                        value="{{ $qs['question_id'] }}">


                    <li id="no{{ $number }}">
                        <div class="d-flex">
                            <div class=" btn btn-warning ms-auto">
                                <input class="form-check-input" type="checkbox" id="checkbox-{{ $number }}">
                                <label class="form-check-label" for="checkbox-{{ $number }}">Still not sure</label>
                            </div>
                        </div>
                        <p>{{ $qs['question'] }}</p>

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
                    <button type="submit" class="btn btn-dark text-left" id="submitTest">Next section</button>
                </div>
            </div>
        </form>
        <div class="flex-container mt-4" id="button-wrapper">
            @for ($i = 1; $i <= $count; $i++)
                <button class="btn btn-outline-dark mb-2 ms-1 me-1"
                    id="nav-button-{{ $i }}">{{ $i }}</button>
            @endfor
        </div>

    </div>

    <!-- Guide Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Grammar Section's Guide</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-center">
                        {!! nl2br(e($guide)) !!}
                    </p>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/testTimer.js') }}"></script>
    <script src="{{ asset('js/test-responses.js') }}"></script>
    <script src="{{ asset('js/preventReload.js') }}"></script>
@endsection
