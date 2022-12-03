@extends('backend.layouts.master-lainnya')

@section('content')

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        
        <div class="middle-content container-xxl p-0">
            
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kategori Produk</li>
                    </ol>
                </nav>
            </div>
            
            <div class="row mb-4 layout-spacing layout-top-spacing">
                
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <form action="{{ route('promosi-navbar.update', $promosi_navbar->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="widget-content widget-content-area blog-create-section">
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Title</label>
                                    <input name="title" class="form-control @error('title') is-invalid @enderror" id="post-title" value="{{ old('title') ?? $promosi_navbar->title }}" placeholder="Title">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Link Slide</label>
                                    <input type="text" name="link" value="{{ old('link') ?? $promosi_navbar->link }}" class="form-control @error('link') is-invalid @enderror" id="post-title" placeholder="http://www.link.com/">
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
                                    <input type="text" name="button_text" value="{{ old('button_text') ?? $promosi_navbar->button_text }}" class="form-control @error('button_text') is-invalid @enderror" id="post-title" placeholder="Click Here">
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
                                            <input type="hidden" name="status" id="status" value="0">
                                            <input class="switch-input" type="checkbox" role="switch" id="showPublicly" value="1" name="status" {{ $promosi_navbar->status || old('status', 0) === 1 ? 'checked':'' }}>
                                            <label class="switch-label" for="showPublicly">Publish</label>
                                        </div>
                                    </div>
                                </div>
                                
                                @can('Navbar Promosi Update')
                                <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                    <button class="btn btn-success w-100" type="submit">Update Promosi</button>
                                </div>
                                @endcan
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            
            @include('backend.layouts.footer')
            
            
        </div>    
    </div>
</div>

@endsection
