<!DOCTYPE html>
<html lang="en">
    <head>
        @include('parts/metadata')
        <title>smurl2 | Free URLs Shortener</title>
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,600,700" rel="stylesheet">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/fontawesome.min.css" rel="stylesheet">
        <link href="assets/css/owl.carousel.min.css" rel="stylesheet">
        <link href="assets/css/animate.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/responsive.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="assets/img/fav.png"/>
        @yield('css')
        @include('parts/analytics')
    </head>
    <body>
        <!--Header Section-->
        @include('parts/header')
        <!--End Header Section-->
        @yield('content')
        <!--success toast Design-->
        <!--success toast Design End-->
        <!--warning toast Design-->
        <!--warning toast Design end-->
        <!--Info toast Design-->
        <!-- <div class="toaster alert alert-info alert-dismissible fade show" role="alert">
            <div class="toast-icon info-icon"><i class="fas fa-info"></i></div>
            <div class="toster-text">
                <strong>Info</strong> Anyone with access can view your invited visitors.
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div> -->
        <!--Info toast design end-->
        <!--danger toast Design-->
        <!-- <div class="toaster alert alert-red alert-dismissible fade show" role="alert">
            <div class="toast-icon red-icon"><i class="fas fa-times"></i></div>
            <div class="toster-text">
                <strong>Danger</strong> Anyone with access can view your invited visitors.
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div> -->
        <!--danger toast design end-->
        <!--Start Footer Section-->
        @include('parts/footer')
        <a href="#h-header" id="bottom-to-top" class="button-scroll"><i class="fas fa-chevron-up"></i></a>
        <script src="assets/js/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
        <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
        <script src="assets/js/main.js"></script>
        @yield('script')
        
    </body>
</html>