<div class="row">
    <div class="container-fluid">
        <div class="header-bg d-flex justify-content-between">
            <a href="/">
                <img src="../img/Group 1.png" alt="Logo" width="120" height=""
                    class="d-inline-block align-text-top">
            </a>
            <div class="align-self-center text-white me-2">
                Hi there, {{ Auth::user()->name }}!
            </div>
        </div>
    </div>
</div>
