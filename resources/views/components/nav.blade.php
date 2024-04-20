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
                    <a href="#">
                        <h6 class="title-dashboard borders p-2"><strong>DASHBOARD</strong></h6>
                        <!-- Dashboard-Child -->
                    </a>
                    <ul class="dashboard-child borders ps-4">
                        <a href="{{ route('start-test', 1) }}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <li class="list borders d-flex p-2">
                                <img src="" alt="" />
                                <h6 class="bi bi-pencil-square me-3"> Start Test Now!</h6>
                            </li>
                        </a>
                        
                        <a href="#">
                            <li class="list borders d-flex p-2">
                                <img src="" alt="" />
                                <h6 class="bi bi-clock-history me-3"> Test Result</h6>
                            </li>
                        </a><br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="font-3" style="border: none">
                                <h6>LOGOUT</h6>
                            </button>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
