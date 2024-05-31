<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('style.css') }}" rel="stylesheet" type="text/css">
    <title>Verify your email</title>
</head>

<body>
    <div class="bg-image">
        <div class="container d-flex flex-column">
            <div class="row justify-content-center" style="margin-top: 30vh">
                <div class="col-sm-5 d-flex flex-column rounded border border-5"
                    style="background-color: rgba(255, 255, 255, 1);">
                    <div class="align-self-center mt-3 mb-3">
                        <img src="../img/drafle-black-blurred.png" alt="Logo" width="220">
                    </div>

                    <div class="card border border-0" style="background-color: rgba(255, 255, 255, 0);">
                        <div class="card-body">
                            <p class="fw-bolder text-dark">
                                Thanks for signing up! Before getting started, could you verify your email address by
                                clicking on the link we just emailed to you? If you didn't receive the email, we will
                                gladly
                                send you another.
                            </p>
                            <div class="mt-5 row">
                                <div class="col-sm-10">
                                    <a href="#" class="btn btn-dark">Resend Verification Email</a>
                                </div>
                                <div class="col-sm-2">
                                    <a href="#" class="card-link">Log Out</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
