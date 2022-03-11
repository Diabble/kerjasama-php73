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
						<p>{!! $tangkap2->deskripsicarousel !!}</p>
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
										<form action="/ajukan-kerjasama" class="theme-form-one form-validation" autocomplete="off" method="POST" enctype="multipart/form-data">
											<div class="row">
												<div class="col-12">
													<input type="text" class="@error('nama') is-invalid @enderror" placeholder="Nama *" name="nama">
													@error('nama')
														<div class="invalid-feedback">{{ $message }}</div>
													@enderror
												</div>
												<div class="col-12">
													<input type="text" class="@error('nohp') is-invalid @enderror" placeholder="No Whatsapp *" name="nohp">
													@error('nohp')
														<div class="invalid-feedback">{{ $message }}</div>
													@enderror
												</div>
												<div class="col-12">
													<input type="text" class="@error('instansi') is-invalid @enderror" placeholder="Instansi *" name="instansi">
													@error('instansi')
														<div class="invalid-feedback">{{ $message }}</div>
													@enderror
												</div>
												<div class="col-12">
													<input type="text" class="@error('jabatan') is-invalid @enderror" placeholder="Jabatan *" name="jabatan">
													@error('jabatan')
														<div class="invalid-feedback">{{ $message }}</div>
													@enderror
												</div>
												<div class="col-12">
													<label>Surat Permohonan *</label>
													<input type="file" class="@error('suratpermohonan') is-invalid @enderror" name="suratpermohonan">
													@error('suratpermohonan')
														<div class="invalid-feedback">{{ $message }}</div>
													@enderror
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