@extends('layouts.start-test-layout')
@section('content')
    
    <div class="row mt-3 ms-3 me-3">
    <div class="card" >
        <div class="card-body d-flex flex-column">
          <h5 class="card-title font-2 text-center display-6">Ready for take the test?</h5>
          <h4 class="sub-font text-center">There is rules that you need to know during the test!</h4>
          <ol class="list-group list-group-numbered border border-0 align-self-center mt-4 mb-4">
            <li class="list-group-item">The test duration is 120 minutes, with total number of question is 140</li>
            <li class="list-group-item">There are three sections that contained in the test, as for listening comprehension, structure and written expression, and reading comprehension</li>
            <li class="list-group-item">There is previous and next button also question number button so you can navigate to each question</li>
            <li class="list-group-item">When you already go to the test page, quit from the application is forbidden because your answer will be immediately submitted</li>
            <li class="list-group-item">This test can't be use as a substitute for the actual test TOEFL, it's only prediction test!</li>
          </ol>
          <div class="text-center">
          <a href="{{ route('listening-preview', $wave_id)}}" class="btn btn-dark text-center">START THE TEST</a>
        </div>
        </div>
      </div>
    </div>
@endsection
