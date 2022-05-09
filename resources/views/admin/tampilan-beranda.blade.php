@extends('admin.master')
@section('title','Tampilan Beranda')
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
              <li class="breadcrumb-item active">Tampilan Beranda</li>
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
                    <form action="{{url('/admin/tampilan-beranda/carouselstore')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label>Gambar</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input type="file" class="form-control @error('poto') is-invalid @enderror" name="poto" id="image" onchange="previewImage()">
                        @error('poto')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Judul</label>
                        <input class="form-control @error('judulcarousel') is-invalid @enderror" name="judulcarousel" autocomplete="off" placeholder="Enter..." value="">
                        @error('judulcarousel')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control @error('deskripsicarousel') is-invalid @enderror" name="deskripsicarousel" id="editor" placeholder="Enter..."></textarea>
                        @error('deskripsicarousel')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Nama Tombol</label>
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
                    {{-- {{ $errors }} --}}
                    <form action="" method="POST" enctype="multipart/form-data" id="formubah">
                      @csrf
                      <div class="form-group">
                        <label>Gambar</label>
                        <!-- <img src="" alt="Image" class="img-fluid" style="display:block; margin:auto; max-width: 100%"> -->
                        <input type="file" class="form-control" name="poto" id="image">
                      </div>
                      <div class="form-group">
                        <label>Judul</label>
                        <input class="form-control" name="judulcarousel" id="judulcarousel" autocomplete="off" placeholder="Enter..." value="">
                      </div>
                      <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsicarousel" id="deskripsicarousel" placeholder="Enter..."></textarea>
                      </div>
                      <div class="form-group">
                        <label>Nama Tombol</label>
                        <input class="form-control" name="tombolcarousel" id="tombolcarousel" autocomplete="off" placeholder="Enter..." value="">
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

          </div>
          <div class="card-body p-0" style="display: block;">
            <table class="table table-striped table-bordered projects">
              <thead>
                <tr style="text-align: center;">
                  <th style="width: 1%">
                    No
                  </th>
                  <th>
                    Gambar
                  </th>
                  <th>
                    Judul
                  </th>
                  <th>
                    Deskripsi
                  </th>
                  <th>
                    Nama Tombol
                  </th>
                  <th style="width: 20%">
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody>
                {{-- {{ $errors }} --}}
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
                    <a class="btn btn-danger btn-sm" href="{{url('/admin/tampilan-beranda/carouseldelete')}}/{{$row->id}}" onclick="return confirm('Yakin dihapus ?')">
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

    <!-- Main content Profil UIN SGD -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header" style="background-color: #343a40;">
            <h3 class="card-title">Profil UIN Sunan Gunung Djati Bandung</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body p-0" style="display: block;">
            {{-- {{ $errors }} --}}
            <table class="table table-striped table-bordered projects">
              <thead>
                <tr style="text-align: center;">
                  <th style="width: 1%">
                    ID
                  </th>
                  <th>
                    Judul
                  </th>
                  <th>
                    Link
                  </th>
                  <th>
                    Deskripsi
                  </th>
                  <th style="width: 20%">
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody>
                {{-- {{ $errors }} --}}
                <?php $no=1; ?>
                @foreach ($profil as $row)
                <tr style="text-align: justify;">
                  <td>
                    {{ $no++ }}
                  </td>
                  <td>
                    {{ $row->judul }}
                  </td>
                  <td>
                    {{ $row->link }}
                  </td>
                  <td>
                    {!! $row->deskripsi !!}
                  </td>
                  <td class="project-actions text-center">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubahprofil">
                      <i class="fas fa-edit"></i>
                      Ubah
                    </button>
                    <!-- Modal Ubah Start -->
                    <div class="modal fade text-left" id="ubahprofil" tabindex="-1" aria-labelledby="ubahprofilLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="ubahprofilLabel">Ubah Profil UIN Sunan Gunung Djati Bandung</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <!-- form start -->
                            <form action="{{url('/admin/tampilan-beranda/profiluinsgdupdate')}}/{{$row->id}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group">
                                <label>Judul</label>
                                <input class="form-control" name="judul" autocomplete="off" placeholder="Enter..." value="{{ $row->judul }}">
                              </div>
                              <div class="form-group">
                                <label>Link</label>
                                <input class="form-control" name="link" autocomplete="off" placeholder="Enter..." value="{{ $row->link }}">
                              </div>
                              <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control profileditor" id="profileditor" name="deskripsi" placeholder="Enter..." value="">{{ $row->deskripsi }}</textarea>
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

    <!-- Main content Capaian Kinerja -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header" style="background-color: #343a40;">
            <h3 class="card-title">Capaian Kinerja</h3>
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
                    Judul
                  </th>
                  <th>
                    Link
                  </th>
                  <th>
                    Deskripsi
                  </th>
                  <th style="width: 20%">
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody>
                {{-- {{ $errors }} --}}
                <?php $no=1; ?>
                @foreach ($caper as $row)
                <tr style="text-align: justify;">
                  <td>
                    {{ $no++ }}
                  </td>
                  <td>
                    {{ $row->judul }}
                  </td>
                  <td>
                    {{ $row->link }}
                  </td>
                  <td>
                    {!! $row->deskripsi !!}
                  </td>
                  <td class="project-actions text-center">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubahcaper">
                      <i class="fas fa-edit"></i>
                      Ubah
                    </button>
                    <!-- Modal Ubah Start -->
                    <div class="modal fade text-left" id="ubahcaper" tabindex="-1" aria-labelledby="ubahcaperLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="ubahcaperLabel">Ubah Capaian Kinerja</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <!-- form start -->
                            <form action="{{url('/admin/tampilan-beranda/capaiankinerjaupdate')}}/{{$row->id}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group">
                                <label>Judul</label>
                                <input class="form-control" name="judul" autocomplete="off" placeholder="Enter..." value="{{ $row->judul }}">
                              </div>
                              <div class="form-group">
                                <label>Link</label>
                                <input class="form-control" name="link" autocomplete="off" placeholder="Enter..." value="{{ $row->link }}">
                              </div>
                              <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control capereditor" id="capereditor" name="deskripsi" placeholder="Enter..." value="">{{ $row->deskripsi }}</textarea>
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

@section('script')
<script>
  let profileditor;
  ClassicEditor
      .create( document.querySelector( '#profileditor' ) )
      .then(edit=> {
        profileditor = edit;
      })
      .catch( error => {
          console.error( error );
      } );

  let capereditor;
  ClassicEditor
      .create( document.querySelector( '#capereditor' ) )
      .then(edit=> {
        capereditor = edit;
      })
      .catch( error => {
          console.error( error );
      } );

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
    var url='{{ url("/admin/tampilan-beranda/carouselupdate") }}' + '/' + data.id;
    $('#formubah').attr('action', url);
    $('#poto').val(data.poto);
    $('#judulcarousel').attr('value', data.judulcarousel);
    editor.setData(data.deskripsicarousel);
    $('#tombolcarousel').attr('value', data.tombolcarousel);
  }
</script>
@endsection