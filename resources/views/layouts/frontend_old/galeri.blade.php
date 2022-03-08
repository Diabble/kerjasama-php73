@extends('layouts.master')
@section('title','Galeri')
@section('content')

            <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3>{!! $tangkap2->deskripsicarousel !!}</h3>
                        <div class="col-12">
                            <a href="/">Home</a>
                            <a href="/galeri">Galeri</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->


            <!-- Gallery Start -->
            <div class="gallery">
                <div class="container">
                    <div class="row">
                        <div class="gallery__column">
                            <div class="gallery__link">
                                <figure class="gallery__thumb">
                                    <img src="https://source.unsplash.com/_cvwXhGqG-o/300x300" class="gallery__image">
                                    <figcaption class="gallery__caption">Portrait by Jessica Felicio</figcaption>
                                </figure>
                            </div>

                            <div class="gallery__link">
                                <figure class="gallery__thumb">
                                    <img src="https://source.unsplash.com/AHBvAIVqk64/300x500" class="gallery__image">
                                    <figcaption class="gallery__caption">Portrait by Oladimeji Odunsi</figcaption>
                                </figure>
                            </div>
                        </div>
                        
                        <div class="gallery__column">
                            <div class="gallery__link">
                                <figure class="gallery__thumb">
                                    <img src="https://source.unsplash.com/AR7aumwKr2s/300x300" class="gallery__image">
                                    <figcaption class="gallery__caption">Portrait by Noah Buscher</figcaption>
                                </figure>
                            </div>
                            
                            <div class="gallery__link">
                                <figure class="gallery__thumb">
                                    <img src="https://source.unsplash.com/dnL6ZIpht2s/300x300" class="gallery__image">
                                    <figcaption class="gallery__caption">Portrait by Ivana Cajina</figcaption>
                                </figure>
                            </div>
                        </div>
                        
                        <div class="gallery__column">
                            <div class="gallery__link">
                                <figure class="gallery__thumb">
                                    <img src="https://source.unsplash.com/Xm9-vA_bhm0/300x500" class="gallery__image">
                                    <figcaption class="gallery__caption">Portrait by Mari Lezhava</figcaption>
                                </figure>
                            </div>
                            
                            <div class="gallery__link">
                                <figure class="gallery__thumb">
                                    <img src="https://source.unsplash.com/NTjSR3zYpsY/300x300" class="gallery__image">
                                    <figcaption class="gallery__caption">Portrait by Ethan Haddox</figcaption>
                                </figure>
                            </div>
                        </div>
                        
                        <div class="gallery__column">
                            <div class="gallery__link">
                                <figure class="gallery__thumb">
                                    <img src="https://source.unsplash.com/FQhLLehm4dk/300x300" class="gallery__image">
                                    <figcaption class="gallery__caption">Portrait by Guilian Fremaux</figcaption>
                                </figure>
                            </div>

                            <div class="gallery__link">
                                <figure class="gallery__thumb">
                                    <img src="https://source.unsplash.com/OQd9zONSx7s/300x300" class="gallery__image">
                                    <figcaption class="gallery__caption">Portrait by Jasmin Chew</figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Gallery End -->

@endsection