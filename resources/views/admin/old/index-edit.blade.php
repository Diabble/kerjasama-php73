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
              <li class="breadcrumb-item active">Beranda</li>
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
          <h3 class="card-title">Beranda</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{url('/admin/update')}}/{{$beranda->id}}" method="POST" enctype="multipart/form-data">
          @csrf 
          <div class="card-body">
            <div class="form-group">
              <label >Slide Judul 1</label>
              <input class="form-control" name="judulcarousel" placeholder="Enter..." value="{{$beranda->judulcarousel}}">
            </div>
            <div class="form-group">
              <label >Slide Deskripsi 1</label>
              <input class="form-control" name="deskripsicarousel" placeholder="Enter..." value="{{$beranda->deskripsicarousel}}">
            </div>
            <div class="form-group">
              <label >Nama Tombol</label>
              <input class="form-control" name="tombolcarousel" placeholder="Enter..." value="{{$beranda->tombolcarousel}}">
            </div>
            <div class="form-group">
              <label >Foto Beranda</label>
              <input type="file" class="form-control" id="inputGroupFile02" name="poto">
            </div>
            <!--div class="input-group mb-3">
              <input type="file" class="form-control" id="inputGroupFile02" name="poto">
              <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div-->
            <div class="form-group">
              <label >Judul</label>
              <input class="form-control" name="judul" placeholder="Enter..." value="{{$beranda->judul}}">
            </div>
            <div class="form-group">
              <label >Deskripsi</label>
              <input class="form-control" name="deskripsi" placeholder="Enter..." value="{{$beranda->deskripsi}}"> 
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
        <!-- form end -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection