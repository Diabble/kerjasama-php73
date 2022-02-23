@extends('admin.master')
@section('title','beranda')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!--div class="col-sm-6">
            <h1>Blank Page</h1>
          </div-->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="/admin/1">Home</a></li>
              <li class="breadcrumb-item active">Mitra</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header" style="background-color:#343a40;">
          <h3 class="card-title">Mitra</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
          <div class="card-body">
            <div class="form-group">
              <label >No</label>
              <input class="form-control" placeholder="Enter...">
            </div>
            <div class="form-group">
              <label>Jenis</label>
                <select id="jsboxes" name="jsboxes" class="form-control">
                    <option value=""></option>
                    <option value="MoU">MoU</option>
                    <option value="MoA">MoA</option>
                </select>
            </div>
            <div class="form-group">
              <label >Mitra Kerjasama</label>
              <input class="form-control" placeholder="Enter...">
            </div>
            <div class="form-group">
              <label >Bidang Kerjasama</label>
              <input class="form-control" placeholder="Enter...">
            </div>
            <div class="form-group">
              <label >Lingkup Kerjasama</label>
              <input class="form-control" placeholder="Enter...">
            </div>
            <div class="form-group">
              <label >Tanggal Mulai</label>
              <input class="form-control" placeholder="Enter...">
            </div>
            <div class="form-group">
              <label >Tanggal Akhir</label>
              <input class="form-control" placeholder="Enter...">
            </div>
            <div class="form-group">
              <label >Upload File</label>
              <input type="file" class="form-control" id="inputGroupFile02" name="poto">
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection