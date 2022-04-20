@extends('layouts.master')
@section('title','Berkas Kerjasama')
@section('content')

			
			<!-- 
			=============================================
				Theme Inner Banner
			============================================== 
			-->
			<div class="theme-inner-banner section-spacing">
				<div class="overlay">
					<div class="container">
						<h2>Berkas Kerjasama</h2>
						{{-- <p>{!! $tangkap2->deskripsicarousel !!}</p> --}}
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.theme-inner-banner -->			
			
			
			<!-- 
			=============================================
				Berkas Kerjasama
			============================================== 
			-->
			<div class="beker no-bg section-spacing">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-12 text order-lg-last">
							<div class="theme-title-one">
								{{-- <h2 class="text-center">Berkas Kerjasama</h2> --}}
								{{-- <p>{!! $tangkap1->deskripsi !!}</p> --}}
								<!-- Table List Start -->
								<table id="example" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th style="width: 1%;">No</th>
											<th>Nama Berkas</th>
											<th style="width: 20%">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no=1; ?>
										@foreach ($beker as $row)
										<tr style="text-align:justify;">
											<td>{{ $no++ }}</td>
											<td>{{ $row->nama }}</td>
											<td>
												<a class="theme-button-one" style="line-height: 30px;" href="{{asset('storage/' . $row->berkaskerjasama)}}">
													<i class="fa fa-download"></i>
													Download
												</a>
											</td>
										</tr>
										@endforeach
									</tbody>
									<tfoot>
										<tr>
											<th>No</th>
											<th>Nama Berkas</th>
											<th>Aksi</th>
										</tr>
									</tfoot>
								</table>
								<!-- Table List End -->
							</div> <!-- /.theme-title-one -->
						</div> <!-- /.col- -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.berkas-kerjasama -->
			

@endsection