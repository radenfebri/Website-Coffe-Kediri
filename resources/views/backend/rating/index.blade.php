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
                                <a href="{{ route('rating.index') }}" class="text-primary" >
                                    <button class="btn btn-success btn-sm">Rating Active</button>
                                </a>
                                <a href="{{ route('rating.nonactive') }}" class="text-primary" >
                                    <button class="btn btn-danger btn-sm">Rating Non-Active</button>
                                </a>
                            </div>
                            <table id="style-3" class="table style-3 dt-table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center"> Record Id </th>
                                        <th class="text-center">Tanggal Rating</th>
                                        <th class="text-center">User</th>
                                        <th class="text-center">Star</th>
                                        <th class="text-center">Produk</th>
                                        <th class="text-center">Review</th>
                                        <th class="text-center dt-no-sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rating as $no => $item)
                                    
                                    <tr>
                                        <td class="text-center">{{ $no + 1 }}</td>
                                        <td class="text-center">{{ date('d F Y H:i:s', strtotime($item->created_at)) }}</td>
                                        <td class="text-center">{{ $item->user->name }}</td>
                                        <td class="text-center">{{ $item->stars_rated }}</td>
                                        <td class="text-center">{{ $item->produk->name }}</td>
                                        <td class="text-center">{{ \Illuminate\Support\Str::words($item->user_review, 5, '...') }}</td>
                                        
                                        <td class="text-center">
                                            <a href="{{ route('rating.edit', encrypt($item->id) ) }}"  class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                            </a>
                                        </td>
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
