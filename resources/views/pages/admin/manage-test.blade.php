@extends('layouts.admin-layout')

@section('content')
    <div class="col-9">
        <div class=" row  mt-4">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <div class="">
                    <div class="card-body">
                        <h4 class="font-2">MANAGE TEST</h4>
                        <div class="container rounded border mt-4">
                            <table class="table table-striped ps-2">
                                <thead>
                                    <tr class="font-2">
                                        <th scope="col" style="width: 350px">Token</th>
                                        <th scope="col" style="width: 350px">Test Title</th>
                                        <th scope="col" style="width: 350px">Description</th>
                                        <th scope="col" style="width: 350px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">TOEFL</th>
                                        <td>Listening</td>
                                        <td>Otto</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary">Manage</button>
                                            <button class="btn btn-sm btn-danger">Delete</button>
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
