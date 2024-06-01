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
            <div class="row justify-content-center" style="margin-top: 20vh">

                <div class="col-sm-5">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissable d-flex flex-row" role="alert">
                            <div class="me-auto">{{ session('status') }}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="rounded border border-5 d-flex flex-column"
                        style="background-color: rgba(255, 255, 255, 1);">
                        <div class="align-self-center mt-3 mb-3">
                            <img src="../img/drafle-black-blurred.png" alt="Logo" width="220">
                        </div>

                        <div class="card border border-0" style="background-color: rgba(255, 255, 255, 0);">
                            <div class="card-body">
                                <p class="fw-bolder text-dark">
                                    Thanks for signing up! Before getting started, could you verify your email address
                                    by
                                    clicking on the link we just emailed to you? If you didn't receive the email, we
                                    will
                                    gladly
                                    send you another.
                                </p>
                                <div class="mt-5 row">
                                    <div class="col-sm-9">
                                        <form action="{{ route('send-notification') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-dark">Resend Verification
                                                Email</button>
                                        </form>
                                    </div>
                                    <div class="col-sm-3">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn card-link text-danger">Log Out</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
