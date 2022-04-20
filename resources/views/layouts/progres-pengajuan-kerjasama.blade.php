@extends('layouts.master')
@section('title','Progres Pengajuan Kerjasama')
@section('content')

			
			<!-- 
			=============================================
				Theme Inner Banner
			============================================== 
			-->
			<div class="theme-inner-banner section-spacing">
				<div class="overlay">
					<div class="container">
						<h2>Progres Pengajuan Kerjasama</h2>
						{{-- <p>{!! $tangkap2->deskripsicarousel !!}</p> --}}
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.theme-inner-banner -->			
			
			
			<!-- 
			=============================================
				Progres Pengajuan Kerjasama
			============================================== 
			-->
			<div class="propeker no-bg section-spacing">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-12 text order-lg-last">
							<div class="theme-title-one">
								{{-- <h2 class="text-center">Progres Pengajuan Kerjasama</h2>
								<p>{!! $tangkap1->deskripsi !!}</p> --}}
								<!-- Table List Start -->
								<table id="example" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th style="width: 1%;">No</th>
											<th style="width: 70%;">Instansi</th>
											<th>Progres</th>
										</tr>
									</thead>
									<tbody>
										<?php $no=1 ?>
										@forelse ( $propeker as $row )
										<tr style="text-align:justify;">
											<td>{{ $no++ }}</td>
											<td>{{ $row->users->instansi }}</td>
											<td>{{ $row->progres }}</td>
										</tr>
										@empty
										<tr>
											<td colspan="3" style="text-align: center;">Data Masih Kosong</td>
										</tr>
										@endforelse
									</tbody>
									<tfoot>
										<tr>
											<th>No</th>
											<th>Instansi</th>
											<th>Progres</th>
										</tr>
									</tfoot>
								</table>
								<!-- Table List End -->
							</div> <!-- /.theme-title-one -->
						</div> <!-- /.col- -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.progres-pengajuan-kerjasama -->
			

@endsection

