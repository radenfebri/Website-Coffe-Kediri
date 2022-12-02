@extends('frontend.layouts.default')

@section('title', 'About')

@section('content')
<main class="main single-page">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>                    
                <span></span> About us
            </div>
        </div>
    </div>
    
    @if ($about)
    <section class="section-padding">
        <div class="container pt-25">
            <div class="row">
                <div class="col-lg-6 align-self-center mb-lg-0 mb-4">
                    <h6 class="mt-0 mb-15 text-uppercase font-sm text-brand wow fadeIn animated">{{ $about->title1 }}</h6>
                    <h1 class="font-heading mb-40">
                        {{ $about->title2 }}
                    </h1>
                    <p> {!! $about->deskripsi !!}</p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('storage/' . $about->image ) }}" loading="lazy" alt=" {{ $about->title2 }}">
                </div>
            </div>
        </div>
    </section>
    @else
    
    @endif
    
    
    
    
    <section class="contact">                
        <section class="pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 m-auto">
                        <div class="contact-from-area padding-20-row-col wow FadeInUp">
                            <h3 class="mb-10 text-center">Contact</h3>
                            <p class="text-muted mb-30 text-center font-sm">Hubungi kami melalui form di bawah apabila ada kepentingan lain.</p>
                            <form class="contact-form-style text-center" id="contact-form" action="{{ route('contact-store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="name" placeholder="First Name" type="text" class="form-control @error('name') is-invalid @enderror">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="email" placeholder="Your Email" type="email" class="form-control @error('email') is-invalid @enderror">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="phone" placeholder="Your Phone" type="tel" class="form-control @error('phone') is-invalid @enderror">
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="subject" placeholder="Subject" type="text" class="form-control @error('subject') is-invalid @enderror">
                                            @error('subject')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="textarea-style mb-30">
                                            <textarea name="deskripsi" placeholder="Message" class="@error('deskripsi') is-invalid @enderror"></textarea>
                                            @error('deskripsi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <button class="submit submit-auto-width" type="submit">Kirim Pesan</button>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>                
</main>
@endsection