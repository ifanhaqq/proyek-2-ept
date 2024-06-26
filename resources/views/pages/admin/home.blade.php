@extends('layouts.admin-layout')

@section('content')
    <div class="col-9">
        <div class="row font-2">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <div class="card bg-card mt-lg-5">
                    <div class="card-body bg-admin">
                        <table>
                            <tr>
                                <th class="col-4" style="width: 350px">Total Test</th>
                                <th class="col-4" style="width: 350px"></th>
                                <th class="col-4 text-center" style="width: 350px">{{ $totalTest }} Batch</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 mb-3 mb-sm-0">
                <div class="card mt-lg-5">
                    <div class="card-body">
                        <table>
                            <tr>
                                <th class="col-4" style="width: 350px">Total Test Taker</th>
                                <th class="col-4" style="width: 350px"></th>
                                <th class="col-4 text-center" style="width: 350px">{{ $totalTestTaker }} Person</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- penutup untuk nav --}}
    </div>
    </div>


    
@endsection
