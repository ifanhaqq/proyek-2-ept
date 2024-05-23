@extends('layouts.start-test-layout')
@section('content')
    
    <div class="row mt-3 ms-3 me-3">
    <div class="card" >
        <div class="card-body">
          <h5 class="card-title font-2 text-center display-6">Ready for take the test?</h5>
          <h4 class="sub-font text-center">There is rules that you need to know during the test!</h4>
          <ol>
              <li>The test duration is 120 minutes</li>
              <li>There are 3 sections that contained in the test ,  as for Listening Comprehension, Structure and Written expression, and Reading Comprehension</li>
              <li>belum kelarr butuh diskusi ama ibu berli lagi....</li>
          </ol>
          <div class="text-center">
          <a href="{{ route('start-test', 'credentials')}}" class="btn btn-dark text-center">NEXT</a>
        </div>
        </div>
      </div>
    </div>
@endsection
