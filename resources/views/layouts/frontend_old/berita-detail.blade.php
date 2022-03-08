@extends('layouts.master')
@section('title','{{ $berita->judul }} - Kerjasama dan Pengembangan Lembaga')
@section('content')            

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>{!! $tangkap1->deskripsicarousel !!}</h3>
            </div>
            <div class="col-12">
                <a href="/berita">Berita</a>
                <a href="/berita-detail">{{ $berita->judul }}</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->



@endsection