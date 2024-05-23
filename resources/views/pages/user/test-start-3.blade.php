@extends('layouts.start-test-layout')
@section('content')
    

    {{-- content --}}
    <div class="container text-center mt-5">
        <h3 class="font-2  ">AUDIO TESTING</h3>
        <p class="sub-font">Play the audio make sure that it’s sounds good!</p>
        <audio controls src="{{ asset("storage/audio/{$audioTest}") }}"></audio>
        <br>
        <br>
        <br>
        <br>
        <div class="row">
            <h6 class="bi bi-hand-thumbs-up main-font "> GOOD LUCK ON YOUR TEST </h6>
            <br>
            <br>
            <div class="col-12">
                <form action="{{ route('section-guide', 1)}}" method="POST">
                    @csrf
                    <input type="hidden" name="start_test" value="1">
                    <button type="submit" class="btn btn-dark text-center">NEXT</button>
                </form>
            </div>
        </div>

    </div>
@endsection
