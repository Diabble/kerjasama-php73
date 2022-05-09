<!-- 
=============================================
    Theme Header Two
============================================== 
-->
<header class="header-two">
    <div class="theme-menu-wrapper">
        <div class="container">
            <div class="bg-wrapper clearfix">
                <div class="logo float-left"><a href="/"><img src="{{ asset('assets') }}/front/images/logo/Logo_Bagian-Kerjasama-dan-Pengembangan-Lembaga-250x50.png" alt=""></a></div>
                <!-- ============== Menu Warpper ================ -->
                <div class="menu-wrapper float-right">
                    <nav id="mega-menu-holder" class="clearfix">
                        <ul class="clearfix">
                            <li class="active"><a href="/">Home</a></li>
                            <li><a href="#">Profil</a>
                                <ul class="dropdown">
                                    <li><a href="{{ url('/wakil-rektor') }}">Sambutan Wakil Rektor</a></li>
                                    <li><a href="{{ url('/visi-misi') }}">Visi & Misi</a></li>
                                    <li><a href="{{ url('/tugas-pokok-fungsi') }}">Tugas Pokok dan Fungsi</a></li>
                                    <li><a href="{{ url('/kebijakan-program') }}">Kebijakan Dan Program</a></li>
                                    <li><a href="{{ url('/struktur') }}">struktur</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Informasi</a>
                                <ul class="dropdown">
                                    <li><a href="{{ url('/alur-kerjasama') }}">Alur Kerjasama</a></li>
                                    <li><a href="{{ url('/progres-pengajuan-kerjasama') }}">Progres Pengajuan<br> Kerjasama</a></li>
                                    <li><a href="{{ url('/faq') }}">FAQ</a></li>
                                    <li><a href="{{ url('/pengumuman') }}">Pengumuman</a></li>
                                    <li><a href="{{ url('/galeri') }}">Galeri</a></li>
                                </ul>
                            </li>
                            <li><a href="/berita">Berita</a></li>
                            <li><a href="#">Layanan</a>
                                <ul class="dropdown">
                                    <li><a href="{{ url('/berkas-kerjasama') }}">Berkas Kerjasama</a></li>
                                    <li><a href="{{ url('/ajukan-kerjasama') }}">Ajukan Kerjasama</a></li>
                                    <li><a href="{{ url('/angket-kepuasan-layanan') }}">Angket Kepuasan Layanan</a></li>
                                    <li><a href="{{ url('/kontak') }}">Kontak</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('/international-office') }}">IO</a></li>
                            <li><a href="{{ url('/mitra') }}">Mitra</a></li>
                            <li><a href="{{ url('/login') }}">Login</a></li>
                        </ul>
                    </nav> <!-- /#mega-menu-holder -->
                </div> <!-- /.menu-wrapper -->
            </div> <!-- /.bg-wrapper -->
        </div> <!-- /.container -->
    </div> <!-- /.theme-menu-wrapper -->
</header> <!-- /.header-two -->