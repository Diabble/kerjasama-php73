  {{-- Main Sidebar Container --}}
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <div class="brand-link">
      <img src="{{asset('assets/admin')}}/dist/img/avatar.png" alt="{{ Auth::user()->name }}" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">{{ Auth::user()->name }}</span>
    </div> --}}
    <div class="brand-link text-center">
      <a href="{{ url('/user/dashboard') }}">
        <img src="{{ asset('assets') }}/front/images/logo/Logo_Bagian-Kerjasama-dan-Pengembangan-Lembaga-250x50.png" alt="" style="width: 100%">
        {{-- <b class="brand-text" style="color: #fff;">KERJASAMA</b> --}}
      </a>
    </div>
    
    <!-- Sidebar -->
    {{-- <div class="sidebar" style="overflow-y: auto;"> --}}
    <div class="sidebar">
      {{-- Sidebar Menu --}}
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          {{-- <li class="nav-header user-panel pb-3 mb-3" style="text-align: center;">
            MAIN NAVIGATION
          </li> --}}
          <li class="nav-item">
            <a href="{{ url('/user/dashboard') }}" class="nav-link {{ request()->is('user/dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item {{ request()->is('user/#') ? 'active' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Akun
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/user/profile') }}" class="nav-link {{ request()->is('user/profile') ? 'active' : '' }}">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/user/ubah-password') }}" class="nav-link {{ request()->is('user/ubah-password') ? 'active' : '' }}">
                  <i class="fas fa-lock nav-icon"></i>
                  <p>Ubah Password</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ url('/user/settings') }}" class="nav-link {{ request()->is('user/settings') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/user/wakil-rektor') }}" class="nav-link {{ request()->is('user/wakil-rektor') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sambutan Wakil Rektor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/user/visi-misi') }}" class="nav-link {{ request()->is('user/visi-misi') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Visi dan Misi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/user/tugas-pokok-fungsi') }}" class="nav-link {{ request()->is('user/tugas-pokok-fungsi') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tugas Pokok dan Fungsi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/user/kebijakan-program') }}" class="nav-link {{ request()->is('user/kebijakan-program') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kebijakan dan Program</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/user/struktur') }}" class="nav-link {{ request()->is('user/struktur') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Struktur</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-info"></i>
              <p>
                Informasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/user/alur-kerjasama') }}" class="nav-link {{ request()->is('user/alur-kerjasama') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alur Kerjasama</p>
                </a>
              </li> --}}
              {{-- <li class="nav-item">
                <a href="{{ url('/user/progres-pengajuan-kerjasama') }}" class="nav-link {{ request()->is('user/progres-pengajuan-kerjasama') ? 'active' : '' }}">
                  <i class="fas fa-fax nav-icon"></i>
                  <p>Progres Pengajuan Kerjasama</p>
                </a>
              </li> --}}
              {{-- <li class="nav-item">
                <a href="{{ url('/user/faq') }}" class="nav-link {{ request()->is('user/faq') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FAQ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-newspaper"></i>
                  <p>
                    Berita
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview pl-2 ml-2">
                  <li class="nav-item">
                    <a href="{{ url('/user/kategori-berita') }}" class="nav-link {{ request()->is('user/kategori-berita') ? 'active' : '' }}">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Kategori Berita</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/user/berita') }}" class="nav-link {{ request()->is('user/berita') ? 'active' : '' }}">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Portal Berita</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="{{ url('/user/pengumuman') }}" class="nav-link {{ request()->is('user/pengumuman') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengumuman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/user/galeri') }}" class="nav-link {{ request()->is('user/galeri') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Galeri</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ url('/user/berita') }}" class="nav-link {{ request()->is('user/berita') ? 'active' : '' }}">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>Berita</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-phone"></i>
              <p>
                Layanan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/user/berkas-kerjasama') }}" class="nav-link {{ request()->is('user/berkas-kerjasama') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Berkas Kerjasama</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/user/ajukan-kerjasama') }}" class="nav-link {{ request()->is('user/ajukan-kerjasama') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajukan Kerjasama</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/user/angket-kepuasan-layanan') }}" class="nav-link {{ request()->is('user/angket-kepuasan-layanan') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Angket Kepuasan Layanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/user/kontak') }}" class="nav-link {{ request()->is('user/kontak') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kontak</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ url('/user/international-office') }}" class="nav-link {{ request()->is('user/international-office') ? 'active' : '' }}">
              <i class="nav-icon far fa-handshake"></i>
              <p>
                IO
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/user/mitra') }}" class="nav-link {{ request()->is('user/mitra') ? 'active' : '' }}">
              <i class="nav-icon fas fa-handshake"></i>
              <p>
                Mitra
              </p>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="nav-link"><i class="fas fa-sign-out-alt"> Sign Out</i></button>
            </form>
          </li> --}}
        </ul>
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>