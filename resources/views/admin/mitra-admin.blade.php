@extends('admin.master')
@section('title','Mitra Admin')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Mitra Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content Mitra Admin -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header" style="background-color: #343a40;">
            <h3 class="card-title">Mitra Admin</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body" style="background-color: #ffffff; padding: 10px 40px 10px 40px;">
            <span class="btn btn-success btn-sm fileinput-button dz-clickable">
              <i class="fas fa-plus"></i>
              <span>Add files</span>
            </span>
            <a class="btn btn-secondary btn-sm" href="/mitra-print">
              <i class="fas fa-print"></i>
              Cetak Semua
            </a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambah">
              <i class="fas fa-plus"></i> 
              Tambah
            </button>
            <!-- Modal Tambah Start -->
            <div class="modal fade text-left" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahLabel">Tambah Mitra Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- form start -->
                    <form action="" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Kode Instansi</label>
                          <select id="inputStatus" class="form-control custom-select">
                            <option disabled selected>Enter...</option>
                            <option>P1</option>
                            <option>P2</option>
                            <option>P3</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <label>Keterangan Instansi</label>
                          <select id="inputStatus" class="form-control custom-select">
                            <option disabled selected>Enter...</option>
                            <option>Dalam Negeri</option>
                            <option>Luar Negeri</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <label>Instansi</label>
                        <textarea class="form-control" name="instansi" placeholder="Enter..." value=""></textarea>
                      </div>
                      <div class="form-group">
                        <label>Bidang Kerjasama</label>
                        <input class="form-control" name="bidkerjasama" placeholder="Enter..." value="">
                      </div>
                      <div class="form-group">
                        <label>Dimulai</label>
                        <input class="form-control" name="mulai" placeholder="Enter..." value="">
                      </div>
                      <div class="form-group">
                        <label>Berakhir</label>
                        <input class="form-control" name="selesai" placeholder="Enter..." value="">
                      </div>
                      <div class="form-group">
                        <label>Jenis Naskah</label>
                          <select id="inputStatus" class="form-control custom-select">
                            <option disabled selected>Enter...</option>
                            <option>Dalam Negeri</option>
                            <option>Luar Negeri</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <label>File</label>
                        <input type="file" class="form-control" id="inputGroupFile02" name="file">
                      </div>
                      <div class="form-group">
                        <label>Main Select</label>
                          <select id="jsboxes" name="jsboxes" class="form-control">
                              <option value=""></option>
                              <option value="Main Select 1">Main Select 1</option>
                              <option value="Main Select 2">Main Select 2</option>
                          </select>
                      </div>
                    </form>
                    <!-- form end -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary btn-sm">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal Tambah End -->
          </div>
          <div class="card-body p-0" style="display: block;">
            <table class="table table-striped table-bordered projects">
              <thead>
                <tr style="text-align: center;">
                  <th style="width: 1%">
                    ID
                  </th>
                  <th>
                    Kode Instansi
                  </th>
                  <th>
                    Keterangan Instansi
                  </th>
                  <th>
                    Instansi
                  </th>
                  <th>
                    Bidang Kerjasama
                  </th>
                  <th>
                    Dimulai
                  </th>
                  <th>
                    Berakhir
                  </th>
                  <th>
                    Jenis Naskah
                  </th>
                  <th style="width: 11%">
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="text-align: center;">
                  <td>

                  </td>
                  <td>

                  </td>
                  <td>

                  </td>
                  <td>

                  </td>
                  <td>

                  </td>
                  <td>

                  </td>
                  <td>

                  </td>
                  <td>

                  </td>
                  <td class="project-actions" style="padding: 10px 10px 10px 10px;">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubah">
                      <i class="fas fa-edit"></i>
                      Ubah
                    </button>
                    <!-- Modal Ubah Start -->
                    <div class="modal fade text-left" id="ubah" tabindex="-1" aria-labelledby="ubahLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="ubahLabel">Ubah Mitra Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <!-- form start -->
                            <form action="" method="POST" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Kode Instansi</label>
                                  <select id="inputStatus" class="form-control custom-select">
                                    <option disabled>Enter...</option>
                                    <option>P1</option>
                                    <option>P2</option>
                                    <option>P3</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                <label>Keterangan Instansi</label>
                                <input class="form-control" name="ketinstansi" placeholder="Enter..." value="">
                              </div>
                              <div class="form-group">
                                <label>Instansi</label>
                                <textarea class="form-control" name="instansi" placeholder="Enter..." value=""></textarea>
                              </div>
                              <div class="form-group">
                                <label>Bidang Kerjasama</label>
                                <input class="form-control" name="bidkerjasama" placeholder="Enter..." value="">
                              </div>
                              <div class="form-group">
                                <label>Dimulai</label>
                                <input class="form-control" name="mulai" placeholder="Enter..." value="">
                              </div>
                              <div class="form-group">
                                <label>Berakhir</label>
                                <input class="form-control" name="selesai" placeholder="Enter..." value="">
                              </div>
                              <div class="form-group">
                                <label>Jenis Naskah</label>
                                <input class="form-control" name="jenisnaskah" placeholder="Enter..." value="">
                              </div>
                              <div class="form-group">
                                <label>File</label>
                                <input type="file" class="form-control" id="inputGroupFile02" name="file">
                              </div>
                              <div class="form-group">
                                <label>Main Select</label>
                                  <select id="jsboxes" name="jsboxes" class="form-control">
                                      <option value=""></option>
                                      <option value="Main Select 1">Main Select 1</option>
                                      <option value="Main Select 2">Main Select 2</option>
                                  </select>
                              </div>
                            </form>
                            <!-- form end -->
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                            <button type="button" class="btn btn-primary btn-sm">Simpan</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal Ubah End -->
                    <a class="btn btn-danger btn-sm" href="#" onclick="return confirm('Yakin dihapus ?')">
                      <i class="fas fa-trash"></i>
                      Hapus
                    </a>
                    <a class="btn btn-secondary btn-sm" href="#">
                      <i class="fas fa-download"></i>
                      Download
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <!-- <div class="card-footer" style="display: block;">
            Footer
          </div> -->
          <!-- /.card-footer-->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection