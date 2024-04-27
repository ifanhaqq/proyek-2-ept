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


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 font-2" id="exampleModalLabel">NEW TEST</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-container rounded-3 sub-font fw-smaller" method="POST"
                        action="{{ route('store-test-wave') }}">
                        @csrf
                        <label for="token" class="form-label">TOKEN</label>
                        <input type="text" class="form-control fw-smaller "
                            placeholder="Code must contain various character" id="token" name="token">

                        <label for="test-name" class="form-label">Test Name</label>
                        <input type="text" class="form-control " id="test-name" name="test_name">

                        <label for="description" class="form-label ">Description</label>
                        <textarea class="form-control" placeholder="About test..." id="floatingTextarea2" name="desc" style="height: 100px"></textarea>




                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary font-2">Close</button>
                    <button type="submit" class="btn btn-warning font-2">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
