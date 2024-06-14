<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Create an account</title>
</head>

<body>


    <div class="bg-image ">
        <link href="{{ asset('style.css') }}" rel="stylesheet" type="text/css">

        <!-- welcome -->
        <div class="row">
            <div class="col-12">
                <img src="../img/logo lp.png" alt="" width="10%">
            </div>
        </div>
        <div class="row  ">

            <div class="col-4 ms-3 mt-5  ">
                <h1 class="main-font display-1" style="line-height: 0.5">POLINDRA </h1>
                <h1 class="main-font display-5">TOEFL Prediction Test</h1>

                <p class="sub-font display-4">“Practice your TOEFL with this prediction test”</p>
            </div>
            <div class="col-1">

            </div>
            <!-- form -->
            <div class="col-6 bg-white rounded border border-1">
                <div class="ms-4 mt-4 mb-4 me-4" style="font-size:0.75vw">
                    <h1 class="text-center fw-bolder ">REGISTER</h1>
                    @if (session('failed'))
                        <div class="alert alert-danger alert-dismissable d-flex flex-row" role="alert">
                            <div class="me-auto">{{ session('failed') }}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <form class="form-container rounded-3 sub-font" method="POST" action="{{ route('store') }}">
                        @csrf
                        <label for="name" class="form-label fw-bold">Full Name</label>
                        <input type="text" class="form-control bg-input mb-1" id="name" name="name">

                        <label for="nim" class="form-label fw-bold">NIM</label>
                        <input type="number" class="form-control bg-input mb-1" id="nim" name="nim">

                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control bg-input mb-1" id="email" name="email">

                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control bg-input mb-1" id="password" name="password">

                        <label for="pwdrpt" class="form-label fw-bold">Repeat Password</label>
                        <input type="password" class="form-control bg-input mb-1" id="pwdrpt" name="pwdrpt">

                        <div class="mt-5 d-flex">
                            <div>
                                <button type="submit" class="btn btn-dark ">
                                    <h5 class="">Register</h5>
                                </button>
                            </div>
                            <div class="align-self-center ms-2" style="height: 3vh">
                                <p>Already have an account? Click <a href="{{ route("login") }}">Here</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
