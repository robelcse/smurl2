@extends('layouts.auth')
@section('content')
    <div  id="h-header">
        <section class="ptb-60 shortner-form-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="shortner-form">
                            <h4>Reset password</h4>
                            <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group mt-3">
                                    <label for="email">Email</label>
                                    <input name="email" type="text" value="{{ old('email') }}" class="form-control" id="email" placeholder="Enter email">
                                </div>
                                
                                <div class="form-group mb-4">
                                    <button type="submit" class="btn btn-primary btn-block btn-color">Reset password</button>
                                </div>
                                <div class="form-group forgot-links">
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