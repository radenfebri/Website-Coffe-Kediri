@extends('frontend.layouts.default')

@section('title', 'Keranjang')

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>                    
                <span></span> Register
            </div>
        </div>
    </div>
    <section class="pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h3 class="mb-30">Create an Account</h3>
                                    </div>                                        
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Name">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" autocomplete="current-password" placeholder="Confirm password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        
                                        <div class="login_footer form-group">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="remember_me" id="exampleCheckbox12" value="remember_me">
                                                    <label class="form-check-label" for="exampleCheckbox12"><span>I agree to terms &amp; Policy.</span></label>
                                                </div>
                                            </div>
                                            <a href="{{ route('privacy-policy') }}"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>
                                        </div>
                                        <div class="custom-register">
                                            <div class="form-group custom-register-button">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Submit &amp; Register</button>
                                            </div>
                                        </form> 
                                    </div>     
                                    <div class="form-group">
                                        <a href="{{ route('google.login') }}">
                                            <button class="btn btn-fill-out btn-block hover-up custom-register-google" name="login">Register in with Google</button>
                                        </a>
                                    </div>            
                                    <div class="text-muted text-center">Already have an account? <a href="{{ route('login') }}">Sign in now</a></div>
                                </div>
                            </div>
                        </div>                            
                        <div class="col-lg-6">
                            <img src="{{ asset('frontend') }}/imgs/login.png" loading="lazy" class="image-register">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection