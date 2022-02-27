@extends('layout.master')
@section('title','Alur Kerjasama')
@section('content')

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>{!! $tangkap2->deskripsicarousel !!}</h3>
            </div>
            <div class="col-12">
                <a href="/">Home</a>
                <a href="/alur">Alur</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Single Page Start -->
<div class="single">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="about-img img-fluid">
                    <img src="{{ asset('storage/' . $tangkap1->poto) }}" alt="Image" style="display:block; margin:auto;">
                </div>
                <p>{!! $tangkap1->deskripsi !!}</p>
            </div>
        </div>
    </div>
</div>
<!-- Single Page End -->

@endsection