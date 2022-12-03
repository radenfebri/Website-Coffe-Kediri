@extends('backend.layouts.master-lainnya')

@section('content')

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        
        <div class="middle-content container-xxl p-0">
            
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact {{ $contact->name }}</li>
                    </ol>
                </nav>
            </div>
            
            <div class="row mb-4 layout-spacing layout-top-spacing">
                
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="widget-content widget-content-area blog-create-section">
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Name<span class="text-danger">*</span></label>
                                    <div class="">
                                        <b>{{ $contact->name }}</b>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Email<span class="text-danger">*</span></label>
                                    <div class="">
                                        <b>{{ $contact->email }}</b>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Phone<span class="text-danger">*</span></label>
                                    <div class="">
                                        <b>{{ $contact->phone }}</b>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Subject<span class="text-danger">*</span></label>
                                    <div class="">
                                        <b>{{ $contact->subject }}</b>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label>Pesan<span class="text-danger">*</span></label>
                                    <div class="">
                                        <b>{{ $contact->deskripsi }}</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0 mt-4">
                        <div class="widget-content widget-content-area blog-create-section">
                            <div class="row">
                                <div class="col-xxl-12 mb-4">
                                    <div class="switch form-switch-custom switch-inline form-switch-primary">
                                        <a href="{{ route('contact-company.index') }}" class="switch-label btn btn-info btn-block" for="showPublicly">Kembali</a>
                                    </div>
                                </div>
                                <div class="col-xxl-12 mb-4">
                                    <div class="switch form-switch-custom switch-inline form-switch-primary">
                                        <a href="mailto:{{ $contact->email }}" target="_blank" class="switch-label btn btn-danger btn-block" for="showPublicly">Balas to Email</a>
                                    </div>
                                </div>
                                <div class="col-xxl-12 mb-4">
                                    <div class="switch form-switch-custom switch-inline form-switch-primary">
                                        <a href="tel:{{ $contact->phone }}" target="_blank" class="switch-label btn btn-primary btn-block" for="showPublicly">Balas to Phone</a>
                                    </div>
                                </div>
                                <div class="col-xxl-12 mb-4">
                                    <div class="switch form-switch-custom switch-inline form-switch-primary">
                                        <a href="https://wa.me/{{ $contact->phone }}" target="_blank" class="switch-label btn btn-success btn-block" for="showPublicly">Balas to WhasApp</a>
                                    </div>
                                </div>
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
