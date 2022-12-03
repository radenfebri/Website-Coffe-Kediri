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
            
            @if ($about_company) 
                <div class="row mb-4 layout-spacing layout-top-spacing">
                    <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <form action="{{ route('about-company.update', $about_company->id ) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="widget-content widget-content-area blog-create-section">
                                
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <label>Title 1</label>
                                        <input name="title1" class="form-control @error('title1') is-invalid @enderror" id="post-title" value="{{ old('title1') ?? $about_company->title1 }}" placeholder="Title 1">
                                        @error('title1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <label>Title 2</label>
                                        <input name="title2" class="form-control @error('title2') is-invalid @enderror" id="post-title" value="{{ old('title2') ?? $about_company->title2 }}" placeholder="Title 2">
                                        @error('title2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <label>Deskripsi About<span class="text-danger">*</span></label>
                                        <textarea  name="deskripsi" id="summernote" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Isi Deskripsi">{{ old('deskripsi') ?? $about_company->deskripsi }}</textarea>
                                        @error('deskripsi')
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
                                            @if ($about_company->image)
                                            <img src="{{ asset('storage/'. $about_company->image) }}" loading="lazy" class="rounded" width="245px" height="245px" alt="">
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
                                    
                                    @can ('About Company Update')
                                    <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                        <button class="btn btn-success w-100" type="submit">Update Data</button>
                                    </div>
                                    @endcan
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @else
                <div class="row mb-4 layout-spacing layout-top-spacing">
                    <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <form action="{{ route('about-company.store' ) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="widget-content widget-content-area blog-create-section">
                                
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <label>Title 1</label>
                                        <input name="title1" class="form-control @error('title1') is-invalid @enderror" id="post-title" value="{{ old('title1') }}" placeholder="Title 1">
                                        @error('title1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <label>Title 2</label>
                                        <input name="title2" class="form-control @error('title2') is-invalid @enderror" id="post-title" value="{{ old('title2') }}" placeholder="Title 2">
                                        @error('title2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <label>Deskripsi About<span class="text-danger">*</span></label>
                                        <textarea  name="deskripsi" id="summernote" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Isi Deskripsi">{{ old('deskripsi') }}</textarea>
                                        @error('deskripsi')
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
                                    
                                    @can('About Company Store')
                                    <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                        <button class="btn btn-success w-100" type="submit">Submit Data</button>
                                    </div>
                                    @endcan
                                    
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
