@extends('frontend.layouts.default')

@section('title', 'Checkout')

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="divider mt-50 mb-50"></div>
                </div>
            </div>
            <form action="{{ route('placeorder') }}" method="POST">
                @csrf
                
                {{-- @foreach ($user as $data)
                    @php $kirim = $data->ongkir->harga @endphp
                @endforeach --}}
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-25">
                            <h4>Detail Akun</h4>
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{ Auth::user()->name }}" name="name" placeholder="Name *" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{ Auth::user()->email }}" name="email" placeholder="Email *" readonly>
                        </div>
                        <div class="form-group">
                            <input value="{{ Auth::user()->no_hp }}" type="text" name="no_hp" placeholder="No WA" readonly>
                        </div>
                        <div class="form-group">
                            <input value="{{ Auth::user()->ongkir->kecamatan }}" type="text" name="ongkir_id" placeholder="Kecamatan" readonly>
                        </div>
                        
                        <div class="mb-20">
                            <h5>Alamat Lengkap</h5>
                        </div>
                        <div class="form-group mb-30">
                            <textarea rows="1" placeholder="Alamat" name="alamat" readonly>{{ Auth::user()->alamat }}</textarea>
                        </div>
                        
                        <div class="mb-20">
                            <h5>Catatan Order</h5>
                        </div>
                        <div class="form-group mb-30">
                            <textarea rows="5" placeholder="Order notes" name="message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Detail Order</h4>
                            </div>
                            <div class="detail-produk-pembayaran">
                                <div class="judul-produk-pembayaran">
                                    <div class="produk-pembayaran">
                                        <h4>Produk</h4>
                                    </div>
                                    <div class="total-produk-pembayaran">
                                        <h4>Total</h4>
                                    </div>
                                </div>
                                @php $total = 0; @endphp
                                
                                @foreach ($produk as $item)
                                <div class="isi-produk-pembayaran">     
                                    <div class="img-produk-pembayaran">
                                        <img src="{{ asset('storage/'. $item->produks->cover ) }}" alt="{{ $item->produks->name }}">
                                    </div>
                                    <div class="desc-produk-pembayaran">
                                        <a href="{{ route('detail.produk', $item->produks->slug ) }}" class="judul">{{ \Illuminate\Support\Str::words($item->produks->name, 5, '...') }}</a>
                                        <p>x {{ $item->prod_qty }}</p>
                                    </div>
                                    <div class="total-produk-pembayaran">
                                        <p>
                                            @if ($item->produks->selling_price == null)
                                            <span>Rp. {{ number_format($item->produks->original_price * $item->prod_qty) }}</span>
                                            @else
                                            <span>Rp. {{ number_format($item->produks->selling_price * $item->prod_qty) }}</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                @if ($item->produks->selling_price == null)
                                @php $total += $item->produks->original_price * $item->prod_qty; @endphp
                                @else
                                @php $total += $item->produks->selling_price * $item->prod_qty; @endphp
                                @endif
                                @endforeach
                                <div class="judul-produk-pembayaran">
                                    <div class="produk-pembayaran">
                                        <h5>Sub Total</h5>
                                    </div>
                                    <div class="total-produk-pembayaran">
                                        <h5>Rp. {{ number_format($total) }}</h5>
                                    </div>
                                </div>
                                <div class="judul-produk-pembayaran">
                                    <div class="produk-pembayaran">
                                        <h5>Ongkos Kirim</h5>
                                    </div>
                                    <div class="total-produk-pembayaran">
                                        <h5>Rp. {{ number_format($kirim) }}</h5>
                                    </div>
                                </div>
                                <div class="judul-produk-pembayaran">
                                    <div class="produk-pembayaran">
                                        <h5>Total Keseluruhan</h5>
                                    </div>
                                    <div class="total-produk-pembayaran">
                                        <h5>Rp. {{ number_format($total + $kirim) }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                            <div class="payment_method">
                                <div class="mb-25">
                                    <h5>Metode Pembayaran</h5>
                                </div>
                                <div class="payment_option">
                                    <div class="custome-radio">
                                        <select class="form-control @error('metode') is-invalid @enderror" name="metode">
                                            @foreach ($payment as $item)
                                            <option value="{{ $item->nama_bank }}">{{ $item->nama_bank }}</option>
                                            @endforeach
                                        </select>
                                        @error('metode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-fill-out btn-block mt-30">Proses Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
@endsection