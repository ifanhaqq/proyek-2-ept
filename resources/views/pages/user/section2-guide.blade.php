@extends('layouts.start-test-layout')
@section('content')
    <div class="container mt-3">
        <h4 class=" main-font display-6 text-center">Section 2 Structure and Written expression</h4>
        {{-- untuk structure --}}
        <h4 class="main-font">Structure Guide</h4>
        <p>contoh untuk sementara yah</p>
        <p>Questions 1–4 are incomplete sentences. Below each sentence you will see 4 words or phrases marked A, B, C and D.
            Choose the 1 word or phrase that best completes the sentence.
            <br>Examples
            <br>Geysers have sometimes been compared to volcanoes __________ they both emit hot liquids from below Earth's
            surface.
        <ol type="A">
            <li>despite</li>
            <li>because</li>
            <li>in regard to</li>
            <li>as a result of</li>
        </ol>

        <br>The sentence should read, "Geysers have sometimes been compared to volcanoes because they both emit hot liquids
        from below Earth's surface." Therefore, you should choose B.</p>
        {{-- untuk written expression --}}
        <h4 class="main-font">Written expression Guide</h4>
        <p>In questions 5–10, each sentence has 4 highlighted words or phrases. The 4 highlighted parts of the sentence are
            marked A, B, C and D. Identify the 1 highlighted word or phrase that must be changed in order for the sentence
            to be correct.
            <br>Examples
            <br>Guppies are sometimes <u>A call</u> rainbow fish <u>B due to</u> the <u>C bright colors of</u> <u> D the
                males.</u>
        </p>
        <ol type="A">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ol>
        <br>
        <p>The sentence should read, "Guppies are sometimes called rainbow fish due to the bright colors of the males."
            Therefore, you should choose A.</p>
        <div class="row text-center mt-lg-5">
            <div class="col">
                <a href="{{ route('grammar-section') }}" class="btn btn-dark text-left">Start next section</a>
            </div>
        </div>
    </div>
@endsection
