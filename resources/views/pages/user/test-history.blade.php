@extends('layouts.user-layout')
@section('content')
    <div class="data-table col-9  mt-5 ">
        <div class="card col-10 ms-5 mb-3 me-5">
            <div class="card-body">
                <h5 class="card-title text-center fw-bolder font-2 mb-5">TEST HISTORY</h5>
                <table class="table">
                    <thead class="">
                        <tr>

                            <th scope="col">Test Title</th>
                            <th scope="col">Date</th>
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testResults as $testResult)
                            <tr>
                                <td>{{ $testResult->title }}</td>
                                <td>{{ $testResult->test_date }}</td>
                                <td><a href="{{ route("history-detail", $testResult->id) }}" class="bi bi-info-circle-fill" style="color: black"></a></td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- penutup untuk nav --}}
    </div>
    </div>
@endsection
