@extends('backend.layouts.master-lainnya')

@section('content')

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        
        <div class="middle-content container-xxl p-0">
            
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Metode Pembayaran</li>
                    </ol>
                </nav>
            </div>
            
            <div class="row mb-4 layout-spacing layout-top-spacing">
                
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <form action="{{ route('payment.update', $payment->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="widget-content widget-content-area blog-create-section">
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Atas Nama<span class="text-danger">*</span></label>
                                    <input type="text" name="atas_nama" value="{{ old('atas_nama') ?? $payment->atas_nama }}" class="form-control @error('atas_nama') is-invalid @enderror" id="post-title" placeholder="Atas Nama Bank">
                                    @error('atas_nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Nomor Rekening</label>
                                    <input type="number" name="no_rek" value="{{ old('no_rek') ?? $payment->no_rek }}" class="form-control @error('no_rek') is-invalid @enderror" id="post-title" placeholder="782345923423">
                                    @error('no_rek')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Nama Bank<span class="text-danger">*</span></label>
                                    <input type="text" name="nama_bank" value="{{ old('nama_bank') ?? $payment->nama_bank }}" class="form-control @error('nama_bank') is-invalid @enderror" id="post-title" placeholder="TRANSFER BSI, VA BANK BRI, QRIS">
                                    @error('nama_bank')
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
                                    
                                    <label for="product-images">Image</label>
                                    <div class="multiple-file-upload">
                                        <input class="form-control @error('iamge') is-invalid @enderror file-upload-input" name="image" type="file">
                                    </div>
                                    <br>
                                    <div class="multiple-file-upload"> 
                                        @if ($payment->image)
                                        <img src="{{ asset('storage/'. $payment->image) }}" loading="lazy" class="rounded" width="245px" height="245px" alt="{{ $payment->kategori }}">
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
                                
                                <div class="col-xxl-12 col-md-12 mb-4">
                                    
                                    <label for="product-images">Kategori Payment<span class="text-danger">*</span></label>
                                    <div class="multiple-file-upload">
                                        <select class="form-select" name="kategori" id="kategori" required>
                                            <option disabled selected>--Pilih Kategori--</option>
                                            <option value="0" {{ $payment->kategori == '0' ? 'selected' : '' }}>BANK TRANSFER</option>
                                            <option value="1" {{ $payment->kategori == '1' ? 'selected' : '' }}>VIRTUAL AKUN BANK</option>
                                            <option value="2" {{ $payment->kategori == '2' ? 'selected' : '' }}>QRIS / E-WALLET</option>
                                        </select>
                                    </div>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                @can ('Pembayaran Update')
                                <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                    <button class="btn btn-success w-100" type="submit">Update Payment</button>
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
