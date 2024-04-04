<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Document</title>
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
            <div class="col-6">
                <div class="register-box" style="font-size:0.75vw">
                    <h5 class="text-center fw-bolder ">REGISTER</h5>
                    <form class="form-container rounded-3 sub-font" method="POST" action="">
                        <label for="name" class="form-label ">Full Name</label>
                        <input type="text" class="form-control bg-input" id="name" name="name">

                        <label for="nim" class="form-label">NIM</label>
                        <input type="number" class="form-control bg-input" id="nim" name="nim">

                        <label for="exampleFormControlInput1" class="form-label ">Email</label>
                        <input type="email" class="form-control bg-input" id="exampleFormControlInput1">

                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" class="form-control bg-input" id="password" name="password">

                        <label for="exampleFormControlInput1" class="form-label">Repeat Password</label>
                        <input type="password" class="form-control bg-input" id="password" name="password">

                        <a href="#">Forgot Password?</a>
                        <div class="text-left row  ">
                            <div class="col-3 fw-bolder mt-3">
                                <button type="submit" class="btn btn-dark ">
                                    <h5><small>REGISTER</h5>
                                </button>
                            </div>

                            <div class="col-6">
                                <p>Already have an account? Click <a href="#">Here</a></p>
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
