@extends('user.master')
@section('title','Dashboard')
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
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content Progres Pengajuan Kerjasama -->
    {{-- <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header" style="background-color: #343a40;">
            <h3 class="card-title">Progres Pengajuan Kerjasama</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body" style="padding: 25px;">
            <div class="container table-responsive">
              <table class="table table-striped table-bordered projects example">
                <thead>
                  <tr style="text-align: center;">
                    <th style="width: 1%">
                      No
                    </th>
                    <th>
                      Instansi
                    </th>
                    <th>
                      Progres
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  @foreach ( $propeker as $row )
                  <tr style="text-align: center;">
                    <td>
                      {{ $no++ }}
                    </td>
                    <td>
                      {{ $row->users->instansi }}
                    </td>
                    <td>
                      {{ $row->progres }}
                    </td>
                  </tr>
                  @endforeach
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
    </section> --}}
    <!-- /.content -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header" style="background-color: #343a40;">
            <h3 class="card-title">Progres Pengajuan Kerjasama</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="container">
              {{-- <h6><strong>Instansi :</strong> {{ Auth::user()->instansi }}</h6> --}}
              <article class="card">
                <div class="card-body row">
                  {{-- <div class="col">
                    <strong>Estimated Delivery time:</strong>
                    <br>29 nov 2019
                  </div>
                  <div class="col">
                    <strong>Shipping BY:</strong>
                    <br> BLUEDART, | <i class="fa fa-phone"></i> +1598675986
                  </div> --}}
                  <div class="col">
                    <strong>Instansi :</strong>
                    {{ Auth::user()->instansi }}
                    {{-- <br>
                    <strong>Status :</strong>
                    {{ Auth::user()->peker->progres }} --}}
                  </div>
                  <div class="float-right pr-5">
                    <strong>Status :</strong>
                    {{ Auth::user()->peker->progres }}
                  </div>
                  {{-- <div class="col">
                    <strong>Tracking #:</strong>
                    <br> BD045903594059
                  </div> --}}
                </div>
              </article>
              <div class="track">
                <div class="step @if (in_array(Auth::user()->peker->progres, ['Penjajakan', 'Pembahasan', 'Penandatangan', 'Monitoring & Evaluasi', 'Selesai']))
                  active
                @endif">
                  <span class="icon">
                    <i class="fa fa-paste"></i>
                  </span>
                  <span class="text">Penjajakan</span>
                </div>
                <div class="step @if (in_array(Auth::user()->peker->progres, ['Pembahasan', 'Penandatangan', 'Monitoring & Evaluasi', 'Selesai']))
                  active
                @endif">
                  <span class="icon">
                    <i class="fa fa-comment"></i>
                  </span>
                  <span class="text">Pembahasan</span>
                </div>
                <div class="step @if (in_array(Auth::user()->peker->progres, ['Penandatangan', 'Monitoring & Evaluasi', 'Selesai']))
                  active
                @endif">
                  <span class="icon">
                    <i class="fa fa-file-signature"></i>
                  </span>
                  <span class="text">Penandatangan</span>
                </div>
                <div class="step @if (in_array(Auth::user()->peker->progres, ['Monitoring & Evaluasi', 'Selesai']))
                  active
                @endif">
                  <span class="icon">
                    <i class="fa fa-comment-dots"></i>
                  </span>
                  <span class="text">Monitoring & Evaluasi</span>
                </div>
                <div class="step @if (in_array(Auth::user()->peker->progres, ['Selesai']))
                  active
                @endif">
                  <span class="icon">
                    <i class="fa fa-check"></i>
                  </span>
                  <span class="text">Selesai</span>
                </div>
              </div>
              <hr>
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