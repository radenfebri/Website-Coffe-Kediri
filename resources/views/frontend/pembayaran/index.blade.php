@extends('frontend.layouts.default')

@section('title', 'Detail Pembayaran')

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
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
                    <button class="btn">Konfirmasi Pembayaran</button>
                </div>
            </div>
        </div>
    </section>
   
</main>
@endsection
    