@extends('layouts.user-layout')

@section('content')
    <!-- The sidebar -->
    <link href="{{ asset('style.css') }}" rel="stylesheet" type="text/css">
    <nav class="navbar bg-body-tertiary fw-smaller">
        <div class="container">
            <button class="btn btn-outline-secondary btn-sm"><a class="navbar-brand bi bi-houses"
                    href="#">Home</a></button>
            <button class="btn btn-outline-secondary btn-sm"><a class="navbar-brand bi bi-pencil-square" href="#">Start
                    Test</a></button>
            <button class="btn btn-outline-secondary btn-sm"><a class="navbar-brand bi bi-clock-history"
                    href="#">History Test</a></button>
        </div>
    </nav>
    <div class="container">
        <div class="row">
          
            <div class="col-8"></div>
            <h4>Welcome to the POLINDRA TOEFL Prediction Test</h4>
                <p class="text center">This test simulation was design for you whose ready to improve
                    through this simulation test, with the simmiliar huhu
                </p>
    </div>
@endsection
