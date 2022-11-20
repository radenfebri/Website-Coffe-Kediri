@extends('backend.layouts.master-lainnya')

@section('content')

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        
        <div class="middle-content container-xxl p-0">
            
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
                </nav>
            </div>
            
            <div class="row mb-4"></div>
            
            
            
            <div class="row layout-spacing">
                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">
                            <table id="style-3" class="table style-3 dt-table-hover">
                                <thead>
                                    <tr>
                                        <th class="checkbox-column dt-no-sorting"> Record no. </th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Role</th>
                                        <th>Login</th>
                                        <th class="text-center dt-no-sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $no => $item)
                                    <tr>
                                        <td class="checkbox-column text-center"> {{ $no + 1 }} </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{ implode(', ', $item->getRoleNames()->toArray() ) }}</td>
                                        <td>  
                                            @if ($item->email == 'febriye12@gmail.com')
                                            
                                            @else
                                            @env('local')
                                            <span class="shadow-none badge badge-primary">
                                                <x-login-link :user-attributes="['role' => '{{ implode(', ', $item->getRoleNames()->toArray() ) }}']" email="{{ $item->email }}" target="_blank" label="Login as {{ $item->name }}"/>
                                            </span>
                                                @endenv
                                                @endif
                                                
                                            </td>
                                            <td class="text-center">
                                                @if ($item->email == 'febriye12@gmail.com')
                                                
                                                @else
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                    </a>
                                                    
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                        <a class="dropdown-item" href="{{ route('change-password', encrypt($item->id) ) }}">Change Password</a>
                                                        @if ($item->status == 1)
                                                            <a class="dropdown-item" valuue="0" href="{{ route('status-akun', encrypt($item->id)) }}">Disable User</a>
                                                        @else
                                                            <a class="dropdown-item" value="1" href="{{ route('status-akun', encrypt($item->id)) }}">Enable User</a>
                                                        @endif
                                                    </div>
                                                </div>
                                                @endif
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
</div>
@endsection
