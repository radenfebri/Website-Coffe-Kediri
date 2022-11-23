@extends('frontend.layouts.default')

@section('title', 'Favorit')

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Favorit
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50 produk favorit">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table shopping-summery text-center clean">
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Hapus</th>
                                </tr>
                            </thead>
                            
                            @if ($favorit->count() > 0)
                            
                            <tbody>
                                @foreach ($favorit as $item)
                                <tr class="produk_data">
                                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                    <td class="image product-thumbnail">
                                        @if ($item->produks->cover == null)
                                        <img src="{{ '/frontend/imgs/shop/product-1-2.jpg' }}" alt="{{ $item->produks->name }}">
                                        @else
                                        <img src="{{ asset('storage/'. $item->produks->cover ) }}" alt="{{ $item->produks->name }}">
                                        @endif
                                    </td>
                                    <td class="product-des product-name">
                                        <h5 class="product-name"><a href="{{ route('detail.produk', $item->produks->slug ) }}">{{ \Illuminate\Support\Str::words($item->produks->name, 5, '...') }}</a></h5>
                                        <p class="font-xs">{{ \Illuminate\Support\Str::words($item->produks->small_description, 5, '...') }}</p>
                                    </td>
                                    @if ($item->produks->selling_price == null)
                                    <td class="price" data-title="Price"><span>Rp. {{ number_format($item->produks->original_price) }}</span></td>
                                    @else
                                    <td class="price" data-title="Price"><span>Rp. {{ number_format($item->produks->selling_price) }}</span></td>
                                    @endif
                                    
                                    <td>
                                        <a href="{{ route('deletefavorit') }}" class="delete-favorit-item"><i class="fi-rs-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                
                                @else
                                <tr>
                                    <td class="text-center">
                                        Favorit anda masih Kosong
                                    </td>
                                </tr>
                                @endif
                                
                                
                            </tr>
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>
    </div>
</section>
</main>
@endsection
