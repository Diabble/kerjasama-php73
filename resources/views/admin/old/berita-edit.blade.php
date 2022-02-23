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
              <li class="breadcrumb-item active">Berita</li>
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
          <h3 class="card-title">Berita</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
          <div class="card-body">
            <div class="form-group">
              <label >Slide Judul 1</label>
              <input class="form-control" placeholder="Enter...">
            </div>
            <div class="form-group">
              <label >Slide Deskripsi 1</label>
              <input class="form-control" placeholder="Enter...">
            </div>
            <div class="form-group">
              <label >Slide Judul 2</label>
              <input class="form-control" placeholder="Enter...">
            </div>
            <div class="form-group">
              <label >Slide Deskripsi 2</label>
              <input class="form-control" placeholder="Enter...">
            </div>
            <div class="form-group">
              <label >Slide Judul 3</label>
              <input class="form-control" placeholder="Enter...">
            </div>
            <div class="form-group">
              <label >Slide Deskripsi 3</label>
              <input class="form-control" placeholder="Enter...">
            </div>
            <div class="form-group">
              <label >Judul</label>
              <input class="form-control" placeholder="Enter...">
            </div>
            <div class="form-group">
              <label >Deskripsi</label>
              <input class="form-control" placeholder="Enter...">
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