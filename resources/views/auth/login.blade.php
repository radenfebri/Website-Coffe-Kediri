@extends('auth.layouts.master')

@section('title', "Login | Raden Febri Store")

@section('content')

<div class="row">
    <div class="col-md-12 mb-3">
        
        <h2>Sign In</h2>
        <p>Enter your email and password to login</p>
        
    </div>
    
    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <div class="col-md-12">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <div class="form-check form-check-primary form-check-inline">
                    <input class="form-check-input me-3" value="remember_me" id="remember_me" name="remember_me" type="checkbox" id="form-check-default">
                    <label class="form-check-label" for="form-check-default">
                        Remember me
                    </label>
                </div>
            </div>
        </div>
        
        <div class="col-12">
            <div class="mb-4">
                <button type="submit" class="btn btn-primary w-100">SIGN IN</button>
            </div>
        </div>
        
    </form>
    
    
    
    <div class="col-12 mb-4">
        <div class="">
            <div class="seperator">
                <hr>
                <div class="seperator-text"> <span>Or continue with</span></div>
            </div>
        </div>
    </div>
    
    <div class="d-flex justify-content-center">
        <div class="mb-4">
            <a href="{{ route('google.login') }}">
                <button class="btn  btn-social-login w-100 ">
                    <img src="{{ asset('backend') }}/src/assets/img/google-gmail.svg" alt="" class="img-fluid">
                    <span class="btn-text-inner">Google</span>
                </button>
            </a>
        </div>
    </div>
    
    <div class="col-12">
        <div class="text-center">
            <p class="mb-0">Dont't have an account ? <a href="{{ route('register') }}" class="text-warning">Sign Up</a></p>
        </div>
    </div>
    
    <div class="col-12">
        <div class="text-center">
            @if (Route::has('password.request'))
            <a class="mb-0 text-warning" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
            @endif
        </div>
    </div>
    
    
</div>

@endsection