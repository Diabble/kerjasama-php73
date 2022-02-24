@extends('layout.master')
@section('title','Mitra')
@section('content')

            <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Mitra</h2>
                        </div>
                        <div class="col-12">
                            <a href="/">Home</a>
                            <a href="/mitra">Mitra</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->

    <!-- Table List Start -->
    <div class="container">
      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr style="text-align:center;">
                <th>No</th>
                <th>Jenis</th>
                <th>Mitra Kerjasama</th>
                <th>Bidang Kerjasama</th>
                <th>Lingkup Kerjasama</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Akhir</th>
                <th>File</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>MoU</td>
                <td>PT Dante Xavier</td>
                <td>Program Magang</td>
                <td>Nasional</td>
                <td>2021/01/01</td>
                <td>2022/01/01</td>
                <td>
                    <a href="" target="_blank">Download</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>PKS</td>
                <td>PT Diabble Xavier</td>
                <td>Program Magang</td>
                <td>Internasional</td>
                <td>2021/01/01</td>
                <td>2022/01/01</td>
                <td>
                    <a href="" target="_blank">Download</a>
                </td>
            </tr>
        </tbody>
        <!--tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot-->
      </table>
    </div>
    <!-- Table List End -->

@endsection