@extends('backend.layouts.master-lainnya')

@section('content')

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        
        <div class="middle-content container-xxl p-0">
            
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ongkos Kirim</li>
                    </ol>
                </nav>
            </div>
            
            <div class="row mb-4 layout-spacing layout-top-spacing">
                
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <form action="{{ route('ongkir.update', $ongkir->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="widget-content widget-content-area blog-create-section">
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Nama Kecamatan<span class="text-danger">*</span></label>
                                    <input type="text" name="kecamatan" value="{{ old('kecamatan') ?? $ongkir->kecamatan }}" class="form-control @error('kecamatan') is-invalid @enderror" id="post-title" placeholder="Grogol">
                                    @error('kecamatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Harga Ongkos</label>
                                    <input type="number" name="harga" value="{{ old('harga') ?? $ongkir->harga }}" class="form-control @error('harga') is-invalid @enderror" id="post-title" placeholder="20000">
                                    @error('harga')
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
                                
                                @can ('Ongkir Update')
                                <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                    <button class="btn btn-success w-100" type="submit">Update Data</button>
                                </div>
                                @endcan
                                
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
