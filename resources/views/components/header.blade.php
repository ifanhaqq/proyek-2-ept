 {{-- nav untuk dahboard --}}
 <link href="{{ asset('../style.css') }}" rel="stylesheet" type="text/css">


 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
     <div class="container">

         <img src="../img/Group 1.png" alt="Logo" width="120" height="" class="d-inline-block align-text-top ">
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
             aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">

         </div>

         <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
         aria-controls="offcanvasScrolling">Enable body scrolling</button>
 
     <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
         id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
         <div class="offcanvas-header">
             <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Offcanvas with body scrolling</h5>
             <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>
         <div class="offcanvas-body">
             <p>Try scrolling the rest of the page to see this option in action.</p>
         </div>
     </div>
     </div>

 </nav>
