@extends('frontend.layouts.default')

@section('title', 'Keranjang')

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>                    
                <span></span> Login
            </div>
        </div>
    </div>
    <section class="pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h3 class="mb-30">Login</h3>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Your Email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete="current-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        
                                        <div class="login_footer form-group">
                                            <div class="chek-form">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="remember_me" id="exampleCheckbox1" value="remember_me" >
                                                        <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                                    </div>
                                                </div>
                                            </div>  
                                            @if (Route::has('password.request'))
                                            <a class="text-muted" href="{{ route('password.request') }}">Forgot password?</a>
                                            @endif
                                            
                                        </div>
                                        <div class="custom-login">
                                            <div class="form-group custom-login-btn">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up custom-login-button" name="login">Login</button>
                                            </div>
                                        </form>
                                            <div class="form-group custom-login-google">
                                                <a href="{{ route('google.login') }}">
                                                    <button class="btn btn-fill-out btn-block hover-up custom-button-google" name="login">Login with Google</button>
                                                </a>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-1"></div>
                        <div class="col-lg-6">
                            <img src="{{ asset('frontend') }}/imgs/login.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection