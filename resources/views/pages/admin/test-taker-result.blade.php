@extends('layouts.admin-layout')

@section('content')
    <div class="col-9">
        <div class=" row  mt-4">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <div class="">
                    <div class="card-body">
                        <h4 class="font-2">Test Taker Result</h4>
                        <div class="container rounded border mt-4">
                            <table class="table table-striped ps-2">
                                <thead>
                                    <tr class="font-2">
                                        <th>No</th>
                                        <th scope="col" style="width: 350px">Student Name</th>
                                        <th scope="col" style="width: 350px">Test Title</th>
                                        <th scope="col" style="width: 350px">Test Date</th>
                                        <th scope="col" style="width: 350px">Scores</th>
                                        <th scope="col" style="width: 350px" >View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <th scope="row">Hanifan Haqin</th>
                                        <td>Batch 1</td>
                                        <td>12 November 2022</td>
                                        <td>566</td>
                                        <td>
                                            <button class="btn btn-sm btn-info bi bi-search"> more</button>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- penutup untuk nav --}}
    </div>
    </div>

  
@endsection
