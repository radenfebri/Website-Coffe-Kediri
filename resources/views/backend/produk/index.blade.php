@extends('backend.layouts.master-lainnya')

@section('content')

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        
        <div class="middle-content container-xxl p-0">
            
            <div class="page-meta mb-4">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Semua Produk</li>
                    </ol>
                </nav>
            </div>
            
            
            
            <div class="row layout-spacing">
                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">
                            <div>
                                <div style="text-align: right ">
                                    <a href="{{ route('produk.create') }}" class="text-primary" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg></a>
                                </div>
                                    <table id="style-3" class="table style-3 dt-table-hover">
                                        <thead>
                                            <tr>
                                                <th class="checkbox-column text-center"> Record Id </th>
                                                <th class="text-center">Image</th>
                                                <th>Nama Produk</th>
                                                <th>Nama Kategori</th>
                                                <th>Harga</th>
                                                <th class="text-center">Active/Inactive</th>
                                                <th class="text-center">Populer</th>
                                                <th class="text-center dt-no-sorting">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($produks as $no => $item)
                                            
                                            <tr>
                                                <td class="checkbox-column text-center"> {{ $no + 1 }} </td>
                                                <td class="text-center">
                                                    @if ($item->cover)
                                                    <span><img src="{{ asset('storage/'. $item->cover ) }}" loading="lazy" class="profile-img" alt="{{ $item->name }}"></span>
                                                    @else
                                                    <span><img src="{{ asset('back') }}/src/assets/img/profile-17.jpeg" loading="lazy" class="profile-img" alt="{{ $item->name }}"></span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                @if ($item->kategoriproduk == null)
                                                <td>Belum ada kategori</td>
                                                @else
                                                <td>{{ $item->kategoriproduk->name }}</td>
                                                @endif
                                                <td>{{ number_format($item->original_price) }}</td>
                                                @if ($item->is_active == 1)
                                                <td class="text-center"><span class="shadow-none badge badge-success">Active</span></td>
                                                @else
                                                <td class="text-center"><span class="shadow-none badge badge-danger">Inactive</span></td>
                                                @endif
                                                
                                                @if ($item->popular == 1)
                                                <td class="text-center"><span class="shadow-none badge badge-success">Popular</span></td>
                                                @else
                                                <td class="text-center"><span class="shadow-none badge badge-danger">Tdk Popular</span></td>
                                                @endif
                                                
                                                <td class="text-center">
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                        </a>
                                                        
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                            <a class="dropdown-item" href="{{ route('produk.show', encrypt($item->id)) }}">Show Produk</a>
                                                            <a class="dropdown-item" href="{{ route('produk.edit', encrypt($item->id)) }}">Edit Produk</a>
                                                            <a class="dropdown-item" href="{{ route('produk.destroy', encrypt($item->id)) }}" onclick="return confirm('Yakin anda akan menghapus Produk {{ $item->name }}?')">Delete Produk</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                @include('backend.layouts.footer')
                
                
            </div>    
        </div>
    </div>
</div>


@endsection
