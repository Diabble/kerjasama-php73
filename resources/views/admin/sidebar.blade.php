  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <img src="{{asset('assets/admin')}}/dist/img/avatar.png" alt="{{ Auth::user()->name }}" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">{{ Auth::user()->name }}</span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar" style="overflow-y: auto;">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header user-panel pb-3 mb-3" style="text-align: center;">
            MAIN NAVIGATION
          </li>
          <li class="nav-item menu-open">
            <a href="/dashboard" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/settings" class="nav-link">
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
                <a href="/wakil-rektor-admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sambutan Wakil Rektor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/visi-misi-admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Visi dan Misi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/tugas-pokok-fungsi-admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tugas Pokok dan Fungsi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/kebijakan-program-admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kebijakan dan Program</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/struktur-admin" class="nav-link">
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
                <a href="/alur-kerjasama-admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alur Kerjasama</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/progres-pengajuan-kerjasama-admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Progres Pengajuan Kerjasama</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/faq-admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FAQ</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="/berita-admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Berita</p>
                </a>
              </li> -->
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
                    <a href="/kategori-berita-admin" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Kategori Berita</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/berita-admin" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Portal Berita</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="/pengumuman-admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengumuman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/galeri-admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Galeri</p>
                </a>
              </li>
            </ul>
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
                <a href="/berkas-kerjasama-admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Berkas Kerjasama</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/layanan-online-admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajukan Layanan Online</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/layanan-kepuasan-admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Angket Layanan Kepuasan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/layanan-kami-admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Layanan Kami</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-item">
            <a href="/mitra-admin" class="nav-link">
              <i class="nav-icon far fa-handshake"></i>
              <p>
                Mitra
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-handshake"></i>
              <p>
                Mitra
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/kategori-mitra-admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Mitra</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/mitra-admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Portal Mitra</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>