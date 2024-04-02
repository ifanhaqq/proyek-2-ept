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
        <div class="row">
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
                <div class="col-6 " style="font-size:0.7vw">
                    <form class="form-container  rounded-3 sub-font col-8 mb-5 bg-white " method="POST" action="">
                        <h2 class="text-center fw-bolder">REGISTER</h2>
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

                        <div class="text-left row  ms-2 ">
                            <div class="col-3 fw-bolder">
                                <button type="submit" class="btn btn-dark ">
                                    <H4>REGISTER</H4>
                                </button>
                            </div>
                            <div class="col-1"></div>
                            <div class="col-6 ms-4 mb-5 ">
                                <p>Already have an account? Click<a href="#">Here</a></p>
                            </div>
                        </div>


                    </form>
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
