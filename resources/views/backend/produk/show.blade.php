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
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="widget-content widget-content-area blog-create-section">
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Nama Produk<span class="text-danger">*</span></label>
                                    <div class="">
                                        <b>{{ $produks->name }}</b>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Deskripsi Pendek<span class="text-danger">*</span></label>
                                    <div class="">
                                        <b>{{ $produks->small_description }}</b>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Deskripsi Lengkap<span class="text-danger">*</span></label>
                                    <div class="">
                                        <b>{!! $produks->description !!}</b>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Multi Gambar Lengkap<span class="text-danger">*</span></label>
                                    <br>
                                    <label for="product-images"><b>Images Saat ini:</b></label>
                                    <div class="multiple-file-upload"> 
                                        @if ($images->count() > 0)
                                        @foreach ($images as $item)
                                        <img src="{{ asset('storage/images-produk/'. $item->image) }}" loading="lazy" class="rounded mr-2" width="150px" height="150px" alt="{{ $produks->name }}">
                                        @endforeach
                                        @else
                                        Image Kosong
                                        @endif
                                    </div>
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
                                        <input disabled class="switch-input" type="checkbox" role="switch" id="showPublicly" value="1" name="is_active" {{ $produks->is_active || old('is_active', 0) === 1 ? 'checked':'' }}>
                                        <label class="switch-label" for="showPublicly">Publish</label>
                                    </div>
                                </div>
                                <div class="col-xxl-12 mb-4">
                                    <div class="switch form-switch-custom switch-inline form-switch-primary">
                                        <input type="hidden" name="popular" id="popular" value="0">
                                        <input disabled class="switch-input" type="checkbox" role="switch" id="enableComment" value="1" name="popular" {{ $produks->popular || old('popular', 0) === 1 ? 'checked':'' }}>
                                        <label class="switch-label" for="enableComment">Populer</label>
                                    </div>
                                </div>
                                
                                <div class="col-xxl-12 mb-4">
                                    <div class="">
                                        <label class="switch-label" for="enableComment">Pilih Kategori<span class="text-danger">*</span></label>
                                        @foreach ($kategoriproduk as $item)
                                        @if ($item->id == $produks->kategori_id)
                                        <div>
                                            {{ $item->name }}
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                
                                <div class="col-xxl-12 mb-4">
                                    <div class="">
                                        <label class="switch-label" for="enableComment">Harga Asli<span class="text-danger">*</span></label>
                                        <div>
                                            Rp. {{ number_format($produks->original_price) }}
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xxl-12 mb-4">
                                    <div class="">
                                        <label class="switch-label" for="enableComment">Harga Promo</label>
                                        <div>
                                            Rp. {{ number_format($produks->selling_price) }}
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xxl-12 col-md-12 mb-4">
                                    <label for="product-images">Cover Image<span class="text-danger">*</span></label>
                                    <div class="multiple-file-upload">
                                        <label for="product-images"><b>Cover Saat ini:</b></label>
                                        <div class="multiple-file-upload"> 
                                            @if ($produks->cover)
                                            <img src="{{ asset('storage/'. $produks->cover) }}" loading="lazy" class="rounded" width="245px" height="245px" alt="{{ $produks->name }}">
                                            @else
                                            Cover Masih Kosong
                                            @endif
                                        </div>
                                    </div>
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
@include('backend.layouts.includes.script-rupiah')

@endsection
