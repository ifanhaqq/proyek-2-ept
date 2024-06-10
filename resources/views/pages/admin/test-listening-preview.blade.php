@extends('layouts.start-test-layout2')
@section('content')
    <div class="container mt-5 test-box">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            See guide
        </button>
        <form action="" method="POST">
            @csrf
            <input type="hidden" name="count" id="max_params" value="{{ $count }}">
            <ul id="list_question">
                <div class="text-center ms-auto">
                    <input type="hidden" id="audio-path" value="{{ asset("storage/audio/{$audio->audio_title}") }}">
                    <button type="button" class="btn btn-success fs-5" id="play-audio"><i class="bi bi-play-circle-fill"></i> Play</button>
                    <button type="button" class="btn btn-success fs-5" id="audio-playing"><i class="bi bi-pause-circle-fill"></i> Audio playing</button>
                </div>
                @foreach ($questions as $qs)
                    <input type="hidden" value="{{ $number++ }}">
                    <input type="hidden" id="params" value="{{ $number }}">
                    <input type="hidden" name="section" value="{{ $qs['section'] }}">
                    <input type="hidden" name="question_id_{{ $number }}" value="{{ $qs['question_id'] }}">

                    <li id="no{{ $number }}">
                        <div class="d-flex justify-content-end">
                            <div class="btn btn-warning">
                                <input class="form-check-input" type="checkbox" id="checkbox-{{ $number }}">
                                <label class="form-check-label" for="checkbox-{{ $number }}">Still not sure</label>
                            </div>

                        </div>

                        <p>{{ $number }}.</p>
                        <div class="options">
                            <label class="btn btn-light">
                                <input type="radio" class="radio_{{ $number }}" name="choice_{{ $number }}"
                                    value="{{ $qs['question_ch1'] }}">
                                {{ $qs['question_ch1'] }}
                            </label>
                            <label class="btn btn-light">
                                <input type="radio" class="radio_{{ $number }}" name="choice_{{ $number }}"
                                    value="{{ $qs['question_ch2'] }}">
                                {{ $qs['question_ch2'] }}
                            </label>
                            <label class="btn btn-light">
                                <input type="radio" class="radio_{{ $number }}" name="choice_{{ $number }}"
                                    value="{{ $qs['question_ch3'] }}">
                                {{ $qs['question_ch3'] }}
                            </label>
                            <label class="btn btn-light">
                                <input type="radio" class="radio_{{ $number }}" name="choice_{{ $number }}"
                                    value="{{ $qs['question_ch4'] }}">
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
                    <a href="{{ route('grammar-guide-preview', $wave_id) }}" class="btn btn-dark text-left">Next
                        section</a>
                </div>
            </div>
        </form>

        <div class="flex-container mt-4" id="button-wrapper">
            @for ($i = 1; $i <= $count; $i++)
                <button class="btn btn-outline-dark mb-2 ms-1 me-1 nav-button" id="nav-button-{{ $i }}"
                    data-id="{{ $i }}">{{ $i }}</button>
            @endfor
        </div>
    </div>

    <!-- Guide Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Listening Section's Guide</h1>
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
    <script src="{{ asset('js/audio-control.js') }}"></script>
@endsection
