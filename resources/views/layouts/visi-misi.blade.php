@extends('layouts.master')
@section('title','Visi & Misi')
@section('content')

			
			<!-- 
			=============================================
				Theme Inner Banner
			============================================== 
			-->
			<div class="theme-inner-banner section-spacing">
				<div class="overlay">
					<div class="container">
						<h2>Visi & Misi</h2>
						<p>{!! $tangkap3->deskripsicarousel !!}</p>
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.theme-inner-banner -->			
			
			
			<!-- 
			=============================================
				Visi & Misi
			============================================== 
			-->
			<div class="visi-misi no-bg section-spacing">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-12 text order-lg-last">
							<div class="theme-title-one">
								<h2 class="text-center">Visi</h2>
								<p>{!! $tangkap1->deskripsi !!}</p>
							</div> <!-- /.theme-title-one -->
						</div> <!-- /.col- -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.visi-misi -->

			<div class="visi-misi no-bg section-spacing">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-12 text order-lg-last">
							<div class="theme-title-one">
								<h2 class="text-center">Misi</h2>
								<p>{!! $tangkap2->deskripsi !!}</p>
							</div> <!-- /.theme-title-one -->
						</div> <!-- /.col- -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.visi-misi -->
			

@endsection