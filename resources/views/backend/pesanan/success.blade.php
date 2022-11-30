@extends('backend.layouts.master-lainnya')

@section('content')

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        
        <div class="middle-content container-xxl p-0">
            
            <div class="page-meta mb-4">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manajemen Pesanan</li>
                    </ol>
                </nav>
            </div>
            
            
            
            <div class="row layout-spacing">
                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">
                            <div class="manajemen-pesanan-layout">
                                <div>
                                    @can ('halaman-pesanan')
                                    <a href="{{ route('pesanan.index') }}" class="text-primary mr-2 mb-2" >
                                        <button class="btn btn-danger btn-sm button-manajemen-pesanan">Pesanan Unpaid</button>
                                    </a>
                                    @endcan
                                    
                                    @can ('pesanan-packing')
                                    <a href="{{ route('pesanan.packing') }}" class="text-info mr-2 mb-2" >
                                        <button class="btn btn-info btn-sm button-manajemen-pesanan">Pesanan Packing</button>
                                    </a>
                                    @endcan
                                </div>
                                
                                <div>
                                    @can ('pesanan-kirim')
                                    <a href="{{ route('pesanan.kirim') }}" class="text-warning mr-2 mb-2" >
                                        <button class="btn btn-warning btn-sm button-manajemen-pesanan">Pesanan Kirim</button>
                                    </a>
                                    @endcan
                                    
                                    @can ('pesanan-success')
                                    <a href="{{ route('pesanan.success') }}" class="text-success mr-2 mb-2" >
                                        <button class="btn btn-success btn-sm button-manajemen-pesanan">Pesanan Selesai</button>
                                    </a>
                                    @endcan
                                </div>
                            </div>
                            <table id="style-3" class="table style-3 dt-table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center"> Record Id </th>
                                        <th class="text-center">Tanggal Order</th>
                                        <th class="text-center">Tracking Number</th>
                                        <th class="text-center">Total Price</th>
                                        <th class="text-center">Metode</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center dt-no-sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $no => $item)
                                    
                                    <tr>
                                        <td class="text-center">{{ $no + 1 }}</td>
                                        <td class="text-center">{{ date('d F Y H:i:s', strtotime($item->created_at)) }}</td>
                                        <td class="text-center">{{ $item->tracking_no }}</td>
                                        <td class="text-center">{{ number_format($item->total_price) }}</td>
                                        <td class="text-center">{{ $item->metode }}</td>
                                        @if ($item->status == 0)
                                        <td class="text-center"><span class="shadow-none badge badge-danger">Unpaid</span></td>
                                        @elseif ($item->status == 1)
                                        <td class="text-center"><span class="shadow-none badge badge-info">Packing</span></td>
                                        @elseif ($item->status == 2)
                                        <td class="text-center"><span class="shadow-none badge badge-warning">Kirim</span></td>
                                        @elseif ($item->status == 3)
                                        <td class="text-center"><span class="shadow-none badge badge-success">Selesai</span></td>
                                        @endif
                                        
                                        @can ('pesanan-edit')
                                        <td class="text-center">
                                            <a href="{{ route('pesanan.edit', encrypt($item->id) ) }}"  class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                            </a>
                                        </td>
                                        @endcan
                                    </tr>
                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            @include('backend.layouts.footer')
            
            
        </div>    
        
        
        
    </div>
</div>


@endsection
