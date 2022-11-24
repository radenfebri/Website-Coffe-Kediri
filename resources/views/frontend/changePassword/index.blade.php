@extends('frontend.layouts.default')

@section('title', 'Change Password')

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>
                <span></span> Change Password
            </div>
        </div>
    </div>
    <div class="form-setting">
        <div class="container">
            <form class="form-setting" action="{{ route('updatepassword') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Password Lama <span class="text-danger">*</span></label>
                    <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" placeholder="Password Lama">
                    @error('current_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Password Baru <span class="text-danger">*</span></label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password Baru">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control @error('password_cofirmation') is-invalid @enderror"  name="password_confirmation" placeholder="Password Konfirmasi">
                </div>

                <button type="submit" class="btn-default">Apply</button>
            </form>
        </div>
    </div>
</main>
@endsection