@extends('layouts.start-test-layout2')
@section('content')
    <div class="container mt-5 test-box ">
        <div class="row mt-5 ">
            <div class="col-12 text-end">
                <button id="clickme">clickme</button>
                <form name="cd">
                    <input type="hidden" name="" id="timeExamLimit" value="55">
                    <input type="hidden" id="timeLimit" value="3">
                    <label>Remaining Time : </label>
                    <input style="border:none;background-color: transparent;color:#333e5d;font-size: 25px;" 
                           name="disp"
                           type="text" 
                           class="clock" id="txt" 
                           value="00:00" 
                           size="5" 
                           readonly="true" />
                </form>
            </div>
        </div>
        <form action="{{ route('test_score') }}" method="POST" id="testForm">
            @csrf
            <input type="hidden" name="count" id="max_params" value="{{ $count }}">
            <ul id="list_question">
                @foreach ($questions as $qs)
                    <input type="hidden" value="{{ $number++ }}">
                    <input type="hidden" id="params" value="{{ $number }}">
                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                    <input type="hidden" name="section" value="{{ $qs->section }}">
                    <input type="hidden" name="question_id_{{ $number }}" value="{{ $qs->question_id }}">

                    <li id="no{{ $number }}">
                        {{-- text --}}
                        <p>{{ $qs->text }}</p>

                        {{-- question --}}
                        <p>{{ $number . '. ' . $qs->question }}</p>

                        <div class="options">
                            <label class="btn btn-light">
                                <input type="radio" name="choice_{{ $number }}" value="{{ $qs->question_ch1 }}">
                                {{ $qs->question_ch1 }}
                            </label>
                            <label class="btn btn-light">
                                <input type="radio" name="choice_{{ $number }}" value="{{ $qs->question_ch2 }}">
                                {{ $qs->question_ch2 }}
                            </label>
                            <label class="btn btn-light">
                                <input type="radio" name="choice_{{ $number }}" value="{{ $qs->question_ch3 }}">
                                {{ $qs->question_ch3 }}
                            </label>
                            <label class="btn btn-light">
                                <input type="radio" name="choice_{{ $number }}" value="{{ $qs->question_ch4 }}">
                                {{ $qs->question_ch4 }}
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
                    <button type="submit" class="btn btn-dark text-left" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Submit</button>
                </div>
            </div>
        </form>

        <div class="flex-container mt-4" id="button-wrapper">
            @for ($i = 1; $i <= $count; $i++)
                <button class="btn btn-outline-dark mb-2 ms-1 me-1" id="nav-button-{{ $i }}">{{ $i }}</button>
            @endfor
        </div>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 font-2" id="exampleModalLabel">SUBMIT YOUR ANSWER?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Click SUBMIT button if you are done your test!
                        <br>Don’t forget to make sure the answers already filled
                    </p>

                </div>
                <div class="modal-footer text-center">
                    <a href="#" class="btn btn-primary text-center">SUBMIT</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('js/listeningSection.js') }}"></script>
    <script src="{{ asset('js/navButton.js') }}"></script>
@endsection

@section('scripts')
    <script src="{{ asset('js/testTimer.js') }}"></script>
@endsection
