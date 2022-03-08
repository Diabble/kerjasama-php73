@extends('layouts.master')
@section('title','404')
@section('content')

			<!-- 
			=============================================
				Theme Inner Banner
			============================================== 
			-->
			<div class="theme-inner-banner section-spacing">
				<div class="overlay">
					<div class="container">
						<h2>Page Not Found</h2>
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.theme-inner-banner -->


			<!-- 
			=============================================
				Error Page 
			============================================== 
			-->
			<div class="container error-page">
				<h2>404</h2>
				<h3>Looks like somthing went wrong</h3>
				<p>The page you are looking for was moved, removed, renamed or might never existed.</p>
				<div>
					<a href="index.html" class="theme-button-one">Go Home</a>
					<span class="or">Or</span>
					<input type="text" placeholder="Search...">
				</div>
			</div> <!-- /.error-page -->

@endsection