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
              Tambah File
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
              <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahLabel">Tambah Mitra Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- form start -->
                    <form action="{{url('/mitra-admin/store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label>Kode Instansi</label>
                          <select name="nama_kategori" id="inputStatus" class="form-control custom-select">
                            <option disabled selected>Enter...</option>
                            @foreach ($kakoin as $row)
                                <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                            @endforeach
                          </select>
                          @error('nama_kategori')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label>Keterangan Instansi</label>
                          <select name="nama_kategori" id="inputStatus" class="form-control custom-select">
                            <option disabled selected>Enter...</option>
                            @foreach ($kakein as $row)
                                <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                            @endforeach
                          </select>
                          @error('nama_kategori')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label>Instansi</label>
                        <input class="form-control" name="instansi" placeholder="Enter..." value="">
                        @error('instansi')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Bidang Kerjasama</label>
                        <textarea class="form-control" name="bidkerjasama" id="editor" placeholder="Enter..." value=""></textarea>
                        @error('bidkerjasama')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Dimulai</label>
                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="mulai" placeholder="Enter..." value="">
                          <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Berakhir</label>
                        <input class="form-control" name="selesai" placeholder="Enter..." value="">
                      </div>
                      <div class="form-group">
                        <label>Jenis Naskah</label>
                          <select name="nama_kategori" id="inputStatus" class="form-control custom-select">
                            <option disabled selected>Enter...</option>
                            @foreach ($kajenas as $row)
                                <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                            @endforeach
                          </select>
                          @error('nama_kategori')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label>File</label>
                        <input type="file" class="form-control" id="inputGroupFile02" name="file">
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
                    Selesai
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
                @foreach ( $mitra as $row )
                <tr style="text-align: justify;">
                  <td>
                    {{ $row->id }}
                  </td>
                  <td>
                    {{ $row->kodeinstansi }}
                  </td>
                  <td>
                    {{ $row->ketinstansi }}
                  </td>
                  <td>
                    {{ $row->instansi }}
                  </td>
                  <td>
                    {!! $row->bidkerjasama !!}
                  </td>
                  <td>
                    {{ $row->mulai }}
                  </td>
                  <td>
                    {{ $row->selesai }}
                  </td>
                  <td>
                    {{ $row->jenisnaskah }}
                  </td>
                  <td class="project-actions text-center" style="padding: 10px 10px 10px 10px;">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubah{{ $row->id }}">
                      <i class="fas fa-edit"></i>
                      Ubah
                    </button>
                    <!-- Modal Ubah Start -->
                    <div class="modal fade text-left" id="ubah{{ $row->id }}" tabindex="-1" aria-labelledby="ubahLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="ubahLabel">Ubah Mitra Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <!-- form start -->
                            <form action="{{url('/mitra-admin/update')}}/{{ $row->id }}" method="POST" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Kode Instansi</label>
                                  <select id="inputStatus" class="form-control custom-select">
                                    <option disabled selected>Enter...</option>
                                    @foreach ($kakoin as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                                    @endforeach
                                  </select>
                              </div>
                              <div class="form-group">
                                <label>Keterangan Instansi</label>
                                  <select id="inputStatus" class="form-control custom-select">
                                    <option disabled selected>Enter...</option>
                                    @foreach ($kakein as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                                    @endforeach
                                  </select>
                              </div>
                              <div class="form-group">
                                <label>Instansi</label>
                                <input class="form-control" name="instansi" placeholder="Enter..." value="{{ $row->instansi }}">
                              </div>
                              <div class="form-group">
                                <label>Bidang Kerjasama</label>
                                <textarea class="form-control" name="bidkerjasama" id="editor" placeholder="Enter..." value="">{!! $row->bidkerjasama !!}</textarea>
                              </div>
                              <div class="form-group">
                                <label>Dimulai</label>
                                <input class="form-control" name="mulai" placeholder="Enter..." value="{{ $row->mulai }}">
                              </div>
                              <div class="form-group">
                                <label>Berakhir</label>
                                <input class="form-control" name="selesai" placeholder="Enter..." value="{{ $row->selesai }}">
                              </div>
                              <div class="form-group">
                                <label>Jenis Naskah</label>
                                  <select id="inputStatus" class="form-control custom-select">
                                    <option disabled selected>Enter...</option>
                                    @foreach ($kajenas as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                                    @endforeach
                                  </select>
                              </div>
                              <div class="form-group">
                                <label>File</label>
                                <input type="file" class="form-control" id="inputGroupFile02" name="file">
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
                    <a class="btn btn-danger btn-sm" href="{{url('/mitra-admin/delete')}}/{{ $row->id }}" onclick="return confirm('Yakin dihapus ?')">
                      <i class="fas fa-trash"></i>
                      Hapus
                    </a>
                    <a class="btn btn-secondary btn-sm" href="#">
                      <i class="fas fa-download"></i>
                      Download
                    </a>
                  </td>
                </tr>
                @endforeach
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