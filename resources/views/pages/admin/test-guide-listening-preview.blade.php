@extends('layouts.start-test-layout')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="text-center">
            <h4 class=" main-font display-5">Listening Instruction</h4>
            <audio controls>
                <source src="horse.ogg" type="audio/ogg">
                <source src="horse.mp3" type="audio/mpeg">
                Your browser does not support the audio tag.
            </audio>
        </div>
        <p class="text-center fw-bold ">{!! nl2br(e($guide->listening_guide)) !!}</p>
        </ol>
        <div class="text-center">
            <a href="{{ route('listening-preview', $wave_id) }}" class="btn btn-dark text-center mt-3">NEXT</a>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/guide.js') }}"></script>
@endsection
