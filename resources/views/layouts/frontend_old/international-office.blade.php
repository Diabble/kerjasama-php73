@extends('layouts.master')
@section('title','International Office')
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
                            <a href="/tugas-pokok-fungsi">International Office</a>
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
                            @foreach ( $io as $row )
                                <p>{!! $row->deskripsi !!}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Page End -->

@endsection