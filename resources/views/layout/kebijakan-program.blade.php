@extends('layout.master')
@section('title','Kebijakan Dan Program')
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
                            <a href="/kebijakan-program">Kebijakan dan Program</a>
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
                            <p>{!! $tangkap1->deskripsi !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Page End -->

@endsection