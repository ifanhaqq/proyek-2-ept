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


    
@endsection

@section('scripts')
    @if (session('sweetalert'))
        <script>
            Swal.fire({
                icon: '{{ session('sweetalert.icon') }}',
                title: '{{ session('sweetalert.title') }}'
            })
        </script>
    @endif
@endsection
