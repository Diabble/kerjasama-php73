@extends('layouts.master')
@section('title','Berita')
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
                <a href="/berita">Berita</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Blog Start -->
<div class="blog">
    <div class="container">
        <div class="section-header">
            <h3>Latest From Blog</h3>
        </div>
        <div class="row blog-page">
            @forelse ($tangkap1 as $item)
                <div class="col-lg-4 col-md-6 blog-item">
                    <img src="{{ asset('storage/' . $item->poto) }}" alt="Image">
                    <h3>{{ $item->judul }}</h3>
                    <div class="meta">
                        <i class="fa fa-list-alt"></i>
                        <a href="">{{ $item->kategori->nama_kategori }}</a>
                        <i class="fa fa-calendar-alt"></i>
                        <p>{{ $item->created_at->translatedFormat('l, d F Y') }}</p>
                    </div>
                    <p>{!! $item->deskripsi !!}</p>
                    <a class="btn" href="{{ route('berita-detail', $item->slug) }}">Read More <i class="fa fa-angle-right"></i></a>
                </div>
            @empty
                <p>Data Masih Kosong</p>
            @endforelse
            {{-- <div class="col-lg-4 col-md-6 blog-item">
                <img src="{{asset('assets')}}/img/blog-1.jpg" alt="Blog">
                <h3>Lorem ipsum dolor</h3>
                <div class="meta">
                    <i class="fa fa-list-alt"></i>
                    <a href="">Civil Law</a>
                    <i class="fa fa-calendar-alt"></i>
                    <p>01-Jan-2045</p>
                </div>
                <p>
                    Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor
                </p>
                <a class="btn" href="">Read More <i class="fa fa-angle-right"></i></a>
            </div>
            <div class="col-lg-4 col-md-6 blog-item">
                <img src="{{asset('assets')}}/img/blog-2.jpg" alt="Blog">
                <h3>Lorem ipsum dolor</h3>
                <div class="meta">
                    <i class="fa fa-list-alt"></i>
                    <a href="">Family Law</a>
                    <i class="fa fa-calendar-alt"></i>
                    <p>01-Jan-2045</p>
                </div>
                <p>
                    Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor
                </p>
                <a class="btn" href="">Read More <i class="fa fa-angle-right"></i></a>
            </div>
            <div class="col-lg-4 col-md-6 blog-item">
                <img src="{{asset('assets')}}/img/blog-3.jpg" alt="Blog">
                <h3>Lorem ipsum dolor</h3>
                <div class="meta">
                    <i class="fa fa-list-alt"></i>
                    <a href="">Business Law</a>
                    <i class="fa fa-calendar-alt"></i>
                    <p>01-Jan-2045</p>
                </div>
                <p>
                    Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor
                </p>
                <a class="btn" href="">Read More <i class="fa fa-angle-right"></i></a>
            </div>
            <div class="col-lg-4 col-md-6 blog-item">
                <img src="{{asset('assets')}}/img/blog-1.jpg" alt="Blog">
                <h3>Lorem ipsum dolor</h3>
                <div class="meta">
                    <i class="fa fa-list-alt"></i>
                    <a href="">Education Law</a>
                    <i class="fa fa-calendar-alt"></i>
                    <p>01-Jan-2045</p>
                </div>
                <p>
                    Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor
                </p>
                <a class="btn" href="">Read More <i class="fa fa-angle-right"></i></a>
            </div>
            <div class="col-lg-4 col-md-6 blog-item">
                <img src="{{asset('assets')}}/img/blog-2.jpg" alt="Blog">
                <h3>Lorem ipsum dolor</h3>
                <div class="meta">
                    <i class="fa fa-list-alt"></i>
                    <a href="">Criminal Law</a>
                    <i class="fa fa-calendar-alt"></i>
                    <p>01-Jan-2045</p>
                </div>
                <p>
                    Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor
                </p>
                <a class="btn" href="">Read More <i class="fa fa-angle-right"></i></a>
            </div>
            <div class="col-lg-4 col-md-6 blog-item">
                <img src="{{asset('assets')}}/img/blog-3.jpg" alt="Blog">
                <h3>Lorem ipsum dolor</h3>
                <div class="meta">
                    <i class="fa fa-list-alt"></i>
                    <a href="">Cyber Law</a>
                    <i class="fa fa-calendar-alt"></i>
                    <p>01-Jan-2045</p>
                </div>
                <p>
                    Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor
                </p>
                <a class="btn" href="">Read More <i class="fa fa-angle-right"></i></a>
            </div>
            <div class="col-lg-4 col-md-6 blog-item">
                <img src="{{asset('assets')}}/img/blog-1.jpg" alt="Blog">
                <h3>Lorem ipsum dolor</h3>
                <div class="meta">
                    <i class="fa fa-list-alt"></i>
                    <a href="">Property Law</a>
                    <i class="fa fa-calendar-alt"></i>
                    <p>01-Jan-2045</p>
                </div>
                <p>
                    Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor
                </p>
                <a class="btn" href="">Read More <i class="fa fa-angle-right"></i></a>
            </div>
            <div class="col-lg-4 col-md-6 blog-item">
                <img src="{{asset('assets')}}/img/blog-2.jpg" alt="Blog">
                <h3>Lorem ipsum dolor</h3>
                <div class="meta">
                    <i class="fa fa-list-alt"></i>
                    <a href="">Political Law</a>
                    <i class="fa fa-calendar-alt"></i>
                    <p>01-Jan-2045</p>
                </div>
                <p>
                    Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor
                </p>
                <a class="btn" href="">Read More <i class="fa fa-angle-right"></i></a>
            </div>
            <div class="col-lg-4 col-md-6 blog-item">
                <img src="{{asset('assets')}}/img/blog-3.jpg" alt="Blog">
                <h3>Lorem ipsum dolor</h3>
                <div class="meta">
                    <i class="fa fa-list-alt"></i>
                    <a href="">Social Law</a>
                    <i class="fa fa-calendar-alt"></i>
                    <p>01-Jan-2045</p>
                </div>
                <p>
                    Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor
                </p>
                <a class="btn" href="">Read More <i class="fa fa-angle-right"></i></a>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul> 
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->

@endsection