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
          <div class="card-body p-0" style="display: block;">
            <table class="table table-striped table-bordered projects">
              <thead>
                <tr style="text-align: center;">
                  <th style="width: 1%">
                    ID
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
                @foreach ( $propeker as $row )
                <tr style="text-align: center;">
                  <td>
                    {{ $row->id }}
                  </td>
                  <td>
                    {{ $row->instansi }}
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
                            <form action="{{url('/progres-pengajuan-kerjasama-admin/update')}}/{{$row->id}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group">
                                <label>Instansi</label>
                                <input class="form-control" disabled="" name="instansi" autocomplete="off" placeholder="Enter..." value="{{ $row->instansi }}">
                              </div>
                              <div class="form-group">
                                <label>Progres</label>
                                <input class="form-control" name="progres" autocomplete="off" placeholder="Enter..." value="{{ $row->progres }}">
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