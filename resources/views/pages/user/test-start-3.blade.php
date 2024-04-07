@extends('layouts.start-test-layout')
@section('content')
    <div class="row mt-3">
        <div class="col-1 ms-5">
            {{-- untuk back ke dashboard --}}
            <button type="button" class="btn btn-outline-secondary">
                <a href="">
                    <div class="bi bi-list  fw-bolder text-center" style="font-size: 2rem;"></div>
                </a>
            </button>
        </div>
    </div>

    {{-- content --}}
    <div class="container text-center">
        <h3 class="font-2  ">AUDIO TESTING</h3>
        <p class="sub-font">Play the audio make sure that it’s sounds good!</p>
        <audio controls>
            <source src="horse.ogg" type="audio/ogg">
            <source src="horse.mp3" type="audio/mpeg">
            Your browser does not support the audio tag.
        </audio>
        <br>
        <br>
        <br>
        <br>
        <div class="row">
            <h6 class="bi bi-hand-thumbs-up main-font "> GOOD LUCK ON YOUR TEST </h6>
            <br>
            <br>
            <div class="col-12">
                <a href="#" class="btn btn-dark text-left">START TEST!</a>
            </div>
        </div>

    </div>
@endsection
