@extends('layouts.master')
@section('title','Beranda')
@section('content')
			
<!-- 
=============================================
	Theme Main Banner
============================================== 
-->
<div id="theme-main-banner" class="banner-one">
	<?php $count = 1;?>
	@foreach ( $tangkap1 as $row )
	<div data-src="{{ asset('storage/' . $row->poto) }}" class="@if($count == 1) active @endif">
		<div class="camera_caption">
			<div class="container">
				<p class="wow fadeInUp animated">{{ $row->judulcarousel }}</p>
				<h1 class="wow fadeInUp animated" data-wow-delay="0.2s">{!! $row->deskripsicarousel !!}</h1>
				<a href="/mitra" class="theme-button-one wow fadeInUp animated" data-wow-delay="0.39s">MITRA</a>
			</div> <!-- /.container -->
		</div> <!-- /.camera_caption -->
	</div>
	<?php $count++;?>
	@endforeach
</div> <!-- /#theme-main-banner -->


<!-- 
=============================================
	About Company Style Two
============================================== 
-->
<div class="about-compnay-two section-spacing">
	<div class="overlay">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-lg-6 col-12 text">
					<div class="theme-title-one">
						<h2>ABOUT US</h2>
					</div> <!-- /.theme-title-one -->
					<p>A tale of a fateful trip that started from this tropic port aboard this tiny ship today still wanted by the government they survive as soldiers of fortune to a deluxe you apartment in the sky to explore strange new worlds to seek out new life and new civilizations to boldly go where no man has gone.</p>
					<p>You would see the biggest gift would be from me and the card attached would so thank you for being a friend the biggest gift.</p>
					<img src="images/home/sign.png" alt="" class="sign">
				</div> <!-- /.col- -->
				<div class="col-lg-6 col-12 wrap">
					<iframe class="rounded" width="560" height="315" src="https://www.youtube.com/embed/yprwfSH4h9c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					{{-- <div class="img-box">
						<a data-fancybox href="https://www.youtube.com/watch?v=yprwfSH4h9c" class="play">
							<i class="fa fa-play" aria-hidden="true"></i>
						</a>
					</div> --}}
				</div>
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</div> <!-- /.overlay -->
</div> <!-- /.about-compnay-two -->


<!-- 
=============================================
	About Wakil Rektor
============================================== 
-->
<div class="about-compnay section-spacing">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-12 text-center">
				<img src="{{ asset('storage/' . $tangkap2->poto) }}" alt="img" style="width: 50%; display: initial;">
			</div>
			<div class="col-lg-6 col-12">
				<div class="text">
					<div class="theme-title-one">
						<h2 style="text-align: center;">Sambutan Wakil Rektor</h2>
						{{-- <p>{!! $tangkap2->deskripsi !!}</p> --}}
						<p>
							{!! Str::substr($tangkap2->deskripsi, 0, 300) !!}
						</p>
					</div> <!-- /.theme-title-one -->
					<div class="row mt-3">
						<div class="col-lg-6">
							<p><strong>{{ $tangkap2->nama }}</strong></p>
							<p>{{ $tangkap2->jabatan }}</p>
							<p>NIP. {{ $tangkap2->nip }}</p>
						</div>
						<div class="col-lg-6">
							<a class="theme-button-one float-right" href="/wakil-rektor">Selanjutnya</a>
						</div>
					</div>
				</div> <!-- /.text -->
			</div> <!-- /.col- -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</div> <!-- /.about-compnay -->


<!--
=====================================================
	Free Consultation
=====================================================
-->
<div class="consultation-form section-spacing">
	<div class="container">
		{{-- <div class="theme-title-one">
			<h2 style="text-align: center;">Statistik Kerjasama</h2>
			<p style="text-align: center;">Bagian Kerjasama dan Pengembangan Lembaga UIN Sunan Gunung Djati Bandung</p>
		</div> <!-- /.theme-title-one --> --}}
		<div class="clearfix main-content no-gutters row">
			<div class="col-xl-6 col-lg-5 col-12">
				<div class="form-wrapper">
					<div class="theme-title-one">
						<h2 style="text-align: center;">Statistik Kerjasama</h2>
						<p style="text-align: justify;">Bagian Kerjasama dan Pengembangan Lembaga UIN Sunan Gunung Djati Bandung</p>
						<div class="row">
							<div class="col-lg-12 pt-4">
								<a class="theme-button-one float-left" href="/wakil-rektor">Selanjutnya</a>
							</div>
						</div>
					</div> <!-- /.theme-title-one -->
				</div> <!-- /.form-wrapper -->
			</div>
			<div class="col-xl-6 col-lg-7 col-12">
				<div class="center" id="piechart" style="width: 700px; height: 400px;"></div>
			</div> <!-- /.col- -->
		</div> <!-- /.main-content -->
	</div> <!-- /.container -->
</div> <!-- /.consultation-form -->


<!--
=====================================================
	Latest News
=====================================================
-->
<div class="our-blog latest-news section-spacing">
	<div class="container">
		<div class="theme-title-one text-center">
			<h2>Berita Terbaru</h2>
			<p>A tale of a fateful trip that started from this tropic port aboard this tiny ship today stillers </p>
		</div> <!-- /.theme-title-one -->
		<div class="wrapper">
			<div class="clearfix">
				<div class="latest-news-slider">
					<div class="item">
						<div class="single-blog">
							<div class="image-box">
								<img src="{{ asset('assets') }}/front/images/blog/3.jpg" alt="">
								<div class="overlay"><a href="#" class="date">Feb 06, 2018</a></div>
							</div> <!-- /.image-box -->
							<div class="post-meta">
								<h5 class="title"><a href="blog-details.html">Trouble with the law since to eastern side of yellow mint</a></h5>
								<a href="blog-details.html" class="read-more">READ MORE</a>
							</div> <!-- /.post-meta -->
						</div> <!-- /.single-blog -->
					</div> <!-- /.col- -->
					<div class="item">
						<div class="single-blog">
							<div class="image-box">
								<img src="{{ asset('assets') }}/front/images/blog/4.jpg" alt="">
								<div class="overlay"><a href="#" class="date">Mar 30, 2018</a></div>
							</div> <!-- /.image-box -->
							<div class="post-meta">
								<h5 class="title"><a href="blog-details.html">Kind of torture to have to watch the show the one day</a></h5>
								<a href="blog-details.html" class="read-more">READ MORE</a>
							</div> <!-- /.post-meta -->
						</div> <!-- /.single-blog -->
					</div> <!-- /.col- -->
					<div class="item">
						<div class="single-blog">
							<div class="image-box">
								<img src="{{ asset('assets') }}/front/images/blog/5.jpg" alt="">
								<div class="overlay"><a href="#" class="date">Apr 14, 2018</a></div>
							</div> <!-- /.image-box -->
							<div class="post-meta">
								<h5 class="title"><a href="blog-details.html">Make the best of things its an uphill climb long time</a></h5>
								<a href="blog-details.html" class="read-more">READ MORE</a>
							</div> <!-- /.post-meta -->
						</div> <!-- /.single-blog -->
					</div> <!-- /.col- -->
				</div> <!-- /.latest-news-slider -->
			</div> <!-- /.row -->
		</div> <!-- /.wrapper -->
	</div> <!-- /.container -->
</div> <!-- /.our-blog -->


@endsection