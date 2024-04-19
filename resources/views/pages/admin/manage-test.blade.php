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
                                        <th scope="col" style="width: 350px">Test Title</th>
                                        <th scope="col" style="width: 350px">Section</th>
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

    <!-- Modal New Test -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 font-2" id="exampleModalLabel">New Test Waves!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-container rounded-3 sub-font fw-smaller" style="font-size:0.9vw" method="POST"
                        action="">

                        <label for="token" class="form-label">TOKEN CODE</label>
                        <input type="text"class="form-control " style="font-size:0.9vw" placeholder="CODE..." id="" name="">

                        <label for="title" class="form-label">Test Title</label>
                        <input type="text" class="form-control" id="" name="">

                        <label for="email" class="form-label ">Description</label>
                        <textarea class="form-control"  id="floatingTextarea2" style="height: 100px"></textarea>

                        <div class="row mt-3 text-center">
                            <div class="col-12 text-end">
                                <a href="/start-the-test/1" class="btn btn-secondary font-2">Close</a>
                                <a href="/start-the-test/1" class="btn btn-warning font-2">Add</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
