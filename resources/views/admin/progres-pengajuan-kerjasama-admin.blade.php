@extends('admin.master')
@section('title','Progres Pengajuan Kerjasama Admin')
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
              <li class="breadcrumb-item active">Progres Pengajuan Kerjasama Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content Progres Pengajuan Kerjasama Admin -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header" style="background-color: #343a40;">
            <h3 class="card-title">Progres Pengajuan Kerjasama Admin</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body" style="background-color: #ffffff; padding: 10px 40px 10px 40px;">
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
                    <form action="{{url('/admin/progres-pengajuan-kerjasama/store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label>Instansi</label>
                          <select name="instansi" id="inputStatus" class="form-control custom-select @error('instansi') is-invalid @enderror">
                            <option disabled selected>- Pilih -</option>
                            @foreach ($mitra as $row)
                                <option value="{{ $row->id }}" {{ old('instansi') == $row->id ? 'selected' : null }}>{{ $row->instansi }}</option>
                            @endforeach
                          </select>
                          @error('instansi')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label>Progres</label>
                        <select name="progres" class="form-control custom-select @error('progres') is-invalid @enderror">
                          <option disabled selected>- Pilih -</option>
                          <option value="Penjajakan">Penjajakan</option>
                          <option value="Pembahasan">Pembahasan</option>
                          <option value="Penandatangan">Penandatangan</option>
                          <option value="Monitoring dan Evaluasi">Monitoring dan Evaluasi</option>
                          <option value="Selesai">Selesai</option>
                        </select>
                        {{-- <input class="form-control @error('progres') is-invalid @enderror" name="progres" autocomplete="off" placeholder="Enter..." value="{{ old('progres') }}"> --}}
                        @error('progres')
                          <div class="invalid-feedback">{{ $message }}</div>
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
          <div class="card-body" style="display: block; padding: 10px 0 10px 0;">
            <div class="container table-responsive">
              <table class="table table-striped table-bordered projects example">
                <thead>
                  <tr style="text-align: center;">
                    <th style="width: 1%">
                      No
                    </th>
                    <th>
                      Instansi
                    </th>
                    <th>
                      Progres
                    </th>
                    <th style="width: 15%">
                      Aksi
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  @foreach ( $propeker as $row )
                  <tr style="text-align: center;">
                    <td>
                      {{ $no++ }}
                    </td>
                    <td>
                      {{ $row->mitra->instansi }}
                    </td>
                    <td>
                      {{ $row->progres }}
                    </td>
                    <td class="project-actions text-center">
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
                              <h5 class="modal-title" id="ubahLabel">Ubah Progres Pengajuan Kerjasama Admin</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <!-- form start -->
                              <form action="{{url('/admin/progres-pengajuan-kerjasama/update')}}/{{$row->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label>Instansi</label>
                                  <input class="form-control" name="instansi" autocomplete="off" placeholder="Enter..." value="{{ $row->mitra->instansi }}">
                                </div>
                                <div class="form-group">
                                  <label>Progres</label>
                                  <select id="inputStatus" name="progres" class="form-control custom-select">
                                    <option disabled>Enter...</option>
                                    <option selected value="{{ $row->progres }}">{{ $row->progres }}</option>
                                    <option value="Penjajakan">Penjajakan</option>
                                    <option value="Pembahasan">Pembahasan</option>
                                    <option value="Penandatangan">Penandatangan</option>
                                    <option value="Monitoring & Evaluasi">Monitoring & Evaluasi</option>
                                    <option value="Selesai">Selesai</option>
                                  </select>
                                  {{-- <input class="form-control" name="progres" autocomplete="off" placeholder="Enter..." value="{{ $row->progres }}"> --}}
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
                      <a class="btn btn-danger btn-sm" href="{{url('/admin/progres-pengajuan-kerjasama/delete')}}/{{$row->id}}" onclick="return confirm('Yakin dihapus ?')">
                        <i class="fas fa-trash"></i>
                        Hapus
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
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