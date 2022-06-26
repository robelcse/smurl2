@extends('layouts.master')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
@endsection
@section('content')
<div id="h-header">
    <section id="shortner" class="section-space url-form-area" style="background-image: url('assets/img/banner-bg.webp');">
        <div class="current-qr">
            <div id="qrcode"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-title text-center">
                        <h1>Free url shortener for link analytics</h1>
                        <p>Track your every click, with powerful admin dashboard.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9">
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
                        <form method="POST" id="shortnarForm" action="{{ route('custom_url') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-10 pr-lg-0">
                                    <div class="form-group d-block d-md-flex">
                                        <input class="form-control" type="text" id="long_url" name="long_url" value="{{old('long_url')}}" placeholder="Paste your big URL here....">
                                        <input class="form-control custom-brand-field" type="text" id="keyword" onkeyUp="isKeyWordExist(this)" name="keyword" value="{{old('keyword')}}" placeholder="Custom brand">
                                    </div>
                                </div>
                                <div class="col-lg-2 pl-lg-0">
                                    <button id="shortnarBtn" type="submit" class="btn btn-primary">Shorten</button>
                                </div>
                                <div class="col-lg-12">
                                    <div class="current-shorten-url">{{substr(session('long_url'),0,200)}}</div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            @if(count($links) > 0)
            <div class="row">
                <div class="col-12">
                    <div id="shorten_urls">
                        <ul class="links_history shadow-sm">
                            @php $i= 0; @endphp
                            @foreach($links as $link)
                            @php $i++; @endphp
                            <li class="link">
                                <div class="sh-long-link">{{ substr($link->long_url,0,160)}}</div>
                                <div class="list-qr" id="qr_{{$i}}">
                                    <span>
                                        <button class="download-qr print-qr" onClick=downloadQr('{{$i}}','{{$link->keyword}}')>
                                        <i class="fas fa-cloud-download-alt"></i>
                                        </button>
                                        <button class="download-qr print-qr"><i class="fas fa-print"></i></button>
                                    </span>
                                </div>
                                <div>
                                    <span class="sh-short-link">
                                    <a href="{{ $link->short_url }}" id="short_{{$i}}" target="_blank" title="Shortened URL for {{$link->long_url}}">{{ $link->short_url }}</a>
                                    </span>
                                    <span class="sh-copy">
                                    <button class="copyTOclipboard button">Copy</button>
                                    </span>
                                    <span class="share-group">
                                        <button type="button" class="btn dropdown-toggle m-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Share</button>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            <a href="#"><i class="fab fa-skype"></i></a>
                                            <a href="#"><i class="fab fa-whatsapp"></i></a>
                                        </div>
                                        <button class="btn analytics-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-line" viewBox="0 0 16 16">
                                                <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z"/>
                                            </svg>    
                                        ({{ $link->hit }})</button>
                                    </span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
    <!--Features Area-->
    <section class="features-area section-space bg-gray ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2>Features we provide</h2>
                        <p>We can help you to manage and share link, track users browsing behaviour to grow your business. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="features-box text-center p-4">
                        <div class="features-icon mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bar-chart-line" viewBox="0 0 16 16">
                                <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z"/>
                            </svg>
                        </div>
                        <div class="features-text">
                            <h3>Statistics</h3>
                            <p>Get to know your audience, analyze the performance of your links.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-box text-center p-4">
                        <div class="features-icon mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bullseye" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10zm0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
                            <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/>
                            <path d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                            </svg>
                        </div>
                        <div class="features-text">
                            <h3>Targeting</h3>
                            <p>Redirect your users based on the country, platform, or language.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-box text-center p-4">
                        <div class="features-icon mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-binoculars" viewBox="0 0 16 16">
                            <path d="M3 2.5A1.5 1.5 0 0 1 4.5 1h1A1.5 1.5 0 0 1 7 2.5V5h2V2.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5v2.382a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V14.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 14.5v-3a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5v3A1.5 1.5 0 0 1 5.5 16h-3A1.5 1.5 0 0 1 1 14.5V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V2.5zM4.5 2a.5.5 0 0 0-.5.5V3h2v-.5a.5.5 0 0 0-.5-.5h-1zM6 4H4v.882a1.5 1.5 0 0 1-.83 1.342l-.894.447A.5.5 0 0 0 2 7.118V13h4v-1.293l-.854-.853A.5.5 0 0 1 5 10.5v-1A1.5 1.5 0 0 1 6.5 8h3A1.5 1.5 0 0 1 11 9.5v1a.5.5 0 0 1-.146.354l-.854.853V13h4V7.118a.5.5 0 0 0-.276-.447l-.895-.447A1.5 1.5 0 0 1 12 4.882V4h-2v1.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V4zm4-1h2v-.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V3zm4 11h-4v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14zm-8 0H2v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14z"/>
                            </svg>
                        </div>
                        <div class="features-text">
                            <h3>Retargeting</h3>
                            <p>Retarget your audience by adding tracking pixels to your links.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-box text-center p-4">
                        <div class="features-icon mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                                <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
                        </div>
                        <div class="features-text">
                            <h3>Campaigns</h3>
                            <p>Get to know your audience, analyze the performance of your links.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-box text-center p-4">
                        <div class="features-icon mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-lock" viewBox="0 0 16 16">
                                <path d="M8 5a1 1 0 0 1 1 1v1H7V6a1 1 0 0 1 1-1zm2 2.076V6a2 2 0 1 0-4 0v1.076c-.54.166-1 .597-1 1.224v2.4c0 .816.781 1.3 1.5 1.3h3c.719 0 1.5-.484 1.5-1.3V8.3c0-.627-.46-1.058-1-1.224zM6.105 8.125A.637.637 0 0 1 6.5 8h3a.64.64 0 0 1 .395.125c.085.068.105.133.105.175v2.4c0 .042-.02.107-.105.175A.637.637 0 0 1 9.5 11h-3a.637.637 0 0 1-.395-.125C6.02 10.807 6 10.742 6 10.7V8.3c0-.042.02-.107.105-.175z"/>
                                <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                            </svg>
                        </div>
                        <div class="features-text">
                            <h3>Privacy</h3>
                            <p>Redirect your users based on the country, platform, or language.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-box text-center p-4">
                        <div class="features-icon mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                            </svg>
                        </div>
                        <div class="features-text">
                            <h3>Customizability</h3>
                            <p>Retarget your audience by adding tracking pixels to your links.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Blog Section-->
    <section class="blog-section section-space ptb-80 service-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2>Grow your brand with every click</h2>
                        <p>We can help you to manage and share link, track users browsing behaviour to grow your business. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl col-lg-4">
                    <a href="#" class="service-box text-center">
                        <div class="service-icon">
                            <img src="assets/img/analytics-details.jpg" alt="image title">
                        </div>
                        <div class="box-bottom">
                            <h4>Analytics Details</h4>
                            <p class="m-0">Monitor each shortened link clicked and get the user's integration with it. Detailed analytics provides you all about clicks, day, time, geo-location, social media clicks, page referrer, devices, browsers, and operating systems.</p>
                        </div>
                    </a>
                </div>
                <div class="col-xl col-lg-4">
                    <a href="#" class="service-box text-center">
                        <div class="service-icon">
                            <img src="assets/img/Illustration-1.png" alt="image title">
                        </div>
                        <div class="box-bottom">
                            <h4>Inspire trust</h4>
                            <p class="m-0">As your click numbers go up, your brand recognition increases. And the more that grows, the more confident people become in the integrity of your content and communications. (It’s a wonderful cycle.)</p>
                        </div>
                    </a>
                </div>
                <div class="col-xl col-lg-4">
                    <a href="#" class="service-box text-center">
                        <div class="service-icon">
                            <img src="assets/img/Illustration-3.png" alt="iamge title">
                        </div>
                        <div class="box-bottom">
                            <h4>Gain control</h4>
                            <p>On top of being able to fully customize your links, auto-branding boosts awareness of your brand by giving you credit for your content and more insight into how it’s being consumed.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--End Blog Section-->
</div>
@endsection

@section('script')



<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@if($errors->has('long_url'))
    <script>
        toastr.error('{{ $errors->first()}}')
        toastr.options.timeOut = 30; 
    </script>
@endif
@if($errors->has('keyword'))
    <script>
        toastr.error('{{ $errors->first()}}')
        toastr.options.timeOut = 30; 
    </script>
@endif

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
    if("{{session('status')}}" == "success"){
        document.getElementById('long_url').value = "{{session('short_url')}}"
        var shortnarBtn = document.getElementById("shortnarBtn");
        shortnarBtn.classList.add("copy");
        shortnarBtn.innerHTML = "Copy";
        $("#long_url").select()
        $(".current-qr").addClass('shadow-sm p-2');
       new QRCode(document.getElementById("qrcode"), {
          text: $('#long_url').val(),
          width: 80,
          height: 80
       });
    }
</script>
@endif
<script>
    for (var i = 1; i <= 6; i++) {
         if ($('#short_' + i).attr('href') != undefined) {
            new QRCode(document.getElementById("qr_" + i), {
               text: $('#short_' + i).attr('href'),
               width: 50,
               height: 50
            });
         }
      }
    
    function downloadQr(id, short_id){
       var img =document.getElementById('qr_'+id).lastChild.src
       var a = document.createElement("a"); //Create <a>
       a.href =  img; //Image Base64 Goes here
       a.download = short_id + ".png"; //File name Here
       a.click()
    }
</script>

@endsection