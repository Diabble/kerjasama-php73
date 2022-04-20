@extends('admin.master')
@section('title','Sambutan Wakil Rektor Admin')
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
              <li class="breadcrumb-item active">Sambutan Wakil Rektor Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content Sambutan Wakil Rektor Admin -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header" style="background-color: #343a40;">
            <h3 class="card-title">Sambutan Wakil Rektor Admin</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body p-0" style="display: block;">
          {{ $errors }}
            <table class="table table-striped table-bordered projects">
              <thead>
                <tr style="text-align: center;">
                  <th style="width: 1%">
                    ID
                  </th>
                  <th>
                    Foto Profil
                  </th>
                  <th>
                    Nama
                  </th>
                  <th>
                    Jabatan
                  </th>
                  <th>
                    NIP
                  </th>
                  <th>
                    Deskripsi
                  </th>
                  <th style="width: 10%">
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $wakilrektor as $row )
                <tr style="text-align: justify;">
                  <td>
                    {{ $row->id }}
                  </td>
                  <td>
                    <img src="{{ asset('storage/' . $row->poto) }}" alt="Image" class="img-fluid" style="display:block; margin:auto; max-width: 50%">
                  </td>
                  <td>
                    {{ $row->nama }}
                  </td>
                  <td>
                    {{ $row->jabatan }}
                  </td>
                  <td>
                    {{ $row->nip }}
                  </td>
                  <td>
                    {!! $row->deskripsi !!}
                  </td>
                  <td class="project-actions text-center">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubah">
                      <i class="fas fa-edit"></i>
                      Ubah
                    </button>
                    <!-- Modal Ubah Start -->
                    <div class="modal fade text-left" id="ubah" tabindex="-1" aria-labelledby="ubahLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="ubahLabel">Ubah Sambutan Wakil Rektor Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <!-- form start -->
                            <form action="{{url('/admin/wakil-rektor/update')}}/{{$row->id}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group">
                                <label>Foto Profil</label>
                                {{-- <input type="hidden" name="oldImage" value="{{ $row->poto }}"> --}}
                                <input type="file" class="form-control" id="inputGroupFile02" name="poto">
                              </div>
                              <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" name="nama" autocomplete="off" placeholder="Enter..." value="{{ $row->nama }}">
                              </div>
                              <div class="form-group">
                                <label>Jabatan</label>
                                <input class="form-control" name="jabatan" autocomplete="off" placeholder="Enter..." value="{{ $row->jabatan }}">
                              </div>
                              <div class="form-group">
                                <label>NIP</label>
                                <input class="form-control" name="nip" autocomplete="off" placeholder="Enter..." value="{{ $row->nip }}">
                              </div>
                              <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="editor" placeholder="Enter..." value="">{{ $row->deskripsi }}</textarea>
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