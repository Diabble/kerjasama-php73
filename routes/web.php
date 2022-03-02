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
    return view('layout.contact');
});

Route::get('/portfolio', function () {
    return view('layout.portfolio');
});

Route::get('/service', function () {
    return view('layout.service');
});

Route::get('/single', function () {
    return view('layout.single');
});

Route::get('/about', function () {
    return view('layout.about');
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
Route::get('/berita', [FrontendController::class, 'berita']);
Route::get('/pengumuman', [FrontendController::class, 'pengumuman']);
Route::get('/galeri', [FrontendController::class, 'galeri']);

Route::get('/berkas-kerjasama', [FrontendController::class, 'berkaskerjasama']);
Route::get('/layanan-online', [FrontendController::class, 'layananonline']);
Route::get('/layanan-kepuasan', [FrontendController::class, 'layanankepuasan']);
Route::get('/layanan-kami', [FrontendController::class, 'layanankami']);

Route::get('/international-office', [FrontendController::class, 'io']);

Route::get('/mitra', [FrontendController::class, 'mitra']);
//End Halaman Utama

//Login
Route::get('/login', [AuthsController::class, 'loginindex'])->name('login');
Route::get('/register', [AuthsController::class, 'registerindex'])->name('register');

Route::post('/postlogin', [AuthsController::class, 'login']);

Route::get('/logout', [AuthsController::class, 'logout'])->name('logout');
//End Login

//Admin
Route::group(['middleware' => 'auth'], function () {
    // Dashboard
    Route::get('/dashboard', [BackendController::class, 'dashboard']);

    // Settings
    Route::get('/settings', [BackendController::class, 'settings']);
    Route::post('/settings/berandastore', [BackendController::class, 'berandastore']);
    Route::get('/settings/berandaedit/{id}', [BackendController::class, 'berandaedit']);
    Route::post('/settings/berandaupdate/{id}', [BackendController::class, 'berandaupdate']);
    Route::get('/settings/berandadelete/{id}', [BackendController::class, 'berandadestroy']);
    Route::post('/settings/userstore', [BackendController::class, 'userstore']);
    Route::get('/settings/useredit/{id}', [BackendController::class, 'useredit']);
    Route::post('/settings/userupdate/{id}', [BackendController::class, 'userupdate']);
    Route::get('/settings/userdelete/{id}', [BackendController::class, 'userdestroy']);
    Route::post('/settings/kaberstore', [BackendController::class, 'kaberstore']);
    Route::get('/settings/kaberedit/{id}', [BackendController::class, 'kaberedit']);
    Route::post('/settings/kaberupdate/{id}', [BackendController::class, 'kaberupdate']);
    Route::get('/settings/kaberdelete/{id}', [BackendController::class, 'kaberdestroy']);
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
    Route::get('/wakil-rektor-admin', [BackendController::class, 'wakilrektor']);
    Route::get('/wakil-rektor-admin/edit/{id}', [BackendController::class, 'wakilrektoredit']);
    Route::post('/wakil-rektor-admin/update/{id}', [BackendController::class, 'wakilrektorupdate']);

    // Visi-Misi
    Route::get('/visi-misi-admin', [BackendController::class, 'visimisi']);
    Route::get('/visi-misi-admin/visiedit/{id}', [BackendController::class, 'visiedit']);
    Route::get('/visi-misi-admin/misiedit/{id}', [BackendController::class, 'misiedit']);
    Route::post('/visi-misi-admin/visiupdate/{id}', [BackendController::class, 'visiupdate']);
    Route::post('/visi-misi-admin/misiupdate/{id}', [BackendController::class, 'misiupdate']);

    // Tugas Pokok Fungsi
    Route::get('/tugas-pokok-fungsi-admin', [BackendController::class, 'tupoksi']);
    Route::get('/tugas-pokok-fungsi-admin/edit/{id}', [BackendController::class, 'tupoksiedit']);
    Route::post('/tugas-pokok-fungsi-admin/update/{id}', [BackendController::class, 'tupoksiupdate']);

    // Kebijakan Program
    Route::get('/kebijakan-program-admin', [BackendController::class, 'kepro']);
    Route::get('/kebijakan-program-admin/edit/{id}', [BackendController::class, 'keproedit']);
    Route::post('/kebijakan-program-admin/update/{id}', [BackendController::class, 'keproupdate']);

    // Struktur
    Route::get('/struktur-admin', [BackendController::class, 'struktur']);
    Route::get('/struktur-admin/edit/{id}', [BackendController::class, 'strukturedit']);
    Route::post('/struktur-admin/update/{id}', [BackendController::class, 'strukturupdate']);

    // Alur Kerjasama
    Route::get('/alur-kerjasama-admin', [BackendController::class, 'alurkerjasama']);
    Route::get('/alur-kerjasama-admin/edit/{id}', [BackendController::class, 'alurkerjasamaedit']);
    Route::post('/alur-kerjasama-admin/update/{id}', [BackendController::class, 'alurkerjasamaupdate']);

    // Progres Pengajuan Kerjasama
    Route::get('/progres-pengajuan-kerjasama-admin', [BackendController::class, 'propeker']);
    Route::get('/progres-pengajuan-kerjasama-admin/edit/{id}', [BackendController::class, 'propekeredit']);
    Route::post('/progres-pengajuan-kerjasama-admin/update/{id}', [BackendController::class, 'propekerupdate']);

    // FAQ
    Route::get('/faq-admin', [BackendController::class, 'faq']);
    Route::post('/faq-admin/store', [BackendController::class, 'faqstore']);
    Route::get('/faq-admin/edit/{id}', [BackendController::class, 'faqedit']);
    Route::post('/faq-admin/update/{id}', [BackendController::class, 'faqupdate']);
    Route::get('/faq-admin/delete/{id}', [BackendController::class, 'faqdestroy']);

    // Kategori Berita
    // Route::get('/kategori-berita-admin', [BackendController::class, 'kaber']);
    // Route::get('/kategori-berita-admin/store', [BackendController::class, 'kaberstore']);
    // Route::get('/kategori-berita-admin/edit/{id}', [BackendController::class, 'kaberedit']);
    // Route::post('/kategori-berita-admin/update/{id}', [BackendController::class, 'kaberupdate']);
    // Route::get('/kategori-berita-admin/delete/{id}', [BackendController::class, 'kaberdestroy']);

    // Berita
    Route::get('/berita-admin', [BackendController::class, 'berita']);
    Route::post('/berita-admin/store', [BackendController::class, 'beritastore']);
    Route::get('/berita-admin/edit/{id}', [BackendController::class, 'beritaedit']);
    Route::post('/berita-admin/update/{id}', [BackendController::class, 'beritaupdate']);
    Route::get('/berita-admin/delete/{id}', [BackendController::class, 'beritadestroy']);

    // Pengumuman
    Route::get('/pengumuman-admin', [BackendController::class, 'pengumuman']);
    Route::post('/pengumuman-admin/store', [BackendController::class, 'pengumumanstore']);
    Route::get('/pengumuman-admin/edit/{id}', [BackendController::class, 'pengumumanedit']);    
    Route::post('/pengumuman-admin/update/{id}', [BackendController::class, 'pengumumanupdate']);
    Route::get('/pengumuman-admin/delete/{id}', [BackendController::class, 'pengumumandestroy']);

    // Galeri
    Route::get('/galeri-admin', [BackendController::class, 'galeri']);
    Route::post('/galeri-admin/store', [BackendController::class, 'galeristore']);
    Route::get('/galeri-admin/edit/{id}', [BackendController::class, 'galeriedit']);
    Route::post('/galeri-admin/update/{id}', [BackendController::class, 'galeriupdate']);
    Route::get('/galeri-admin/delete/{id}', [BackendController::class, 'galeridestroy']);

    // Berkas Kerjasama
    Route::get('/berkas-kerjasama-admin', [BackendController::class, 'berkaskerjasama']);
    Route::post('/berkas-kerjasama-admin/store', [BackendController::class, 'berkaskerjasamastore']);
    Route::get('/berkas-kerjasama-admin/edit/{id}', [BackendController::class, 'berkaskerjasamaedit']);
    Route::post('/berkas-kerjasama-admin/update/{id}', [BackendController::class, 'berkaskerjasamaupdate']);
    Route::get('/berkas-kerjasama-admin/delete/{id}', [BackendController::class, 'berkaskerjasamadestroy']);

    // Layanan Online
    Route::get('/layanan-online-admin', [BackendController::class, 'layananonline']);

    // Layanan Kepuasan
    Route::get('/layanan-kepuasan-admin', [BackendController::class, 'layanankepuasan']);

    // Layanan Kami
    Route::get('/layanan-kami-admin', [BackendController::class, 'layanankami']);

    // International Office
    Route::get('/international-office-admin', [BackendController::class, 'io']);
    Route::get('/international-office-admin/edit/{id}', [BackendController::class, 'ioedit']);
    Route::post('/international-office-admin/update/{id}', [BackendController::class, 'ioupdate']);
    
    // Mitra
    Route::get('/mitra-admin', [BackendController::class, 'mitra']);
    Route::post('/mitra-admin/store', [BackendController::class, 'mitrastore']);
    Route::get('/mitra-admin/edit/{id}', [BackendController::class, 'mitraedit']);    
    Route::post('/mitra-admin/update/{id}', [BackendController::class, 'mitraupdate']);
    Route::get('/mitra-admin/delete/{id}', [BackendController::class, 'mitradestroy']);
    Route::get('/mitra-print', [BackendController::class, 'mitraprint']);
});