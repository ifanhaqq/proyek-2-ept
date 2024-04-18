@extends('layouts.user-layout')

@section('content')

    <!-- Data-Table -->
    <div class="data-table col-9 borders ">
        <div class="row"></div>
        <div class="row">
            <div class="col-2 ">
               
            </div>
    
            <div class="col-9 mt-5 text-center me-3">
                <div class="container-fluid bg-light-subtle rounded-3">
                <h4 class="main-font display-3">Welcome to the POLINDRA TOEFL Prediction Test</h4>
            </div>
                <p class="text center sub-font ">This test simulation was design for you whose ready to improve
                    through this simulation test, measure and hone your English skills through this TOEFL Prediction. 
                    Test results only apply to the scope of Indramayu State Polytechnic!
                </p>
           
            
            </div>
        </div>
    </div>
    {{-- penutup untuk nav --}}
</div>
</div>

{{-- modal --}}

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 font-2" id="exampleModalLabel">CONFIRM YOUR TOKEN!</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="">
            <label for="token">TOKEN CODE</label>
            <input type="text">
          </form>
        </div>
        <div class="modal-footer">
          <a href="#"><button type="button" class="btn btn-primary font-2">Confirm</button></a>
        </div>
      </div>
    </div>
  </div>
@endsection
