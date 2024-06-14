<div class="row">
    <div class="container-fluid">
        <div class="col-12 header-bg d-flex justify-content-between">
            <a href="/">
                <img src="../img/Group 1.png" alt="Logo" width="120" height=""
                    class="d-inline-block align-text-top">
            </a>
            <div class="dropdown align-self-center text-white me-2">
                Hi there,<button class="btn text-white dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}!</button>
                <ul class="dropdown-menu">
                    <li>
                        <form action="{{ route('logout') }}" class="align-self-center" method="POST">
                            @csrf
                            <button type="submit" class="btn logout-button dropdown-item">
                                <h6 class="bi bi-arrow-right-square-fill me-4 "> LOGOUT</h6>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
            {{-- <form action="{{ route('logout') }}" class="align-self-center" method="POST">
                @csrf
                <button type="submit" class="btn logout-button">
                    <h6 class="bi bi-arrow-right-square-fill me-4 text-white "> LOGOUT</h6>
                </button>
            </form> --}}
        </div>
    </div>
</div>
