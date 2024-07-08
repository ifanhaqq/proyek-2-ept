<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Welcome to Polindra TOEFL Prediction Test</title>
</head>

<body>
    <div class="bg-image">
        <link href="{{ asset('style.css') }}" rel="stylesheet" type="text/css">
        
        <!-- welcome -->
        <div class="row">
            <div class="col-12">
                <img src="../img/logo lp.png" alt="" width="10%">
            </div>
        </div>
        <div class="row">
            <div class="col-5 ms-3 mt-5">
                <div class="text-left">
                    <h1 class="main-font display-1" style="line-height: 0.5">POLINDRA</h1>
                    <h1 class="main-font display-5">TOEFL Prediction Test</h1>

                    <p class="sub-font display-4">“Practice your TOEFL with this prediction test”</p>

                </div>
            </div>
            <!-- form -->
            <div class="ms-5 col-5 bg-white rounded" style="margin-top: 15vh">
                <div class="d-flex flex-column mt-4 ms-4 me-4 mb-4" style="font-size:0.75vw">
                    <h1 class="text-center fw-bolder">LOGIN</h1>
                    @if (session('failed'))
                        <div class="alert alert-danger alert-dismissable d-flex flex-row" role="alert">
                            <div class="me-auto">{{ session('failed') }}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissable d-flex flex-row" role="alert">
                            <div class="me-auto">{{ session('success') }}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <form class="form-container rounded-3 sub-font " style="font-size:1vw" method="POST"
                        action="{{ route('auth') }}">
                        @csrf
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="email" class="form-control mb-1">

                        <label class="form-label fw-bold">Password</label>
                        <input type="password" name="password" class="form-control mb-1" id="password" name="password">
                        <a href="{{ route("forgot-password") }}">Forgot your password?</a>

                        <div class="mt-5 d-flex">
                            <div>
                                <button type="submit" class="btn btn-dark fw-bolder">
                                    Login
                                </button>
                            </div>

                            <div class="align-self-center ms-2" style="height: 3vh">
                                <p>
                                    Don’t have an account? Click <a href="{{ route('register') }}"
                                        id="register-btn">Here</a>
                                </p>
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
