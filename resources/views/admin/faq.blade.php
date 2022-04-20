@extends('admin.master')
@section('title','FAQ Admin')
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
              <li class="breadcrumb-item active">FAQ Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Content Wrapper. Contains page content -->

    <!-- Main content FAQ Admin -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header" style="background-color: #343a40;">
            <h3 class="card-title">FAQ Admin</h3>
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
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahLabel">Tambah FAQ Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- form start -->
                    <form action="{{url('/admin/faq/store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label>Pertanyaan</label>
                        <textarea class="form-control" name="pertanyaan" id="editor" placeholder="Enter..." value=""></textarea>
                      </div>
                      <div class="form-group">
                        <label>Jawaban</label>
                        <textarea class="form-control" name="jawaban" id="editor1" placeholder="Enter..." value=""></textarea>
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
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="ubahLabel">Ubah FAQ Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- form start -->
                    <form action="" method="POST" enctype="multipart/form-data" id="formubah">
                      @csrf
                      <div class="form-group">
                        <label>Pertanyaan</label>
                        <textarea class="form-control" name="pertanyaan" id="pertanyaan" placeholder="Enter..." value=""></textarea>
                      </div>
                      <div class="form-group">
                        <label>Jawaban</label>
                        <textarea class="form-control" name="jawaban" id="jawaban" placeholder="Enter..." value=""></textarea>
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
            <div class="container">
              <table class="table table-striped table-bordered projects example">
                <thead>
                  <tr style="text-align: center;">
                    <th style="width: 1%">
                      No
                    </th>
                    <th>
                      Pertanyaan
                    </th>
                    <th>
                      Jawaban
                    </th>
                    <th style="width: 20%">
                      Aksi
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  @forelse ( $faq as $row )
                  <tr style="text-align: justify;">
                    <td>
                      {{ $no++ }}
                    </td>
                    <td>
                      {!! $row->pertanyaan !!}
                    </td>
                    <td>
                      {!! $row->jawaban !!}
                    </td>
                    <td class="project-actions text-center">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubah" onclick="update({
                        id: {{ $row->id }},
                        pertanyaan: '{{ $row->pertanyaan }}',
                        jawaban: '{{ $row->jawaban }}',
                      });">
                        <i class="fas fa-edit"></i>
                        Ubah
                      </button>
                      <a class="btn btn-danger btn-sm" href="{{url('/admin/faq/delete')}}/{{$row->id}}" onclick="return confirm('Yakin dihapus ?')">
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
  let editor1;
  ClassicEditor
      .create( document.querySelector( '#editor1' ) )
      .then(edit=> {
        editor1 = edit;
      })
      .catch( error => {
          console.error( error );
      } );

  let editor2;
  ClassicEditor
      .create( document.querySelector( '#pertanyaan' ) )
      .then(edit=> {
        editor2 = edit;
      })
      .catch( error => {
          console.error( error );
      } );

  let editor3;
  ClassicEditor
      .create( document.querySelector( '#jawaban' ) )
      .then(edit=> {
        editor3 = edit;
      })
      .catch( error => {
          console.error( error );
      } );

  function update(data){
  var url='{{url("/admin/faq/update")}}' + '/' + data.id;
  $('#formubah').attr('action', url);
  editor2.setData(data.pertanyaan);
  editor3.setData(data.jawaban);
  }
</script>
@endsection