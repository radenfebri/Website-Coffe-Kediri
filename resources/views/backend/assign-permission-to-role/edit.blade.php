@extends('backend.layouts.master-lainnya')

@section('content')

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        
        <div class="middle-content container-xxl p-0">
            
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Assign Permission to Role</li>
                    </ol>
                </nav>
            </div>
            
            <div class="row ">
                <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">                                
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Form Assign Permission to Role</h4>
                                </div>                                                                        
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            
                            <form action="{{ route('assignpermission.update', $role->id ) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <h6>Select Role</h6>
                                            <fieldset class="form-group">
                                                <select class="form-select @error('role') is-invalid @enderror" name="role" id="role">
                                                    @foreach ($roles as $item)
                                                        <option {{ $role->id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('role')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <div class="form-group mt-4">
                                            <h6>Select Permission</h6>
                                            <div class="form-group">
                                                <select id="permissions" name="permissions[]" class="form-control @error('permissions') is-invalid @enderror" multiple="multiple">
                                                    <optgroup label="--Pilih Permission--">
                                                        @foreach ($permissions as $item)
                                                        <option {{ $role->permissions()->find($item->id) ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                    @error('permissions')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
        
        @include('backend.layouts.footer')
        
    </div>
</div>    


@endsection
