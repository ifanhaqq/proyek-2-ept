@extends('layouts.admin-layout')

@section('content')
<div class="col-9">
    <div class=" row font-2 mt-4">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <div class="">
                <div class="card-body">
                    MANAGE TEST
                    <div class="container rounded border mt-4">
                        <table class="table table-striped ps-2">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 350px">Test Title</th>
                                    <th scope="col" style="width: 350px">Selection</th>
                                    <th scope="col" style="width: 350px">Display Limit</th>
                                    <th scope="col" style="width: 350px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">TOEFL</th>
                                    <td>Listening</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">IELTS</th>
                                    <td>Structure & Written Expression</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">TOEIC</th>
                                    <td>Reading</td>
                                    <td>@twitter</td>
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