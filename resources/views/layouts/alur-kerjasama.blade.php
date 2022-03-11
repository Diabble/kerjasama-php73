@extends('layouts.master')
@section('title','Alur Kerjasama')
@section('content')

			
			<!-- 
			=============================================
				Theme Inner Banner
			============================================== 
			-->
			<div class="theme-inner-banner section-spacing">
				<div class="overlay">
					<div class="container">
						<h2>Alur Kerjasama</h2>
						<p>{!! $tangkap2->deskripsicarousel !!}</p>
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.theme-inner-banner -->			
			
			
			<!-- 
			=============================================
				Alur Kerjasama
			============================================== 
			-->
			<div class="alur no-bg section-spacing">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-12 text order-lg-last">
							<div class="theme-title-one">
								{{-- <h2 class="text-center">Alur Kerjasama</h2> --}}
								{{-- <p>{!! $tangkap1->deskripsi !!}</p> --}}
								<img src="{{ asset('storage/' . $tangkap1->poto) }}" alt="Image" class="img-fluid" style="display:block; margin:auto; width: 100%;">
							</div> <!-- /.theme-title-one -->
						</div> <!-- /.col- -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.alur-kerjasama -->
			

@endsection