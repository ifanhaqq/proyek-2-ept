@extends('layouts.start-test-layout')
@section('content')
    <div class="container mt-3">
        <h4 class="main-font display-6 text-center">Section 3 Reading Comprehension</h4>
        <div class="guide-text">
            <p class="text-center mt-5 fw-bold">{!! nl2br(e($guide)) !!}</p>
        </div>
        
        <div class="row text-center mt-4 mb-5">
            <div class="col">
                <a href="{{ route('reading-preview', $wave_id) }}" class="btn btn-dark text-left">Start next section</a>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script src="{{ asset('js/guide.js') }}"></script>
    @endsection
