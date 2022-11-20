@extends('auth.layouts.master')

@section('title', "Reset Password | Raden Febri Store")

@section('content')

<div class="row">
    <div class="col-md-12 mb-3">
        
        <h2>Reset Password</h2>
        <p>Masukkan Password baru untuk melakukan Update</p>
        
    </div>
    
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        
        <div class="col-md-12">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>
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
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="mb-4">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="mb-4">
                <button type="submit" class="btn btn-primary w-100">RESET PASSWORD</button>
            </div>
        </div>
        
    </form>
    
</div>

@endsection