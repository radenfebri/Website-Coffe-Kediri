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
                                    @can ('Produk Create')
                                    <a href="{{ route('produk.create') }}" class="text-primary" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                    </a>
                                    @endcan

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
                                                    <a href="{{ route('produk.show', encrypt($item->id)) }}">
                                                        @if ($item->cover)
                                                        <span><img src="{{ asset('storage/'. $item->cover ) }}" loading="lazy" class="profile-img" alt="{{ $item->name }}"></span>
                                                        @else
                                                        <span><img src="{{ asset('back') }}/src/assets/img/profile-17.jpeg" loading="lazy" class="profile-img" alt="{{ $item->name }}"></span>
                                                        @endif
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('produk.show', encrypt($item->id)) }}">
                                                        {{ $item->name }}
                                                    </a>
                                                </td>
                                                @if ($item->kategoriproduk == null)
                                                <td>Belum ada kategori</td>
                                                @else
                                                <td>{{ $item->kategoriproduk->name }}</td>
                                                @endif

                                                @if ($item->selling_price == null)
                                                    <td>{{ number_format($item->original_price) }}</td>
                                                @else
                                                    <td>{{ number_format($item->selling_price) }}</td>
                                                @endif


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
                                                    <ul class="table-controls">
                                                        @can ('Produk Show')
                                                        <li>
                                                            <a href="{{ route('produk.show', encrypt($item->id)) }}" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Show" data-original-title="Show">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                            </a>
                                                        </li>
                                                        @endcan
                                                        
                                                        @can ('Produk Edit')
                                                        <li>
                                                            <a href="{{ route('produk.edit', encrypt($item->id)) }}" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                                </svg>
                                                            </a>
                                                        </li>
                                                        @endcan
                                                        
                                                        @can ('Produk Delete')
                                                        <li>
                                                            <a href="{{ route('produk.destroy', encrypt($item->id)) }}" onclick="return confirm('Yakin anda akan menghapus kategori {{ $item->name }}?')" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                </svg>
                                                            </a>
                                                        </li>
                                                        @endcan
                                                    </ul>
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
