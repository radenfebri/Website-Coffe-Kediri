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
                            
                            <form action="{{ route('assignpermission.store') }}" method="POST">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <h6>Select Role</h6>
                                            <fieldset class="form-group">
                                                <select class="form-select @error('role') is-invalid @enderror " name="role" id="role" required>
                                                    <option disabled selected>--Pilih Role--</option>
                                                    @foreach ($roles as $item)
                                                    @if ($item->name == 'Super Admin')
                                                    
                                                    @else
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endif
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
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="row layout-spacing">
                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">
                            <table id="style-3" class="table style-3 dt-table-hover">
                                <thead>
                                    <tr>
                                        <th class="checkbox-column text-center"> NO </th>
                                        <th>Role Name</th>
                                        <th>Permission</th>
                                        <th class="text-center dt-no-sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($roles as $no => $item)
                                    <tr>
                                        <td class="checkbox-column text-center"> {{ $no + 1 }} </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ implode(', ', $item->getPermissionNames()->toArray() ) }}</td>
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                @if ($item->name == 'Super Admin')
                                                @else
                                                <li>
                                                    <a href="{{ route('assignpermission.edit', encrypt($item->id) ) }}"  class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                        </svg>
                                                    </a>
                                                </li>
                                                @endif
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





@endsection
