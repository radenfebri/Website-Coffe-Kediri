@extends('frontend.layouts.default')

@section('title', 'Order History')

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
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
                                    <td class="image product-thumbnail"><span>#{{ $item->tracking_no }}</span></td>
                                    <td class="product-des product-name">
                                        <span>{{ $item->metode }}</span>
                                    </td>
                                    <td class="text-right" data-title="Cart">
                                        <span>{{ date('d F Y',strtotime($item->created_at)) }}</span>
                                    </td>
                                    <td class="price" data-title="Price"><span>Rp. {{ number_format($item->total_price) }}</span></td>
                                    <td class="text-right" data-title="Cart">
                                        @if ($item->status == 0)
                                        <span style="color: rgb(255, 0, 0)">Belum Bayar</span>
                                        @elseif($item->status == 1)
                                        <span style="color: rgb(8, 3, 249)">Proses Packing</span>
                                        @elseif($item->status == 2)
                                        <span style="color: rgb(8, 3, 249)">Proses Kirim</span>
                                        @elseif($item->status == 3)
                                        <span style="color: green">Selesai</span>
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
    <section class="order-history-mobile">
        asdasd
    </section>
</main>
@endsection
    