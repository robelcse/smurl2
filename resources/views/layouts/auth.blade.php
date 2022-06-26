<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Free URLs Shortener</title>
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,600,700" rel="stylesheet">
      <link href="assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/css/fontawesome.min.css" rel="stylesheet">
      <link href="assets/css/owl.carousel.min.css" rel="stylesheet">
      <link href="assets/css/animate.css" rel="stylesheet">
      <link href="assets/css/style.css" rel="stylesheet">
      <link href="assets/css/responsive.css" rel="stylesheet">
      <link rel="shortcut icon" type="image/png" href="assets/img/fav.png"/>
      <meta class="keywords" content=""/>
      <meta name="description" content="Short your long URL for your business promotion. Pikly offers free service, to track your visitors with a rich admin dashboard "/>
        @include('parts/analytics')
   </head>
   <body>
      <!--Header Section-->
      @include('parts/header')
      <!--End Header Section-->
        @yield('content')

        <!--Start Footer Section-->
        @include('parts/footer')

        <a href="#h-header" id="bottom-to-top" class="button-scroll"><i class="fas fa-chevron-up"></i></a>

        <script src="assets/js/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>