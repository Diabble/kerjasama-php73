@extends('layouts.master')
@section('title','Sambutan Wakil Rektor')
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
                            <a href="/sambutan-wakil-rektor">Sambutan Wakil Rektor</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->


            <!-- About Start -->
            <div class="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="about-img img-fluid">
                                <img src="{{ asset('storage/' . $tangkap1->poto) }}" alt="Image" style="display:block; margin:auto;">
                            </div>
                            <div class="col-lg-12 col-md-6 mt-3 pt-3 text-center">
                                <p><strong>{{ $tangkap1->nama }}</strong></p>
                                <p>{{ $tangkap1->jabatan }}</p>
                                <p>NIP. {{ $tangkap1->nip }}</p>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="section-header">
                                <h3>Sambutan Wakil Rektor</h3>
                            </div>
                            <div class="about-text text-justify">
                                <p>{!! $tangkap1->deskripsi !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About End -->


@endsection