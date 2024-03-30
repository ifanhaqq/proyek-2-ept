@extends('layouts.user-layout')

@section('content')
    <div class="bg-image">
        <link href="{{ asset('style.css') }}" rel="stylesheet" type="text/css">


        <!-- welcome -->
        <div class="row">

            <div class="col-4 ms-3 mt-5">
                <div class="text-left">
                    <h1 class="main-font display-1" style="line-height: 0.5">POLINDRA</h1>
                    <h1 class="main-font display-5">TOEFL Prediction Test</h1>

                    <p class="sub-font display-4">“Practice your TOEFL with this prediction test”</p>

                </div>
            </div>
            <div class="col-1"></div>
            <!-- form -->
            <div class="col-6 d-flex justify-content-end">

                <div class="login-box">
                    <h1 class="text-center fw-bolder">LOGIN</h1>
                    @if (session('failed'))
                        <div class="alert alert-danger alert-dismissable d-flex flex-row" role="alert">
                            <div class="me-auto">{{ session('failed') }}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form class="form-container rounded-3 sub-font" method="POST" action="{{ route('auth') }}">
                        @csrf
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control">

                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" name="password">


                        <div class="row mt-5">
                            <div class="col-2 fw-bolder">
                                <button type="submit" class="btn btn-dark fw-bolder">
                                    Login
                                </button>
                            </div>
                            <div class="col-9">
                                <p><small>Don’t have an account? Click <a href="#">Here</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection
