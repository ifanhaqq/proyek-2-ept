{{-- navvv --}}
<!-- CSS -->
<link href="{{ asset('style.css') }}" rel="stylesheet" type="text/css">
<!-- Div-Container -->
<div class="div-container container-fluid borders">

    <!-- Grid -->
    <div class="grid row borders borders-danger">
        <!-- Menu -->
        <div class="menu-sidebar col-3 borders shadow">
            <!-- Board -->
            <div class="board borders p-3">
                <!-- Dashboard -->
                <div class="dashboard borders">
                    <h6 class="title-dashboard borders p-2"><strong>DASHBOARD</strong></h6>
                    <!-- Dashboard-Child -->
                    <ul class="dashboard-child borders ps-4">
                        <a href="" data-bs-toggle="modal" data-bs-target="#newTest">
                            <li class="list borders d-flex p-2">
                                <img src="" alt="" />
                                <h6 class="bi bi-plus-circle-fill me-4">New Test</h6>
                            </li>
                        </a>
                        <a href="{{ route('manage-test') }}">
                            <li class="list borders d-flex p-2">
                                <img src="" alt="" />
                                <h6>Manage Test</h6>
                            </li>
                        </a>
                        <a href="">
                            <li class="list borders d-flex p-2">
                                <img src="" alt="" />
                                <h6>Test Taker Result</h6>
                            </li>
                        </a>
                        <a href="test.blade.php">
                            <li class="font-3">
                                <img src="" alt="" />
                                <h6>LOGOUT</h6>
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="newTest" tabindex="-1" aria-labelledby="newTestLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 font-2" id="newTest"> NEW TEST</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="form-container rounded-3 sub-font fw-smaller" method="POST"
                            action="{{ route('store-test-wave') }}" enctype="multipart/form-data">
                            @csrf
                            <label for="token" class="form-label">TOKEN</label>
                            <input type="text" class="form-control fw-smaller "
                                placeholder="Code must contain various character" id="token" name="token">

                            <label for="test-name" class="form-label">Test Name</label>
                            <input type="text" class="form-control " id="test-name" name="test_name">

                            <label for="description" class="form-label ">Description</label>
                            <textarea class="form-control" placeholder="About test..." id="floatingTextarea2" name="description"
                                style="height: 100px"></textarea>

                            <label for="audio" class="form-label">Upload an Audio for the Listening Section</label>
                            <input type="file" class="form-control " id="audio" name="audio_wave"
                                accept="audio/*">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary font-2">Close</button>
                        <button type="submit" class="btn btn-warning font-2">Add</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
