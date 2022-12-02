@extends('backend.layouts.master-lainnya')

@section('content')

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        
        <div class="middle-content container-xxl p-0">
            
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Setting Info Website</li>
                    </ol>
                </nav>
            </div>
            
            @if ($setting_web) 
            <div class="row mb-4 layout-spacing layout-top-spacing">
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <form action="{{ route('setting-info-website.update' , $setting_web->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="widget-content widget-content-area blog-create-section">
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Adress</label>
                                    <input name="address" class="form-control @error('address') is-invalid @enderror" id="post-title" value="{{ old('address') ?? $setting_web->address }}" placeholder="Address">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Phone</label>
                                    <input name="phone" class="form-control @error('phone') is-invalid @enderror" id="post-title" value="{{ old('phone')  ?? $setting_web->phone }}" placeholder="08211432432">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Email</label>
                                    <input name="email" class="form-control @error('email') is-invalid @enderror" id="post-title" value="{{ old('email')  ?? $setting_web->email }}" placeholder="Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>facebook</label>
                                    <input name="facebook" class="form-control @error('facebook') is-invalid @enderror" id="post-title" value="{{ old('facebook')  ?? $setting_web->facebook }}" placeholder="https://facebook.com/username">
                                    @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Instagram</label>
                                    <input name="instagram" class="form-control @error('instagram') is-invalid @enderror" id="post-title" value="{{ old('instagram')  ?? $setting_web->instagram }}" placeholder="https://instagram.com/username">
                                    @error('instagram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Youtube</label>
                                    <input name="youtube" class="form-control @error('youtube') is-invalid @enderror" id="post-title" value="{{ old('youtube')  ?? $setting_web->youtube }}" placeholder="https://youtube.com/c/Channel">
                                    @error('youtube')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                    
                    <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0 mt-4">
                        <div class="widget-content widget-content-area blog-create-section">
                            <div class="row">
                                <div class="col-xxl-12 col-md-12 mb-4">
                                    
                                    <label for="product-images">Image<span class="text-danger">*</span></label>
                                    <div class="multiple-file-upload">
                                        <input class="form-control @error('iamge') is-invalid @enderror file-upload-input" name="image" type="file">
                                    </div>
                                    <br>
                                    <label for="product-images">Cover Saat ini:</label>
                                    <div class="multiple-file-upload"> 
                                        @if ($setting_web->image)
                                        <img src="{{ asset('storage/'. $setting_web->image) }}" loading="lazy" class="rounded" width="245px" height="245px" alt="">
                                        @else
                                        Cover Masih Kosong
                                        @endif
                                    </div>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                    <button class="btn btn-success w-100" type="submit">Submit Data</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @else
            <div class="row mb-4 layout-spacing layout-top-spacing">
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <form action="{{ route('setting-info-website.store' ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="widget-content widget-content-area blog-create-section">
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Adress</label>
                                    <input name="address" class="form-control @error('address') is-invalid @enderror" id="post-title" value="{{ old('address') }}" placeholder="Address">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Phone</label>
                                    <input name="phone" class="form-control @error('phone') is-invalid @enderror" id="post-title" value="{{ old('phone') }}" placeholder="08211432432">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="post-title" value="{{ old('email') }}" placeholder="Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>facebook</label>
                                    <input name="facebook" class="form-control @error('facebook') is-invalid @enderror" id="post-title" value="{{ old('facebook') }}" placeholder="https://facebook.com/username">
                                    @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Instagram</label>
                                    <input name="instagram" class="form-control @error('instagram') is-invalid @enderror" id="post-title" value="{{ old('instagram') }}" placeholder="https://instagram.com/username">
                                    @error('instagram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Youtube</label>
                                    <input name="youtube" class="form-control @error('youtube') is-invalid @enderror" id="post-title" value="{{ old('youtube') }}" placeholder="https://youtube.com/c/Channel">
                                    @error('youtube')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                    
                    <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0 mt-4">
                        <div class="widget-content widget-content-area blog-create-section">
                            <div class="row">
                                <div class="col-xxl-12 col-md-12 mb-4">
                                    
                                    <label for="product-images">Image<span class="text-danger">*</span></label>
                                    <div class="multiple-file-upload">
                                        <input class="form-control @error('iamge') is-invalid @enderror file-upload-input" name="image" type="file">
                                    </div>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                    <button class="btn btn-success w-100" type="submit">Submit Data</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @endif
            
            @include('backend.layouts.footer')
            
        </div>    
    </div>
</div>

@include('backend.layouts.includes.script-summernote')

@endsection
