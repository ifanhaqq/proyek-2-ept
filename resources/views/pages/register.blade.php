@extends('layouts.user-layout')

@section('content')
    <div class="bg-image ">
        <link href="{{ asset('style.css') }}" rel="stylesheet" type="text/css">

        <div class="row-2">
            <div class="col-6">
                <div class="navbar-nav">
                </div>
            </div>
        </div>
        <!-- welcome -->
        <div class="row"></div>
        <div class="row  mt-5">

            <div class="col-5 text-center ">
                <h1 class="main-font display-1">POLINDRA TOEFL </h1>
                <h1 class="main-font display-1">Prediction Test</h1>

                <p class="sub-font display-4">“Practice your TOEFL with this prediction test”</p>
            </div>
            <div class="col-1">

            </div>
            <!-- form -->
            <div class="col-6">
                <form class="form-container  rounded-3 sub-font col-8  " method="POST" action="">
                    <h1 class="text-center fw-bolder ">REGISTER</h1>
                    <div class="mb-3 ms-3 me-3">
                        <label for="exampleFormControlInput1" class="form-label ">Full Name</label>
                        <input style="background-color:#D0DDEF;" type="name" class="form-control"
                            id="exampleFormControlInput1">
                    </div>

                    <div class="mb-3 ms-3 me-3">
                        <label for="exampleFormControlInput1" class="form-label">NIM</label>
                        <input style="background-color:#D0DDEF;" type="NIM" class="form-control" id="NIM"
                            name="NIM">
                    </div>

                    <div class="mb-3 ms-3 me-3">
                        <label for="exampleFormControlInput1" class="form-label ">Email</label>
                        <input style="background-color:#D0DDEF;" type="email" class="form-control"
                            id="exampleFormControlInput1">
                    </div>

                    <div class="mb-3 ms-3 me-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input style="background-color:#D0DDEF;" type="password" class="form-control" id="password"
                            name="password">
                            <a href="#">Forgot Password?</a>
                    </div>

                    <div class="text-left row  ms-2">
                        <div class="col-3 fw-bolder">
                            <button type="submit" class="btn btn-dark me-5">
                                <H4 class="fw-bolder">REGISTER</H4>
                            </button>
                        </div>
                        <div class="col-6 ms-5 ">
                            <p><small>Already have an account? Click<a href="#">Here</a></p>
                        </div>
                    </div>


                </form>
            </div>
        </div>


    </>
@endsection
