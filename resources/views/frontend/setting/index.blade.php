@extends('frontend.layouts.default')

@section('title', 'Setting')

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>
                <span></span> Setting
            </div>
        </div>
    </div>
    <div class="form-setting">
        <div class="container">
            <form class="form-setting">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="nama">
                </div>
                <div class="mb-3">
                  <label class="form-label">No Telepon</label>
                  <input type="number" class="form-control " id="">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="">
                </div>
                <div class="mb-3 kode-pos">
                    <label class="form-label">Kode Pos</label>
                    <input type="text" class="form-control" id="">
                </div>
                <button type="submit" class="btn-default">Apply</button>
              </form>
        </div>
    </div>
</main>
@endsection