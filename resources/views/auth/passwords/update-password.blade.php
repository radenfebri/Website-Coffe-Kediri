@extends('frontend.layouts.default')

@section('title', 'Keranjang')

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>                    
                <span></span> Update Password Baru
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
                                        <h3 class="mb-30">Update Password Baru</h3>
                                    </div>                                        
                                    <form method="POST" action="{{ route('update_data_password_google') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password Baru">
                                            @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="password" class="form-control @error('password_cofirmation') is-invalid @enderror" name="password_confirmation" autocomplete="new-password" placeholder="Confirm password">
                                            @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-fill-out btn-block hover-up" name="reset">Update Password</button>
                                        </div>
                                    </form> 
                                </div>
                            </div>
                        </div>                            
                        <div class="col-lg-6">
                            <img src="{{ asset('frontend') }}/imgs/login.png" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection