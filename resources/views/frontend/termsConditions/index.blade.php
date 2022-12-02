@extends('frontend.layouts.default')

@section('title', 'Terms Conditions')

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>                    
                <span></span> Terms & Conditions
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-page pr-30 mb-lg-0 mb-sm-5">
                        <div class="single-header style-2">
                            <h2>Terms & Conditions</h2>                                
                        </div>   
                        
                        @if ($terms_conditions)
                        <div class="single-content">
                            <p>{!! $terms_conditions->deskripsi !!}</p>
                        </div>
                        @else
                        
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
