@extends('frontend.layouts.default')

@section('title', 'Setting')

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>
                <span></span> Setting
            </div>
        </div>
    </div>
    <div class="form-setting">
        <div class="container">
            <form action="{{ route('updatedata') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama <span style="color: red">*</span></label>
                    <input type="text" placeholder="Nama" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? Auth::user()->name }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">No WhatsApp <span style="color: red">*</span></label>
                    <input type="number" placeholder="No Hp" class="form-control  @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') ?? Auth::user()->no_hp }}">
                    @error('no_hp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email <span style="color: red">*</span></label>
                    <input type="email" placeholder="Email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? Auth::user()->email }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Alamat <span style="color: red">*</span></label>
                    <div class="form-group mb-30">
                        <textarea rows="5" placeholder="Alamat" name="alamat">{{ old('alamat') ?? Auth::user()->alamat }}</textarea>
                        @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <button type="submit" name="submit" class="btn-default">Update</button>
            </form>
        </div>
    </div>
</main>
@endsection