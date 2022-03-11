@extends('layouts.master')
@section('title','Mitra')
@section('content')

			
			<!-- 
			=============================================
				Theme Inner Banner
			============================================== 
			-->
			<div class="theme-inner-banner section-spacing">
				<div class="overlay">
					<div class="container">
						<h2>Mitra</h2>
						<p>{!! $tangkap2->deskripsicarousel !!}</p>
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.theme-inner-banner -->			
			
			
			<!-- 
			=============================================
				Mitra
			============================================== 
			-->
			<div class="tupoksi no-bg section-spacing">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-12 text order-lg-last">
							<div class="theme-title-one-mitra">
								{{-- <h2 class="text-center">Mitra</h2>
								<p>{!! $tangkap1->deskripsi !!}</p> --}}
								<!-- Table List Start -->
								<table id="example" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th style="width: 1%;">No</th>
											<th>Kode Instansi</th>
											<th>Ket Instansi</th>
											<th>Instansi</th>
											<th>Bidang Kerjasama</th>
											<th>Mulai Kerjasama</th>
											<th>Berakhir Kerjasama</th>
											<th>Jenis Naskah</th>
											<th>Keterangan/Unit</th>
										</tr>
									</thead>
									<tbody>
										<?php $no=1; ?>
										@forelse ( $mitra as $row )
										<tr style="text-align:justify;">
											<td>{{ $no++ }}</td>
											<td>{{ $row->kakoin->nama_kategori }}</td>
											<td>{{ $row->kakein->nama_kategori }}</td>
											<td>{{ $row->instansi }}</td>
											<td>{!! $row->bidkerjasama !!}</td>
											<td>{{ $row->mulai }}</td>
											<td>{{ $row->selesai }}</td>
											<td>{{ $row->kajenas->nama_kategori }}</td>
											<td>{{ $row->ketunit }}</td>
										</tr>
										@empty
										<tr>
											<td colspan="9" style="text-align: center;">Data Masih Kosong</td>
										</tr>
										@endforelse
									</tbody>
									<tfoot>
										<tr>
											<th>No</th>
											<th>Kode Instansi</th>
											<th>Ket Instansi</th>
											<th>Instansi</th>
											<th>Bidang Kerjasama</th>
											<th>Mulai Kerjasama</th>
											<th>Berakhir Kerjasama</th>
											<th>Jenis Naskah</th>
											<th>Keterangan/Unit</th>
										</tr>
									</tfoot>
								</table>
								<!-- Table List End -->
							</div> <!-- /.theme-title-one -->
						</div> <!-- /.col- -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.mitra -->
			

@endsection