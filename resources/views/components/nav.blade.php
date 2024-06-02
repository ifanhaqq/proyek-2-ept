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
                    <a href="/">
                        <h6 class="title-dashboard borders p-2"><strong>DASHBOARD</strong></h6>
                        <!-- Dashboard-Child -->
                    </a>
                    <ul class="dashboard-child borders ps-4 d-flex flex-column" style="height: 80vh">
                        <a href="{{ route('start-test', 1) }}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <li class="list borders d-flex p-2">
                                <img src="" alt="" />
                                <h6 class="bi bi-pencil-square me-3"> Start Test Now!</h6>
                            </li>
                        </a>

                        <a href="{{ route('user-history') }}">
                            <li class="list borders d-flex p-2">
                                <img src="" alt="" />
                                <h6 class="bi bi-clock-history me-3"> Test Result</h6>
                            </li>
                        </a>
                        <li class="mt-auto">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="font-3" style="border: none">
                                    <h6>LOGOUT</h6>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 font-2" id="exampleModalLabel">CONFIRM YOUR TOKEN!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('handle-token') }}" method="POST">
                        @csrf
                        <label for="token">TOKEN CODE</label>
                        <input type="text" name="token">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary font-2">Confirm</button>
                </div>
                </form>
            </div>
        </div>
    </div>
