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
                    <form action="{{ route('produk.update', $produks->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="widget-content widget-content-area blog-create-section">
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Nama Produk<span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') ?? $produks->name }}" class="form-control @error('name') is-invalid @enderror" id="post-title" placeholder="Name Produk">
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
                                    <textarea  name="small_description" class="form-control @error('small_description') is-invalid @enderror" placeholder="Isi Deskripsi Pendek">{{ old('small_description')?? $produks->small_description }}</textarea>
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
                                    <textarea  name="description" id="summernote" class="form-control @error('description') is-invalid @enderror" placeholder="Isi Deskripsi">{{ old('description')?? $produks->description }}</textarea>
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
                                    <br>
                                    <label for="product-images"><b>Images Saat ini:</b></label>
                                    <div class="multiple-file-upload"> 
                                        @if ($images->count() > 0)
                                        @foreach ($images as $item)
                                        <div>
                                        <a href="{{ route('images.delete', encrypt($item->id)) }}" onclick="return confirm('Yakin anda akan menghapus gambar ini ?')" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            </svg>
                                        </a>
                                        <img src="{{ asset('storage/images-produk/'. $item->image) }}" loading="lazy" class="rounded mr-5" width="150px" height="150px" alt="{{ $produks->name }}">
                                        </div>
                                        @endforeach
                                        @else
                                        Image Kosong
                                        @endif
                                    </div>
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
                                        <input type="hidden" name="is_active" id="is_active" value="0">
                                        <input class="switch-input" type="checkbox" role="switch" id="showPublicly" value="1" name="is_active" {{ $produks->is_active || old('is_active', 0) === 1 ? 'checked':'' }}>
                                        <label class="switch-label" for="showPublicly">Publish</label>
                                    </div>
                                </div>
                                <div class="col-xxl-12 mb-4">
                                    <div class="switch form-switch-custom switch-inline form-switch-primary">
                                        <input type="hidden" name="popular" id="popular" value="0">
                                        <input class="switch-input" type="checkbox" role="switch" id="enableComment" value="1" name="popular" {{ $produks->popular || old('popular', 0) === 1 ? 'checked':'' }}>
                                        <label class="switch-label" for="enableComment">Populer</label>
                                    </div>
                                </div>
                                
                                <div class="col-xxl-12 mb-4">
                                    <div class="">
                                        <label class="switch-label" for="enableComment">Pilih Kategori<span class="text-danger">*</span></label>
                                        <select class="form-select @error('image') is-invalid @enderror" name="kategori_id" id="category">
                                            <option disabled selected>--Pilih Kategori Produk--</option>
                                            @foreach ($kategoriproduk as $item)
                                            @if ($item->id == $produks->kategori_id)
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
                                        <input type="number" name="original_price" value="{{ old('original_price') ?? $produks->original_price }}" class="form-control @error('original_price') is-invalid @enderror" id="post-title" placeholder="Harga Asli">
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
                                        <input type="number" name="selling_price" value="{{ old('selling_price') ?? $produks->selling_price }}" class="form-control @error('selling_price') is-invalid @enderror" id="post-title" placeholder="Harga Promo/Jual">
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
                                    <br>
                                    <div class="multiple-file-upload"> 
                                        @if ($produks->cover)
                                        <img src="{{ asset('storage/'. $produks->cover) }}" loading="lazy" class="rounded" width="245px" height="245px" alt="{{ $produks->name }}">
                                        @else
                                        Cover Masih Kosong
                                        @endif
                                    </div>
                                    @error('cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                    <button class="btn btn-success w-100" type="submit">Update Produk</button>
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
