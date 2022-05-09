@extends('admin.master')
@section('title','Kontak Admin')
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
              <li class="breadcrumb-item active">Kontak Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content Kontak Admin -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header" style="background-color: #343a40;">
            <h3 class="card-title">Kontak Admin</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          {{-- <div class="card-body" style="background-color: #ffffff; padding: 10px 40px 10px 0px;">
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
                    <h5 class="modal-title" id="tambahLabel">Tambah Kontak Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- form start -->
                    <form action="{{url('/admin/kontak/store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input class="form-control" name="nama" autocomplete="off" placeholder="Enter..." value="">
                      </div>
                      <div class="form-group">
                        <label>No Whatsapp</label>
                        <input class="form-control" name="nohp" autocomplete="off" placeholder="Enter..." value="">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" autocomplete="off" placeholder="Enter..." value="">
                      </div>
                      <div class="form-group">
                        <label>Subject</label>
                        <input class="form-control" name="subject" autocomplete="off" placeholder="Enter..." value="">
                      </div>
                      <div class="form-group">
                        <label>Pesan</label>
                        <textarea class="form-control" name="pesan" id="editor" placeholder="Enter..." value=""></textarea>
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
          </div> --}}
          <div class="card-body" style="display: block;">
            <div class="container table-responsive">
              <table class="table table-striped table-bordered projects example">
                <thead>
                  <tr style="text-align: center;">
                    <th style="width: 1%">
                      No
                    </th>
                    <th>
                      Nama Lengkap
                    </th>
                    <th>
                      No Handphone
                    </th>
                    <th>
                      Email
                    </th>
                    <th>
                      Subject
                    </th>
                    <th>
                      Pesan
                    </th>
                    {{-- <th style="width: 20%">
                      Aksi
                    </th> --}}
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  @foreach ( $kontak as $row )
                  <tr style="text-align: center;">
                    <td>
                      {{ $no++ }}
                    </td>
                    <td>
                      {{ $row->nama }}
                    </td>
                    <td>
                      {{ $row->nohp }}
                    </td>
                    <td>
                      {{ $row->email }}
                    </td>
                    <td>
                      {{ $row->subject }}
                    </td>
                    <td>
                      {!! $row->pesan !!}
                    </td>
                    {{-- <td class="project-actions">
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
                              <h5 class="modal-title" id="ubahLabel">Ubah Kontak Admin</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <!-- form start -->
                              <form action="{{url('/admin/kontak/update')}}/{{$row->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label>Nama Lengkap</label>
                                  <input class="form-control" name="nama" autocomplete="off" placeholder="Enter..." value="">
                                </div>
                                <div class="form-group">
                                  <label>No Whatsapp</label>
                                  <input class="form-control" name="nohp" autocomplete="off" placeholder="Enter..." value="">
                                </div>
                                <div class="form-group">
                                  <label>Email</label>
                                  <input class="form-control" name="email" autocomplete="off" placeholder="Enter..." value="">
                                </div>
                                <div class="form-group">
                                  <label>Subject</label>
                                  <input class="form-control" name="subject" autocomplete="off" placeholder="Enter..." value="">
                                </div>
                                <div class="form-group">
                                  <label>Pesan</label>
                                  <textarea class="form-control" name="pesan" id="editor" placeholder="Enter..." value=""></textarea>
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
                      <a class="btn btn-danger btn-sm" href="{{url('/admin/kontak/delete')}}/{{$row->id}}" onclick="return confirm('Yakin dihapus ?')">
                        <i class="fas fa-trash"></i>
                        Hapus
                      </a>
                    </td> --}}
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