@extends('frontend.layouts.default')

@section('title', 'Checkout')

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
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
                        
                        <div class="mb-20">
                            <h5>Alamat</h5>
                        </div>
                        <div class="form-group mb-30">
                            <textarea rows="1" placeholder="Alamat" name="alamat" readonly>{{ Auth::user()->alamat }}</textarea>
                        </div>
                        
                        <div class="mb-20">
                            <h5>Catatan Order</h5>
                        </div>
                        <div class="form-group mb-30">
                            <textarea rows="5" placeholder="Order notes" name="catatan"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Detail Order</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Produk</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total = 0; @endphp
                                        
                                        @foreach ($produk as $item)
                                        <tr>
                                            <td class="image product-thumbnail"><img src="{{ asset('storage/'. $item->produks->cover ) }}" alt="{{ $item->produks->name }}"></td>
                                            <td>
                                                <h5><a href="{{ route('detail.produk', $item->produks->slug ) }}">{{ \Illuminate\Support\Str::words($item->produks->name, 5, '...') }}</a></h5> <span class="product-qty">x {{ $item->prod_qty }}</span>
                                            </td>
                                            <td>
                                                @if ($item->produks->selling_price == null)
                                                <span>Rp. {{ number_format($item->produks->original_price * $item->prod_qty) }}</span>
                                                @else
                                                <span>Rp. {{ number_format($item->produks->selling_price * $item->prod_qty) }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @if ($item->produks->selling_price == null)
                                        @php $total += $item->produks->original_price * $item->prod_qty; @endphp
                                        @else
                                        @php $total += $item->produks->selling_price * $item->prod_qty; @endphp
                                        @endif
                                        @endforeach
                                        
                                        <tr>
                                            <th>SubTotal</th>
                                            <td class="product-subtotal" colspan="2">Rp. {{ number_format($total) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td colspan="2"><em>Free Shipping</em></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">Rp. {{ number_format($total) }}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                            <div class="payment_method">
                                <div class="mb-25">
                                    <h5>Metode Pembayaran</h5>
                                </div>
                                <div class="payment_option">
                                    <div class="custome-radio">
                                        <select class="form-control @error('metode') is-invalid @enderror" name="metode">
                                            <option value="TRANFER BANK BRI">TRANFER BANK BRI</option>
                                            <option value="TRANFER BANK BCA">TRANFER BANK BCA</option>
                                            <option value="TRANFER BANK BNI">TRANFER BANK BNI</option>
                                            <option value="QRIS / E-WALLET">QRIS / E-WALLET</option>
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