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
                          <select name="kodeinstansi" id="inputStatus" class="form-control custom-select @error('kodeinstansi') is-invalid @enderror">
                            <option disabled selected>Enter...</option>
                            @foreach ($kakoin as $row)
                                <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                            @endforeach
                          </select>
                          @error('kodeinstansi')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label>Keterangan Instansi</label>
                          <select name="ketinstansi" id="inputStatus" class="form-control custom-select @error('ketinstansi') is-invalid @enderror">
                            <option disabled selected>Enter...</option>
                            @foreach ($kakein as $row)
                                <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                            @endforeach
                          </select>
                          @error('ketinstansi')
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
                        <label>Bidang Kerjasama</label>
                        <textarea class="form-control @error('bidkerjasama') is-invalid @enderror" name="bidkerjasama" id="editor" placeholder="Enter..." value=""></textarea>
                        @error('bidkerjasama')
                          <div class="invalid-feedback">{{ $message }}</div>
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
                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="selesai" placeholder="Enter..." value="">
                          <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Jenis Naskah</label>
                          <select name="jenisnaskah" id="inputStatus" class="form-control custom-select @error('jenisnaskah') is-invalid @enderror">
                            <option disabled selected>Enter...</option>
                            @foreach ($kajenas as $row)
                                <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                            @endforeach
                          </select>
                          @error('jenisnaskah')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label>File</label>
                        <input type="file" class="form-control @error('file') is-invalid @enderror" id="inputGroupFile02" name="file">
                        @error('file')
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
                    <h5 class="modal-title" id="ubahLabel">Ubah Mitra Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- form start -->
                    <form action="" method="POST" enctype="multipart/form-data" id="formubah">
                      @csrf
                      <div class="form-group">
                        <label>Kode Instansi</label>
                          <select id="kodeinstansi" class="form-control kodeinstansi" name="kodeinstansi">
                            <option>Enter...</option>
                            @foreach ($kakoin as $koin)
                                <option value="{{ $koin->id }}">{{ $koin->nama_kategori }}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                        <label>Keterangan Instansi</label>
                          <select id="ketinstansi" class="form-control ketinstansi" name="ketinstansi">
                            <option>Enter...</option>
                            @foreach ($kakein as $kein)
                                <option value="{{ $kein->id }}">{{ $kein->nama_kategori }}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                        <label>Instansi</label>
                        <input class="form-control instansi" name="instansi" id="instansi" autocomplete="off" placeholder="Enter..." value="">
                      </div>
                      <div class="form-group">
                        <label>Bidang Kerjasama</label>
                        <textarea class="form-control bidkerjasama" name="bidkerjasama" id="bidkerjasama" placeholder="Enter..." value=""></textarea>
                      </div>
                      <div class="form-group">
                        <label>Dimulai</label>
                        <input class="form-control mulai" name="mulai" id="mulai" placeholder="Enter..." value="">
                      </div>
                      <div class="form-group">
                        <label>Berakhir</label>
                        <input class="form-control selesai" name="selesai" id="selesai" placeholder="Enter..." value="">
                      </div>
                      <div class="form-group">
                        <label>Jenis Naskah</label>
                          <select id="jenisnaskah" class="form-control jenisnaskah" name="jenisnaskah">
                            <option>Enter...</option>
                            @foreach ($kajenas as $jenas)
                                <option value="{{ $jenas->id }}">{{ $jenas->nama_kategori }}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                        <label>File</label>
                        <input type="file" class="form-control file" id="inputGroupFile02" name="file">
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
                {{ $errors }}
                <?php $no=1; ?>
                @forelse ( $mitra as $row )
                <tr style="text-align: justify;">
                  <td>
                    {{ $no++ }}
                  </td>
                  <td>
                    {{ $row->kakoin->nama_kategori }}
                  </td>
                  <td>
                    {{ $row->kakein->nama_kategori }}
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
                    {{ $row->kajenas->nama_kategori }}
                  </td>
                  <td class="project-actions text-center" style="padding: 10px 10px 10px 10px;">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubah" onclick="update({
                      id: {{ $row->id }},
                      kodeinstansi: {{ $row->kodeinstansi }},
                      ketinstansi: {{ $row->ketinstansi }},
                      instansi: '{{ $row->instansi }}',
                      bidkerjasama: '{{ $row->bidkerjasama }}',
                      mulai: '{{ $row->mulai }}',
                      selesai: '{{ $row->selesai }}',
                      jenisnaskah: {{ $row->jenisnaskah }},
                    });">
                      <i class="fas fa-edit"></i>
                      Ubah
                    </button>
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
                @empty
                <tr>
                  <td colspan="9" style="text-align: center;">Data Masih Kosong</td>
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
      .create( document.querySelector( '#bidkerjasama' ) )
      .then(edit=> {
        editor = edit;
      })
      .catch( error => {
          console.error( error );
      } );

  function update(data){
    var url='{{ url("/mitra-admin/update") }}' + '/' + data.id;
    $('#formubah').attr('action', url);
    $('#kodeinstansi').val(data.kodeinstansi);
    $('#ketinstansi').val(data.ketinstansi);
    $('#instansi').attr('value', data.instansi);
    // $('#bidkerjasama').html(data.bidkerjasama);
    editor.setData(data.bidkerjasama);
    $('#mulai').attr('value', data.mulai);
    $('#selesai').attr('value', data.selesai);
    $('#jenisnaskah').val(data.jenisnaskah);
    $('#file').val(data.file);
  }
</script>
@endsection