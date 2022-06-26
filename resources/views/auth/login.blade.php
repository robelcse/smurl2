@extends('layouts.auth')
@section('content')
    <div  id="h-header">
        <section class="shortner-form-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="shortner-form">
                            <h4 class="form-header">Login now</h4>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mt-3">
                                    <input name="email" type="text" value="{{ old('email') }}" class="form-control" id="email" placeholder="Enter email">
                                </div>
                                <div class="form-group mt-3">
                                    <input name="password" type="password" class="form-control" id="password" placeholder="Enter password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block btn-color">Login</button>
                                </div>
                                <div class="social-logins text-center">
                                    <div class="login-or mb-3">OR</div>
                                    <button class="google-login social-login-btn w-100 border-0 mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                            <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                                        </svg>
                                        Continue with Google
                                    </button>
                                    <button class="fb-login social-login-btn w-100 border-0 mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                        </svg>
                                        Continue with Facebook
                                    </button>
                                </div>
                                <div class="form-group forgot-links text-center">
                                    <a href="{{ route('register') }}">Back to Sign Up?</a><span>.</span><a href="{{ route('password.request') }}">Forgot Password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>        
    </div>
@endsection