<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Models\ModelBeranda;

use App\Models\ModelProfilUINSGD;

use App\Models\ModelCapaianKinerja;

use App\Models\ModelWakilRektor;

use App\Models\ModelVisi;

use App\Models\ModelMisi;

use App\Models\ModelTugasPokokFungsi;

use App\Models\ModelKebijakanProgram;

use App\Models\ModelStruktur;

use App\Models\ModelAlurKerjasama;

use App\Models\ModelPengajuanKerjasama;

use App\Models\ModelFAQ;

use App\Models\ModelBerita;

use App\Models\ModelKategoriBerita;

use App\Models\ModelPengumuman;

use App\Models\ModelGaleri;

use App\Models\ModelBerkasKerjasama;

use App\Models\ModelAjukanKerjasama;

use App\Models\ModelAngketKepuasanLayanan;

use App\Models\ModelKontak;

use App\Models\ModelIO;

use App\Models\ModelKategoriKodeInstansi;

use App\Models\ModelKategoriKetInstansi;

use App\Models\ModelKategoriJenisNaskah;

use App\Models\ModelMitra;

use App\Models\User;

class FrontendController extends Controller
{
    public function beranda()
    {
        $beranda = ModelBeranda::all();
        $wakilrektor = ModelWakilRektor::all();
        $berita = ModelBerita::where('aktif', 1)->get();
        $tangkap1 = \DB::table('beranda')->get();
        $tangkap2 = \DB::table('wakil_rektor')->first();
        $tangkap3 = \DB::table('profil_uin_sgd')->first();
        $tangkap4 = \DB::table('capaian_kinerja')->first();
        $mou = DB::table('mitra')->where('jenisnaskah', 1)->count();
        $moa = DB::table('mitra')->where('jenisnaskah', 2)->count();
        return view('layouts.index', compact('beranda', 'wakilrektor', 'berita', 'tangkap1', 'tangkap2', 'tangkap3', 'tangkap4', 'mou', 'moa'));
    }

    public function wakilrektor()
    {
        $wakilrektor = ModelWakilRektor::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('wakil_rektor')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layouts.wakil-rektor', compact('wakilrektor', 'beranda', 'tangkap1', 'tangkap2'));
    }

    public function visimisi()
    {
        $visi = ModelVisi::all();
        $misi = ModelMisi::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('visi')->first();
        $tangkap2 = \DB::table('misi')->first();
        $tangkap3 = \DB::table('beranda')->first();
        return view('layouts.visi-misi', compact('visi', 'misi', 'tangkap1', 'tangkap2', 'tangkap3'));
    }

    public function tupoksi()
    {
        $tupoksi = ModelTugasPokokFungsi::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('tupoksi')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layouts.tugas-pokok-fungsi', compact('tupoksi', 'beranda', 'tangkap1', 'tangkap2'));
    }

    public function kepro()
    {
        $kebijakanprogram = ModelKebijakanProgram::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('kebijakan_program')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layouts.kebijakan-program', compact('kebijakanprogram', 'beranda', 'tangkap1', 'tangkap2'));
    }

    public function struktur()
    {
        $struktur = ModelStruktur::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('struktur')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layouts.struktur', compact('struktur', 'beranda', 'tangkap1', 'tangkap2'));
    }

    public function alur()
    {
        $alur = ModelAlurKerjasama::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('alur_kerjasama')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layouts.alur-kerjasama', compact('alur', 'beranda', 'tangkap1', 'tangkap2'));
    }

    public function propeker()
    {
        $propeker = ModelPengajuanKerjasama::all();
        $beranda = ModelBeranda::all();
        $users = User::where('level', 'user')->get();
        $tangkap1 = \DB::table('pengajuan_kerjasama')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layouts.progres-pengajuan-kerjasama', compact('propeker', 'beranda', 'users', 'tangkap1', 'tangkap2'));
    }

    public function faq()
    {
        $faq = ModelFAQ::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('faq')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layouts.faq', compact('faq', 'tangkap1', 'tangkap2'));
    }

    public function pengumuman(Request $request)
    {
        $keyword = $request->keyword;
        $pengumuman = ModelPengumuman::orderBy('created_at', 'desc')->where('aktif', 1)->where(function($query) use($keyword){
            $query->orWhere('judul', 'LIKE', '%'. $keyword .'%')
                  ->orWhere('deskripsi', 'LIKE', '%'. $keyword .'%');
        })->paginate(5);
        $beranda = ModelBeranda::first();
        $user = User::first();
        $postbaru = ModelPengumuman::orderBy('created_at', 'desc')->limit('3')->where('aktif', 1)->get();
        // $tangkap1 = \DB::table('pengumuman')->where('aktif', 1)->where('judul', 'LIKE', '%'. $keyword .'%')->get();
        // $tangkap2 = \DB::table('beranda')->first();
        // $tangkap3 = \DB::table('users')->first();
        return view('layouts.pengumuman', compact('keyword', 'pengumuman', 'beranda', 'user', 'postbaru'));
    }

    public function pedet(Request $request, $slug)
    {
        $keyword = $request->keyword;
        $pengumuman = ModelPengumuman::where('slug', $slug)->where(function($query) use($keyword){
            $query->orWhere('judul', 'LIKE', '%'. $keyword .'%')
                  ->orWhere('deskripsi', 'LIKE', '%'. $keyword .'%');
        })->first();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('pengumuman')->where('id', $pengumuman->id)->first();
        $tangkap2 = \DB::table('beranda')->first();
        $postbaru = ModelPengumuman::orderBy('created_at', 'desc')->limit('3')->where('aktif', 1)->get();
        return view('layouts.pengumuman-detail', compact('keyword', 'pengumuman', 'beranda', 'tangkap1', 'tangkap2', 'postbaru'));
    }

    public function galeri()
    {
        $galeri = ModelGaleri::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('galeri')->get();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layouts.galeri', compact('galeri', 'beranda', 'tangkap1', 'tangkap2'));
    }

    public function berita(Request $request)
    {
        $keyword = $request->keyword;
        $berita = ModelBerita::orderBy('created_at', 'desc')->where('aktif', 1)->where(function($query) use($keyword){
            $query->orWhere('judul', 'LIKE', '%'. $keyword .'%')
                  ->orWhere('deskripsi', 'LIKE', '%'. $keyword .'%');
        })->paginate(2);
        $kabet = ModelKategoriBerita::get();
        $beranda = ModelBeranda::first();
        $user = User::first();
        $postbaru = ModelBerita::orderBy('created_at', 'desc')->limit('3')->where('aktif', 1)->get();
        return view('layouts.berita', compact('keyword', 'berita', 'kabet', 'beranda', 'user', 'postbaru'));
    }

    public function bedet(Request $request, $slug)
    {
        $keyword = $request->keyword;
        $berita = ModelBerita::with('kategori')->where('slug', $slug)->where(function($query) use($keyword){
            $query->orWhere('judul', 'LIKE', '%'. $keyword .'%')
                  ->orWhere('deskripsi', 'LIKE', '%'. $keyword .'%');
        })->first();
        $kabet = ModelKategoriBerita::get();
        $beranda = ModelBeranda::get();
        $postbaru = ModelBerita::orderBy('created_at', 'desc')->limit('3')->where('aktif', 1)->get();
        return view('layouts.berita-detail', compact('keyword', 'berita', 'kabet', 'beranda', 'postbaru'));
    }

    public function berkaskerjasama()
    {
        $beker = ModelBerkasKerjasama::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('berkas_kerjasama')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layouts.berkas-kerjasama', compact('beker', 'beranda', 'tangkap1', 'tangkap2'));
    }

    public function ajukanKerjasama()
    {
        // $layon = ModelAjukanKerjasama::all();
        $beranda = ModelBeranda::all();
        // $tangkap1 = \DB::table('layanan_online')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layouts.ajukan-kerjasama', compact( 'beranda', 'tangkap2'));
    }

    public function ajukerstore(Request $request)
    {
        Request()->validate([
            'nama' => 'required',
            'nohp' => 'required',
            'instansi' => 'required',
            'jabatan' => 'required',
            'berkaspengaju' => 'required|file',
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'nohp.required' => 'No Whatsapp tidak boleh kosong',
            'instansi.required' => 'Instansi tidak boleh kosong',
            'jabatan.required' => 'Jabatan tidak boleh kosong',
            'berkaspengaju.required' => 'Berkas Pengajuan Kerjasama tidak boleh kosong',
        ]);

        $file_name = $request->berkaspengaju->getClientOriginalName();
            $file = $request->berkaspengaju->storeAs('pengajuan', $file_name);
            ModelAjukanKerjasama::create([
            'nama' => $request->nama,
            'nohp' => $request->nohp,
            'instansi' => $request->instansi,
            'jabatan' => $request->jabatan,
            'berkaspengaju' => $file,
        ]);
        
        alert()->success('Data Ajukan Kerjasama','Data berhasil terkirim, harap tunggu info selanjutnya');
        return redirect('/ajukan-kerjasama');
    }

    public function angketkepuasanlayanan()
    {
        $akela = ModelAngketKepuasanLayanan::first();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('angket_kepuasan_layanan')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layouts.angket-kepuasan-layanan', compact( 'akela', 'beranda', 'tangkap1', 'tangkap2'));
    }

    public function kontak()
    {
        // $kontak = ModelKontak::first();
        $beranda = ModelBeranda::all();
        // $tangkap1 = \DB::table('angket_kepuasan_layanan')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layouts.kontak', compact( 'beranda', 'tangkap2'));
    }

    public function kontakstore(Request $request)
    {
        Request()->validate([
            'nama' => 'required',
            'nohp' => 'required',
            'email' => 'required|email:dns',
            'subject' => 'required',
            'pesan' => 'required',
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'nohp.required' => 'No Handphone tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'subject.required' => 'Subject tidak boleh kosong',
            'pesan.required' => 'Pesan tidak boleh kosong',
        ]);

        ModelKontak::create([
            'nama' => $request->nama,
            'nohp' => $request->nohp,
            'email' => $request->email,
            'subject' => $request->subject,
            'pesan' => $request->pesan,
        ]);
        
        alert()->success('Data Kontak','Data berhasil terkirim. Terima Kasih');
        return redirect('/kontak');
    }

    public function io()
    {
        $io = ModelIO::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('io')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layouts.international-office', compact('io', 'beranda', 'tangkap1', 'tangkap2'));
    }

    public function mitra()
    {
        $kakoin = ModelKategoriKodeInstansi::all();
        $kakein = ModelKategoriKetInstansi::all();
        $kajenas = ModelKategoriJenisNaskah::all();
        $mitra = ModelMitra::orderBy('created_at', 'desc')->get();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('mitra')->get();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layouts.mitra', compact('kakoin', 'kakein', 'kajenas', 'mitra', 'beranda', 'tangkap1', 'tangkap2'));
    }
}
