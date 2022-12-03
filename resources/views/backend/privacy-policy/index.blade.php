@extends('backend.layouts.master-lainnya')

@section('content')

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        
        <div class="middle-content container-xxl p-0">
            
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
                    </ol>
                </nav>
            </div>
            
            @if ($privacy_policy)
                <div class="row mb-4 layout-spacing layout-top-spacing">
                    
                    <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <form action="{{ route('privacy-policy-admin.update', $privacy_policy->id ) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="widget-content widget-content-area blog-create-section">
                                
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <label>Deskripsi Privacy Policy<span class="text-danger">*</span></label>
                                        <textarea  name="deskripsi" id="summernote" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Isi Deskripsi">{{ old('deskripsi') ?? $privacy_policy->deskripsi }}</textarea>
                                        @error('deskripsi')
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
                                    
                                    @can('Privacy Policy Update')
                                    <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                        <button class="btn btn-success w-100" type="submit">Update Data</button>
                                    </div>
                                    @endcan
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
            @else
                <div class="row mb-4 layout-spacing layout-top-spacing">                   
                    <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <form action="{{ route('privacy-policy-admin.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="widget-content widget-content-area blog-create-section">
                                
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <label>Deskripsi Privacy Policy<span class="text-danger">*</span></label>
                                        <textarea  name="deskripsi" id="summernote" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Isi Deskripsi">{{ old('deskripsi') }}</textarea>
                                        @error('deskripsi')
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
                                    
                                    @can('Privacy Policy Store')
                                    <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                        <button class="btn btn-success w-100" type="submit">Submit Data</button>
                                    </div>
                                    @endcan
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
            @endif

            
            
            @include('backend.layouts.footer')
            
            
        </div>    
    </div>
</div>

@include('backend.layouts.includes.script-summernote')

@endsection
