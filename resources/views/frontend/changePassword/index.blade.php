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
            <form class="form-setting">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Password Lama</label>
                    <input type="password" class="form-control" id="password_lama">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password Baru</label>
                    <input type="password" class="form-control" id="password_baru">
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirm">
                </div>
                <button type="submit" class="btn-default">Apply</button>
              </form>
        </div>
    </div>
</main>
@endsection