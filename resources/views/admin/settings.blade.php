@extends('admin.master')
@section('title','Settings')
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
              <li class="breadcrumb-item active">Settings</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content Slide Carousel -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header" style="background-color: #343a40;">
            <h3 class="card-title">Slide Carousel</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body" style="background-color: #ffffff; padding: 10px 40px 10px 0px;">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambahslide">
              <i class="fas fa-plus"></i> 
              Tambah
            </button>
            <!-- Modal Tambah Start -->
            <div class="modal fade text-left" id="tambahslide" tabindex="-1" aria-labelledby="tambahslideLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahslideLabel">Tambah Slide Carousel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- form start -->
                    <form action="" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Judul Slide</label>
                        <input class="form-control" name="judulcarousel" autocomplete="off" placeholder="Enter..." value="">
                      </div>
                      <div class="form-group">
                        <label>Deskripsi Slide</label>
                        <textarea class="form-control" name="deskripsicarousel" placeholder="Enter..." value=""></textarea>
                      </div>
                      <div class="form-group">
                        <label>Tombol Slide</label>
                        <input class="form-control" name="tombolcarousel" autocomplete="off" placeholder="Enter..." value="">
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
                    Gambar Carousel
                  </th>
                  <th>
                    Judul Carousel
                  </th>
                  <th>
                    Deskripsi Carousel
                  </th>
                  <th>
                    Tombol Carousel
                  </th>
                  <th style="width: 20%">
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
                  <td class="project-actions">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubahslide">
                      <i class="fas fa-edit"></i>
                      Ubah
                    </button>
                    <!-- Modal Ubah Start -->
                    <div class="modal fade text-left" id="ubahslide" tabindex="-1" aria-labelledby="ubahslideLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="ubahslideLabel">Ubah Slide Carousel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <!-- form start -->
                            <form action="" method="POST" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Gambar Slide</label>
                                <input type="file" class="form-control" id="inputGroupFile02" name="poto">
                              </div>
                              <div class="form-group">
                                <label>Judul Slide</label>
                                <input class="form-control" name="judulcarousel" autocomplete="off" placeholder="Enter..." value="">
                              </div>
                              <div class="form-group">
                                <label>Deskripsi Slide</label>
                                <textarea class="form-control" name="deskripsicarousel" autocomplete="off" placeholder="Enter..." value=""></textarea>
                              </div>
                              <div class="form-group">
                                <label>Tombol Slide</label>
                                <input class="form-control" name="tombolcarousel" autocomplete="off" placeholder="Enter..." value="">
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

    <!-- Main content User -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header" style="background-color: #343a40;">
            <h3 class="card-title">User</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body" style="background-color: #ffffff; padding: 10px 40px 10px 0px;">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambahuser">
              <i class="fas fa-plus"></i> 
              Tambah
            </button>
            <!-- Modal Tambah Start -->
            <div class="modal fade text-left" id="tambahuser" tabindex="-1" aria-labelledby="tambahuserLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahuserLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- form start -->
                    <form action="" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="name" autocomplete="off" placeholder="Enter..." value="">
                      </div>
                      <div class="form-group">
                        <label>Level</label>
                        <input class="form-control" name="level" autocomplete="off" placeholder="Enter..." value="">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" autocomplete="off" placeholder="Enter..." value="">
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" name="password" autocomplete="off" placeholder="Enter..." value="">
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
                    Username
                  </th>
                  <th>
                    Level
                  </th>
                  <th>
                    Email
                  </th>
                  <th>
                    Password
                  </th>
                  <th style="width: 20%">
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
                  <td class="project-actions">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubahuser">
                      <i class="fas fa-edit"></i>
                      Ubah
                    </button>
                    <!-- Modal Ubah Start -->
                    <div class="modal fade text-left" id="ubahuser" tabindex="-1" aria-labelledby="ubahuserLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="ubahuserLabel">Ubah User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <!-- form start -->
                            <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <label>Username</label>
                              <input class="form-control" name="name" autocomplete="off" placeholder="Enter..." value="">
                            </div>
                            <div class="form-group">
                              <label>Level</label>
                              <input class="form-control" name="level" autocomplete="off" placeholder="Enter..." value="">
                            </div>
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" name="email" autocomplete="off" placeholder="Enter..." value="">
                            </div>
                            <div class="form-group">
                              <label>Password</label>
                              <input class="form-control" name="password" autocomplete="off" placeholder="Enter..." value="">
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