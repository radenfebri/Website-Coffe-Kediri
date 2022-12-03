@extends('backend.layouts.master-lainnya')

@section('content')

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        
        <div class="middle-content container-xxl p-0">
            
            <div class="page-meta mb-4">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manajemen Rating</li>
                    </ol>
                </nav>
            </div>
            
            <div class="row mb-4 layout-spacing layout-top-spacing">
                
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <form action="{{ route('rating.update', $rating->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="widget-content widget-content-area blog-create-section">
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Name User<span class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('user_id') ?? $rating->user->name }}" class="form-control @error('user_id') is-invalid @enderror" id="post-title" placeholder="Name Kategori Produk">
                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Name Produk<span class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('prod_id') ?? $rating->produk->name }}" class="form-control @error('prod_id') is-invalid @enderror" id="post-title" placeholder="Name Kategori Produk">
                                    @error('prod_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>User Rating<span class="text-danger">*</span></label>
                                    <select class="form-control @error('stars_rated') is-invalid @enderror" name="stars_rated" id="stars_rated">
                                        <option disabled selected>--Rating Dari User--</option>
                                        <option value="1" {{ $rating->stars_rated == '1' ? 'selected' : '' }}>Bintang (1)</option>
                                        <option value="2" {{ $rating->stars_rated == '2' ? 'selected' : '' }}>Bintang (2)</option>
                                        <option value="3" {{ $rating->stars_rated == '3' ? 'selected' : '' }}>Bintang (3)</option>
                                        <option value="4" {{ $rating->stars_rated == '4' ? 'selected' : '' }}>Bintang (4)</option>
                                        <option value="5" {{ $rating->stars_rated == '5' ? 'selected' : '' }}>Bintang (5)</option>
                                    </select>
                                    @error('stars_rated')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Description<span class="text-danger">*</span></label>
                                    <textarea  name="user_review" class="form-control @error('user_review') is-invalid @enderror" placeholder="Isi Deskripsi Pendek">{{ old('user_review') ?? $rating->user_review }}</textarea>
                                    @error('user_review')
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
                                <div class="col-xxl-12 mb-4">
                                    <div class="switch form-switch-custom switch-inline form-switch-primary">
                                        <input type="hidden" name="status" id="status" value="0">
                                        <input class="switch-input" type="checkbox" role="switch" id="showPublicly" value="1" name="status" {{ $rating->status || old('status', 0) === 1 ? 'checked':'' }}>
                                        <label class="switch-label" for="showPublicly">Active</label>
                                    </div>
                                </div>

                                @can('Manajemen Rating Update')
                                <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                    <button class="btn btn-success w-100" type="submit">Update Rating</button>
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
