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
//Logout
Route::post('/logout', [AuthsController::class, 'logout']);
//Register
Route::get('/register', [AuthsController::class, 'registerindex'])->middleware('guest');

// Route::get('/logout', [AuthsController::class, 'logout'])->name('logout');

//End Login

//Admin
Route::group(['middleware' => ['auth']], function () {
    // // Dashboard
    // Route::get('/dashboard', [BackendController::class, 'dashboard']);

    // // Settings
    // Route::get('/settings', [BackendController::class, 'settings']);
    // Route::post('/settings/berandastore', [BackendController::class, 'berandastore']);
    // Route::get('/settings/berandaedit/{id}', [BackendController::class, 'berandaedit']);
    // Route::post('/settings/berandaupdate/{id}', [BackendController::class, 'berandaupdate']);
    // Route::get('/settings/berandadelete/{id}', [BackendController::class, 'berandadestroy']);
    // // ProfilUINSGD
    // Route::get('/settings/profiluinsgdedit/{id}', [BackendController::class, 'profiluinsgdedit']);
    // Route::post('/settings/profiluinsgdupdate/{id}', [BackendController::class, 'profiluinsgdupdate']);
    // // CapaianKinerja
    // Route::get('/settings/capaiankinerjaedit/{id}', [BackendController::class, 'caperedit']);
    // Route::post('/settings/capaiankinerjaupdate/{id}', [BackendController::class, 'caperupdate']);
    // // User
    // Route::post('/settings/userstore', [BackendController::class, 'userstore']);
    // Route::get('/settings/useredit/{id}', [BackendController::class, 'useredit']);
    // Route::post('/settings/userupdate/{id}', [BackendController::class, 'userupdate']);
    // Route::get('/settings/userdelete/{id}', [BackendController::class, 'userdestroy']);
    // // Kategori Berita
    // Route::post('/settings/kaberstore', [BackendController::class, 'kaberstore']);
    // Route::get('/settings/kaberedit/{id}', [BackendController::class, 'kaberedit']);
    // Route::post('/settings/kaberupdate/{id}', [BackendController::class, 'kaberupdate']);
    // Route::get('/settings/kaberdelete/{id}', [BackendController::class, 'kaberdestroy']);
    // // Kategori Mitra
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

    // // Wakil Rektor
    // Route::get('/wakil-rektor-admin', [BackendController::class, 'wakilrektor']);
    // Route::get('/wakil-rektor/edit/{id}', [BackendController::class, 'wakilrektoredit']);
    // Route::post('/wakil-rektor/update/{id}', [BackendController::class, 'wakilrektorupdate']);

    // // Visi-Misi
    // Route::get('/visi-misi-admin', [BackendController::class, 'visimisi']);
    // Route::get('/visi-misi/visiedit/{id}', [BackendController::class, 'visiedit']);
    // Route::get('/visi-misi/misiedit/{id}', [BackendController::class, 'misiedit']);
    // Route::post('/visi-misi/visiupdate/{id}', [BackendController::class, 'visiupdate']);
    // Route::post('/visi-misi/misiupdate/{id}', [BackendController::class, 'misiupdate']);

    // // Tugas Pokok Fungsi
    // Route::get('/tugas-pokok-fungsi-admin', [BackendController::class, 'tupoksi']);
    // Route::get('/tugas-pokok-fungsi/edit/{id}', [BackendController::class, 'tupoksiedit']);
    // Route::post('/tugas-pokok-fungsi/update/{id}', [BackendController::class, 'tupoksiupdate']);

    // // Kebijakan Program
    // Route::get('/kebijakan-program-admin', [BackendController::class, 'kepro']);
    // Route::get('/kebijakan-program/edit/{id}', [BackendController::class, 'keproedit']);
    // Route::post('/kebijakan-program/update/{id}', [BackendController::class, 'keproupdate']);

    // // Struktur
    // Route::get('/struktur-admin', [BackendController::class, 'struktur']);
    // Route::get('/struktur/edit/{id}', [BackendController::class, 'strukturedit']);
    // Route::post('/struktur/update/{id}', [BackendController::class, 'strukturupdate']);

    // // Alur Kerjasama
    // Route::get('/alur-kerjasama-admin', [BackendController::class, 'alurkerjasama']);
    // Route::get('/alur-kerjasama/edit/{id}', [BackendController::class, 'alurkerjasamaedit']);
    // Route::post('/alur-kerjasama/update/{id}', [BackendController::class, 'alurkerjasamaupdate']);

    // // Progres Pengajuan Kerjasama
    // Route::get('/progres-pengajuan-kerjasama-admin', [BackendController::class, 'propeker']);
    // Route::post('/progres-pengajuan-kerjasama/store', [BackendController::class, 'propekerstore']);
    // Route::get('/progres-pengajuan-kerjasama/edit/{id}', [BackendController::class, 'propekeredit']);
    // Route::post('/progres-pengajuan-kerjasama/update/{id}', [BackendController::class, 'propekerupdate']);
    // Route::get('/progres-pengajuan-kerjasama/delete/{id}', [BackendController::class, 'propekerdestroy']);

    // // FAQ
    // Route::get('/faq-admin', [BackendController::class, 'faq']);
    // Route::post('/faq/store', [BackendController::class, 'faqstore']);
    // Route::get('/faq/edit/{id}', [BackendController::class, 'faqedit']);
    // Route::post('/faq/update/{id}', [BackendController::class, 'faqupdate']);
    // Route::get('/faq/delete/{id}', [BackendController::class, 'faqdestroy']);

    // // Berita
    // Route::get('/berita-admin', [BackendController::class, 'berita']);
    // Route::post('/berita/store', [BackendController::class, 'beritastore']);
    // Route::get('/berita/edit/{id}', [BackendController::class, 'beritaedit']);
    // Route::post('/berita/update/{id}', [BackendController::class, 'beritaupdate']);
    // Route::get('/berita/delete/{id}', [BackendController::class, 'beritadestroy']);

    // // Pengumuman
    // Route::get('/pengumuman-admin', [BackendController::class, 'pengumuman']);
    // Route::post('/pengumuman/store', [BackendController::class, 'pengumumanstore']);
    // Route::get('/pengumuman/edit/{id}', [BackendController::class, 'pengumumanedit']);    
    // Route::post('/pengumuman/update/{id}', [BackendController::class, 'pengumumanupdate']);
    // Route::get('/pengumuman/delete/{id}', [BackendController::class, 'pengumumandestroy']);

    // // Galeri
    // Route::get('/galeri-admin', [BackendController::class, 'galeri']);
    // Route::post('/galeri/store', [BackendController::class, 'galeristore']);
    // Route::get('/galeri/edit/{id}', [BackendController::class, 'galeriedit']);
    // Route::post('/galeri/update/{id}', [BackendController::class, 'galeriupdate']);
    // Route::get('/galeri/delete/{id}', [BackendController::class, 'galeridestroy']);

    // // Berkas Kerjasama
    // Route::get('/berkas-kerjasama-admin', [BackendController::class, 'berkaskerjasama']);
    // Route::post('/berkas-kerjasama/store', [BackendController::class, 'berkaskerjasamastore']);
    // Route::get('/berkas-kerjasama/edit/{id}', [BackendController::class, 'berkaskerjasamaedit']);
    // Route::post('/berkas-kerjasama/update/{id}', [BackendController::class, 'berkaskerjasamaupdate']);
    // Route::get('/berkas-kerjasama/delete/{id}', [BackendController::class, 'berkaskerjasamadestroy']);

    // // Ajukan Kerjasama
    // Route::get('/ajukan-kerjasama-admin', [BackendController::class, 'ajukankerjasama']);
    // Route::post('/ajukan-kerjasama/store', [BackendController::class, 'ajukankerjasamastore']);
    // Route::get('/ajukan-kerjasama/edit/{id}', [BackendController::class, 'ajukankerjasamaedit']);    
    // Route::post('/ajukan-kerjasama/update/{id}', [BackendController::class, 'ajukankerjasamaupdate']);
    // Route::get('/ajukan-kerjasama/delete/{id}', [BackendController::class, 'ajukankerjasamadestroy']);

    // // Angket Kepuasan Layanan
    // Route::get('/angket-kepuasan-layanan-admin', [BackendController::class, 'angketkepuasanlayanan']);
    // Route::get('/angket-kepuasan-layanan/edit/{id}', [BackendController::class, 'angketkepuasanlayananedit']);    
    // Route::post('/angket-kepuasan-layanan/update/{id}', [BackendController::class, 'angketkepuasanlayananupdate']);

    // // Kontak
    // Route::get('/kontak-admin', [BackendController::class, 'kontak']);
    // Route::post('/kontak/store', [BackendController::class, 'kontakstore']);
    // Route::get('/kontak/edit/{id}', [BackendController::class, 'kontakedit']);    
    // Route::post('/kontak/update/{id}', [BackendController::class, 'kontakupdate']);
    // Route::get('/kontak/delete/{id}', [BackendController::class, 'kontakdestroy']);

    // // International Office
    // Route::get('/international-office-admin', [BackendController::class, 'io']);
    // Route::get('/international-office/edit/{id}', [BackendController::class, 'ioedit']);
    // Route::post('/international-office/update/{id}', [BackendController::class, 'ioupdate']);
    
    // // Mitra
    // Route::get('/mitra-admin', [BackendController::class, 'mitra']);
    // Route::post('/mitra/store', [BackendController::class, 'mitrastore']);
    // Route::get('/mitra/edit/{id}', [BackendController::class, 'mitraedit']);    
    // Route::post('/mitra/update/{id}', [BackendController::class, 'mitraupdate']);
    // Route::get('/mitra/delete/{id}', [BackendController::class, 'mitradestroy']);
    // Route::get('/mitra/export', [BackendController::class, 'mitraexport']);
    // Route::post('/mitra/import', [BackendController::class, 'mitraimport']);
    // Route::get('/mitra-print', [BackendController::class, 'mitraprint']);

    Route::prefix('admin')->middleware('ceklevel:admin')->group(function(){
        // Dashboard
        Route::get('/dashboard', [BackendController::class, 'dashboard']);

        // Settings
        Route::get('/settings', [BackendController::class, 'settings']);
        Route::post('/settings/berandastore', [BackendController::class, 'berandastore']);
        Route::get('/settings/berandaedit/{id}', [BackendController::class, 'berandaedit']);
        Route::post('/settings/berandaupdate/{id}', [BackendController::class, 'berandaupdate']);
        Route::get('/settings/berandadelete/{id}', [BackendController::class, 'berandadestroy']);
        // ProfilUINSGD
        Route::get('/settings/profiluinsgdedit/{id}', [BackendController::class, 'profiluinsgdedit']);
        Route::post('/settings/profiluinsgdupdate/{id}', [BackendController::class, 'profiluinsgdupdate']);
        // CapaianKinerja
        Route::get('/settings/capaiankinerjaedit/{id}', [BackendController::class, 'caperedit']);
        Route::post('/settings/capaiankinerjaupdate/{id}', [BackendController::class, 'caperupdate']);
        // User
        Route::post('/settings/userstore', [BackendController::class, 'userstore']);
        Route::get('/settings/useredit/{id}', [BackendController::class, 'useredit']);
        Route::post('/settings/userupdate/{id}', [BackendController::class, 'userupdate']);
        Route::get('/settings/userdelete/{id}', [BackendController::class, 'userdestroy']);
        // Kategori Berita
        Route::post('/settings/kaberstore', [BackendController::class, 'kaberstore']);
        Route::get('/settings/kaberedit/{id}', [BackendController::class, 'kaberedit']);
        Route::post('/settings/kaberupdate/{id}', [BackendController::class, 'kaberupdate']);
        Route::get('/settings/kaberdelete/{id}', [BackendController::class, 'kaberdestroy']);
        // Kategori Mitra
        Route::post('/settings/kakoinstore', [BackendController::class, 'kakoinstore']);
        Route::post('/settings/kakeinstore', [BackendController::class, 'kakeinstore']);
        Route::post('/settings/kajenastore', [BackendController::class, 'kajenastore']);
        Route::get('/settings/kakoinedit/{id}', [BackendController::class, 'kakoinedit']);
        Route::get('/settings/kakeinedit/{id}', [BackendController::class, 'kakeinedit']);
        Route::get('/settings/kajenaedit/{id}', [BackendController::class, 'kajenaedit']);
        Route::post('/settings/kakoinupdate/{id}', [BackendController::class, 'kakoinupdate']);
        Route::post('/settings/kakeinupdate/{id}', [BackendController::class, 'kakeinupdate']);
        Route::post('/settings/kajenaupdate/{id}', [BackendController::class, 'kajenaupdate']);
        Route::get('/settings/kakoindelete/{id}', [BackendController::class, 'kakoindestroy']);
        Route::get('/settings/kakeindelete/{id}', [BackendController::class, 'kakeindestroy']);
        Route::get('/settings/kajenadelete/{id}', [BackendController::class, 'kajenadestroy']);

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

    // Route::prefix('pimpinan')->middleware('ceklevel:pimpinan')->group(function(){
    //     // Dashboard
    //     Route::get('/dashboard', [BackendController::class, 'dashboard']);

    //     // Mitra
    //     Route::get('/mitra', [BackendController::class, 'mitra']);
    // });

    Route::prefix('staff')->middleware('ceklevel:staff')->group(function(){
        // Dashboard
        Route::get('/dashboard', [BackendController::class, 'dashboard']);

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

    // Route::prefix('user')->middleware('ceklevel:user')->group(function(){
    //     // Progres Pengajuan Kerjasama
    //     Route::get('/progres-pengajuan-kerjasama', [BackendController::class, 'propeker']);
    // });
});

