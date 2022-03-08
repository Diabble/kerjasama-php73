@extends('layouts.master')
@section('title','Mitra')
@section('content')

            <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3>{!! $tangkap2->deskripsicarousel !!}</h3>
                        </div>
                        <div class="col-12">
                            <a href="/">Home</a>
                            <a href="/mitra">Mitra</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->

            <!-- Single Page Start -->
            <div class="single">
                <div class="container">
                    <!-- Table List Start -->
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Instansi</th>
                                <th>Keterangan Instansi</th>
                                <th>Instansi</th>
                                <th>Bidang Kerjasama</th>
                                <th>Dimulai Kerjasama</th>
                                <th>Selesai Kerjasama</th>
                                <th>Jenis Naskah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ( $mitra as $row )
                            <tr style="text-align:justify;">
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->kodeinstansi }}</td>
                                <td>{{ $row->ketinstansi }}</td>
                                <td>{{ $row->instansi }}</td>
                                <td>{{ $row->bidkerjasama }}</td>
                                <td>{{ $row->mulai }}</td>
                                <td>{{ $row->selesai }}</td>
                                <td>{{ $row->jenisnaskah }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" style="text-align: center;">Data Masih Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Instansi</th>
                                <th>Keterangan Instansi</th>
                                <th>Instansi</th>
                                <th>Bidang Kerjasama</th>
                                <th>Dimulai Kerjasama</th>
                                <th>Selesai Kerjasama</th>
                                <th>Jenis Naskah</th>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- Table List End -->
                </div>
            </div>
            <!-- Single Page End -->

@endsection