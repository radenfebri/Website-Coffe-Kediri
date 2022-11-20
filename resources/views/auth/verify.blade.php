@extends('auth.layouts.master')

@section('title', "Verifikasi Email | Raden Febri Store")

@section('content')


@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
    @csrf
    <div class="row">
        <div class="col-md-12 mb-3">
            
            <h2>Verifikasi alamat email Anda</h2>
            
        </div>
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
        <div class="col-12">
            <div class="mb-4">
                <button class="btn btn-primary w-100">KLIK DI SINI UNTUK PERMINTAAN LAINNYA</button>
            </div>
        </div>
        
    </div>
</form>


@endsection