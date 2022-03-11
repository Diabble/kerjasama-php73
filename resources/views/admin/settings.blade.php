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
              <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahslideLabel">Tambah Slide Carousel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- form start -->
                    <form action="{{url('/settings/berandastore')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label>Gambar Slide</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input type="file" class="form-control @error('poto') is-invalid @enderror" name="poto" id="image" onchange="previewImage()">
                        @error('poto')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Judul Slide</label>
                        <input class="form-control @error('judulcarousel') is-invalid @enderror" name="judulcarousel" autocomplete="off" placeholder="Enter..." value="">
                        @error('judulcarousel')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Deskripsi Slide</label>
                        <textarea class="form-control @error('deskripsicarousel') is-invalid @enderror" name="deskripsicarousel" id="editor" placeholder="Enter..."></textarea>
                        @error('deskripsicarousel')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Tombol Slide</label>
                        <input class="form-control @error('tombolcarousel') is-invalid @enderror" name="tombolcarousel" autocomplete="off" placeholder="Enter..." value="">
                        @error('tombolcarousel')
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

            <!-- Modal Ubah Start -->
            <div class="modal fade text-left" id="ubahslide" tabindex="-1" aria-labelledby="ubahslideLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="ubahslideLabel">Ubah Slide Carousel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- form start -->
                    <!-- {{ $errors }} -->
                    <form action="" method="POST" enctype="multipart/form-data" id="formubah">
                      @csrf
                      <div class="form-group">
                        <label>Gambar Slide</label>
                        <!-- <img src="" alt="Image" class="img-fluid" style="display:block; margin:auto; max-width: 100%"> -->
                        <input type="file" class="form-control" name="poto" id="image">
                      </div>
                      <div class="form-group">
                        <label>Judul Slide</label>
                        <input class="form-control" name="judulcarousel" id="judulcarousel" autocomplete="off" placeholder="Enter..." value="">
                      </div>
                      <div class="form-group">
                        <label>Deskripsi Slide</label>
                        <textarea class="form-control" name="deskripsicarousel" id="deskripsicarousel" placeholder="Enter..."></textarea>
                      </div>
                      <div class="form-group">
                        <label>Tombol Slide</label>
                        <input class="form-control" name="tombolcarousel" id="tombolcarousel" autocomplete="off" placeholder="Enter..." value="">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary btn-sm swalDefaultSuccess">Simpan</button>
                      </div>
                    </form>
                    <!-- form end -->
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal Ubah End -->

          </div>
          <div class="card-body p-0" style="display: block;">
            <table class="table table-striped table-bordered projects">
              <thead>
                <tr style="text-align: center;">
                  <th style="width: 1%">
                    No
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
                <?php $no=1; ?>
                @forelse ($beranda as $row)
                <tr style="text-align: justify;">
                  <td>
                    {{ $no++ }}
                  </td>
                  <td>
                    <img src="{{ asset('storage/' . $row->poto) }}" alt="Image" class="img-fluid" style="display:block; margin:auto; max-width: 100%">
                  </td>
                  <td>
                    {{ $row->judulcarousel }}
                  </td>
                  <td>
                    {!! $row->deskripsicarousel !!}
                  </td>
                  <td>
                    {{ $row->tombolcarousel }}
                  </td>
                  <td class="project-actions text-center">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubahslide" onclick="update({
                      id: {{ $row->id }},
                      judulcarousel: '{{ $row->judulcarousel }}',
                      deskripsicarousel: '{{ $row->deskripsicarousel }}',
                      tombolcarousel: '{{ $row->tombolcarousel }}',
                      })">
                      <i class="fas fa-edit"></i>
                      Ubah
                    </button>
                    <a class="btn btn-danger btn-sm" href="{{url('/settings/berandadelete')}}/{{$row->id}}" onclick="return confirm('Yakin dihapus ?')">
                      <i class="fas fa-trash"></i>
                      Hapus
                    </a>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="6" style="text-align: center;">Data Masih Kosong</td>
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
                    <form action="{{url('/settings/..')}}" method="POST" enctype="multipart/form-data">
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
                        <input class="form-control @error('level') is-invalid @enderror" name="level" autocomplete="off" placeholder="Enter..." value="">
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
          <div class="card-body p-0" style="display: block;">
            <table class="table table-striped table-bordered projects">
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
                    Password
                  </th>
                  <th style="width: 20%">
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; ?>
                @forelse ( $user as $row )
                <tr style="text-align: justify;">
                  <td>
                    {{ $no++ }}
                  </td>
                  <td>
                    {{ $row->name }}
                  </td>
                  <td>
                    {{ $row->level }}
                  </td>
                  <td>
                    {{ $row->email }}
                  </td>
                  <td>
                    {{ $row->password }}
                  </td>
                  <td class="project-actions text-center">
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
                            <form action="{{url('/settings/..')}}/{{$row->id}}" method="POST" enctype="multipart/form-data">
                              @csrf
                            <div class="form-group">
                              <label>Username</label>
                              <input class="form-control" name="name" autocomplete="off" placeholder="Enter..." value="{{ $row->name }}">
                            </div>
                            <div class="form-group">
                              <label>Level</label>
                              <input class="form-control" name="level" autocomplete="off" placeholder="Enter..." value="{{ $row->level }}">
                            </div>
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" name="email" autocomplete="off" placeholder="Enter..." value="{{ $row->email }}">
                            </div>
                            {{-- <div class="form-group">
                              <label>Password</label>
                              <input class="form-control" name="password" autocomplete="off" placeholder="Enter..." value="{{ $row->password }}">
                            </div> --}}
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                              <button type="button" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                            </form>
                            <!-- form end -->
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal Ubah End -->
                    <a class="btn btn-danger btn-sm" href="{{url('/settings/..')}}/{{$row->id}}" onclick="return confirm('Yakin dihapus ?')">
                      <i class="fas fa-trash"></i>
                      Hapus
                    </a>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="5" style="text-align: center;">Data Masih Kosong</td>
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

    <!-- Main content Kategori Berita -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header" style="background-color: #343a40;">
            <h3 class="card-title">Kategori Berita</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body" style="background-color: #ffffff; padding: 10px 40px 10px 0px;">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambahkaber">
              <i class="fas fa-plus"></i> 
              Tambah
            </button>
            <!-- Modal Tambah Start -->
            <div class="modal fade text-left" id="tambahkaber" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahLabel">Tambah Kategori Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- form start -->
                    <form action="{{url('/settings/kaberstore')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label>Nama Kategori</label>
                        <input class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" autocomplete="off" placeholder="Enter..." value="">
                        @error('nama_kategori')
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
          <div class="card-body p-0" style="display: block;">
            @if (Session::has('pesan'))
                <div class="alert alert-primary">
                  {{ Session('pesan') }}
                </div>
            @endif
            <table class="table table-striped table-bordered projects">
              <thead>
                <tr style="text-align: center;">
                  <th style="width: 1%">
                    No
                  </th>
                  <th>
                    Nama Kategori
                  </th>
                  <th>
                    Slug
                  </th>
                  <th style="width: 20%">
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; ?>
                @forelse ( $kaber as $row )
                <tr style="text-align: center;">
                  <td>
                    {{ $no++ }}
                  </td>
                  <td>
                    {{ $row->nama_kategori }}
                  </td>
                  <td>
                    {{ $row->slug }}
                  </td>
                  <td class="project-actions text-center">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubahkaber{{ $row->id }}">
                      <i class="fas fa-edit"></i>
                      Ubah
                    </button>
                    <!-- Modal Ubah Start -->
                    <div class="modal fade text-left" id="ubahkaber{{ $row->id }}" tabindex="-1" aria-labelledby="ubahLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="ubahLabel">Ubah Kategori Berita</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <!-- form start -->
                            <form action="{{url('/settings/kaberupdate')}}/{{$row->id}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group">
                                <label>Nama Kategori</label>
                                <input class="form-control" name="nama_kategori" autocomplete="off" placeholder="Enter..." value="{{ $row->nama_kategori }}">
                              </div>
                              {{-- <div class="form-group">
                                <label>Slug</label>
                                <input class="form-control" name="slug" autocomplete="off" placeholder="Enter..." value="{{ $row->slug }}">
                              </div> --}}
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
                    <a class="btn btn-danger btn-sm" href="{{url('/settings/kaberdelete')}}/{{ $row->id }}" onclick="return confirm('Yakin dihapus ?')">
                      <i class="fas fa-trash"></i>
                      Hapus
                    </a>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="4" style="text-align: center;">Data Masih Kosong</td>
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

    <!-- Main content Kategori Kode Instansi -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header" style="background-color: #343a40;">
            <h3 class="card-title">Kategori Kode Instansi</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body" style="background-color: #ffffff; padding: 10px 40px 10px 0px;">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambahkakoin">
              <i class="fas fa-plus"></i> 
              Tambah
            </button>
            <!-- Modal Tambah Start -->
            <div class="modal fade text-left" id="tambahkakoin" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahLabel">Tambah Kategori Kode Instansi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- form start -->
                    <form action="{{url('/settings/kakoinstore')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label>Kategori Kode Instansi</label>
                        <input class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" autocomplete="off" placeholder="Enter..." value="">
                        @error('nama_kategori')
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
                    No
                  </th>
                  <th style="width: 30%">
                    Nama Kategori
                  </th>
                  <th style="width: 30%">
                    Slug
                  </th>
                  <th style="width: 20%">
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; ?>
                @forelse ( $kakoin as $row )
                <tr style="text-align: center;">
                  <td>
                    {{ $no++ }}
                  </td>
                  <td>
                    {{ $row->nama_kategori }}
                  </td>
                  <td>
                    {{ $row->slug }}
                  </td>
                  <td class="project-actions text-center">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubahkakoin{{ $row->id }}">
                      <i class="fas fa-edit"></i>
                      Ubah
                    </button>
                    <!-- Modal Ubah Start -->
                    <div class="modal fade text-left" id="ubahkakoin{{ $row->id }}" tabindex="-1" aria-labelledby="ubahLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="ubahLabel">Ubah Kategori Kode Instansi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <!-- form start -->
                            <form action="{{url('/settings/kakoinupdate')}}/{{ $row->id }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group">
                                <label>Kategori Kode Instansi</label>
                                <input class="form-control" name="nama_kategori" autocomplete="off" placeholder="Enter..." value="{{ $row->nama_kategori }}">
                              </div>
                              <div class="form-group">
                                <label>Slug</label>
                                <input class="form-control" name="slug" autocomplete="off" placeholder="Enter..." value="{{ $row->slug }}">
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
                    <a class="btn btn-danger btn-sm" href="{{url('/settings/kakoindelete')}}/{{ $row->id }}" onclick="return confirm('Yakin dihapus ?')">
                      <i class="fas fa-trash"></i>
                      Hapus
                    </a>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="4" style="text-align: center;">Data Masih Kosong</td>
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

    <!-- Main content Kategori Keterangan Instansi -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header" style="background-color: #343a40;">
            <h3 class="card-title">Kategori Keterangan Instansi</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body" style="background-color: #ffffff; padding: 10px 40px 10px 0px;">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambahkakein">
              <i class="fas fa-plus"></i> 
              Tambah
            </button>
            <!-- Modal Tambah Start -->
            <div class="modal fade text-left" id="tambahkakein" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahLabel">Tambah Kategori Keterangan Instansi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- form start -->
                    <form action="{{url('/settings/kakeinstore')}}/{{$row->id}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label>Kategori Keterangan Instansi</label>
                        <input class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" autocomplete="off" placeholder="Enter..." value="">
                        @error('nama_kategori')
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
                    No
                  </th>
                  <th style="width: 30%">
                    Nama Kategori
                  </th>
                  <th style="width: 30%">
                    Slug
                  </th>
                  <th style="width: 20%">
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; ?>
                @forelse ( $kakein as $row )
                <tr style="text-align: center;">
                  <td>
                    {{ $no++ }}
                  </td>
                  <td>
                    {{ $row->nama_kategori }}
                  </td>
                  <td>
                    {{ $row->slug }}
                  </td>
                  <td class="project-actions text-center">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubahkakein{{$row->id}}">
                      <i class="fas fa-edit"></i>
                      Ubah
                    </button>
                    <!-- Modal Ubah Start -->
                    <div class="modal fade text-left" id="ubahkakein{{$row->id}}" tabindex="-1" aria-labelledby="ubahLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="ubahLabel">Ubah Kategori Keterangan Instansi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <!-- form start -->
                            <form action="{{url('/settings/kakeinupdate')}}/{{$row->id}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group">
                                <label>Kategori Keterangan Instansi</label>
                                <input class="form-control" name="nama_kategori" autocomplete="off" placeholder="Enter..." value="{{ $row->nama_kategori }}">
                              </div>
                              <div class="form-group">
                                <label>Slug</label>
                                <input class="form-control" name="slug" autocomplete="off" placeholder="Enter..." value="{{ $row->slug }}">
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
                    <a class="btn btn-danger btn-sm" href="{{url('/settings/kakeindelete')}}/{{$row->id}}" onclick="return confirm('Yakin dihapus ?')">
                      <i class="fas fa-trash"></i>
                      Hapus
                    </a>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="4" style="text-align: center;">Data Masih Kosong</td>
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

    <!-- Main content Kategori Jenis Naskah -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header" style="background-color: #343a40;">
            <h3 class="card-title">Kategori Jenis Naskah</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body" style="background-color: #ffffff; padding: 10px 40px 10px 0px;">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambahkajena">
              <i class="fas fa-plus"></i> 
              Tambah
            </button>
            <!-- Modal Tambah Start -->
            <div class="modal fade text-left" id="tambahkajena" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahLabel">Tambah Kategori Jenis Naskah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- form start -->
                    <form action="{{url('/settings/kajenastore')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label>Kategori Jenis Naskah</label>
                        <input class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" autocomplete="off" placeholder="Enter..." value="">
                        @error('nama_kategori')
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
                    No
                  </th>
                  <th style="width: 30%">
                    Nama Kategori
                  </th>
                  <th style="width: 30%">
                    Slug
                  </th>
                  <th style="width: 20%">
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; ?>
                @forelse ( $kajenas as $row )
                <tr style="text-align: center;">
                  <td>
                    {{ $no++ }}
                  </td>
                  <td>
                    {{ $row->nama_kategori }}
                  </td>
                  <td>
                    {{ $row->slug }}
                  </td>
                  <td class="project-actions text-center">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubahkajena{{$row->id}}">
                      <i class="fas fa-edit"></i>
                      Ubah
                    </button>
                    <!-- Modal Ubah Start -->
                    <div class="modal fade text-left" id="ubahkajena{{$row->id}}" tabindex="-1" aria-labelledby="ubahLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="ubahLabel">Ubah Kategori Jenis Naskah</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <!-- form start -->
                            <form action="{{url('/settings/kajenaupdate')}}/{{$row->id}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group">
                                <label>Kategori Jenis Naskah</label>
                                <input class="form-control" name="nama_kategori" autocomplete="off" placeholder="Enter..." value="{{ $row->nama_kategori }}">
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
                    <a class="btn btn-danger btn-sm" href="{{url('/settings/kajenadelete')}}/{{$row->id}}" onclick="return confirm('Yakin dihapus ?')">
                      <i class="fas fa-trash"></i>
                      Hapus
                    </a>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="4" style="text-align: center;">Data Masih Kosong</td>
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

@section('script')
<script>
  // $(document).ready(function(){
  //   $('#kodeinstansi').val(1)
  // });
  let editor;
  ClassicEditor
      .create( document.querySelector( '#deskripsicarousel' ) )
      .then(edit=> {
        editor = edit;
      })
      .catch( error => {
          console.error( error );
      } );

  function update(data){
    var url='{{ url("/settings/berandaupdate") }}' + '/' + data.id;
    $('#formubah').attr('action', url);
    $('#poto').val(data.poto);
    $('#judulcarousel').attr('value', data.judulcarousel);
    editor.setData(data.deskripsicarousel);
    $('#tombolcarousel').attr('value', data.tombolcarousel);
  }
</script>
@endsection