@extends('layout.master')
@section('title','Progres Pengajuan Kerjasama')
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
                            <a href="/progres-pengajuan-kerjasama">Progres Pengajuan Kerjasama</a>
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
                                <th style="width: 1%;">No</th>
                                <th>Instansi</th>
                                <th>Progres</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ( $propeker as $row )
                            <tr style="text-align:justify;">
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->instansi }}</td>
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
                </div>
            </div>
            <!-- Single Page End -->

@endsection