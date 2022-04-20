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
            {{-- <a class="btn btn-success btn-sm" href="/admin/mitra/export" target="blank">
              <i class="fas fa-print"></i>
              Export Data
            </a> --}}
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#import">
              <i class="fas fa-plus"></i> 
              Import Data
            </button>
            <!-- Modal Import Data Start -->
            <div class="modal fade text-left" id="import" tabindex="-1" aria-labelledby="importLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="importLabel">Import Data Mitra Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- form start -->
                    <form action="{{url('/admin/mitra/import')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        {{-- <label>Berkas Mitra</label> --}}
                        <input type="file" class="form-control @error('import') is-invalid @enderror" id="inputGroupFile02" name="import">
                        @error('import')
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
            <!-- Modal Import Data End -->
            <a class="btn btn-secondary btn-sm" href="{{asset('storage')}}/berkasmitra/Mitra.xlsx" target="blank">
              <i class="fas fa-print"></i>
              Template Import Data
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
                    <form action="{{url('/admin/mitra/store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label>Kode Instansi</label>
                          <select name="kodeinstansi" id="inputStatus" class="form-control custom-select @error('kodeinstansi') is-invalid @enderror">
                            <option disabled selected>- Pilih -</option>
                            @foreach ($kakoin as $row)
                                <option value="{{ $row->id }}" {{ old('kodeinstansi') == $row->id ? 'selected' : null }}>{{ $row->nama_kategori }}</option>
                            @endforeach
                          </select>
                          @error('kodeinstansi')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label>Keterangan Instansi</label>
                          <select name="ketinstansi" id="inputStatus" class="form-control custom-select @error('ketinstansi') is-invalid @enderror">
                            <option disabled selected>- Pilih -</option>
                            @foreach ($kakein as $row)
                                <option value="{{ $row->id }}" {{ old('ketinstansi') == $row->id ? 'selected' : null }}>{{ $row->nama_kategori }}</option>
                            @endforeach
                          </select>
                          @error('ketinstansi')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label>Instansi</label>
                        <input class="form-control @error('instansi') is-invalid @enderror" name="instansi" autocomplete="off" placeholder="Enter..." value="{{ old('instansi') }}">
                        @error('instansi')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Bidang Kerjasama</label>
                        <textarea class="form-control @error('bidkerjasama') is-invalid @enderror" name="bidkerjasama" id="editor" placeholder="Enter..." value="">{{ old('bidkerjasama') }}</textarea>
                        @error('bidkerjasama')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Dimulai</label>
                        <div class="input-group date @error('mulai') is-invalid @enderror" id="datetimepicker" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker" name="mulai" placeholder="Enter..." value="{{ old('mulai') }}">
                          <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                        @error('mulai')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Berakhir</label>
                        <div class="input-group date @error('selesai') is-invalid @enderror" id="datetimepicker1" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="selesai" placeholder="Enter..." value="{{ old('selesai') }}">
                          <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                        @error('selesai')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Jenis Naskah</label>
                          <select name="jenisnaskah" id="inputStatus" class="form-control custom-select @error('jenisnaskah') is-invalid @enderror">
                            <option disabled selected>- Pilih -</option>
                            @foreach ($kajenas as $row)
                                <option value="{{ $row->id }}" {{ old('jenisnaskah') == $row->id ? 'selected' : null }}>{{ $row->nama_kategori }}</option>
                            @endforeach
                          </select>
                          @error('jenisnaskah')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label>Keterangan/Unit</label>
                        <input class="form-control @error('ketunit') is-invalid @enderror" name="ketunit" autocomplete="off" placeholder="Enter..." value="{{ old('ketunit') }}">
                        @error('ketunit')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Berkas Mitra</label>
                        <input type="file" class="form-control @error('berkasmitra') is-invalid @enderror" id="inputGroupFile02" name="berkasmitra">
                        @error('berkasmitra')
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
            
            <div class="btn-white btn-sm float-right"></div>
            <a class="btn btn-secondary btn-sm float-right" href="/mitra-print" target="blank">
              <i class="fas fa-print"></i>
              Cetak Semua
            </a>
            
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
                    <form action="{{url('/admin/mitra/update')}}/{{$row->id}}" method="POST" enctype="multipart/form-data" id="formubah">
                      @csrf
                      <div class="form-group">
                        <label>Kode Instansi</label>
                          <select id="kodeinstansi" class="form-control custom-select kodeinstansi" name="kodeinstansi">
                            <option disabled>- Pilih -</option>
                            @foreach ($kakoin as $koin)
                                <option value="{{ $koin->id }}">{{ $koin->nama_kategori }}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                        <label>Keterangan Instansi</label>
                          <select id="ketinstansi" class="form-control custom-select ketinstansi" name="ketinstansi">
                            <option disabled>- Pilih -</option>
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
                        {{-- <input class="form-control mulai" name="mulai" id="mulai" placeholder="Enter..." value=""> --}}
                        <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3" name="mulai" id="mulai" placeholder="Enter..." value="">
                          <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Berakhir</label>
                        {{-- <input class="form-control selesai" name="selesai" id="selesai" placeholder="Enter..." value=""> --}}
                        <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4" name="selesai" id="selesai" placeholder="Enter..." value="">
                          <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Jenis Naskah</label>
                          <select id="jenisnaskah" class="form-control custom-select jenisnaskah" name="jenisnaskah">
                            <option disabled>- Pilih -</option>
                            @foreach ($kajenas as $jenas)
                                <option value="{{ $jenas->id }}">{{ $jenas->nama_kategori }}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                        <label>Keterangan/Unit</label>
                        <input class="form-control ketunit" name="ketunit" id="ketunit" autocomplete="off" placeholder="Enter..." value="">
                      </div>
                      <div class="form-group">
                        <label>File</label>
                        <input type="file" class="form-control" id="inputGroupFile02" name="berkasmitra">
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
            <div class="container table-responsive">
              <table class="table table-striped table-bordered projects example">
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
                    {{-- <th>
                      Bidang Kerjasama
                    </th>
                    <th>
                      Dimulai
                    </th>
                    <th>
                      Selesai
                    </th> --}}
                    <th>
                      Jenis Naskah
                    </th>
                    <th>
                      Keterangan/Unit
                    </th>
                    {{-- <th>
                      Berkas Mitra
                    </th> --}}
                    <th style="width: 11%">
                      Aksi
                    </th>
                  </tr>
                </thead>
                <tbody>
                  {{-- {{ $errors }} --}}
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
                    {{-- <td>
                      {!! $row->bidkerjasama !!}
                    </td>
                    <td>
                      {{ $row->mulai }}
                    </td>
                    <td>
                      {{ $row->selesai }}
                    </td> --}}
                    <td>
                      {{ $row->kajenas->nama_kategori }}
                    </td>
                    <td>
                      {{ $row->ketunit }}
                    </td>
                    {{-- <td>
                      {{$row->berkasmitra}}
                    </td> --}}
                    <td class="project-actions text-center" style="padding: 10px 10px 10px 10px;">
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
                              <h5 class="modal-title" id="lihatLabel">Lihat Mitra Admin</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <table class="table table-hover">
                                <tbody>
                                  <tr>
                                    <th style="width: 30%">
                                      Kode Instansi
                                    </th>
                                    <td>
                                      {{ $row->kakoin->nama_kategori }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <th>
                                      Keterangan Instansi
                                    </th>
                                    <td>
                                      {{ $row->kakein->nama_kategori }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <th>
                                      Instansi
                                    </th>
                                    <td>
                                      {{ $row->instansi }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <th>
                                      Bidang Kerjasama
                                    </th>
                                    <td>
                                      {!! $row->bidkerjasama !!}
                                    </td>
                                  </tr>
                                  <tr>
                                    <th>
                                      Dimulai Kerjasama
                                    </th>
                                    <td>
                                      {{ $row->mulai }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <th>
                                      Berakhir Kerjasama
                                    </th>
                                    <td>
                                      {{ $row->selesai }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <th>
                                      Jenis Naskah
                                    </th>
                                    <td>
                                      {{ $row->kajenas->nama_kategori }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <th>
                                      Keterangan/Unit
                                    </th>
                                    <td>
                                      {{ $row->ketunit }}
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            {{-- <div class="modal-body">
                              <div class="form-group">
                                <label>Kode Instansi</label>
                                <div style="border-radius: 10px;padding: 0.5rem;background: #e9ecef;">
                                  {{ $row->kakoin->nama_kategori }}
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Keterangan Instansi</label>
                                <div style="border-radius: 10px;padding: 0.5rem;background: #e9ecef;">
                                  {{ $row->kakein->nama_kategori }}
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Instansi</label>
                                <div style="border-radius: 10px;padding: 0.5rem;background: #e9ecef;">
                                  {{ $row->instansi }}
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Bidang Kerjasama</label>
                                <div style="border-radius: 10px;padding: 0.5rem;background: #e9ecef;">
                                  {!! $row->bidkerjasama !!}
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Dimulai</label>
                                <div style="border-radius: 10px;padding: 0.5rem;background: #e9ecef;">
                                  {{ $row->mulai }}
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Berakhir</label>
                                <div style="border-radius: 10px;padding: 0.5rem;background: #e9ecef;">
                                  {{ $row->selesai }}
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Jenis Naskah</label>
                                <div style="border-radius: 10px;padding: 0.5rem;background: #e9ecef;">
                                  {{ $row->kajenas->nama_kategori }}
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Keterangan/Unit</label>
                                <div style="border-radius: 10px;padding: 0.5rem;background: #e9ecef;">
                                  {{ $row->ketunit }}
                                </div>
                              </div>
                            </div> --}}
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
                        kodeinstansi: {{ $row->kodeinstansi }},
                        ketinstansi: {{ $row->ketinstansi }},
                        instansi: '{{ $row->instansi }}',
                        bidkerjasama: '{{ $row->bidkerjasama }}',
                        mulai: '{{ \Carbon\Carbon::parse($row->mulai)->format('m/d/Y g:i A') }}',
                        selesai: '{{ \Carbon\Carbon::parse($row->selesai)->format('m/d/Y g:i A') }}',
                        jenisnaskah: {{ $row->jenisnaskah }},
                        ketunit: '{{ $row->ketunit }}',
                      });">
                        <i class="fas fa-edit"></i>
                        Ubah
                      </button>
                      <a class="btn btn-danger btn-sm" href="{{url('/admin/mitra/delete')}}/{{ $row->id }}" onclick="return confirm('Yakin dihapus ?')">
                        <i class="fas fa-trash"></i>
                        Hapus
                      </a>
                      <a class="btn btn-secondary btn-sm" href="{{asset('storage/' . $row->berkasmitra)}}">
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
  $(document).ready(function(){
    $('#datetimepicker3').datetimepicker({
        locale: 'id'
    });
    $('#datetimepicker4').datetimepicker({
      locale: 'id'
    });
  });

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
    var url='{{ url("/admin/mitra/update") }}' + '/' + data.id;
    $('#formubah').attr('action', url);
    $('#kodeinstansi').val(data.kodeinstansi);
    $('#ketinstansi').val(data.ketinstansi);
    $('#instansi').attr('value', data.instansi);
    // $('#bidkerjasama').html(data.bidkerjasama);
    editor.setData(data.bidkerjasama);
    $('#mulai').attr('value', data.mulai);
    $('#selesai').attr('value', data.selesai);
    $('#jenisnaskah').val(data.jenisnaskah);
    $('#ketunit').attr('value', data.ketunit);
    $('#berkasmitra').val(data.berkasmitra);
  }
</script>
@endsection