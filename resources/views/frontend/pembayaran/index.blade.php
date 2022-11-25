@extends('frontend.layouts.default')

@section('title', 'Detail Pembayaran')

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>
                <span></span> Pembayaran
            </div>
        </div>
    </div>
    <section class="pembayaran">
        <div class="container">
            <div class="layer1">
                <h3 class="title">Pembayaran</h3>
                <div class="layer2">
                    <div class="text-pembayaran">
                        <div class="pembayaran-text">
                            <p>Kode Order</p>
                            <p>#PUBA947205</p>
                        </div>
                        <div class="pembayaran-text">
                            <p>Metode Bayar</p>
                            <p>TRANFER BANK BRI</p>
                        </div>
                        <div class="pembayaran-text">
                            <p>Total Bayar</p>
                            <p>Rp. 100.811</p>
                        </div>
                        <div class="pembayaran-text">
                            <p>Status</p>
                            <p>Belum Dibayar</p>
                        </div>
                    </div>
                    <span></span>
                    <div class="detail-pembayaran">
                        <h3>Detail Pembayaran</h3>
                        <div class="pembayaran-text">
                            <p>Total Pembayaran</p>
                            <p>Rp. 100.811</p>
                        </div>
                        <div class="pembayaran-text">
                            <p>24 November 2022</p>
                        </div>
                    </div>
                    <a class="btn btn-pembayaran">Konfirmasi Pembayaran</a>    
                </div>
            </div>

            {{-- metode pembayaran --}}
            <div class="metode-pembayaran">
                <div class="pilihan-pembayaran">
                    <h4>Metode Pembayaran : <span>BRI</span></h4>
                </div>
                {{-- metode pembayaran rekening --}}
                <div class="kirim-pembayaran">
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-label">Atas Nama</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">No Rekening</label>
                            <div class="copy-text">
                                <input type="text" class="form-control">
                                <button class="btn"><i class="fa fa-clone"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- metode pembayaran qris --}}
                {{-- <div class="kirim-pembayaran-qris">
                    <h3>Kalian bisa scan barcode di bawah ini</h3>
                    <img src="{{ asset('frontend')}}/imgs/shop/product-1-1.jpg" alt="" loading="lazy">
                    <a href="#" class="btn">Download</a>
                </div> --}}
            </div>
        </div>
    </section>
   
</main>

@include('frontend.layouts.includes.copy')
@endsection
