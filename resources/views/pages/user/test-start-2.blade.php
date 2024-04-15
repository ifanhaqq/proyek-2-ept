@extends('layouts.start-test-layout')
@section('content')
    <div class="row mt-3">
        <div class="col-1 ms-5">
            {{-- untuk back ke dashboard --}}
            <button type="button" class="btn btn-outline-secondary">
                <a href="">
                    <div class="bi bi-list  fw-bolder text-center" style="font-size: 2rem;"></div>
                </a>
            </button>
        </div>
    </div>
    {{-- form --}}
    <div class="row justify-content-center">
        <div class="card " style="width: 30rem;">
            <div class="card-body">
                <h5 class="card-title text-center font-2">Confirm Your Identity</h5>
                <p class="card-text text-center sub-font"> Make sure your data is valid!</p>
                <form action=""></form>


                <form class="form-container rounded-3 sub-font fw-smaller" style="font-size:0.9vw" method="POST"
                    action="{{ route('submit-temp') }}">
                    @csrf
                    <label for="name" class="form-label ">Full Name</label>
                    <input type="text" class="form-control bg-input" id="name" name="name">

                    <label for="nim" class="form-label">NIM</label>
                    <input type="number" class="form-control bg-input" id="nim" name="nim">

                    <label for="email" class="form-label ">Email</label>
                    <input type="email" class="form-control bg-input" id="email" name="email">
                    <div class="row mt-3 text-center">
                        <div class="col-6">
                            <a href="/start-the-test/1" class="btn btn-dark font-2">Previous</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-dark font-2">Next</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
