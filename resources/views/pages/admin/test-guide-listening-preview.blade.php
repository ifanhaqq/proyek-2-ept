@extends('layouts.start-test-layout')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="text-center">
            <h4 class=" main-font display-5 mb-4">Listening Section's Instruction</h4>
        </div>
        <div class="guide-text mb-4">
            <p class="text-center fw-bold">{!! nl2br(e($guide->listening_guide)) !!}</p>
        </div>
        </ol>
        <div class="text-center">
            <a href="{{ route('listening-preview', $wave_id) }}" class="btn btn-dark text-center mt-3">NEXT</a>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/guide.js') }}"></script>
@endsection
