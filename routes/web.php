<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthsController;

//Halaman Utama Start
use App\Http\Controllers\FrontendController;
//End Halaman Utama

//Admin Start
use App\Http\Controllers\BackendController;
//Admin End

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
Route::get('/pengumuman-detail/{slug}', [FrontendController::class, 'bedet'])->name('pengumuman-detail');
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
//Logout
Route::post('/logout', [AuthsController::class, 'logout']);
//Register
Route::get('/register', [AuthsController::class, 'registerindex'])->middleware('guest');

// Route::get('/logout', [AuthsController::class, 'logout'])->name('logout');

//End Login

//Admin
Route::group(['middleware' => 'auth'], function () {
    Route::prefix('admin')->middleware('Ceklevel:admin')->group(function(){
        // Dashboard
        Route::get('/admin/dashboard', [BackendController::class, 'dashboard']);

        // Settings
        Route::get('/admin/settings', [BackendController::class, 'settings']);
        Route::post('/admin/settings/berandastore', [BackendController::class, 'berandastore']);
        Route::get('/admin/settings/berandaedit/{id}', [BackendController::class, 'berandaedit']);
        Route::post('/admin/settings/berandaupdate/{id}', [BackendController::class, 'berandaupdate']);
        Route::get('/admin/settings/berandadelete/{id}', [BackendController::class, 'berandadestroy']);
        // ProfilUINSGD
        Route::get('/admin/settings/profiluinsgdedit/{id}', [BackendController::class, 'profiluinsgdedit']);
        Route::post('/admin/settings/profiluinsgdupdate/{id}', [BackendController::class, 'profiluinsgdupdate']);
        // CapaianKinerja
        Route::get('/admin/settings/capaiankinerjaedit/{id}', [BackendController::class, 'caperedit']);
        Route::post('/admin/settings/capaiankinerjaupdate/{id}', [BackendController::class, 'caperupdate']);
        // User
        Route::post('/admin/settings/userstore', [BackendController::class, 'userstore']);
        Route::get('/admin/settings/useredit/{id}', [BackendController::class, 'useredit']);
        Route::post('/admin/settings/userupdate/{id}', [BackendController::class, 'userupdate']);
        Route::get('/admin/settings/userdelete/{id}', [BackendController::class, 'userdestroy']);
        // Kategori Berita
        Route::post('/admin/settings/kaberstore', [BackendController::class, 'kaberstore']);
        Route::get('/admin/settings/kaberedit/{id}', [BackendController::class, 'kaberedit']);
        Route::post('/admin/settings/kaberupdate/{id}', [BackendController::class, 'kaberupdate']);
        Route::get('/admin/settings/kaberdelete/{id}', [BackendController::class, 'kaberdestroy']);
        // Kategori Mitra
        Route::post('/admin/settings/kakoinstore', [BackendController::class, 'kakoinstore']);
        Route::post('/admin/settings/kakeinstore', [BackendController::class, 'kakeinstore']);
        Route::post('/admin/settings/kajenastore', [BackendController::class, 'kajenastore']);
        Route::get('/admin/settings/kakoinedit/{id}', [BackendController::class, 'kakoinedit']);
        Route::get('/admin/settings/kakeinedit/{id}', [BackendController::class, 'kakeinedit']);
        Route::get('/admin/settings/kajenaedit/{id}', [BackendController::class, 'kajenaedit']);
        Route::post('/admin/settings/kakoinupdate/{id}', [BackendController::class, 'kakoinupdate']);
        Route::post('/admin/settings/kakeinupdate/{id}', [BackendController::class, 'kakeinupdate']);
        Route::post('/admin/settings/kajenaupdate/{id}', [BackendController::class, 'kajenaupdate']);
        Route::get('/admin/settings/kakoindelete/{id}', [BackendController::class, 'kakoindestroy']);
        Route::get('/admin/settings/kakeindelete/{id}', [BackendController::class, 'kakeindestroy']);
        Route::get('/admin/settings/kajenadelete/{id}', [BackendController::class, 'kajenadestroy']);

        // Wakil Rektor
        Route::get('/admin/wakil-rektor', [BackendController::class, 'wakilrektor']);
        Route::get('/admin/wakil-rektor/edit/{id}', [BackendController::class, 'wakilrektoredit']);
        Route::post('/admin/wakil-rektor/update/{id}', [BackendController::class, 'wakilrektorupdate']);

        // Visi-Misi
        Route::get('/admin/visi-misi', [BackendController::class, 'visimisi']);
        Route::get('/admin/visi-misi/visiedit/{id}', [BackendController::class, 'visiedit']);
        Route::get('/admin/visi-misi/misiedit/{id}', [BackendController::class, 'misiedit']);
        Route::post('/admin/visi-misi/visiupdate/{id}', [BackendController::class, 'visiupdate']);
        Route::post('/admin/visi-misi/misiupdate/{id}', [BackendController::class, 'misiupdate']);

        // Tugas Pokok Fungsi
        Route::get('/admin/tugas-pokok-fungsi', [BackendController::class, 'tupoksi']);
        Route::get('/admin/tugas-pokok-fungsi/edit/{id}', [BackendController::class, 'tupoksiedit']);
        Route::post('/admin/tugas-pokok-fungsi/update/{id}', [BackendController::class, 'tupoksiupdate']);

        // Kebijakan Program
        Route::get('/admin/kebijakan-program', [BackendController::class, 'kepro']);
        Route::get('/admin/kebijakan-program/edit/{id}', [BackendController::class, 'keproedit']);
        Route::post('/admin/kebijakan-program/update/{id}', [BackendController::class, 'keproupdate']);

        // Struktur
        Route::get('/admin/struktur', [BackendController::class, 'struktur']);
        Route::get('/admin/struktur/edit/{id}', [BackendController::class, 'strukturedit']);
        Route::post('/admin/struktur/update/{id}', [BackendController::class, 'strukturupdate']);

        // Alur Kerjasama
        Route::get('/admin/alur-kerjasama', [BackendController::class, 'alurkerjasama']);
        Route::get('/admin/alur-kerjasama/edit/{id}', [BackendController::class, 'alurkerjasamaedit']);
        Route::post('/admin/alur-kerjasama/update/{id}', [BackendController::class, 'alurkerjasamaupdate']);

        // Progres Pengajuan Kerjasama
        Route::get('/admin/progres-pengajuan-kerjasama', [BackendController::class, 'propeker']);
        Route::post('/admin/progres-pengajuan-kerjasama/store', [BackendController::class, 'propekerstore']);
        Route::get('/admin/progres-pengajuan-kerjasama/edit/{id}', [BackendController::class, 'propekeredit']);
        Route::post('/admin/progres-pengajuan-kerjasama/update/{id}', [BackendController::class, 'propekerupdate']);
        Route::get('/admin/progres-pengajuan-kerjasama/delete/{id}', [BackendController::class, 'propekerdestroy']);

        // FAQ
        Route::get('/admin/faq', [BackendController::class, 'faq']);
        Route::post('/admin/faq/store', [BackendController::class, 'faqstore']);
        Route::get('/admin/faq/edit/{id}', [BackendController::class, 'faqedit']);
        Route::post('/admin/faq/update/{id}', [BackendController::class, 'faqupdate']);
        Route::get('/admin/faq/delete/{id}', [BackendController::class, 'faqdestroy']);

        // Berita
        Route::get('/admin/berita', [BackendController::class, 'berita']);
        Route::post('/admin/berita/store', [BackendController::class, 'beritastore']);
        Route::get('/admin/berita/edit/{id}', [BackendController::class, 'beritaedit']);
        Route::post('/admin/berita/update/{id}', [BackendController::class, 'beritaupdate']);
        Route::get('/admin/berita/delete/{id}', [BackendController::class, 'beritadestroy']);

        // Pengumuman
        Route::get('/admin/pengumuman', [BackendController::class, 'pengumuman']);
        Route::post('/admin/pengumuman/store', [BackendController::class, 'pengumumanstore']);
        Route::get('/admin/pengumuman/edit/{id}', [BackendController::class, 'pengumumanedit']);    
        Route::post('/admin/pengumuman/update/{id}', [BackendController::class, 'pengumumanupdate']);
        Route::get('/admin/pengumuman/delete/{id}', [BackendController::class, 'pengumumandestroy']);

        // Galeri
        Route::get('/admin/galeri', [BackendController::class, 'galeri']);
        Route::post('/admin/galeri/store', [BackendController::class, 'galeristore']);
        Route::get('/admin/galeri/edit/{id}', [BackendController::class, 'galeriedit']);
        Route::post('/admin/galeri/update/{id}', [BackendController::class, 'galeriupdate']);
        Route::get('/admin/galeri/delete/{id}', [BackendController::class, 'galeridestroy']);

        // Berkas Kerjasama
        Route::get('/admin/berkas-kerjasama', [BackendController::class, 'berkaskerjasama']);
        Route::post('/admin/berkas-kerjasama/store', [BackendController::class, 'berkaskerjasamastore']);
        Route::get('/admin/berkas-kerjasama/edit/{id}', [BackendController::class, 'berkaskerjasamaedit']);
        Route::post('/admin/berkas-kerjasama/update/{id}', [BackendController::class, 'berkaskerjasamaupdate']);
        Route::get('/admin/berkas-kerjasama/delete/{id}', [BackendController::class, 'berkaskerjasamadestroy']);

        // Ajukan Kerjasama
        Route::get('/admin/ajukan-kerjasama', [BackendController::class, 'ajukankerjasama']);
        Route::post('/admin/ajukan-kerjasama/store', [BackendController::class, 'ajukankerjasamastore']);
        Route::get('/admin/ajukan-kerjasama/edit/{id}', [BackendController::class, 'ajukankerjasamaedit']);    
        Route::post('/admin/ajukan-kerjasama/update/{id}', [BackendController::class, 'ajukankerjasamaupdate']);
        Route::get('/admin/ajukan-kerjasama/delete/{id}', [BackendController::class, 'ajukankerjasamadestroy']);

        // Angket Kepuasan Layanan
        Route::get('/admin/angket-kepuasan-layanan', [BackendController::class, 'angketkepuasanlayanan']);
        Route::get('/admin/angket-kepuasan-layanan/edit/{id}', [BackendController::class, 'angketkepuasanlayananedit']);    
        Route::post('/admin/angket-kepuasan-layanan/update/{id}', [BackendController::class, 'angketkepuasanlayananupdate']);

        // Kontak
        Route::get('/admin/kontak', [BackendController::class, 'kontak']);
        Route::post('/admin/kontak/store', [BackendController::class, 'kontakstore']);
        Route::get('/admin/kontak/edit/{id}', [BackendController::class, 'kontakedit']);    
        Route::post('/admin/kontak/update/{id}', [BackendController::class, 'kontakupdate']);
        Route::get('/admin/kontak/delete/{id}', [BackendController::class, 'kontakdestroy']);

        // International Office
        Route::get('/admin/international-office', [BackendController::class, 'io']);
        Route::get('/admin/international-office/edit/{id}', [BackendController::class, 'ioedit']);
        Route::post('/admin/international-office/update/{id}', [BackendController::class, 'ioupdate']);
        
        // Mitra
        Route::get('/admin/mitra', [BackendController::class, 'mitra']);
        Route::post('/admin/mitra/store', [BackendController::class, 'mitrastore']);
        Route::get('/admin/mitra/edit/{id}', [BackendController::class, 'mitraedit']);    
        Route::post('/admin/mitra/update/{id}', [BackendController::class, 'mitraupdate']);
        Route::get('/admin/mitra/delete/{id}', [BackendController::class, 'mitradestroy']);
        Route::get('/admin/mitra/export', [BackendController::class, 'mitraexport']);
        Route::post('/admin/mitra/import', [BackendController::class, 'mitraimport']);
        Route::get('/admin/mitra-print', [BackendController::class, 'mitraprint']);
    });

    Route::prefix('pimpinan')->middleware('Ceklevel:pimpinan')->group(function(){
        // Dashboard
        Route::get('/pimpinan/dashboard', [BackendController::class, 'dashboard']);

        // Mitra
        Route::get('/pimpinan/mitra', [BackendController::class, 'mitra']);
    });

    Route::prefix('staff')->middleware('Ceklevel:staff')->group(function(){
        // Dashboard
        Route::get('/staff/dashboard', [BackendController::class, 'dashboard']);

        // Mitra
        Route::get('/staff/mitra', [BackendController::class, 'mitra']);
        Route::post('/staff/mitra/store', [BackendController::class, 'mitrastore']);
        Route::get('/staff/mitra/edit/{id}', [BackendController::class, 'mitraedit']);    
        Route::post('/staff/mitra/update/{id}', [BackendController::class, 'mitraupdate']);
        Route::get('/staff/mitra/delete/{id}', [BackendController::class, 'mitradestroy']);
        Route::get('/staff/mitra/export', [BackendController::class, 'mitraexport']);
        Route::post('/staff/mitra/import', [BackendController::class, 'mitraimport']);
        Route::get('/staff/mitra-print', [BackendController::class, 'mitraprint']);
    });

    Route::prefix('user')->middleware('Ceklevel:user')->group(function(){
        // Progres Pengajuan Kerjasama
        Route::get('/user/progres-pengajuan-kerjasama', [BackendController::class, 'propeker']);
    });
});

