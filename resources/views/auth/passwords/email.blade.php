@extends('auth.layouts.master')

@section('title', "Reset Password by Email | Raden Febri Store")

@section('content')


@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12 mb-3">
            
            <h2>Password Reset</h2>
            <p>Enter your email to recover your ID</p>
            
        </div>
        <div class="col-md-12">
            <div class="mb-4">
                <label class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="mb-4">
                <button class="btn btn-primary w-100">SEND PASSWORD RESET LINK</button>
            </div>
        </div>
        
    </div>
</form>



@endsection