<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Mitra UIN Sunan Gunung Djati Bandung</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/admin')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/admin')}}/dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> Daftar Kerjasama UIN Sunan Gunung Djati Bandung
          <small class="float-right">{{date('d-M-Y H:i:s')}}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped table-bordered">
          <thead>
          <tr class="text-center">
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
                Dimulai Kerjasama
            </th>
            <th>
                Berakhir Kerjasama
            </th>
            <th>
                Jenis Naskah
            </th>
            <th>
                Keterangan/Unit
            </th>
          </tr>
          </thead>
          <tbody>
          <?php $no=1; ?>
          @forelse ($mitra as $row)
          <tr class="text-center">
            <td>
                {{$no++}}
            </td>
            <td>
                {{$row->kakoin->nama_kategori}}
            </td>
            <td>
                {{$row->kakein->nama_kategori}}
            </td>
            <td>
                {{$row->instansi}}
            </td>
            <td>
                {!!$row->bidkerjasama!!}
            </td>
            <td>
              {{ \Carbon\Carbon::parse($row->mulai)->format('d/m/Y H:i:s') }}
            </td>
            <td>
              {{ \Carbon\Carbon::parse($row->selesai)->format('d/m/Y H:i:s') }}
            </td>
            <td>
                {{$row->kajenas->nama_kategori}}
            </td>
            <td>
                {{$row->ketunit}}
            </td>
          @empty
            <tr>
              <td>Data Masih Kosong</td>
            </tr>
          @endforelse
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>