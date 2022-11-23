@extends('backend.layouts.master-lainnya')

@section('content')

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        
        <div class="middle-content container-xxl p-0">
            
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboadr</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Role</li>
                    </ol>
                </nav>
            </div>

            <div class="row ">
                <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">                                
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Form Role</h4>
                                </div>                                                                        
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            
                            <form action="{{ route('role.update', $role->id ) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <input type="text" name="name" value="{{ old('name') ?? $role->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Role Name *">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <input type="text" name="guard_name"  value="{{ old('guard_name') ?? $role->guard_name }}" class="form-control @error('guard_name') is-invalid @enderror"  placeholder="Guard Name *">
                                        @error('guard_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">update</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
        
        @include('backend.layouts.footer')
        
    </div>
    
    @endsection