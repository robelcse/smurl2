<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Url Shorter</title>
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,600,700" rel="stylesheet">
      <link href="assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/css/fontawesome.min.css" rel="stylesheet">
      <link href="assets/css/owl.carousel.min.css" rel="stylesheet">
      <link href="assets/css/animate.css" rel="stylesheet">
      <link href="assets/css/style.css" rel="stylesheet">
      <link href="assets/css/responsive.css" rel="stylesheet">
      <link rel="shortcut icon" type="image/png" href="assets/img/fav.png"/>
   </head>
   <body>
      <!--Header Section-->
      <header class="site-header navbar-fixed-top">
         <div class="hirevisa-nav">
            <div class="container">
               <nav class="navbar navbar-expand-lg navbar-light">
                  <a class="navbar-brand" href="index.html">
                     <!-- <img src="assets/img/logo.png" alt="logo"> -->
                     <h1>KHA.LA</h1>
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                  <span></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li><a href="page-details.html" class="active">Home</a></li>
                        <li><a href="page-details.html">Why shortner?</a></li>
                        <li><a href="page-details.html">Solutions</a></li>
                        <li><a href="page-details.html">Features</a></li>
                        <li><a href="page-details.html">Resources</a></li>
                     </ul>
                     <div class="others-option">
                        <a href="register.html" class="auth-link">Sign Up</a>
                        <a href="login.html" class="btn btn-primary">Sign In</a>
                     </div>
                  </div>
               </nav>
            </div>
         </div>
      </header>
      <!--End Header Section-->
      <div id="h-header">
         <section id="shortner" class="section-space url-form-area">
            <div class="current-qr">
               <img src="assets/img/qr-large.png" alt="image title">
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="banner-title text-center">
                        <h1>Short links, big results</h1>
                        <p>A URL shortener built with powerful tools to help you grow and protect your brand.</p>
                     </div>
                  </div>
               </div>

               @if ($errors->any())
                  <div class="alert alert-danger">
                     <ul>
                           @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                           @endforeach
                     </ul>
                  </div>
               @endif


               <div class="shortner-form-banner">
                  <form action="" method="POST">
                     @csrf
                     <div class="row">
                        <div class="col-lg-9 pr-0">
                           <div class="form-group">
                              <input class="form-control" type="text" id="long_url"  name="long_url" value="{{old('long_url')}}" placeholder="Paste your big URL here....">
                           </div>
                           {{substr(session('long_url'),0,200)}}
                           {{ $errors->first('long_url') }}
                        </div>
                        <div class="col-lg-3 pl-0">
                           <button id="shortnarBtn" type="submit" class="btn btn-primary">Shorten</button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="row">
                  <div class="col-12">
                     <div id="shorten_urls">
                        <ul class="links_history">
                           <li class="link">
                              <span class="sh-long-link">{{ substr('https://www.flaticon.com/search/2?search-type=icons&amp;word=heart',0,100)}}</span>
                              <span class="list-qr">
                              <img src="assets/img/qr.png" alt="image title">
                              <span>
                              <button class="download-qr"><i class="fas fa-cloud-download-alt"></i></button>
                              <button class="download-qr print-qr"><i class="fas fa-print"></i></button>
                              </span>
                              </span>
                              <span>
                                 <span class="sh-short-link"><a href="https://bit.ly/36RvDWN" target="_blank" title="Shortened URL for https://www.flaticon.com/search/2?search-type=icons&amp;word=heart">https://bit.ly/36RvDWN</a></span>
                                 <span class="sh-copy"><button class="button">Copy</button></span>
                                 <span class="share-group dropup">
                                    <button type="button" class="btn dropdown-toggle m-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Share</button>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                       <a href="#"><i class="fab fa-facebook-f"></i></a>
                                       <a href="#"><i class="fab fa-twitter"></i></a>
                                       <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                       <a href="#"><i class="fab fa-skype"></i></a>
                                       <a href="#"><i class="fab fa-whatsapp"></i></a>
                                    </div>
                                 </span>
                              </span>
                           </li>
                           <li class="link">
                              <span class="sh-long-link">https://bitly.com/</span>
                              <span class="list-qr">
                              <img src="assets/img/qr.png" alt="image title">
                              <span>
                              <button class="download-qr"><i class="fas fa-cloud-download-alt"></i></button>
                              <button class="download-qr print-qr"><i class="fas fa-print"></i></button>
                              </span>
                              </span>
                              <span>
                                 <span class="sh-short-link"><a href="https://bitly.is/36Jxz3h" target="_blank" title="Shortened URL for https://bitly.com/">https://bitly.is/36Jxz3h</a></span>
                                 <span class="sh-copy"><button class="button">Copy</button></span>
                                 <span class="share-group dropup">
                                    <button type="button" class="btn dropdown-toggle m-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Share</button>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                       <a href="#"><i class="fab fa-facebook-f"></i></a>
                                       <a href="#"><i class="fab fa-twitter"></i></a>
                                       <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                       <a href="#"><i class="fab fa-skype"></i></a>
                                       <a href="#"><i class="fab fa-whatsapp"></i></a>
                                    </div>
                                 </span>
                              </span>
                           </li>
                           <li class="link">
                              <span class="sh-long-link">https://www.flaticon.com/search/2?search-type=icons&amp;word=heart</span>
                              <span class="list-qr">
                              <img src="assets/img/qr.png" alt="image title">
                              <span>
                              <button class="download-qr"><i class="fas fa-cloud-download-alt"></i></button>
                              <button class="download-qr print-qr"><i class="fas fa-print"></i></button>
                              </span>
                              </span>
                              <span>
                                 <span class="sh-short-link"><a href="https://bit.ly/36RvDWN" target="_blank" title="Shortened URL for https://www.flaticon.com/search/2?search-type=icons&amp;word=heart">https://bit.ly/36RvDWN</a></span>
                                 <span class="sh-copy"><button class="button">Copy</button></span>
                                 <span class="share-group dropup">
                                    <button type="button" class="btn dropdown-toggle m-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Share</button>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                       <a href="#"><i class="fab fa-facebook-f"></i></a>
                                       <a href="#"><i class="fab fa-twitter"></i></a>
                                       <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                       <a href="#"><i class="fab fa-skype"></i></a>
                                       <a href="#"><i class="fab fa-whatsapp"></i></a>
                                    </div>
                                 </span>
                              </span>
                           </li>
                           <li class="link">
                              <span class="sh-long-link">https://bitly.com/</span>
                              <span class="list-qr">
                              <img src="assets/img/qr.png" alt="image title">
                              <span>
                              <button class="download-qr"><i class="fas fa-cloud-download-alt"></i></button>
                              <button class="download-qr print-qr"><i class="fas fa-print"></i></button>
                              </span>
                              </span>
                              <span>
                                 <span class="sh-short-link"><a href="https://bitly.is/36Jxz3h" target="_blank" title="Shortened URL for https://bitly.com/">https://bitly.is/36Jxz3h</a></span>
                                 <span class="sh-copy"><button class="button">Copy</button></span>
                                 <span class="share-group dropup">
                                    <button type="button" class="btn dropdown-toggle m-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Share</button>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left ">
                                       <a href="#"><i class="fab fa-facebook-f"></i></a>
                                       <a href="#"><i class="fab fa-twitter"></i></a>
                                       <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                       <a href="#"><i class="fab fa-skype"></i></a>
                                       <a href="#"><i class="fab fa-whatsapp"></i></a>
                                    </div>
                                 </span>
                              </span>
                           </li>
                           <li class="link">
                              <span class="sh-long-link">https://www.flaticon.com/search/2?search-type=icons&amp;word=heart</span>
                              <span class="list-qr">
                              <img src="assets/img/qr.png" alt="image title">
                              <span>
                              <button class="download-qr"><i class="fas fa-cloud-download-alt"></i></button>
                              <button class="download-qr print-qr"><i class="fas fa-print"></i></button>
                              </span>
                              </span>
                              <span>
                                 <span class="sh-short-link"><a href="https://bit.ly/36RvDWN" target="_blank" title="Shortened URL for https://www.flaticon.com/search/2?search-type=icons&amp;word=heart">https://bit.ly/36RvDWN</a></span>
                                 <span class="sh-copy"><button class="button">Copy</button></span>
                                 <span class="share-group dropup">
                                    <button type="button" class="btn dropdown-toggle m-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Share</button>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                       <a href="#"><i class="fab fa-facebook-f"></i></a>
                                       <a href="#"><i class="fab fa-twitter"></i></a>
                                       <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                       <a href="#"><i class="fab fa-skype"></i></a>
                                       <a href="#"><i class="fab fa-whatsapp"></i></a>
                                    </div>
                                 </span>
                              </span>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!--Blog Section-->
         <section class="blog-section section-space bg-gray ptb-80 service-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="section-title text-center">
                        <span class="top-title">Top Features</span>
                        <h2>Grow Your Brand With Every Click</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xl col-lg-3 col-md-4">
                     <a href="#" class="service-box text-center">
                        <div class="d-table">
                           <div class="d-table-cell">
                              <div class="service-icon">
                                 <img src="assets/img/Illustration-1.png" alt="image title">
                              </div>
                              <div class="box-bottom">
                                 <h4>Inspire trust</h4>
                                 <p>As your click numbers go up, your brand recognition increases. And the more that grows, the more confident people become in the integrity of your content and communications. (It’s a wonderful cycle.)</p>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-xl col-lg-3 col-md-4">
                     <a href="#" class="service-box text-center">
                        <div class="d-table">
                           <div class="d-table-cell">
                              <div class="service-icon">
                                 <img src="assets/img/Illustration-2.png" alt="image title">
                              </div>
                              <div class="box-bottom">
                                 <h4>Boost results</h4>
                                 <p>Better deliverability and improved click-through are just the start. Rich link-level data allows you to understand who is clicking your links, as well as when and where, so you can make smarter decisions around the content and communications you share.</p>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-xl col-lg-3 col-md-4">
                     <a href="#" class="service-box text-center">
                        <div class="d-table">
                           <div class="d-table-cell">
                              <div class="service-icon">
                                 <img src="assets/img/Illustration-3.png" alt="iamge title">
                              </div>
                              <div class="box-bottom">
                                 <h4>Gain control</h4>
                                 <p>On top of being able to fully customize your links, auto-branding boosts awareness of your brand by giving you credit for your content and more insight into how it’s being consumed.</p>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
         </section>
         <!--End Blog Section-->
      </div>
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
      <footer class="site-footer bg-gray">
         <div class="container">
            <div class="footer-bottom">
               <div class="row">
                  <div class="col-lg-9 text-left">
                     <p>Copyright &copy;2020 <a href="index.html">URL-Shortner</a>. Designed By <a href="https://aminurislam.me/" target="_blank">Aminur</a> & Developed By <a href="https://github.com/jakarea" target="_blank">Jakarea</a>. All rights reserved</p>
                  </div>
                  <div class="col-lg-3 text-right">
                     <ul class="list-inline">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-github"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <a href="#h-header" id="bottom-to-top" class="button-scroll"><i class="fas fa-chevron-up"></i></a>
      <script src="assets/js/jquery-3.4.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/owl.carousel.min.js"></script>
      <script src="assets/js/main.js"></script>
         @if(session()->has('status'))
            <div class="toaster alert alert-{{session('status')}} alert-dismissible fade show" role="alert">
               <div class="toast-icon {{session('status')}}-icon"><i class="fas fa-exclamation"></i></div>
               <div class="toster-text">
                  <strong>{{session('status')}}</strong> {{session('message')}}
               </div>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>

            <script>
               
               function copyShortUrl() {
                  navigator.clipboard.writeText(document.querySelector('#long_url').value)
                     .then(() => {
                        shortnarBtnt.innerHTML = "Copied"
                        document.getElementById('shortnarBtn').style.backgroundColor = "green"
                        setTimeout(() => {
                           shortnarBtnt.innerHTML = "Shorten"
                           shortnarBtnt.classList.remove("copy");
                           $("#long_url").val('');
                           document.getElementById('shortnarBtn').style.backgroundColor = "#6f42eb"
                        }, 1000);

                     })
                     .catch(() => {
                        alert('Failed to copy text.');
                     });
                    
                  }
                  
            if("{{session('status')}}" == "success"){
               document.getElementById('long_url').value = "{{session('short_url')}}"
               var shortnarBtn = document.getElementById("shortnarBtn");
               shortnarBtn.classList.add("copy");
               shortnarBtn.innerHTML = "Copy"
               $("#long_url").select();

               var shortnarBtnt = document.querySelector('.copy')
               shortnarBtnt.addEventListener('click', (e) => {
                  // if($("#shortnarBtn").hasClass("copy")){
                  //    e.preventDefault();
                  //    if($("#long_url").val())
                  //    copyShortUrl()
                  //    }   
                  copyShortUrl()
               })
            }

            var longUrl = $("#long_url");
            longUrl.keyup((e) => {
               console.log(longUrl.val())
               if($("#shortnarBtn").hasClass("copy")){
                  shortnarBtn.classList.remove("copy");
                  shortnarBtn.innerHTML = "Shorten"
               }
            })
               
            </script>
         @endif
   </body>
</html>