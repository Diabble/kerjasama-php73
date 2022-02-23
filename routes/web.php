<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthsController;

//Halaman Utama Start
use App\Http\Controllers\FrontendController;
//End Halaman Utama

//Admin Start
use App\Http\Controllers\BackendController;

use App\Http\Controllers\Dashboard;

use App\Http\Controllers\Settings;

use App\Http\Controllers\BerandaAdmin;
use App\Http\Controllers\WakilRektorAdmin;
use App\Http\Controllers\VisiMisiAdmin;
use App\Http\Controllers\TugasPokokFungsiAdmin;
use App\Http\Controllers\KebijakanProgramAdmin;
use App\Http\Controllers\StrukturAdmin;

use App\Http\Controllers\AlurKerjasamaAdmin;
use App\Http\Controllers\ProgresPengajuanKerjasamaAdmin;
use App\Http\Controllers\FAQAdmin;
use App\Http\Controllers\KategoriAdmin;
use App\Http\Controllers\BeritaAdmin;
use App\Http\Controllers\PengumumanAdmin;
use App\Http\Controllers\GaleriAdmin;

use App\Http\Controllers\BerkasKerjasamaAdmin;
use App\Http\Controllers\LayananOnlineAdmin;
use App\Http\Controllers\LayananKepuasanAdmin;
use App\Http\Controllers\LayananKamiAdmin;

use App\Http\Controllers\MitraAdmin;
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


Route::get('/io', function () {
    return view('layout.io');
});


Route::get('/progres-pengurusan-kerjasama', function () {
    return view('layout.progres-pengurusan-kerjasama');
});

Route::get('/berita', function () {
    return view('layout.berita');
});

Route::get('/pengumuman', function () {
    return view('layout.pengumuman');
});

Route::get('/berkas-kerjasama', function () {
    return view('layout.berkas-kerjasama');
});

Route::get('/ajukan-layanan-online', function () {
    return view('layout.ajukan-layanan-online');
});

Route::get('/angket-layanan-kepuasan', function () {
    return view('layout.angket-layanan-kepuasan');
});

Route::get('/layanan-kami', function () {
    return view('layout.layanan-kami');
});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Halman Utama
Route::get('/', [FrontendController::class, 'beranda']);

Route::get('/sambutan-wakil-rektor', [FrontendController::class, 'sambutan']);
Route::get('/visi-misi', [FrontendController::class, 'visimisi']);
Route::get('/tugas-pokok-fungsi', [FrontendController::class, 'tupoksi']);
Route::get('/kebijakan-program', [FrontendController::class, 'kepro']);
Route::get('/struktur', [FrontendController::class, 'struktur']);

Route::get('/alur', [FrontendController::class, 'alur']);
Route::get('/progres-pengajuan-kerjasama', [FrontendController::class, 'propeker']);
Route::get('/faq', [FrontendController::class, 'faq']);
Route::get('/berita', [FrontendController::class, 'berita']);
Route::get('/galeri', [FrontendController::class, 'galeri']);

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
    Route::get('/settings/berandaedit/{id}', [BackendController::class, 'berandaedit']);
    Route::post('/settings/berandastore', [BackendController::class, 'berandastore']);
    Route::post('/settings/berandaupdate/{id}', [BackendController::class, 'berandaupdate']);
    Route::get('/settings/berandahapus/{id}', [BackendController::class, 'berandadestroy']);
    Route::get('/settings/useredit/{id}', [BackendController::class, 'useredit']);
    Route::post('/settings/userstore', [BackendController::class, 'userstore']);
    Route::post('/settings/userupdate/{id}', [BackendController::class, 'userupdate']);
    Route::get('/settings/userhapus/{id}', [BackendController::class, 'userdestroy']);

    // Wakil Rektor
    Route::get('/wakil-rektor-admin', [BackendController::class, 'wakilrektor']);
    Route::get('/wakil-rektor-admin/edit/{id}', [BackendController::class, 'wakilrektoredit']);
    Route::post('/wakil-rektor-admin/update/{id}', [BackendController::class, 'wakilrektorupdate']);
    Route::get('/wakil-rektor-admin/hapus/{id}', [BackendController::class, 'wakilrektordestroy']);

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
    Route::get('/faq-admin/edit/{id}', [BackendController::class, 'faqedit']);
    Route::get('/faq-admin/edit/{id}', [BackendController::class, 'faqstore']);
    Route::post('/faq-admin/update/{id}', [BackendController::class, 'faqupdate']);
    Route::get('/faq-admin/hapus/{id}', [BackendController::class, 'faqdestroy']);

    // Berita
    Route::get('/berita-admin', [BackendController::class, 'berita']);
    Route::get('/berita-admin/edit/{id}', [BackendController::class, 'beritaedit']);
    Route::get('/berita-admin/edit/{id}', [BackendController::class, 'beritastore']);
    Route::post('/berita-admin/update/{id}', [BackendController::class, 'beritaupdate']);
    Route::get('/berita-admin/hapus/{id}', [BackendController::class, 'beritadestroy']);

    // Pengumuman
    Route::get('/pengumuman-admin', [BackendController::class, 'pengumuman']);
    Route::get('/pengumuman-admin/edit/{id}', [BackendController::class, 'pengumumanedit']);
    Route::get('/pengumuman-admin/edit/{id}', [BackendController::class, 'pengumumanstore']);
    Route::post('/pengumuman-admin/update/{id}', [BackendController::class, 'pengumumanupdate']);
    Route::get('/pengumuman-admin/hapus/{id}', [BackendController::class, 'pengumumandestroy']);

    // Galeri
    Route::get('/galeri-admin', [BackendController::class, 'galeri']);
    Route::get('/galeri-admin/edit/{id}', [BackendController::class, 'galeriedit']);
    Route::get('/galeri-admin/edit/{id}', [BackendController::class, 'galeristore']);
    Route::post('/galeri-admin/update/{id}', [BackendController::class, 'galeriupdate']);
    Route::get('/galeri-admin/hapus/{id}', [BackendController::class, 'galeridestroy']);

    // Berkas Kerjasama
    Route::get('/berkas-kerjasama-admin', [BackendController::class, 'berkaskerjasama']);
    Route::get('/berkas-kerjasama-admin/edit/{id}', [BackendController::class, 'berkaskerjasamaedit']);
    Route::get('/berkas-kerjasama-admin/edit/{id}', [BackendController::class, 'berkaskerjasamastore']);
    Route::post('/berkas-kerjasama-admin/update/{id}', [BackendController::class, 'berkaskerjasamaupdate']);
    Route::get('/berkas-kerjasama-admin/hapus/{id}', [BackendController::class, 'berkaskerjasamadestroy']);

    // Layanan Online
    Route::get('/layanan-online-admin', [BackendController::class, 'layananonline']);

    // Layanan Kepuasan
    Route::get('/layanan-kepuasan-admin', [BackendController::class, 'layanankepuasan']);

    // Layanan Kami
    Route::get('/layanan-kami-admin', [BackendController::class, 'layanankami']);

    // Mitra
    Route::get('/mitra-admin', [BackendController::class, 'mitra']);
    Route::get('/mitra-admin/edit/{id}', [BackendController::class, 'mitraedit']);
    Route::get('/mitra-admin/edit/{id}', [BackendController::class, 'mitrastore']);
    Route::post('/mitra-admin/update/{id}', [BackendController::class, 'mitraupdate']);
    Route::get('/mitra-admin/hapus/{id}', [BackendController::class, 'mitradestroy']);
    Route::get('/mitra-print', function () {
        return view('admin.mitra-print-admin');
    });
});