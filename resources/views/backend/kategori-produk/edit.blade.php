@extends('backend.layouts.master-lainnya')

@section('content')

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        
        <div class="middle-content container-xxl p-0">
            
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kategori Produk</li>
                    </ol>
                </nav>
            </div>
            
            <div class="row mb-4 layout-spacing layout-top-spacing">
                
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <form action="{{ route('kategori-produk.update', $kategoriproduk->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="widget-content widget-content-area blog-create-section">
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Kategori Produk<span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') ?? $kategoriproduk->name }}" class="form-control @error('name') is-invalid @enderror" id="post-title" placeholder="Name Kategori Produk">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Description<span class="text-danger">*</span></label>
                                    <textarea  name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Isi Deskripsi Pendek">{{ old('description') ?? $kategoriproduk->description }}</textarea>
                                    @error('description')
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
                                <div class="col-xxl-12 mb-4">
                                    <div class="switch form-switch-custom switch-inline form-switch-primary">
                                        <input type="hidden" name="is_active" id="is_active" value="0">
                                        <input class="switch-input" type="checkbox" role="switch" id="showPublicly" value="1" name="is_active" {{ $kategoriproduk->is_active || old('is_active', 0) === 1 ? 'checked':'' }}>
                                        <label class="switch-label" for="showPublicly">Publish</label>
                                    </div>
                                </div>
                                <div class="col-xxl-12 mb-4">
                                    <div class="switch form-switch-custom switch-inline form-switch-primary">
                                        <input type="hidden" name="popular" id="popular" value="0">
                                        <input class="switch-input" type="checkbox" role="switch" id="enableComment" value="1" name="popular"  {{ $kategoriproduk->popular || old('popular', 0) === 1 ? 'checked':'' }}>
                                        <label class="switch-label" for="enableComment">Populer</label>
                                    </div>
                                </div>
                                
                                <div class="col-xxl-12 col-md-12 mb-4">
                                    
                                    <label for="product-images">Cover Image<span class="text-danger">*</span></label>
                                    <div class="multiple-file-upload">
                                        <input class="form-control @error('iamge') is-invalid @enderror file-upload-input" name="image" type="file">
                                    </div>
                                    <br>
                                    <label for="product-images">Cover Saat ini:</label>
                                    <div class="multiple-file-upload"> 
                                        @if ($kategoriproduk->image)
                                            <img src="{{ asset('storage/'. $kategoriproduk->image) }}" loading="lazy" class="rounded" width="245px" height="245px" alt="">
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
                                    <button class="btn btn-success w-100" type="submit">Update Kategori</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            
            
            @include('backend.layouts.footer')
            
            
        </div>    
    </div>
</div>
@endsection
