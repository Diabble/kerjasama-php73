  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- User Account: style can be found in dropdown.less -->
      <li class="nav-item dropdown user-menu">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <img src="{{asset('assets/admin')}}/dist/img/avatar.png" class="user-image" alt="User Image" style="margin-top: 0px;">
          <span class="hidden-xs">{{ Auth::user()->name }}</span>
        </a>
        <ul class="dropdown-menu" style="border-radius: .25rem; top:45px;">
          <div class="card card-widget widget-user shadow" style="margin-bottom: 0px">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-primary">
              <h3 class="widget-user-username" style="padding-top: 15px;">{{ Auth::user()->name }}</h3>
              {{-- <h5 class="widget-user-desc">Member Since {{ Carbon\Carbon::parse(Auth::user()->created_at)->translatedFormat('l, d F Y') }}</h5> --}}
            </div>
            <div class="widget-user-image">
              <img class="img-circle elevation-2" src="{{asset('assets/admin')}}/dist/img/avatar.png" alt="User Avatar">
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-sm-12">
                  <div class="description-block">
                    <h5 class="description-header">Member Since</h5>
                    <span class="description-text">{{ Carbon\Carbon::parse(Auth::user()->created_at)->translatedFormat('Y') }}</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <div class="row" style="padding-top: 15px;">
                <div class="col-sm-6">
                  <a href="{{ url('/staff/profile') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="col-sm-6">
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="nav-link btn btn-default btn-flat" style="font-size: 15px;"><i class="fas fa-sign-out-alt"> Sign Out</i></button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </ul>
      </li>
      <!-- Sign Out -->
      {{-- <li class="nav-item">
          <a class="nav-link" data-widget="" href="{{route('logout')}}" role="button">
              <i class="fas fa-sign-out-alt"> Sign Out</i>
          </a>
      </li> --}}
    </ul>
  </nav>