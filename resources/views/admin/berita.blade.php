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
              <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahLabel">Tambah Berita Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- form start -->
                    <form action="{{url('/admin/berita/store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control @error('poto') is-invalid @enderror" name="poto" id="image" onchange="previewImage()">
                        @error('poto')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Judul</label>
                        <input class="form-control @error('judul') is-invalid @enderror" name="judul" autocomplete="off" placeholder="Enter..." value="">
                        @error('judul')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="editor" placeholder="Enter..." value=""></textarea>
                        @error('deskripsi')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Kategori Berita</label>
                        <select id="inputStatus" name="kategori_id" class="form-control custom-select @error('kategori_id') is-invalid @enderror">
                          <option disabled selected>- Pilih -</option>
                          @foreach ($kaber as $row)
                            <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                          @endforeach
                        </select>
                        @error('kategori_id')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      {{-- <div class="form-group">
                        <label>Views</label>
                        <input class="form-control @error('views') is-invalid @enderror" name="views" autocomplete="off" placeholder="Enter..." value="">
                        @error('views')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div> --}}
                      <div class="form-group">
                        <label>Status</label>
                        <select id="inputStatus" name="aktif" class="form-control custom-select @error('aktif') is-invalid @enderror">
                          <option disabled selected>- Pilih -</option>
                          <option value="1">Publish</option>
                          <option value="0">Draft</option>
                        </select>
                        @error('aktif')
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

            <!-- Modal Ubah Start -->
            <div class="modal fade text-left" id="ubah" tabindex="-1" aria-labelledby="ubahLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="ubahLabel">Ubah Berita Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- form start -->
                    <form action="" method="POST" enctype="multipart/form-data" id="formubah">
                      @csrf
                      <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control" id="inputGroupFile02" name="poto">
                      </div>
                      <div class="form-group">
                        <label>Judul</label>
                        <input class="form-control" name="judul" id="judul" autocomplete="off" placeholder="Enter..." value="">
                      </div>
                      {{-- <div class="form-group">
                        <label>Slug</label>
                        <input class="form-control" name="slug" id="slug" autocomplete="off" placeholder="Enter..." value="">
                      </div> --}}
                      <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Enter..." value=""></textarea>
                      </div>
                      <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori_id" id="kategori_id" class="form-control custom-select">
                          <option disabled>- Pilih -</option>
                          @foreach ($kaber as $row)
                              <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                          @endforeach
                        </select>
                      </div>
                      {{-- <div class="form-group">
                        <label>Views</label>
                        <input class="form-control" name="views" autocomplete="off" placeholder="Enter..." value="{{ $row->views }}">
                      </div> --}}
                      <div class="form-group">
                        <label>Status</label>
                        <select name="aktif" id="aktif" class="form-control custom-select">
                          <option disabled>- Pilih -</option>
                          {{-- <option value="{{ $row->aktif }}">{{ ($row->aktif == 1) ? 'Publish' : 'Draft' }}</option> --}}
                          <option value="1">Publish</option>
                          <option value="0">Draft</option>
                        </select>
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
          <div class="card-body" style="display: block;">
            <div class="container table-responsive">
              <table class="table table-striped table-bordered projects example">
                <thead>
                  <tr style="text-align: center;">
                    <th style="width: 1%">
                      No
                    </th>
                    <th style="width: 25%">
                      Gambar
                    </th>
                    <th>
                      Judul
                    </th>
                    {{-- <th>
                      Slug
                    </th> --}}
                    <th>
                      Deskripsi
                    </th>
                    <th>
                      Kategori
                    </th>
                    {{-- <th>
                      Penulis
                    </th>
                    <th>
                      Views
                    </th> --}}
                    <th>
                      Status
                    </th>
                    {{-- <th>
                      Waktu Upload
                    </th> --}}
                    <th style="width: 15%">
                      Aksi
                    </th>
                  </tr>
                </thead>
                <tbody>
                  {{-- {{ $errors }} --}}
                  <?php $no=1; ?>
                  @forelse ( $berita as $row )
                  <tr style="text-align: center;">
                    <td>
                      {{ $no++ }}
                    </td>
                    <td>
                      <img src="{{ asset('storage/' . $row->poto) }}" alt="Image" class="img-fluid" style="display:block; margin:auto; max-width: 100%">
                    </td>
                    <td>
                      {{ Str::substr($row->judul, 0, 100) }}
                    </td>
                    {{-- <td>
                      {{ $row->slug }}
                    </td> --}}
                    <td>
                      {!! Str::substr($row->deskripsi, 0, 100) !!}
                    </td>
                    <td>
                      {{ $row->kategori->nama_kategori }}
                    </td>
                    {{-- <td>
                      {{ $row->users->name }}
                    </td>
                    <td>
                      {{ $row->views }}
                    </td> --}}
                    <td>
                      <span class="badge badge-success">{{ ($row->aktif == 1) ? 'Publish' : 'Draft' }}</span>
                    </td>
                    {{-- <td>
                      {{ $row->created_at }}
                    </td> --}}
                    <td class="project-actions">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#lihat{{ $row->id }}">
                        <i class="fas fa-eye"></i>
                        Lihat
                      </button>
                      <!-- Modal Lihat Start -->
                      <div class="modal fade text-left" id="lihat{{ $row->id }}" tabindex="-1" aria-labelledby="lihatLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="lihatLabel">Lihat Berita Admin</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <table class="table table-hover">
                                <tbody>
                                  <tr>
                                    <th style="width: 20%">Gambar</th>
                                    <td><img src="{{ asset('storage/' . $row->poto) }}" alt="Image" class="img-fluid" style="display:block; margin:auto; max-width: 50%"></td>
                                  </tr>
                                  <tr>
                                    <th>Judul</th>
                                    <td>{{ $row->judul }}</td>
                                  </tr>
                                  <tr>
                                    <th>Slug</th>
                                    <td>{{ $row->slug }}</td>
                                  </tr>
                                  <tr>
                                    <th>Deskripsi</th>
                                    <td>{!! $row->deskripsi !!}</td>
                                  </tr>
                                  <tr>
                                    <th>Kategori Berita</th>
                                    <td>{{ $row->kategori->nama_kategori }}</td>
                                  </tr>
                                  <tr>
                                    <th>Penulis</th>
                                    <td>{{ $row->users->name }}</td>
                                  </tr>
                                  {{-- <tr>
                                    <th>Views</th>
                                    <td>{{ $row->views }}</td>
                                  </tr> --}}
                                  <tr>
                                    <th>Status</th>
                                    <td>{{ ($row->aktif == 1) ? 'Publish' : 'Draft' }}</td>
                                  </tr>
                                  <tr>
                                    <th>Waktu Upload</th>
                                    <td>{{ Carbon\Carbon::parse($row->created_at)->translatedFormat('l, d F Y') }}</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Modal Lihat End -->
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubah" onclick="update({
                        id: {{ $row->id }},
                        poto: '{{ $row->poto }}',
                        judul: '{{ $row->judul }}',
                        slug: '{{ $row->slug }}',
                        deskripsi: '{{ $row->deskripsi }}',
                        kategori_id: {{ $row->kategori_id }},
                        aktif: {{ $row->aktif }},
                      });">
                        <i class="fas fa-edit"></i>
                        Ubah
                      </button>
                      <a class="btn btn-danger btn-sm" href="{{url('/admin/berita/delete')}}/{{$row->id}}" onclick="return confirm('Yakin dihapus ?')">
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
  let editor;
  ClassicEditor
      .create( document.querySelector( '#deskripsi' ) )
      .then(edit=> {
        editor = edit;
      })
      .catch( error => {
          console.error( error );
      } );

  function update(data){
    var url='{{ url("/admin/berita/update") }}' + '/' + data.id;
    $('#formubah').attr('action', url);
    $('#poto').val(data.poto);
    $('#judul').attr('value', data.judul);
    $('#slug').attr('value', data.slug);
    // $('#deskripsi').html(data.deskripsi);
    editor.setData(data.deskripsi);
    $('#kategori_id').val(data.kategori_id);
    $('#aktif').val(data.aktif);
  }
</script>
@endsection