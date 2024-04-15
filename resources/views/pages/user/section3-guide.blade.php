@extends('layouts.start-test-layout')
@section('content')
    <div class="container mt-3">
        <h4 class=" main-font display-6 text-center">Section 2 Reading Comprehension</h4>

        <p>contoh untuk sementara yah</p>
        <p>In this section you will read several passages. Each one is followed by a number of questions about it. Choose
            the one best answer — A, B, C or D — to each question.
            <br>As you're going through the questions, select the appropriate answer for each by clicking on it. When you
            have answered all the questions, click "Show all answers" at the end of the page to highlight the correct answer
            for each question.
            <br> Answer all questions about the information in a passage on the basis of what is stated or implied in that
            passage.
        </p>
        <div class="row text-center mt-lg-5">
            <div class="col">
                <a href="{{ route('reading-section') }}" class="btn btn-dark text-left">Start next section</a>
            </div>
        </div>
    @endsection
