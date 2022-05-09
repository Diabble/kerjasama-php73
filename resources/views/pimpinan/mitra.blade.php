@extends('pimpinan.master')
@section('title','Mitra')
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
              <li class="breadcrumb-item active">Mitra</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content Mitra -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header" style="background-color: #343a40;">
            <h3 class="card-title">Mitra</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body" style="background-color: #ffffff; padding: 10px 40px 10px 40px;">
            <div class="btn-white btn-sm float-right"></div>
            {{-- <a class="btn btn-secondary btn-sm float-right" href="/pimpinan/mitra-print" target="blank">
              <i class="fas fa-print"></i>
              Cetak Semua
            </a> --}}
          </div>
          <div class="card-body" style="display: block;">
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
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Modal Lihat End -->
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="7" style="text-align: center;">Data Masih Kosong</td>
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