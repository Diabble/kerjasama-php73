@extends('admin.master')
@section('title','Berita Admin')
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
              <li class="breadcrumb-item active">Berita Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content Berita Admin -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header" style="background-color: #343a40;">
            <h3 class="card-title">Berita Admin</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body" style="background-color: #ffffff; padding: 10px 40px 10px 0px;">
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
                    <h5 class="modal-title" id="tambahLabel">Tambah Berita Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- form start -->
                    <form action="{{url('/berita-admin/store')}}" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control @error('poto') is-invalid @enderror" name="poto" id="image" onchange="previewImage()">
                        @error('poto')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Judul</label>
                        <input class="form-control" name="judul" autocomplete="off" placeholder="Enter..." value="">
                        @error('judul')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="editor" placeholder="Enter..." value=""></textarea>
                        @error('deskripsi')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Kategori</label>
                        <input class="form-control" name="kategori" autocomplete="off" placeholder="Enter..." value="">
                        @error('kategori')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                      </div>
                    </form>
                    <!-- form end -->
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
                    Gambar
                  </th>
                  <th>
                    Judul
                  </th>
                  <th>
                    Slug
                  </th>
                  <th>
                    Deskripsi
                  </th>
                  <th>
                    Kategori
                  </th>
                  <th>
                    Penulis
                  </th>
                  <th>
                    Views
                  </th>
                  <th>
                    Waktu Upload
                  </th>
                  <th style="width: 20%">
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody>
                @forelse ( $berita as $row )
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
                  <td>
                    
                  </td>
                  <td class="project-actions">
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
                            <h5 class="modal-title" id="ubahLabel">Ubah Berita Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <!-- form start -->
                            <form action="{{url('/berita-admin/update')}}/{{$row->id}}" method="POST" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" class="form-control" id="inputGroupFile02" name="poto">
                              </div>
                              <div class="form-group">
                                <label>Judul</label>
                                <input class="form-control" name="judul" autocomplete="off" placeholder="Enter..." value="">
                              </div>
                              <div class="form-group">
                                <label>Slug</label>
                                <input class="form-control" name="slug" autocomplete="off" placeholder="Enter..." value="">
                              </div>
                              <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="editor" placeholder="Enter..." value=""></textarea>
                              </div>
                              <div class="form-group">
                                <label>Kategori</label>
                                <input class="form-control" name="kategori" autocomplete="off" placeholder="Enter..." value="">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                              </div>
                            </form>
                            <!-- form end -->
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
                @empty
                <tr>
                  <td colspan="10" style="text-align: center;">Data Masih Kosong</td>
                </tr>
                @endforelse
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