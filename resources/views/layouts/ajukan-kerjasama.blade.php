@extends('layouts.master')
@section('title','Ajukan Kerjasama')
@section('content')

			
			<!-- 
			=============================================
				Theme Inner Banner
			============================================== 
			-->
			<div class="theme-inner-banner section-spacing">
				<div class="overlay">
					<div class="container">
						<h2>Ajukan Kerjasama</h2>
						{{-- <p>{!! $tangkap2->deskripsicarousel !!}</p> --}}
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.theme-inner-banner -->			
			
			
			<!-- 
			=============================================
				Ajukan Kerjasama
			============================================== 
			-->
			<div class="akajas no-bg section-spacing">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-12 text order-lg-last">
							<div class="theme-title-one">
								<h2 class="text-center">Form Permohonan Kerjasama</h2>
								{{-- <p>{!! $tangkap1->deskripsi !!}</p> --}}
								<div class="contact-us-section">
									<div class="form-wrapper">
										<!-- form start -->
										<form action="{{url('/ajukan-kerjasama/store')}}" method="POST" class="theme-form-one form-validation" autocomplete="off" method="POST" enctype="multipart/form-data">
											@csrf
											<div class="row">
												<div class="col-12">
													@error('nama')
														<div class="invalid-feedback" style="display: block;">{{ $message }}</div>
													@enderror
													<input type="text" class="@error('nama') is-invalid @enderror" placeholder="Nama *" name="nama">
												</div>
												<div class="col-12">
													@error('nohp')
														<div class="invalid-feedback" style="display: block;">{{ $message }}</div>
													@enderror
													<input type="number" class="@error('nohp') is-invalid @enderror" placeholder="No Whatsapp *" name="nohp">
												</div>
												<div class="col-12">
													@error('instansi')
														<div class="invalid-feedback" style="display: block;">{{ $message }}</div>
													@enderror
													<input type="text" class="@error('instansi') is-invalid @enderror" placeholder="Instansi *" name="instansi">
												</div>
												<div class="col-12">
													@error('jabatan')
														<div class="invalid-feedback" style="display: block;">{{ $message }}</div>
													@enderror
													<input type="text" class="@error('jabatan') is-invalid @enderror" placeholder="Jabatan *" name="jabatan">
												</div>
												<div class="col-12">
													@error('berkaspengaju')
														<div class="invalid-feedback" style="display: block;">{{ $message }}</div>
													@enderror
													<label>Berkas Pengajuan Kerjasama *</label>
													<input type="file" class="@error('berkaspengaju') is-invalid @enderror" name="berkaspengaju">
												</div>
											</div> <!-- /.row -->
											<button type="submit" class="theme-button-one float-right">Kirim</button>
										</form>
										<!-- form end -->
									</div>
								</div>
							</div> <!-- /.theme-title-one -->
						</div> <!-- /.col- -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.ajukan-kerjasama -->
			

@endsection