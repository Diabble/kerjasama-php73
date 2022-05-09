<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthsController;
use App\Http\Controllers\PegawaiController;

//Halaman Utama Start
use App\Http\Controllers\FrontendController;
//End Halaman Utama

//Admin Start
use App\Http\Controllers\BackendController;
//Admin End

//Pimpinan Start
use App\Http\Controllers\BackendPimpinanController;
//Pimpinan End

//Staff Start
use App\Http\Controllers\BackendStaffController;
//Staff End

//Pegawai Start
use App\Http\Controllers\BackendPegawaiController;
//Pegawai End

//User Start
use App\Http\Controllers\BackendUserController;
//User End

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/contact', function () {
    return view('layouts.contact');
});

Route::get('/project', function () {
    return view('layouts.project');
});

Route::get('/project-details', function () {
    return view('layouts.project-details');
});

Route::get('/service', function () {
    return view('layouts.service');
});

Route::get('/service-v2', function () {
    return view('layouts.service-v2');
});

Route::get('/service-details', function () {
    return view('layouts.service-details');
});

Route::get('/single', function () {
    return view('layouts.single');
});

Route::get('/about', function () {
    return view('layouts.about');
});

Route::get('/index', function () {
    return view('layouts.index');
});

Route::get('/index-2', function () {
    return view('layouts.index-2');
});

Route::get('/blog', function () {
    return view('layouts.blog');
});

Route::get('/blog-grid', function () {
    return view('layouts.blog-grid');
});

Route::get('/blog-details', function () {
    return view('layouts.blog-details');
});

Route::get('/faq', function () {
    return view('layouts.faq');
});

Route::get('/shop', function () {
    return view('layouts.shop');
});

Route::get('/shop-details', function () {
    return view('layouts.shop-details');
});

Route::get('/team', function () {
    return view('layouts.team');
});

Route::get('/404', function () {
    return view('layouts.404');
});


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Halman Utama
Route::get('/', [FrontendController::class, 'beranda']);

Route::get('/wakil-rektor', [FrontendController::class, 'wakilrektor']);
Route::get('/visi-misi', [FrontendController::class, 'visimisi']);
Route::get('/tugas-pokok-fungsi', [FrontendController::class, 'tupoksi']);
Route::get('/kebijakan-program', [FrontendController::class, 'kepro']);
Route::get('/struktur', [FrontendController::class, 'struktur']);

Route::get('/alur-kerjasama', [FrontendController::class, 'alur']);
Route::get('/progres-pengajuan-kerjasama', [FrontendController::class, 'propeker']);
Route::get('/faq', [FrontendController::class, 'faq']);
Route::get('/berita-detail/{slug}', [FrontendController::class, 'bedet'])->name('berita-detail');
Route::get('/pengumuman', [FrontendController::class, 'pengumuman']);
Route::get('/pengumuman-detail/{slug}', [FrontendController::class, 'pedet'])->name('pengumuman-detail');
Route::get('/galeri', [FrontendController::class, 'galeri']);

Route::get('/berita', [FrontendController::class, 'berita']);

Route::get('/berkas-kerjasama', [FrontendController::class, 'berkaskerjasama']);
Route::get('/ajukan-kerjasama', [FrontendController::class, 'ajukankerjasama']);
Route::post('/ajukan-kerjasama/store', [FrontendController::class, 'ajukerstore']);
Route::get('/angket-kepuasan-layanan', [FrontendController::class, 'angketkepuasanlayanan']);
Route::get('/kontak', [FrontendController::class, 'kontak']);
Route::post('/kontak/store', [FrontendController::class, 'kontakstore']);

Route::get('/international-office', [FrontendController::class, 'io']);

Route::get('/mitra', [FrontendController::class, 'mitra']);
//End Halaman Utama

//Login
Route::get('/login', [AuthsController::class, 'loginindex'])->name('login')->middleware('guest');
Route::post('/postlogin', [AuthsController::class, 'authenticate']);

//Login Pegawai
Route::get('/login-pegawai', [PegawaiController::class, 'index'])->name('loginpegawai')->middleware('guest');
Route::post('/postloginpegawai', [PegawaiController::class, 'authenticate']);

//Logout
Route::post('/logout', [AuthsController::class, 'logout']);

//Logout Pegawai
Route::post('/logoutpegawai', [PegawaiController::class, 'logout']);

//Register
Route::get('/register', [AuthsController::class, 'registerindex'])->middleware('guest');
//Forgot
Route::get('/forgot-password', [AuthsController::class, 'forgotindex'])->middleware('guest');

// Route::get('/logout', [AuthsController::class, 'logout'])->name('logout');

//End Login

//Admin
Route::group(['middleware' => ['auth']], function () {
    
    Route::prefix('admin')->middleware('ceklevel:admin')->group(function(){
        // Profile
        Route::get('/profile', [BackendController::class, 'profile']);
        Route::get('/profile/edit/{id}', [BackendController::class, 'profileedit']);
        Route::post('/profile/update/{id}', [BackendController::class, 'profileupdate']);
        Route::get('/profile/avatar-update/{id}', [BackendController::class, 'avatarupdate']);
        Route::get('/ubah-password', [BackendController::class, 'password']);
        Route::get('/ubah-password/edit/{id}', [BackendController::class, 'passwordedit']);
        Route::post('/ubah-password/update/{id}', [BackendController::class, 'passwordupdate']);
        // User
        Route::get('/user', [BackendController::class, 'useradmin']);
        Route::post('/user/store', [BackendController::class, 'userstore']);
        Route::get('/user/edit/{id}', [BackendController::class, 'useredit']);
        Route::post('/user/update/{id}', [BackendController::class, 'userupdate']);
        Route::post('/user/update-password/{id}', [BackendController::class, 'userpassupdate']);
        Route::get('/user/delete/{id}', [BackendController::class, 'userdestroy']);
        
        // Dashboard
        Route::get('/dashboard', [BackendController::class, 'dashboard']);

        // Settings
        // Route::get('/settings', [BackendController::class, 'settings']);
        // Route::post('/settings/berandastore', [BackendController::class, 'berandastore']);
        // Route::get('/settings/berandaedit/{id}', [BackendController::class, 'berandaedit']);
        // Route::post('/settings/berandaupdate/{id}', [BackendController::class, 'berandaupdate']);
        // Route::get('/settings/berandadelete/{id}', [BackendController::class, 'berandadestroy']);
        // ProfilUINSGD
        // Route::get('/settings/profiluinsgdedit/{id}', [BackendController::class, 'profiluinsgdedit']);
        // Route::post('/settings/profiluinsgdupdate/{id}', [BackendController::class, 'profiluinsgdupdate']);
        // CapaianKinerja
        // Route::get('/settings/capaiankinerjaedit/{id}', [BackendController::class, 'caperedit']);
        // Route::post('/settings/capaiankinerjaupdate/{id}', [BackendController::class, 'caperupdate']);
        // Kategori Berita
        // Route::post('/settings/kaberstore', [BackendController::class, 'kaberstore']);
        // Route::get('/settings/kaberedit/{id}', [BackendController::class, 'kaberedit']);
        // Route::post('/settings/kaberupdate/{id}', [BackendController::class, 'kaberupdate']);
        // Route::get('/settings/kaberdelete/{id}', [BackendController::class, 'kaberdestroy']);
        // Kategori Mitra
        // Route::post('/settings/kakoinstore', [BackendController::class, 'kakoinstore']);
        // Route::post('/settings/kakeinstore', [BackendController::class, 'kakeinstore']);
        // Route::post('/settings/kajenastore', [BackendController::class, 'kajenastore']);
        // Route::get('/settings/kakoinedit/{id}', [BackendController::class, 'kakoinedit']);
        // Route::get('/settings/kakeinedit/{id}', [BackendController::class, 'kakeinedit']);
        // Route::get('/settings/kajenaedit/{id}', [BackendController::class, 'kajenaedit']);
        // Route::post('/settings/kakoinupdate/{id}', [BackendController::class, 'kakoinupdate']);
        // Route::post('/settings/kakeinupdate/{id}', [BackendController::class, 'kakeinupdate']);
        // Route::post('/settings/kajenaupdate/{id}', [BackendController::class, 'kajenaupdate']);
        // Route::get('/settings/kakoindelete/{id}', [BackendController::class, 'kakoindestroy']);
        // Route::get('/settings/kakeindelete/{id}', [BackendController::class, 'kakeindestroy']);
        // Route::get('/settings/kajenadelete/{id}', [BackendController::class, 'kajenadestroy']);

        // SettingsV2
        Route::get('/tampilan-beranda', [BackendController::class, 'tampilanberanda']);
        Route::post('/tampilan-beranda/carouselstore', [BackendController::class, 'berandastore']);
        Route::get('/tampilan-beranda/carouseledit/{id}', [BackendController::class, 'berandaedit']);
        Route::post('/tampilan-beranda/carouselupdate/{id}', [BackendController::class, 'berandaupdate']);
        Route::get('/tampilan-beranda/carouseldelete/{id}', [BackendController::class, 'berandadestroy']);
        // ProfilUINSGDV2
        Route::get('/tampilan-beranda/profiluinsgdedit/{id}', [BackendController::class, 'profiluinsgdedit']);
        Route::post('/tampilan-beranda/profiluinsgdupdate/{id}', [BackendController::class, 'profiluinsgdupdate']);
        // CapaianKinerjaV2
        Route::get('/tampilan-beranda/capaiankinerjaedit/{id}', [BackendController::class, 'caperedit']);
        Route::post('/tampilan-beranda/capaiankinerjaupdate/{id}', [BackendController::class, 'caperupdate']);
        // Kategori BeritaV2
        Route::get('/kategori', [BackendController::class, 'kategori']);
        Route::post('/kategori/kaberstore', [BackendController::class, 'kaberstore']);
        Route::get('/kategori/kaberedit/{id}', [BackendController::class, 'kaberedit']);
        Route::post('/kategori/kaberupdate/{id}', [BackendController::class, 'kaberupdate']);
        Route::get('/kategori/kaberdelete/{id}', [BackendController::class, 'kaberdestroy']);
        // Kategori MitraV2
        Route::post('/kategori/kakoinstore', [BackendController::class, 'kakoinstore']);
        Route::post('/kategori/kakeinstore', [BackendController::class, 'kakeinstore']);
        Route::post('/kategori/kajenastore', [BackendController::class, 'kajenastore']);
        Route::get('/kategori/kakoinedit/{id}', [BackendController::class, 'kakoinedit']);
        Route::get('/kategori/kakeinedit/{id}', [BackendController::class, 'kakeinedit']);
        Route::get('/kategori/kajenaedit/{id}', [BackendController::class, 'kajenaedit']);
        Route::post('/kategori/kakoinupdate/{id}', [BackendController::class, 'kakoinupdate']);
        Route::post('/kategori/kakeinupdate/{id}', [BackendController::class, 'kakeinupdate']);
        Route::post('/kategori/kajenaupdate/{id}', [BackendController::class, 'kajenaupdate']);
        Route::get('/kategori/kakoindelete/{id}', [BackendController::class, 'kakoindestroy']);
        Route::get('/kategori/kakeindelete/{id}', [BackendController::class, 'kakeindestroy']);
        Route::get('/kategori/kajenadelete/{id}', [BackendController::class, 'kajenadestroy']);

        // Wakil Rektor
        Route::get('/wakil-rektor', [BackendController::class, 'wakilrektor']);
        Route::get('/wakil-rektor/edit/{id}', [BackendController::class, 'wakilrektoredit']);
        Route::post('/wakil-rektor/update/{id}', [BackendController::class, 'wakilrektorupdate']);

        // Visi-Misi
        Route::get('/visi-misi', [BackendController::class, 'visimisi']);
        Route::get('/visi-misi/visiedit/{id}', [BackendController::class, 'visiedit']);
        Route::get('/visi-misi/misiedit/{id}', [BackendController::class, 'misiedit']);
        Route::post('/visi-misi/visiupdate/{id}', [BackendController::class, 'visiupdate']);
        Route::post('/visi-misi/misiupdate/{id}', [BackendController::class, 'misiupdate']);

        // Tugas Pokok Fungsi
        Route::get('/tugas-pokok-fungsi', [BackendController::class, 'tupoksi']);
        Route::get('/tugas-pokok-fungsi/edit/{id}', [BackendController::class, 'tupoksiedit']);
        Route::post('/tugas-pokok-fungsi/update/{id}', [BackendController::class, 'tupoksiupdate']);

        // Kebijakan Program
        Route::get('/kebijakan-program', [BackendController::class, 'kepro']);
        Route::get('/kebijakan-program/edit/{id}', [BackendController::class, 'keproedit']);
        Route::post('/kebijakan-program/update/{id}', [BackendController::class, 'keproupdate']);

        // Struktur
        Route::get('/struktur', [BackendController::class, 'struktur']);
        Route::get('/struktur/edit/{id}', [BackendController::class, 'strukturedit']);
        Route::post('/struktur/update/{id}', [BackendController::class, 'strukturupdate']);

        // Alur Kerjasama
        Route::get('/alur-kerjasama', [BackendController::class, 'alurkerjasama']);
        Route::get('/alur-kerjasama/edit/{id}', [BackendController::class, 'alurkerjasamaedit']);
        Route::post('/alur-kerjasama/update/{id}', [BackendController::class, 'alurkerjasamaupdate']);

        // Progres Pengajuan Kerjasama
        Route::get('/progres-pengajuan-kerjasama', [BackendController::class, 'propeker']);
        Route::post('/progres-pengajuan-kerjasama/store', [BackendController::class, 'propekerstore']);
        Route::get('/progres-pengajuan-kerjasama/edit/{id}', [BackendController::class, 'propekeredit']);
        Route::post('/progres-pengajuan-kerjasama/update/{id}', [BackendController::class, 'propekerupdate']);
        Route::get('/progres-pengajuan-kerjasama/delete/{id}', [BackendController::class, 'propekerdestroy']);

        // FAQ
        Route::get('/faq', [BackendController::class, 'faq']);
        Route::post('/faq/store', [BackendController::class, 'faqstore']);
        Route::get('/faq/edit/{id}', [BackendController::class, 'faqedit']);
        Route::post('/faq/update/{id}', [BackendController::class, 'faqupdate']);
        Route::get('/faq/delete/{id}', [BackendController::class, 'faqdestroy']);

        // Berita
        Route::get('/berita', [BackendController::class, 'berita']);
        Route::post('/berita/store', [BackendController::class, 'beritastore']);
        Route::get('/berita/edit/{id}', [BackendController::class, 'beritaedit']);
        Route::post('/berita/update/{id}', [BackendController::class, 'beritaupdate']);
        Route::get('/berita/delete/{id}', [BackendController::class, 'beritadestroy']);

        // Pengumuman
        Route::get('/pengumuman', [BackendController::class, 'pengumuman']);
        Route::post('/pengumuman/store', [BackendController::class, 'pengumumanstore']);
        Route::get('/pengumuman/edit/{id}', [BackendController::class, 'pengumumanedit']);    
        Route::post('/pengumuman/update/{id}', [BackendController::class, 'pengumumanupdate']);
        Route::get('/pengumuman/delete/{id}', [BackendController::class, 'pengumumandestroy']);

        // Galeri
        Route::get('/galeri', [BackendController::class, 'galeri']);
        Route::post('/galeri/store', [BackendController::class, 'galeristore']);
        Route::get('/galeri/edit/{id}', [BackendController::class, 'galeriedit']);
        Route::post('/galeri/update/{id}', [BackendController::class, 'galeriupdate']);
        Route::get('/galeri/delete/{id}', [BackendController::class, 'galeridestroy']);

        // Berkas Kerjasama
        Route::get('/berkas-kerjasama', [BackendController::class, 'berkaskerjasama']);
        Route::post('/berkas-kerjasama/store', [BackendController::class, 'berkaskerjasamastore']);
        Route::get('/berkas-kerjasama/edit/{id}', [BackendController::class, 'berkaskerjasamaedit']);
        Route::post('/berkas-kerjasama/update/{id}', [BackendController::class, 'berkaskerjasamaupdate']);
        Route::get('/berkas-kerjasama/delete/{id}', [BackendController::class, 'berkaskerjasamadestroy']);

        // Ajukan Kerjasama
        Route::get('/ajukan-kerjasama', [BackendController::class, 'ajukankerjasama']);
        Route::post('/ajukan-kerjasama/store', [BackendController::class, 'ajukankerjasamastore']);
        Route::get('/ajukan-kerjasama/edit/{id}', [BackendController::class, 'ajukankerjasamaedit']);    
        Route::post('/ajukan-kerjasama/update/{id}', [BackendController::class, 'ajukankerjasamaupdate']);
        Route::get('/ajukan-kerjasama/delete/{id}', [BackendController::class, 'ajukankerjasamadestroy']);

        // Angket Kepuasan Layanan
        Route::get('/angket-kepuasan-layanan', [BackendController::class, 'angketkepuasanlayanan']);
        Route::get('/angket-kepuasan-layanan/edit/{id}', [BackendController::class, 'angketkepuasanlayananedit']);    
        Route::post('/angket-kepuasan-layanan/update/{id}', [BackendController::class, 'angketkepuasanlayananupdate']);

        // Kontak
        Route::get('/kontak', [BackendController::class, 'kontak']);
        Route::post('/kontak/store', [BackendController::class, 'kontakstore']);
        Route::get('/kontak/edit/{id}', [BackendController::class, 'kontakedit']);    
        Route::post('/kontak/update/{id}', [BackendController::class, 'kontakupdate']);
        Route::get('/kontak/delete/{id}', [BackendController::class, 'kontakdestroy']);

        // International Office
        Route::get('/international-office', [BackendController::class, 'io']);
        Route::get('/international-office/edit/{id}', [BackendController::class, 'ioedit']);
        Route::post('/international-office/update/{id}', [BackendController::class, 'ioupdate']);
        
        // Mitra
        Route::get('/mitra', [BackendController::class, 'mitra']);
        Route::post('/mitra/store', [BackendController::class, 'mitrastore']);
        Route::get('/mitra/edit/{id}', [BackendController::class, 'mitraedit']);    
        Route::post('/mitra/update/{id}', [BackendController::class, 'mitraupdate']);
        Route::get('/mitra/delete/{id}', [BackendController::class, 'mitradestroy']);
        Route::get('/mitra/export', [BackendController::class, 'mitraexport']);
        Route::post('/mitra/import', [BackendController::class, 'mitraimport']);
        Route::get('/mitra-print', [BackendController::class, 'mitraprint']);
    });

    Route::prefix('pimpinan')->middleware('ceklevel:pimpinan')->group(function(){
        // Profile
        Route::get('/profile', [BackendPimpinanController::class, 'profile']);
        Route::get('/profile/edit/{id}', [BackendPimpinanController::class, 'profileedit']);
        Route::post('/profile/update/{id}', [BackendPimpinanController::class, 'profileupdate']);
        Route::get('/profile/avatar-update/{id}', [BackendController::class, 'avatarupdate']);
        Route::get('/ubah-password', [BackendPimpinanController::class, 'password']);
        Route::get('/ubah-password/edit/{id}', [BackendPimpinanController::class, 'passwordedit']);
        Route::post('/ubah-password/update/{id}', [BackendPimpinanController::class, 'passwordupdate']);

        // Dashboard
        Route::get('/dashboard', [BackendPimpinanController::class, 'dashboard']);

        // Mitra
        Route::get('/mitra', [BackendPimpinanController::class, 'mitra']);
        Route::get('/mitra-print', [BackendPimpinanController::class, 'mitraprint']);
    });

    Route::prefix('staff')->middleware('ceklevel:staff')->group(function(){
        // Profile
        Route::get('/profile', [BackendStaffController::class, 'profile']);
        Route::get('/profile/edit/{id}', [BackendStaffController::class, 'profileedit']);
        Route::post('/profile/update/{id}', [BackendStaffController::class, 'profileupdate']);
        Route::get('/profile/avatar-update/{id}', [BackendController::class, 'avatarupdate']);
        Route::get('/ubah-password', [BackendStaffController::class, 'password']);
        Route::get('/ubah-password/edit/{id}', [BackendStaffController::class, 'passwordedit']);
        Route::post('/ubah-password/update/{id}', [BackendStaffController::class, 'passwordupdate']);

        // Dashboard
        Route::get('/dashboard', [BackendStaffController::class, 'dashboard']);

        // Mitra
        Route::get('/mitra', [BackendStaffController::class, 'mitra']);
        Route::post('/mitra/store', [BackendStaffController::class, 'mitrastore']);
        Route::get('/mitra/edit/{id}', [BackendStaffController::class, 'mitraedit']);    
        Route::post('/mitra/update/{id}', [BackendStaffController::class, 'mitraupdate']);
        Route::get('/mitra/delete/{id}', [BackendStaffController::class, 'mitradestroy']);
        Route::get('/mitra/export', [BackendStaffController::class, 'mitraexport']);
        Route::post('/mitra/import', [BackendStaffController::class, 'mitraimport']);
        Route::get('/mitra-print', [BackendStaffController::class, 'mitraprint']);
    });

    Route::prefix('user')->middleware('ceklevel:user')->group(function(){
        // Profile
        Route::get('/profile', [BackendUserController::class, 'profile']);
        Route::get('/profile/edit/{id}', [BackendUserController::class, 'profileedit']);
        Route::post('/profile/update/{id}', [BackendUserController::class, 'profileupdate']);
        Route::get('/profile/avatar-update/{id}', [BackendController::class, 'avatarupdate']);
        Route::get('/ubah-password', [BackendUserController::class, 'password']);
        Route::get('/ubah-password/edit/{id}', [BackendUserController::class, 'passwordedit']);
        Route::post('/ubah-password/update/{id}', [BackendUserController::class, 'passwordupdate']);

        // Dashboard
        Route::get('/dashboard', [BackendUserController::class, 'dashboard']);

        // Progres Pengajuan Kerjasama
        // Route::get('/progres-pengajuan-kerjasama', [BackendUserController::class, 'propeker']);
    });
});

//Pegawai
Route::prefix('pegawai')->middleware('authpegawai')->group(function(){
    // Profile
    Route::get('/profile', [BackendPegawaiController::class, 'profile']);
    Route::get('/profile/edit/{id}', [BackendPegawaiController::class, 'profileedit']);
    Route::post('/profile/update/{id}', [BackendPegawaiController::class, 'profileupdate']);
    // Route::get('/profile/avatar-update/{id}', [BackendController::class, 'avatarupdate']);
    // Route::get('/ubah-password', [BackendPegawaiController::class, 'password']);
    Route::get('/ubah-password/edit/{id}', [BackendPegawaiController::class, 'passwordedit']);
    Route::post('/ubah-password/update/{id}', [BackendPegawaiController::class, 'passwordupdate']);

    // Dashboard
    Route::get('/dashboard', [BackendPegawaiController::class, 'dashboard']);

    // Mitra
    Route::get('/mitra', [BackendPegawaiController::class, 'mitra']);
    Route::post('/mitra/store', [BackendPegawaiController::class, 'mitrastore']);
    Route::get('/mitra/edit/{id}', [BackendPegawaiController::class, 'mitraedit']);    
    Route::post('/mitra/update/{id}', [BackendPegawaiController::class, 'mitraupdate']);
    Route::get('/mitra/delete/{id}', [BackendPegawaiController::class, 'mitradestroy']);
    Route::get('/mitra/export', [BackendPegawaiController::class, 'mitraexport']);
    Route::post('/mitra/import', [BackendPegawaiController::class, 'mitraimport']);
    Route::get('/mitra-print', [BackendPegawaiController::class, 'mitraprint']);
});