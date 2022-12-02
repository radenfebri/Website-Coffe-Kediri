@extends('backend.layouts.master-lainnya')

@section('content')

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        
        <div class="middle-content container-xxl p-0">
            
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Slide & Promosi</li>
                    </ol>
                </nav>
            </div>
            
            <div class="row mb-4 layout-spacing layout-top-spacing">
                
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <form action="{{ route('tiga-promosi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="widget-content widget-content-area blog-create-section">
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Title 1</label>
                                    <input name="title1" class="form-control @error('title1') is-invalid @enderror" id="post-title" value="{{ old('title1') }}" placeholder="Title 1">
                                    @error('title1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Title 2</label>
                                    <input name="title2" class="form-control @error('title2') is-invalid @enderror" id="post-title" value="{{ old('title2') }}" placeholder="Title 2">
                                    @error('title2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Link Slide</label>
                                    <input type="text" name="link" value="{{ old('link') }}" class="form-control @error('link') is-invalid @enderror" id="post-title" placeholder="http://www.link.com/">
                                    @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Button Text</label>
                                    <input type="text" name="button_text" value="{{ old('button_text') }}" class="form-control @error('button_text') is-invalid @enderror" id="post-title" placeholder="Click Here">
                                    @error('button_text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0 mt-4">
                        <div class="widget-content widget-content-area blog-create-section">
                            <div class="row">
                                <div class="col-xxl-12 col-md-12 mb-4">
                                    <div class="col-xxl-12 mb-4">
                                        <div class="switch form-switch-custom switch-inline form-switch-primary">
                                            <input class="switch-input" type="checkbox" role="switch" id="showPublicly" name="status">
                                            <label class="switch-label" for="showPublicly">Publish</label>
                                        </div>
                                    </div>
                                    
                                    <label for="product-images">Image<span class="text-danger">*</span></label>
                                    <div class="multiple-file-upload">
                                        <input class="form-control @error('iamge') is-invalid @enderror file-upload-input" name="image" type="file">
                                    </div>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                    <button class="btn btn-success w-100" type="submit">Submit Slide</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </form>
                
                
                
            </div>
            
            <div class="row layout-spacing">
                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">
                            <table id="style-3" class="table style-3 dt-table-hover">
                                <thead>
                                    <tr>
                                        <th class="checkbox-column text-center"> Record Id </th>
                                        <th class="text-center">Image</th>
                                        <th>Link & Button</th>
                                        <th>Status</th>
                                        <th class="text-center dt-no-sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tiga_promosi as $no => $item)
                                    
                                    <tr>
                                        <td class="checkbox-column text-center"> {{ $no + 1 }} </td>
                                        <td class="text-center">
                                            @if ($item->image)
                                            <span><img src="{{ asset('storage/'. $item->image ) }}" class="profile-img" loading="lazy" alt="{{ $item->name }}"></span>
                                            @else
                                            <span><img src="{{ asset('back') }}/src/assets/img/profile-17.jpeg" class="profile-img" loading="lazy" alt="{{ $item->name }}"></span>
                                            @endif
                                        </td>
                                        <td><a class="btn btn-sm btn-primary" href="{{ $item->link }}" target="_blank">{{ $item->button_text }}</a></td>
                                        @if ($item->status == 1)
                                        <td class="text-center"><span class="shadow-none badge badge-success">Active</span></td>
                                        @else
                                        <td class="text-center"><span class="shadow-none badge badge-danger">Inactive</span></td>
                                        @endif
                                        
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <li>
                                                    <a href="{{ route('tiga-promosi.edit', encrypt($item->id)) }}" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                        </svg>
                                                    </a>
                                                </li>
                                                
                                                <li>
                                                    <a href="{{ route('tiga-promosi.destroy', encrypt($item->id)) }}" onclick="return confirm('Yakin anda akan menghapus rekening {{ $item->kategori }}?')" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        </svg>
                                                    </a>
                                                </li>
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
            
            @include('backend.layouts.footer')
            
        </div>    
    </div>
</div>

@endsection
