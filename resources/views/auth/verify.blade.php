@extends('frontend.layouts.default')

@section('title', 'Keranjang')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>                    
                <span></span> Verifikasi
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
                                        <h3 class="mb-30">Verifikasi Email</h3>
                                    </div>
                                    <form method="POST" action="{{ route('verification.resend') }}">
                                        @csrf

                                        @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                                        </div>
                                        @endif

                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                {{ __('Sebelum melanjutkan, harap periksa email Anda untuk tautan verifikasi. ') }}
                                                {{ __('Jika Anda tidak menerima email') }},
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Klik di Sini Untuk Permintaan Lainnya!</button>
                                        </div>
                                    </form>
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