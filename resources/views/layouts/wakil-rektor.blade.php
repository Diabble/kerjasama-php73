@extends('layouts.master')
@section('title','Sambutan Wakil Rektor')
@section('content')

			
			<!-- 
			=============================================
				Theme Inner Banner
			============================================== 
			-->
			<div class="theme-inner-banner section-spacing">
				<div class="overlay">
					<div class="container">
						<h2>Sambutan Wakil Rektor</h2>
						{{-- <p>{!! $tangkap2->deskripsicarousel !!}</p> --}}
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.theme-inner-banner -->


			<!-- 
			=============================================
				CallOut Banner 
			============================================== 
			-->
			{{-- <div class="callout-banner no-bg">
				<div class="container clearfix">
					<h3 class="title">High-Quality <br> Market Experinces</h3>
					<p>A tale of a fateful trip that started from this tropic port aboard this tiny ship today still wanted by the government they survive as soldiers of fortune to ever wondered the east side to a deluxe apartment.</p>
					<a href="#" class="theme-button-one">CONTACT US</a>
				</div>
			</div> <!-- /.callout-banner --> --}}
			
			
			
			<!-- 
			=============================================
				About Company Stye Two
			============================================== 
			-->
			<div class="about-compnay-two no-bg section-spacing">
				<div class="overlay">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 col-12 text order-lg-last">
								<div class="theme-title-one">
									<h2>Sambutan Wakil Rektor</h2>
								</div> <!-- /.theme-title-one -->
								<div class="text-justify" style="margin-top: -25px">
									<p>{!! $tangkap1->deskripsi !!}</p>
								</div>
							</div> <!-- /.col- -->
							<div class="col-lg-6 col-12 order-lg-first text-center">
								<img src="{{ asset('storage/' . $tangkap1->poto) }}" alt="img" class="left-img" style="width: 50%; display: initial;">
								<div class="col-lg-12 col-md-6 mt-3 pt-3 text-center">
									<p><strong>{{ $tangkap1->nama }}</strong></p>
									<p>{{ $tangkap1->jabatan }}</p>
									{{-- <p>NIP. {{ $tangkap1->nip }}</p> --}}
								</div>
							</div>
						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.about-compnay-two -->
			

@endsection