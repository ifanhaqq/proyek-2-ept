<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('style.css') }}" rel="stylesheet" type="text/css">
    <title>Change your password</title>
</head>

<body>
    <div class="bg-image">
        <div class="container d-flex flex-column">
            <div class="row justify-content-center" style="margin-top: 20vh">

                <div class="col-sm-5">
                    <div class="rounded border border-5 d-flex flex-column"
                        style="background-color: rgba(255, 255, 255, 1);">
                        <div class="align-self-center mt-3 mb-3">
                            <img src="../img/drafle-black-blurred.png" alt="Logo" width="220">
                        </div>

                        <div class="card border border-0" style="background-color: rgba(255, 255, 255, 0);">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form action="{{ route('update-password') }}" method="POST">
                                            @csrf

                                            <input type="hidden" name="token" value="{{ $token }}">

                                            <label for="email" class="form-label fw-bolder text-dark">Email :</label>
                                            <input readonly type="email" name="email"
                                                class="form-control border border-3" value="{{ $email }}">

                                            <label for="password" class="form-label fw-bolder text-dark mt-2">Password
                                                :</label>
                                            <input type="password" name="password" class="form-control border border-3">

                                            <label for="password_confirmation"
                                                class="form-label fw-bolder text-dark mt-2">Confirm
                                                your password :</label>
                                            <input type="password" name="password_confirmation"
                                                class="form-control border border-3">
                                            @if (session('status'))
                                                <p class="text-danger">{{ session('status') }}</p>
                                            @endif


                                            <div class="d-flex flex-row-reverse">
                                                <div class="align-self-end">
                                                    <button type="submit" class="btn btn-dark mt-5">Change
                                                        Password</button>
                                                </div>

                                            </div>

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
