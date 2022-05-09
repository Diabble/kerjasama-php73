@extends('user.master')
@section('title','Ubah Password')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="/user/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Ubah Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content Ubah Password -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header" style="background-color: #343a40;">
            <h3 class="card-title">Ubah Password</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- form start -->
          <div class="card-body">
            {{-- {{ $errors }} --}}
            {{-- @if (session()->has('message'))
              <div class="alert alert-success alert-dismissible fade-show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif --}}
            <form action="{{url('/user/ubah-password/update')}}/{{$user->id}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <div class="row">
                  <label class="col-lg-2" style="padding-top: 7px; text-align: right;">Password Lama</label>
                  <div class="col-lg-10">
                    <input class="form-control @error('current_password') is-invalid @enderror" type="password" name="current_password" autocomplete="off" placeholder="Enter..." value="">
                    @error('current_password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="col-lg-2" style="padding-top: 7px; text-align: right;">Password Baru</label>
                  <div class="col-lg-10">
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" autocomplete="off" placeholder="Enter..." value="">
                    @error('password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="col-lg-2" style="padding-top: 7px; text-align: right;">Ulangi Password Baru</label>
                  <div class="col-lg-10">
                    <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" autocomplete="off" placeholder="Enter..." value="">
                    @error('password_confirmation')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="col-lg-2"></label>
                  <div class="col-lg-10">
                    <button type="submit" class="btn btn-primary btn-sm">Ubah Password</button>
                  </div>
                </div>
              </div>
            </form>
            <!-- form end -->
          </div>
          <!-- /.card-body -->
          {{-- <div class="card-footer" style="display: block;">
            <button type="submit" class="btn btn-primary btn-sm">Ubah Password</button>
          </div> --}}
          <!-- /.card-footer-->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection