@extends('frontend.layouts.default')

@section('title', 'Order History')

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>
                <span></span> Order History
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50 order-history-desktop">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table shopping-summery text-center clean">
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col">Kode Order</th>
                                    <th scope="col">Metode Bayar</th>
                                    <th scope="col">Tanggal Pesan</th>
                                    <th scope="col">Total Bayar</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                <tr>
                                    <td class="image product-thumbnail">
                                        @if ($item->status == 0)
                                        <a href="{{ route('pembayaran', encrypt($item->id) ) }}" class="order-history-link"><span>#{{ $item->tracking_no }}</span></a>
                                        @elseif ($item->status == 1)
                                        <a href="{{ route('packing', encrypt($item->id) ) }}" class="order-history-link"><span>#{{ $item->tracking_no }}</span></a>
                                        @elseif ($item->status == 2)
                                        <a href="{{ route('kirim', encrypt($item->id) ) }}" class="order-history-link"><span>#{{ $item->tracking_no }}</span></a>
                                        @elseif ($item->status == 3)
                                        <a href="{{ route('selesai', encrypt($item->id) ) }}" class="order-history-link"><span>#{{ $item->tracking_no }}</span></a>
                                        @endif
                                    </td>
                                    <td class="product-des product-name">
                                        @if ($item->status == 0)
                                        <a href="{{ route('pembayaran', encrypt($item->id) ) }}" class="order-history-link"><span>{{ $item->metode }}</span></a>
                                        @elseif ($item->status == 1)
                                        <a href="{{ route('packing', encrypt($item->id) ) }}" class="order-history-link"><span>{{ $item->metode }}</span></a>
                                        @elseif ($item->status == 2)
                                        <a href="{{ route('kirim', encrypt($item->id) ) }}" class="order-history-link"><span>{{ $item->metode }}</span></a>
                                        @elseif ($item->status == 3)
                                        <a href="{{ route('selesai', encrypt($item->id) ) }}" class="order-history-link"><span>{{ $item->metode }}</span></a>
                                        @endif
                                    </td>
                                    <td class="text-right" data-title="Cart">
                                        @if ($item->status == 0)
                                        <a href="{{ route('pembayaran', encrypt($item->id) ) }}" class="order-history-link"><span>{{ date('d F Y',strtotime($item->created_at)) }}</span></a>
                                        @elseif ($item->status == 1)
                                        <a href="{{ route('packing', encrypt($item->id) ) }}" class="order-history-link"><span>{{ date('d F Y',strtotime($item->created_at)) }}</span></a>
                                        @elseif ($item->status == 2)
                                        <a href="{{ route('kirim', encrypt($item->id) ) }}" class="order-history-link"><span>{{ date('d F Y',strtotime($item->created_at)) }}</span></a>
                                        @elseif ($item->status == 3)
                                        <a href="{{ route('selesai', encrypt($item->id) ) }}" class="order-history-link"><span>{{ date('d F Y',strtotime($item->created_at)) }}</span></a>
                                        @endif
                                    </td>
                                    <td class="price" data-title="Price">
                                        @if ($item->status == 0)
                                        <a href="{{ route('pembayaran', encrypt($item->id) ) }}" class="order-history-link"><span>Rp. {{ number_format($item->total_price) }}</span></a>
                                        @elseif ($item->status == 1)
                                        <a href="{{ route('packing', encrypt($item->id) ) }}" class="order-history-link"><span>Rp. {{ number_format($item->total_price) }}</span></a>
                                        @elseif ($item->status == 2)
                                        <a href="{{ route('kirim', encrypt($item->id) ) }}" class="order-history-link"><span>Rp. {{ number_format($item->total_price) }}</span></a>
                                        @elseif ($item->status == 3)
                                        <a href="{{ route('selesai', encrypt($item->id) ) }}" class="order-history-link"><span>Rp. {{ number_format($item->total_price) }}</span></a>
                                        @endif
                                    </td>
                                    <td class="text-right" data-title="Cart">
                                        @if ($item->status == 0)
                                        <a href="{{ route('pembayaran', encrypt($item->id) ) }}" class="order-history-link"><span style="color: rgb(255, 0, 0)">Belum Bayar</span></a>
                                        @elseif($item->status == 1)
                                        <a href="{{ route('packing', encrypt($item->id) ) }}" class="order-history-link"><span style="color: rgb(8, 3, 249)">Proses Packing</span></a>
                                        @elseif($item->status == 2)
                                        <a href="{{ route('kirim', encrypt($item->id) ) }}" class="order-history-link"><span style="color: rgb(8, 3, 249)">Proses Kirim</span></a>
                                        @elseif($item->status == 3)
                                        <a href="{{ route('selesai', encrypt($item->id) ) }}" class="order-history-link"><span style="color: green">Selesai</span></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        {{-- TAMPILAN MOBILE --}}
        <section class="order-history-mobile">
            <div class="container">
                @foreach ($orders as $item)
                    @if ($item->status == 0)
                        <div class="layer-order" onclick="window.location.href='{{ route('pembayaran', encrypt($item->id) ) }}'">
                            <div class="order-history">
                                <div class="text-order-history">
                                    <p>Kode Order</p>
                                    @if ($item->status == 0)
                                    <a href="{{ route('pembayaran', encrypt($item->id) ) }}" class="order-history-link"><span>#{{ $item->tracking_no }}</span></a>
                                    @elseif ($item->status == 1)
                                    <a href="{{ route('packing', encrypt($item->id) ) }}" class="order-history-link"><span>#{{ $item->tracking_no }}</span></a>
                                    @elseif ($item->status == 2)
                                    <a href="{{ route('kirim', encrypt($item->id) ) }}" class="order-history-link"><span>#{{ $item->tracking_no }}</span></a>
                                    @elseif ($item->status == 3)
                                    <a href="{{ route('selesai', encrypt($item->id) ) }}" class="order-history-link"><span>#{{ $item->tracking_no }}</span></a>
                                    @endif
                                </div>
                                <div class="text-order-history">
                                    <p>Metode Bayar</p>
                                    @if ($item->status == 0)
                                    <a href="{{ route('pembayaran', encrypt($item->id) ) }}" class="order-history-link"><span>{{ $item->metode }}</span></a>
                                    @elseif ($item->status == 1)
                                    <a href="{{ route('packing', encrypt($item->id) ) }}" class="order-history-link"><span>{{ $item->metode }}</span></a>
                                    @elseif ($item->status == 2)
                                    <a href="{{ route('kirim', encrypt($item->id) ) }}" class="order-history-link"><span>{{ $item->metode }}</span></a>
                                    @elseif ($item->status == 3)
                                    <a href="{{ route('selesai', encrypt($item->id) ) }}" class="order-history-link"><span>{{ $item->metode }}</span></a>
                                    @endif
                                </div>
                                <div class="text-order-history">
                                    <p>Tanggal Pesanan</p>
                                    @if ($item->status == 0)
                                    <a href="{{ route('pembayaran', encrypt($item->id) ) }}" class="order-history-link"><span>{{ date('d F Y',strtotime($item->created_at)) }}</span></a>
                                    @elseif ($item->status == 1)
                                    <a href="{{ route('packing', encrypt($item->id) ) }}" class="order-history-link"><span>{{ date('d F Y',strtotime($item->created_at)) }}</span></a>
                                    @elseif ($item->status == 2)
                                    <a href="{{ route('kirim', encrypt($item->id) ) }}" class="order-history-link"><span>{{ date('d F Y',strtotime($item->created_at)) }}</span></a>
                                    @elseif ($item->status == 3)
                                    <a href="{{ route('selesai', encrypt($item->id) ) }}" class="order-history-link"><span>{{ date('d F Y',strtotime($item->created_at)) }}</span></a>
                                    @endif
                                </div>
                                <div class="text-order-history">
                                    <p>Total Bayar</p>
                                    @if ($item->status == 0)
                                    <a href="{{ route('pembayaran', encrypt($item->id) ) }}" class="order-history-link"><span>Rp. {{ number_format($item->total_price) }}</span></a>
                                    @elseif ($item->status == 1)
                                    <a href="{{ route('packing', encrypt($item->id) ) }}" class="order-history-link"><span>Rp. {{ number_format($item->total_price) }}</span></a>
                                    @elseif ($item->status == 2)
                                    <a href="{{ route('kirim', encrypt($item->id) ) }}" class="order-history-link"><span>Rp. {{ number_format($item->total_price) }}</span></a>
                                    @elseif ($item->status == 3)
                                    <a href="{{ route('selesai', encrypt($item->id) ) }}" class="order-history-link"><span>Rp. {{ number_format($item->total_price) }}</span></a>
                                    @endif
                                </div>
                                <div class="text-order-history">
                                    <p>Status</p>
                                    <p>
                                        @if ($item->status == 0)
                                        <span style="color: rgb(255, 0, 0)">Belum Bayar</span>
                                        @elseif($item->status == 1)
                                        <span style="color: rgb(8, 3, 249)">Proses Packing</span>
                                        @elseif($item->status == 2)
                                        <span style="color: rgb(8, 3, 249)">Proses Kirim</span>
                                        @elseif($item->status == 3)
                                        <span style="color: green">Selesai</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    @elseif ($item->status == 1)
                        <div class="layer-order" onclick="window.location.href='{{ route('packing', encrypt($item->id) ) }}'">
                            <div class="order-history">
                                <div class="text-order-history">
                                    <p>Kode Order</p>
                                    @if ($item->status == 0)
                                    <a href="{{ route('pembayaran', encrypt($item->id) ) }}" class="order-history-link"><span>#{{ $item->tracking_no }}</span></a>
                                    @elseif ($item->status == 1)
                                    <a href="{{ route('packing', encrypt($item->id) ) }}" class="order-history-link"><span>#{{ $item->tracking_no }}</span></a>
                                    @elseif ($item->status == 2)
                                    <a href="{{ route('kirim', encrypt($item->id) ) }}" class="order-history-link"><span>#{{ $item->tracking_no }}</span></a>
                                    @elseif ($item->status == 3)
                                    <a href="{{ route('selesai', encrypt($item->id) ) }}" class="order-history-link"><span>#{{ $item->tracking_no }}</span></a>
                                    @endif
                                </div>
                                <div class="text-order-history">
                                    <p>Metode Bayar</p>
                                    @if ($item->status == 0)
                                    <a href="{{ route('pembayaran', encrypt($item->id) ) }}" class="order-history-link"><span>{{ $item->metode }}</span></a>
                                    @elseif ($item->status == 1)
                                    <a href="{{ route('packing', encrypt($item->id) ) }}" class="order-history-link"><span>{{ $item->metode }}</span></a>
                                    @elseif ($item->status == 2)
                                    <a href="{{ route('kirim', encrypt($item->id) ) }}" class="order-history-link"><span>{{ $item->metode }}</span></a>
                                    @elseif ($item->status == 3)
                                    <a href="{{ route('selesai', encrypt($item->id) ) }}" class="order-history-link"><span>{{ $item->metode }}</span></a>
                                    @endif
                                </div>
                                <div class="text-order-history">
                                    <p>Tanggal Pesanan</p>
                                    @if ($item->status == 0)
                                    <a href="{{ route('pembayaran', encrypt($item->id) ) }}" class="order-history-link"><span>{{ date('d F Y',strtotime($item->created_at)) }}</span></a>
                                    @elseif ($item->status == 1)
                                    <a href="{{ route('packing', encrypt($item->id) ) }}" class="order-history-link"><span>{{ date('d F Y',strtotime($item->created_at)) }}</span></a>
                                    @elseif ($item->status == 2)
                                    <a href="{{ route('kirim', encrypt($item->id) ) }}" class="order-history-link"><span>{{ date('d F Y',strtotime($item->created_at)) }}</span></a>
                                    @elseif ($item->status == 3)
                                    <a href="{{ route('selesai', encrypt($item->id) ) }}" class="order-history-link"><span>{{ date('d F Y',strtotime($item->created_at)) }}</span></a>
                                    @endif
                                </div>
                                <div class="text-order-history">
                                    <p>Total Bayar</p>
                                    @if ($item->status == 0)
                                    <a href="{{ route('pembayaran', encrypt($item->id) ) }}" class="order-history-link"><span>Rp. {{ number_format($item->total_price) }}</span></a>
                                    @elseif ($item->status == 1)
                                    <a href="{{ route('packing', encrypt($item->id) ) }}" class="order-history-link"><span>Rp. {{ number_format($item->total_price) }}</span></a>
                                    @elseif ($item->status == 2)
                                    <a href="{{ route('kirim', encrypt($item->id) ) }}" class="order-history-link"><span>Rp. {{ number_format($item->total_price) }}</span></a>
                                    @elseif ($item->status == 3)
                                    <a href="{{ route('selesai', encrypt($item->id) ) }}" class="order-history-link"><span>Rp. {{ number_format($item->total_price) }}</span></a>
                                    @endif
                                </div>
                                <div class="text-order-history">
                                    <p>Status</p>
                                    <p>
                                        @if ($item->status == 0)
                                        <span style="color: rgb(255, 0, 0)">Belum Bayar</span>
                                        @elseif($item->status == 1)
                                        <span style="color: rgb(8, 3, 249)">Proses Packing</span>
                                        @elseif($item->status == 2)
                                        <span style="color: rgb(8, 3, 249)">Proses Kirim</span>
                                        @elseif($item->status == 3)
                                        <span style="color: green">Selesai</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    @elseif ($item->status == 2)
                        <div class="layer-order" onclick="window.location.href='{{ route('kirim', encrypt($item->id) ) }}'">
                            <div class="order-history">
                                <div class="text-order-history">
                                    <p>Kode Order</p>
                                    @if ($item->status == 0)
                                    <a href="{{ route('pembayaran', encrypt($item->id) ) }}" class="order-history-link"><span>#{{ $item->tracking_no }}</span></a>
                                    @elseif ($item->status == 1)
                                    <a href="{{ route('packing', encrypt($item->id) ) }}" class="order-history-link"><span>#{{ $item->tracking_no }}</span></a>
                                    @elseif ($item->status == 2)
                                    <a href="{{ route('kirim', encrypt($item->id) ) }}" class="order-history-link"><span>#{{ $item->tracking_no }}</span></a>
                                    @elseif ($item->status == 3)
                                    <a href="{{ route('selesai', encrypt($item->id) ) }}" class="order-history-link"><span>#{{ $item->tracking_no }}</span></a>
                                    @endif
                                </div>
                                <div class="text-order-history">
                                    <p>Metode Bayar</p>
                                    @if ($item->status == 0)
                                    <a href="{{ route('pembayaran', encrypt($item->id) ) }}" class="order-history-link"><span>{{ $item->metode }}</span></a>
                                    @elseif ($item->status == 1)
                                    <a href="{{ route('packing', encrypt($item->id) ) }}" class="order-history-link"><span>{{ $item->metode }}</span></a>
                                    @elseif ($item->status == 2)
                                    <a href="{{ route('kirim', encrypt($item->id) ) }}" class="order-history-link"><span>{{ $item->metode }}</span></a>
                                    @elseif ($item->status == 3)
                                    <a href="{{ route('selesai', encrypt($item->id) ) }}" class="order-history-link"><span>{{ $item->metode }}</span></a>
                                    @endif
                                </div>
                                <div class="text-order-history">
                                    <p>Tanggal Pesanan</p>
                                    @if ($item->status == 0)
                                    <a href="{{ route('pembayaran', encrypt($item->id) ) }}" class="order-history-link"><span>{{ date('d F Y',strtotime($item->created_at)) }}</span></a>
                                    @elseif ($item->status == 1)
                                    <a href="{{ route('packing', encrypt($item->id) ) }}" class="order-history-link"><span>{{ date('d F Y',strtotime($item->created_at)) }}</span></a>
                                    @elseif ($item->status == 2)
                                    <a href="{{ route('kirim', encrypt($item->id) ) }}" class="order-history-link"><span>{{ date('d F Y',strtotime($item->created_at)) }}</span></a>
                                    @elseif ($item->status == 3)
                                    <a href="{{ route('selesai', encrypt($item->id) ) }}" class="order-history-link"><span>{{ date('d F Y',strtotime($item->created_at)) }}</span></a>
                                    @endif
                                </div>
                                <div class="text-order-history">
                                    <p>Total Bayar</p>
                                    @if ($item->status == 0)
                                    <a href="{{ route('pembayaran', encrypt($item->id) ) }}" class="order-history-link"><span>Rp. {{ number_format($item->total_price) }}</span></a>
                                    @elseif ($item->status == 1)
                                    <a href="{{ route('packing', encrypt($item->id) ) }}" class="order-history-link"><span>Rp. {{ number_format($item->total_price) }}</span></a>
                                    @elseif ($item->status == 2)
                                    <a href="{{ route('kirim', encrypt($item->id) ) }}" class="order-history-link"><span>Rp. {{ number_format($item->total_price) }}</span></a>
                                    @elseif ($item->status == 3)
                                    <a href="{{ route('selesai', encrypt($item->id) ) }}" class="order-history-link"><span>Rp. {{ number_format($item->total_price) }}</span></a>
                                    @endif
                                </div>
                                <div class="text-order-history">
                                    <p>Status</p>
                                    <p>
                                        @if ($item->status == 0)
                                        <span style="color: rgb(255, 0, 0)">Belum Bayar</span>
                                        @elseif($item->status == 1)
                                        <span style="color: rgb(8, 3, 249)">Proses Packing</span>
                                        @elseif($item->status == 2)
                                        <span style="color: rgb(8, 3, 249)">Proses Kirim</span>
                                        @elseif($item->status == 3)
                                        <span style="color: green">Selesai</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    @elseif ($item->status == 3)
                        <div class="layer-order" onclick="window.location.href='{{ route('selesai', encrypt($item->id) ) }}'">
                            <div class="order-history">
                                <div class="text-order-history">
                                    <p>Kode Order</p>
                                    @if ($item->status == 0)
                                    <a href="{{ route('pembayaran', encrypt($item->id) ) }}" class="order-history-link"><span>#{{ $item->tracking_no }}</span></a>
                                    @elseif ($item->status == 1)
                                    <a href="{{ route('packing', encrypt($item->id) ) }}" class="order-history-link"><span>#{{ $item->tracking_no }}</span></a>
                                    @elseif ($item->status == 2)
                                    <a href="{{ route('kirim', encrypt($item->id) ) }}" class="order-history-link"><span>#{{ $item->tracking_no }}</span></a>
                                    @elseif ($item->status == 3)
                                    <a href="{{ route('selesai', encrypt($item->id) ) }}" class="order-history-link"><span>#{{ $item->tracking_no }}</span></a>
                                    @endif
                                </div>
                                <div class="text-order-history">
                                    <p>Metode Bayar</p>
                                    @if ($item->status == 0)
                                    <a href="{{ route('pembayaran', encrypt($item->id) ) }}" class="order-history-link"><span>{{ $item->metode }}</span></a>
                                    @elseif ($item->status == 1)
                                    <a href="{{ route('packing', encrypt($item->id) ) }}" class="order-history-link"><span>{{ $item->metode }}</span></a>
                                    @elseif ($item->status == 2)
                                    <a href="{{ route('kirim', encrypt($item->id) ) }}" class="order-history-link"><span>{{ $item->metode }}</span></a>
                                    @elseif ($item->status == 3)
                                    <a href="{{ route('selesai', encrypt($item->id) ) }}" class="order-history-link"><span>{{ $item->metode }}</span></a>
                                    @endif
                                </div>
                                <div class="text-order-history">
                                    <p>Tanggal Pesanan</p>
                                    @if ($item->status == 0)
                                    <a href="{{ route('pembayaran', encrypt($item->id) ) }}" class="order-history-link"><span>{{ date('d F Y',strtotime($item->created_at)) }}</span></a>
                                    @elseif ($item->status == 1)
                                    <a href="{{ route('packing', encrypt($item->id) ) }}" class="order-history-link"><span>{{ date('d F Y',strtotime($item->created_at)) }}</span></a>
                                    @elseif ($item->status == 2)
                                    <a href="{{ route('kirim', encrypt($item->id) ) }}" class="order-history-link"><span>{{ date('d F Y',strtotime($item->created_at)) }}</span></a>
                                    @elseif ($item->status == 3)
                                    <a href="{{ route('selesai', encrypt($item->id) ) }}" class="order-history-link"><span>{{ date('d F Y',strtotime($item->created_at)) }}</span></a>
                                    @endif
                                </div>
                                <div class="text-order-history">
                                    <p>Total Bayar</p>
                                    @if ($item->status == 0)
                                    <a href="{{ route('pembayaran', encrypt($item->id) ) }}" class="order-history-link"><span>Rp. {{ number_format($item->total_price) }}</span></a>
                                    @elseif ($item->status == 1)
                                    <a href="{{ route('packing', encrypt($item->id) ) }}" class="order-history-link"><span>Rp. {{ number_format($item->total_price) }}</span></a>
                                    @elseif ($item->status == 2)
                                    <a href="{{ route('kirim', encrypt($item->id) ) }}" class="order-history-link"><span>Rp. {{ number_format($item->total_price) }}</span></a>
                                    @elseif ($item->status == 3)
                                    <a href="{{ route('selesai', encrypt($item->id) ) }}" class="order-history-link"><span>Rp. {{ number_format($item->total_price) }}</span></a>
                                    @endif
                                </div>
                                <div class="text-order-history">
                                    <p>Status</p>
                                    <p>
                                        @if ($item->status == 0)
                                        <span style="color: rgb(255, 0, 0)">Belum Bayar</span>
                                        @elseif($item->status == 1)
                                        <span style="color: rgb(8, 3, 249)">Proses Packing</span>
                                        @elseif($item->status == 2)
                                        <span style="color: rgb(8, 3, 249)">Proses Kirim</span>
                                        @elseif($item->status == 3)
                                        <span style="color: green">Selesai</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
    </main>
    @endsection
    