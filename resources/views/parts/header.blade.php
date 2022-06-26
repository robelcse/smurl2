    <header class="site-header navbar-fixed-top shadow-sm">
         <div class="hirevisa-nav">
            <div class="container">
               <nav class="navbar navbar-expand-lg navbar-light">
                  <a class="navbar-brand" href="{{ url('/')}}">
                     <!-- <img src="assets/img/logo.png" alt="logo"> -->
                     <h1>smurl2</h1>
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                  <span></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li><a href="{{ url('/') }}" class="active">Home</a></li>
                        <li><a href="{{ url('my-links') }}">My links</a></li>
                        <!-- <li><a href="page-details.html">Solutions</a></li>
                        <li><a href="page-details.html">Features</a></li>
                        <li><a href="page-details.html">Resources</a></li> -->
                     </ul>
                     <div class="others-option">
                        
                        @if(Auth()->user())
                        <a href="{{ url('/logout') }}" class="auth-link">Logout</a>
                        @else
                        <a href="register" class="auth-link">Sign Up</a>
                        <a href="login" class="btn btn-primary">Sign In</a>
                        @endif
                     </div>
                  </div>
               </nav>
            </div>
         </div>
      </header>