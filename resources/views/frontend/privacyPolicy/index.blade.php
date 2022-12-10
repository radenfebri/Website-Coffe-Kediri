@extends('frontend.layouts.default')

@section('title', 'Kebijakan')

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Beranda</a>                    
                <span></span> Kebijakan
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-page pr-30 mb-lg-0 mb-sm-5">
                        <div class="single-header style-2">
                            <h2>Kebijakan</h2>                                
                        </div>   
                        
                        @if ($privacy_policy)
                        <div class="single-content">
                            <p>{!! $privacy_policy->deskripsi !!}</p>
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
