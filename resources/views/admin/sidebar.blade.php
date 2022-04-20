  {{-- Main Sidebar Container --}}
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <div class="brand-link">
      <img src="{{asset('assets/admin')}}/dist/img/avatar.png" alt="{{ Auth::user()->name }}" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">{{ Auth::user()->name }}</span>
    </div> --}}
    <div class="brand-link text-center">
      <a href="{{ url('/admin/dashboard') }}">
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
            <a href="{{ url('/admin/dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
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
                <a href="{{ url('/admin/wakil-rektor') }}" class="nav-link {{ request()->is('admin/wakil-rektor') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sambutan Wakil Rektor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/visi-misi') }}" class="nav-link {{ request()->is('admin/visi-misi') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Visi dan Misi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/tugas-pokok-fungsi') }}" class="nav-link {{ request()->is('admin/tugas-pokok-fungsi') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tugas Pokok dan Fungsi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/kebijakan-program') }}" class="nav-link {{ request()->is('admin/kebijakan-program') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kebijakan dan Program</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/struktur') }}" class="nav-link {{ request()->is('admin/struktur') ? 'active' : '' }}">
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
                <a href="{{ url('/admin/alur-kerjasama') }}" class="nav-link {{ request()->is('admin/alur-kerjasama') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alur Kerjasama</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/progres-pengajuan-kerjasama') }}" class="nav-link {{ request()->is('admin/progres-pengajuan-kerjasama') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Progres Pengajuan Kerjasama</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/faq') }}" class="nav-link {{ request()->is('admin/faq') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FAQ</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-newspaper"></i>
                  <p>
                    Berita
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview pl-2 ml-2">
                  <li class="nav-item">
                    <a href="{{ url('/admin/kategori-berita') }}" class="nav-link {{ request()->is('admin/kategori-berita') ? 'active' : '' }}">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Kategori Berita</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/berita') }}" class="nav-link {{ request()->is('admin/berita') ? 'active' : '' }}">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Portal Berita</p>
                    </a>
                  </li>
                </ul>
              </li> --}}
              <li class="nav-item">
                <a href="{{ url('/admin/pengumuman') }}" class="nav-link {{ request()->is('admin/pengumuman') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengumuman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/galeri') }}" class="nav-link {{ request()->is('admin/galeri') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Galeri</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/berita') }}" class="nav-link {{ request()->is('admin/berita') ? 'active' : '' }}">
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
                <a href="{{ url('/admin/berkas-kerjasama') }}" class="nav-link {{ request()->is('admin/berkas-kerjasama') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Berkas Kerjasama</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/ajukan-kerjasama') }}" class="nav-link {{ request()->is('admin/ajukan-kerjasama') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajukan Kerjasama</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/angket-kepuasan-layanan') }}" class="nav-link {{ request()->is('admin/angket-kepuasan-layanan') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Angket Kepuasan Layanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/kontak') }}" class="nav-link {{ request()->is('admin/kontak') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kontak</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/international-office') }}" class="nav-link {{ request()->is('admin/international-office') ? 'active' : '' }}">
              <i class="nav-icon far fa-handshake"></i>
              <p>
                IO
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/mitra') }}" class="nav-link {{ request()->is('admin/mitra') ? 'active' : '' }}">
              <i class="nav-icon far fa-handshake"></i>
              <p>
                Mitra
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-handshake"></i>
              <p>
                Mitra
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/kategori-mitra') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Mitra</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/mitra') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Portal Mitra</p>
                </a>
              </li>
            </ul>
          </li> --}}
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
                <a href="{{ url('/admin/profile') }}" class="nav-link {{ request()->is('admin/profile') ? 'active' : '' }}">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/ubah-password') }}" class="nav-link {{ request()->is('admin/ubah-password') ? 'active' : '' }}">
                  <i class="fas fa-lock nav-icon"></i>
                  <p>Ubah Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/user') }}" class="nav-link {{ request()->is('admin/user') ? 'active' : '' }}">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Semua User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/settings') }}" class="nav-link {{ request()->is('admin/settings') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
              </p>
            </a>
          </li>
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