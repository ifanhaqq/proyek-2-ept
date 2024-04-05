@extends('layouts.user-layout')
@section('content')
    <div class="data-table col-9  mt-5 ">
        <div class="card  col-10 ms-5 mb-3 me-5">
            <div class="card-body ">
                <h5 class="card-title text-center fw-bolder font-2 ">TOEFL ITP PREDICTION</h5>
                <p class="fst-italic text-center text-decoration-underline mb-5">Score Report</p>
                <table class="table table-borderless" style="width:60%">
                    <thead>
                        <tr>

                            <th scope="col">Student Name</th>
                            <th scope="col">:</th>
                            <th colspan="2">Hanifan Haqin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <th scope="row">Test Date</th>
                            <th scope="row">:</th>
                            <th scope="row">11 April 2024 </th>
                        </tr>

                    </tbody>
                </table>
                <table class="table table-bordered border-dark text-center fst-italic" >
                    <thead>
                        <tr>
                            <th scope="col">Section</th>
                            <th scope="col">Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Listening Comprehension</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Structure and Written expression</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Reading Comprehension</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <h5 class="text-center font-2">TOTAL SCORE : 677 </h5> 
            </div>
        </div>
    </div>


    {{-- penutup untuk nav --}}
    </div>
    </div>
@endsection
