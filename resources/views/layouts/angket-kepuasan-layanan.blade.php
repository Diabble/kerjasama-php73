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
								{{-- <h2 class="text-center">Angket Kepuasan Layanan</h2> --}}
								{{-- <p>{!! $tangkap1->deskripsi !!}</p> --}}
							</div> <!-- /.theme-title-one -->
							<div class="clearfix main-content no-gutters row">
								<div class="col-lg-5 col-12"><div class="img-box"></div></div>
								<div class="col-lg-7 col-12">
									<div class="form-wrapper">
										<form action="/angket-layanan-kepuasan" class="theme-form-one form-validation" autocomplete="off">
											<div class="row">
												<div class="col-sm-6 col-12"><input type="text" placeholder="Nama *" name="nama"></div>
												<div class="col-sm-6 col-12"><input type="text" placeholder="No Handphone *" name="nohp"></div>
												<div class="col-sm-6 col-12"><input type="email" placeholder="Email *" name="email"></div>
												<div class="col-sm-6 col-12"><input type="text" placeholder="Website *" name="web"></div>
												<div class="col-12"><textarea placeholder="Pesan" name="message"></textarea></div>
											</div> <!-- /.row -->
											<button class="theme-button-one float-right">Kirim Pesan</button>
										</form>
									</div> <!-- /.form-wrapper -->
								</div> <!-- /.col- -->
							</div> <!-- /.main-content -->
						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.container -->

				<!--Contact Form Validation Markup -->
				<!-- Contact alert -->
				<div class="alert-wrapper" id="alert-success">
					<div id="success">
						<button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
						<div class="wrapper">
			               	<p>Your message was sent successfully.</p>
			             </div>
			        </div>
			    </div> <!-- End of .alert_wrapper -->
			    <div class="alert-wrapper" id="alert-error">
			        <div id="error">
			           	<button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
			           	<div class="wrapper">
			               	<p>Sorry!Something Went Wrong.</p>
			            </div>
			        </div>
			    </div> <!-- End of .alert_wrapper -->
			</div> <!-- /.angket-kepuasan-layanan -->
			

@endsection