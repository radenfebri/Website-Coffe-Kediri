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
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table shopping-summery text-center clean">
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Proses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="image product-thumbnail"><img src="assets/imgs/shop/product-1-2.jpg" alt="#"></td>
                                    <td class="product-des product-name">
                                        <h5 class="product-name"><a href="product-details.html">J.Crew Mercantile Women's Short-Sleeve</a></h5>
                                        <p class="font-xs">Maboriosam in a tonto nesciung eget<br> distingy magndapibus.
                                        </p>
                                    </td>
                                    <td class="text-right" data-title="Cart">
                                        <span>12</span>
                                    </td>
                                    <td class="price" data-title="Price"><span>100.000</span></td>
                                    <td class="text-right" data-title="Cart">
                                        <span>Terkirim</span>
                                    </td>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
