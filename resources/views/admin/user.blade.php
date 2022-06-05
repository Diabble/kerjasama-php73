@extends('admin.master')
@section('title','Semua User')
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
              <li class="breadcrumb-item active">Semua User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content User UIN -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header" style="background-color: #343a40;">
            <h3 class="card-title">Admin - Pimpinan - Staff</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body" style="background-color: #ffffff; padding: 10px 40px 10px 0px;">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambahuin">
              <i class="fas fa-plus"></i> 
              Tambah
            </button>
            <!-- Modal Tambah Start -->
            <div class="modal fade text-left" id="tambahuin" tabindex="-1" aria-labelledby="tambahuinLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahuinLabel">Tambah Admin - Pimpinan - Staff</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- form start -->
                    <form action="{{url('/admin/user/store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label>Username</label>
                        <input class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="off" placeholder="Enter..." value="">
                        @error('name')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control custom-select @error('level') is-invalid @enderror">
                          <option disabled selected>- Pilih -</option>
                          <option value="admin">Admin</option>
                          <option value="pimpinan">Pimpinan</option>
                          <option value="staff">Staff</option>
                          {{-- <option value="user">User</option> --}}
                        </select>
                        @error('level')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="off" placeholder="Enter..." value="">
                        @error('email')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="off" placeholder="Enter..." value="">
                        @error('password')
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
          <div class="card-body" style="display: block;">
            <div class="container">
              <table class="table table-striped table-bordered projects example">
                <thead>
                  <tr style="text-align: center;">
                    <th style="width: 1%">
                      No
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
                    {{-- <th>
                      Password
                    </th> --}}
                    <th style="width: 30%">
                      Aksi
                    </th>
                  </tr>
                </thead>
                <tbody>
                    {{-- {{ $errors }} --}}
                  <?php $no=1; ?>
                  @foreach ( $uin as $row )
                  <tr style="text-align: justify;">
                    <td>
                      {{ $no++ }}
                    </td>
                    <td>
                      {{ $row->name }}
                    </td>
                    <td class="text-capitalize">
                      {{ $row->level }}
                    </td>
                    <td>
                      {{ $row->email }}
                    </td>
                    {{-- <td>
                      {{ $row->password }}
                    </td> --}}
                    <td class="project-actions text-center" style="display: -webkit-box;">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubahuin{{$row->id}}">
                        <i class="fas fa-edit"></i>
                        Ubah
                      </button>
                      <!-- Modal Ubah Start -->
                      <div class="modal fade text-left" id="ubahuin{{$row->id}}" tabindex="-1" aria-labelledby="ubahuinLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="ubahuinLabel">Ubah Admin - Pimpinan - Staff</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <!-- form start -->
                              <form action="{{url('/admin/user/update')}}/{{$row->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                              <div class="form-group">
                                <label>Username</label>
                                <input class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="off" placeholder="Enter..." value="{{ $row->name }}">
                                @error('name')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label>Level</label>
                                <select name="level" class="form-control custom-select @error('level') is-invalid @enderror">
                                  {{-- <option disabled>- Pilih -</option> --}}
                                  {{-- <option disabled selected hidden>{{ $row->level }}</option> --}}
                                  <option value="admin" @if ($row->level == 'admin')
                                      selected
                                  @endif>Admin</option>
                                  <option value="pimpinan" @if ($row->level == 'pimpinan')
                                      selected
                                  @endif>Pimpinan</option>
                                  <option value="staff" @if ($row->level == 'staff')
                                      selected
                                  @endif>Staff</option>
                                  {{-- <option value="user" @if ($row->level == 'user')
                                      selected
                                  @endif>User</option> --}}
                                </select>
                                @error('level')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label>Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="off" placeholder="Enter..." value="{{ $row->email }}">
                                @error('email')
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
                      <!-- Modal Ubah End -->

                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ubahpassworduin{{ $row->id }}">
                        <i class="fas fa-key"></i>
                        Ubah Password
                      </button>
                      <!-- Modal Ubah Start -->
                      <div class="modal fade text-left" id="ubahpassworduin{{ $row->id }}" tabindex="-1" aria-labelledby="ubahpassworduinLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="ubahpassworduinLabel">Ubah Password Admin - Pimpinan - Staff</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <!-- form start -->
                              <form action="{{url('/admin/user/update-password')}}/{{$row->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label>Password</label>
                                  <input class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="off" placeholder="Enter..." value="">
                                  @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <label>Confirm Password</label>
                                  <input class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="off" placeholder="Enter..." value="">
                                  @error('password_confirmation')
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
                      <!-- Modal Ubah End -->
                      
                      <a class="btn btn-danger btn-sm" href="{{url('/admin/user/delete')}}/{{$row->id}}" onclick="return confirm('Yakin dihapus ?')">
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
              <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahuserLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- form start -->
                    <form action="{{url('/admin/user/store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label>Username</label>
                        <input class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="off" placeholder="Enter..." value="">
                        @error('name')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control custom-select @error('level') is-invalid @enderror">
                          <option disabled selected>- Pilih -</option>
                          <option value="user">User</option>
                        </select>
                        @error('level')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="off" placeholder="Enter..." value="">
                        @error('email')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Instansi</label>
                        <input class="form-control @error('instansi') is-invalid @enderror" name="instansi" autocomplete="off" placeholder="Enter..." value="">
                        @error('instansi')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="off" placeholder="Enter..." value="">
                        @error('password')
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
          <div class="card-body" style="display: block;">
            <div class="container">
              <table class="table table-striped table-bordered projects example">
                <thead>
                  <tr style="text-align: center;">
                    <th style="width: 1%">
                      No
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
                      Instansi
                    </th>
                    <th>
                      Progres ID
                    </th>
                    <th style="width: 30%">
                      Aksi
                    </th>
                  </tr>
                </thead>
                <tbody>
                    {{-- {{ $errors }} --}}
                  <?php $no=1; ?>
                  @foreach ( $user as $row )
                  <tr style="text-align: justify;">
                    <td>
                      {{ $no++ }}
                    </td>
                    <td>
                      {{ $row->name }}
                    </td>
                    <td class="text-capitalize">
                      {{ $row->level }}
                    </td>
                    <td>
                      {{ $row->email }}
                    </td>
                    <td>
                      {{ $row->instansi }}
                    </td>
                    <td>
                      {{ $row->peker_id }}
                    </td>
                    <td class="project-actions text-center" style="display: -webkit-box;">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubahuser{{$row->id}}">
                        <i class="fas fa-edit"></i>
                        Ubah
                      </button>
                      <!-- Modal Ubah Start -->
                      <div class="modal fade text-left" id="ubahuser{{$row->id}}" tabindex="-1" aria-labelledby="ubahuserLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="ubahuserLabel">Ubah User</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <!-- form start -->
                              <form action="{{url('/admin/user/update')}}/{{$row->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                              <div class="form-group">
                                <label>Username</label>
                                <input class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="off" placeholder="Enter..." value="{{ $row->name }}">
                                @error('name')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label>Level</label>
                                <select name="level" class="form-control custom-select @error('level') is-invalid @enderror">
                                  <option value="user" @if ($row->level == 'user')
                                      selected
                                  @endif>User</option>
                                </select>
                                @error('level')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label>Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="off" placeholder="Enter..." value="{{ $row->email }}">
                                @error('email')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label>Instansi</label>
                                <input class="form-control @error('instansi') is-invalid @enderror" name="instansi" autocomplete="off" placeholder="Enter..." value="{{ $row->instansi }}">
                                @error('instansi')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label>Progres ID</label>
                                <select name="peker_id" class="form-control custom-select @error('peker_id') is-invalid @enderror">
                                  <option disabled>- Pilih -</option>
                                  @foreach ($peker_id as $val)
                                      <option value="{{ $val->id }}" {{ $row->peker_id == $val->id ? 'selected' : null }}>{{ $val->id }}</option>
                                  @endforeach
                                </select>
                                @error('peker_id')
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
                      <!-- Modal Ubah End -->

                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ubahpassword{{ $row->id }}">
                        <i class="fas fa-key"></i>
                        Ubah Password
                      </button>
                      <!-- Modal Ubah Start -->
                      <div class="modal fade text-left" id="ubahpassword{{ $row->id }}" tabindex="-1" aria-labelledby="ubahpasswordLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="ubahpasswordLabel">Ubah Password</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <!-- form start -->
                              <form action="{{url('/admin/user/update-password')}}/{{$row->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label>Password</label>
                                  <input class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="off" placeholder="Enter..." value="">
                                  @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <label>Confirm Password</label>
                                  <input class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="off" placeholder="Enter..." value="">
                                  @error('password_confirmation')
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
                      <!-- Modal Ubah End -->
                      
                      <a class="btn btn-danger btn-sm" href="{{url('/admin/user/delete')}}/{{$row->id}}" onclick="return confirm('Yakin dihapus ?')">
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