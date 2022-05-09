@extends('layouts.master')
@section('title','Galeri')
@section('content')

			
			<!-- 
			=============================================
				Theme Inner Banner
			============================================== 
			-->
			<div class="theme-inner-banner section-spacing">
				<div class="overlay">
					<div class="container">
						<h2>Galeri</h2>
						{{-- <p>{!! $tangkap2->deskripsicarousel !!}</p> --}}
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.theme-inner-banner -->

            <!-- 
			=============================================
				Our Case
			============================================== 
			-->
			<div class="our-case our-project section-spacing">
				<div class="container">
					<div class="wrapper">
						<div class="row">
							@foreach ($galeri as $row)
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="single-case-block">
									<img src="{{ asset('storage/' . $row->poto) }}" alt="">
									<div class="hover-content">
										<div class="text clearfix text-center">
											<p>{!! $row->caption !!}</p>
											{{-- <div class="float-left">
												<h5><a href="project-details.html">Business Meeting</a></h5>
											</div> --}}
											{{-- <a href="project-details.html" class="details float-right"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> --}}
										</div> <!-- /.text -->
									</div> <!-- /.hover-content -->
								</div> <!-- /.single-case-block -->
							</div> <!-- /.col- -->
							@endforeach
						</div> <!-- /.row -->
					</div> <!-- /.wrapper -->
					<div class="theme-pagination">
						<ul>
							{{ $galeri->links('pagination::bootstrap-4') }}
							{{-- <li><a href="#">1</a></li>
							<li class="active"><a href="#">2</a></li>
							<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li> --}}
						</ul>
					</div>
				</div> <!-- /.container -->
			</div> <!-- /.our-case -->
@endsection