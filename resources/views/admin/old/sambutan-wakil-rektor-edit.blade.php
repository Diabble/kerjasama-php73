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
              <li class="breadcrumb-item active">Sambutan Wakil Rektor</li>
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
          <h3 class="card-title">Sambutan Wakil Rektor</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{url('/wakilrektoredit/update')}}/{{$sambutan->id}}" method="POST" enctype="multipart/form-data">
          @csrf 
          <div class="card-body">
            <div class="form-group">
              <label >Foto Profile</label>
              <input type="file" class="form-control" id="inputGroupFile02" name="poto">
            </div>
            <div class="form-group">
              <label >Nama</label>
              <input class="form-control" name="nama" placeholder="Enter..." value="{{$sambutan->nama}}">
            </div>
            <div class="form-group">
              <label >Jabatan</label>
              <input class="form-control" name="jabatan" placeholder="Enter..." value="{{$sambutan->jabatan}}">
            </div>
            <div class="form-group">
              <label >NIP</label>
              <input class="form-control" name="nip" placeholder="Enter..." value="{{$sambutan->nip}}">
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