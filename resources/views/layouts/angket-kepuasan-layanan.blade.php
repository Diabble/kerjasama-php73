@extends('layouts.master')
@section('title','Angket Kepuasan Layanan')
@section('content')

			
			<!-- 
			=============================================
				Theme Inner Banner
			============================================== 
			-->
			<div class="theme-inner-banner section-spacing">
				<div class="overlay">
					<div class="container">
						<h2>Angket Kepuasan Layanan</h2>
						<p>{!! $tangkap2->deskripsicarousel !!}</p>
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.theme-inner-banner -->			
			
			
			<!-- 
			=============================================
				Angket Kepuasan Layanan
			============================================== 
			-->
			<div class="contact-us-section section-spacing">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-12 text order-lg-last">
							<div class="theme-title-one">
								{{-- <h2 class="text-center">Form Angket Kepuasan Layanan</h2> --}}
								<iframe src="{{ $tangkap1->link }}" width="1175" height="1000" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
							</div> <!-- /.theme-title-one -->
						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.container -->
			</div> <!-- /.angket-kepuasan-layanan -->
			

@endsection