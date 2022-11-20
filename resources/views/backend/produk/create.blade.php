@extends('backend.layouts.master-lainnya')

@section('content')

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        
        <div class="middle-content container-xxl p-0">
            
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Semua Produk</li>
                    </ol>
                </nav>
            </div>
            
            <div class="row mb-4 layout-spacing layout-top-spacing">
                
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="widget-content widget-content-area blog-create-section">
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Nama Produk<span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="post-title" placeholder="Name Produk">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Deskripsi Pendek<span class="text-danger">*</span></label>
                                    <textarea  name="small_description" class="form-control @error('small_description') is-invalid @enderror" placeholder="Isi Deskripsi Pendek">{{ old('small_description') }}</textarea>
                                    @error('small_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Deskripsi Lengkap<span class="text-danger">*</span></label>
                                    <textarea  name="description" id="summernote" class="form-control @error('description') is-invalid @enderror" placeholder="Isi Deskripsi">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Multi Gambar Lengkap<span class="text-danger">*</span></label>
                                    <input type="file" name="multi_image[]" multiple class="form-control @error('multi_image') is-invalid @enderror" id="post-title">
                                    @error('multi_image')
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
                                        <input class="switch-input" type="checkbox" role="switch" id="showPublicly" name="is_active">
                                        <label class="switch-label" for="showPublicly">Publish</label>
                                    </div>
                                </div>
                                <div class="col-xxl-12 mb-4">
                                    <div class="switch form-switch-custom switch-inline form-switch-primary">
                                        <input class="switch-input" type="checkbox" role="switch" id="enableComment" name="popular">
                                        <label class="switch-label" for="enableComment">Populer</label>
                                    </div>
                                </div>
                                
                                <div class="col-xxl-12 mb-4">
                                    <div class="">
                                        <label class="switch-label" for="enableComment">Pilih Kategori<span class="text-danger">*</span></label>
                                        <select class="form-select @error('image') is-invalid @enderror" name="kategori_id" id="category">
                                            <option disabled selected>--Pilih Kategori Produk--</option>
                                            @foreach ($kategoriproduk as $item)
                                            @if (old('kategori_id') == $item->id )
                                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                            @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('kategori_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-xxl-12 mb-4">
                                    <div class="">
                                        <label class="switch-label" for="enableComment">Harga Asli<span class="text-danger">*</span></label>
                                        <input type="text" name="original_price" value="{{ old('original_price') }}" class="form-control @error('original_price') is-invalid @enderror" id="post-title" placeholder="Harga Asli">
                                        @error('original_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-xxl-12 mb-4">
                                    <div class="">
                                        <label class="switch-label" for="enableComment">Harga Promo</label>
                                        <input type="text" name="selling_price" value="{{ old('selling_price') }}" class="form-control @error('selling_price') is-invalid @enderror" id="post-title" placeholder="Harga Promo/Jual">
                                        @error('selling_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-xxl-12 col-md-12 mb-4">
                                    
                                    <label for="product-images">Cover Image<span class="text-danger">*</span></label>
                                    <div class="multiple-file-upload">
                                        <input class="form-control @error('cover') is-invalid @enderror file-upload-input" name="cover" type="file">
                                    </div>
                                    @error('cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                    <button class="btn btn-success w-100" type="submit">Submit Produk</button>
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

@include('backend.layouts.includes.script-summernote')

@endsection
