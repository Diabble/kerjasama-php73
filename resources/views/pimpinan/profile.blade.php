@extends('pimpinan.master')
@section('title','Profile')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="/pimpinan/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content Profile -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header" style="background-color: #343a40;">
            <h3 class="card-title">Profile</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          {{-- {{ $errors }} --}}
          <div class="card-body" style="display:grid; grid-template-columns:25% auto;">
            <table class="table table-hover">
              <tbody>
                <tr>
                  @if (Auth::user()->poto)
                    <img class="img-circle elevation-2 img-fluid" src="{{ asset('storage/' . $user->poto) }}" alt="User Avatar">
                  @else
                    <img class="img-circle elevation-2" src="{{asset('assets/admin')}}/dist/img/avatar.png" alt="User Avatar">
                  @endif
                </tr>
                <tr>
                    <th style="width: 20%">
                      Username
                    </th>
                    <td>
                      {{ $user->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                      Kategori
                    </th>
                    <td class="text-capitalize">
                        {{ $user->level }}
                    </td>
                  </tr>
                <tr>
                    <th>
                      Email
                    </th>
                    <td>
                        {{ $user->email }}
                    </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer" style="display: block;">
            <!-- Button trigger modal -->
            <a class="btn btn-danger btn-sm" href="{{url('/pimpinan/profile/avatar-update')}}/{{$user->id}}" onclick="return confirm('Yakin dihapus ?')">
              <i class="fas fa-trash"></i>
              Hapus Avatar
            </a>

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#ubahprofile">
                <i class="fas fa-edit"></i>
                Ubah Profile
              </button>
              <!-- Modal Ubah Profile Start -->
              <div class="modal fade text-left" id="ubahprofile" tabindex="-1" aria-labelledby="ubahprofileLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="ubahLabel">Ubah Profile</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- form start -->
                      <form action="{{url('/pimpinan/profile/update')}}/{{$user->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label>Avatar</label>
                          <!-- <img src="" alt="Image" class="img-fluid" style="display:block; margin:auto; max-width: 100%"> -->
                          <input type="file" class="form-control @error('poto') is-invalid @enderror" name="poto" id="image">
                          @error('poto')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Nama</label>
                          <input class="form-control" name="name" autocomplete="off" placeholder="Enter..." value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input class="form-control" name="email" autocomplete="off" placeholder="Enter..." value="{{ $user->email }}">
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
              <!-- Modal Ubah Profile End -->
          </div>
          <!-- /.card-footer-->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection