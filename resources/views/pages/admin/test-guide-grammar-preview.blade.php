@extends('layouts.start-test-layout')
@section('content')
    <div class="container mt-3">
        <h4 class=" main-font display-6 text-center">Section 2 Structure and Written expression</h4>
        <div class="guide-text mb-4">
            <p class="text-center fw-bold mt-5">{!! nl2br(e($guide)) !!}</p>
        </div>

        <div class="row text-center mt-lg-5">
            <div class="col">
                <a href="{{ route('grammar-preview', $wave_id) }}" class="btn btn-dark text-left mb-5">Start next section</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/guide.js') }}"></script>
@endsection
