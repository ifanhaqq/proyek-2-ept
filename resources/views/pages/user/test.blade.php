@extends('layouts.user-layout')

@section('content')
    <!-- The sidebar -->
    <div class="row">
        <div class="col-12">
            <link href="{{ asset('style.css') }}" rel="stylesheet" type="text/css">
            <nav class="navbar bg-body-tertiary fw-smaller">
                <div class="container">
                    <button class="btn btn-outline-secondary btn-sm"><a class="navbar-brand bi bi-houses"
                            href="#">Home</a></button>
                    <button class="btn btn-outline-secondary btn-sm"><a class="navbar-brand bi bi-pencil-square"
                            href="#">Start
                            Test</a></button>
                    <button class="btn btn-outline-secondary btn-sm"><a class="navbar-brand bi bi-clock-history"
                            href="#">History Test</a></button>
                </div>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <img src="../img/dashboard.png" alt="" class="responsive">
        </div>

        <div class="col-8">
            <h4>Welcome to the POLINDRA TOEFL Prediction Test</h4>
            <p class="text center">This test simulation was design for you whose ready to improve
                through this simulation test, ..... bingung
            </p>
        </div>
    @endsection
