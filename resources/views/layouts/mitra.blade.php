@extends('layouts.master')
@section('title','Kebijakan dan Program')
@section('content')

			
			<!-- 
			=============================================
				Theme Inner Banner
			============================================== 
			-->
			<div class="theme-inner-banner section-spacing">
				<div class="overlay">
					<div class="container">
						<h2>Kebijakan dan Program</h2>
						<p>{!! $tangkap2->deskripsicarousel !!}</p>
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.theme-inner-banner -->			
			
			
			<!-- 
			=============================================
				Kebijakan dan Program
			============================================== 
			-->
			<div class="tupoksi no-bg section-spacing">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-12 text order-lg-last">
							<div class="theme-title-one">
								{{-- <h2 class="text-center">Kebijakan dan Program</h2> --}}
								<p>{!! $tangkap1->deskripsi !!}</p>
							</div> <!-- /.theme-title-one -->
						</div> <!-- /.col- -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.tupoksi -->
			

@endsection