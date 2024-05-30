@extends('layouts.start-test-layout')
@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <h4 class=" main-font display-5">Listening Instruction</h4>
            <audio controls>
                <source src="horse.ogg" type="audio/ogg">
                <source src="horse.mp3" type="audio/mpeg">
                Your browser does not support the audio tag.
            </audio>
        </div>
        <p>disini text skrip dari audio instruksinya, gambaran sementaranya</p>
        <ol type="1">
            <li> In the Listening Comprehension section of the test, you will have an opportunity to demonstrate your
                ability to understand spoken English. There are three parts to this section with special directions for each
                part. Answer all the questions on the basis of what is stated or implied by the speakers in this test.</li>
            <li> In Part A, you will hear short conversations between 2 people. After each conversation, you will hear a
                question about the conversation. The conversations and questions will not be repeated.</li>
            <li>After you hear a question, read the 4 possible answers on the screen and select the best answer by clicking
                on it.</li>
            <li>Here is an example.</li>
            <li>On the recording, you hear:
            <li>(Woman) I don't like this painting very much.</li>
            <li>(Man) Neither do I.</li>
            <li>(Narrator) What does the man mean?</li>
            <li> On the screen, you read:</li>
            <ol type="A">
                <li> He does not like the painting either.</li>
                <li>He does not know how to paint.</li>
                <li> He does not have any paintings.</li>
                <li> He does not know what to do.</li>
            </ol>
            <li> You learn from the conversation that neither the man nor the woman likes the painting. The best answer to
                the question "What does the man mean?" is A, "He does not like the painting either." Therefore, the correct
                choice is A.</li>
        </ol>
        <div class="text-center">
            <a href="{{ route('listening-section') }}" class="btn btn-dark text-center">NEXT</a>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/guide.js') }}"></script>
@endsection
