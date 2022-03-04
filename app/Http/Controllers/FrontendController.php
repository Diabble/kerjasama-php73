<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ModelBeranda;

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

use App\Models\ModelPengumuman;

use App\Models\ModelGaleri;

use App\Models\ModelBerkasKerjasama;

use App\Models\ModelLayananOnline;

use App\Models\ModelLayananKepuasan;

use App\Models\ModelLayananKami;

use App\Models\ModelIO;

use App\Models\ModelMitra;

class FrontendController extends Controller
{
    public function beranda()
    {
        $beranda = ModelBeranda::all();
        $wakilrektor = ModelWakilRektor::all();
        $tangkap1 = \DB::table('beranda')->get();
        $tangkap2 = \DB::table('wakil_rektor')->first();
        return view('layout.index', compact('beranda', 'wakilrektor', 'tangkap1', 'tangkap2'));
    }

    public function wakilrektor()
    {
        $wakilrektor = ModelWakilRektor::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('wakil_rektor')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layout.wakil-rektor', compact('wakilrektor', 'beranda', 'tangkap1', 'tangkap2'));
    }

    public function visimisi()
    {
        $visi = ModelVisi::all();
        $misi = ModelMisi::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('visi')->first();
        $tangkap2 = \DB::table('misi')->first();
        $tangkap3 = \DB::table('beranda')->first();
        return view('layout.visi-misi', compact('visi', 'misi', 'tangkap1', 'tangkap2', 'tangkap3'));
    }

    public function tupoksi()
    {
        $tupoksi = ModelTugasPokokFungsi::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('tupoksi')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layout.tugas-pokok-fungsi', compact('tupoksi', 'beranda', 'tangkap1', 'tangkap2'));
    }

    public function kepro()
    {
        $kebijakanprogram = ModelKebijakanProgram::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('kebijakan_program')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layout.kebijakan-program', compact('kebijakanprogram', 'beranda', 'tangkap1', 'tangkap2'));
    }

    public function struktur()
    {
        $struktur = ModelStruktur::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('struktur')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layout.struktur', compact('struktur', 'beranda', 'tangkap1', 'tangkap2'));
    }

    public function alur()
    {
        $alur = ModelAlurKerjasama::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('alur_kerjasama')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layout.alur-kerjasama', compact('alur', 'beranda', 'tangkap1', 'tangkap2'));
    }

    public function propeker()
    {
        $propeker = ModelPengajuanKerjasama::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('pengajuan_kerjasama')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layout.progres-pengajuan-kerjasama', compact('propeker', 'beranda', 'tangkap1', 'tangkap2'));
    }

    public function faq()
    {
        $faq = ModelFAQ::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('faq')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layout.faq', compact('faq', 'tangkap1', 'tangkap2'));
    }

    public function berita()
    {
        $berita = ModelBerita::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('berita')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layout.berita', compact('berita', 'tangkap1', 'tangkap2'));
    }

    public function bedet($slug)
    {
        $berita = ModelBerita::where('slug', $slug)->first();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('beranda')->first();
        $postbaru = ModelBerita::orderBy('created_at', 'DESC')->limit('5')->get();
        return view('layout.berita-detail', compact('berita', 'tangkap1', 'postbaru'));
    }

    public function pengumuman()
    {
        $pengumuman = ModelPengumuman::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('pengumuman')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layout.pengumuman', compact('pengumuman', 'tangkap1', 'tangkap2'));
    }

    public function galeri()
    {
        $galeri = ModelGaleri::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('galeri')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layout.galeri', compact('galeri', 'beranda', 'tangkap1', 'tangkap2'));
    }

    public function berkaskerjasama()
    {
        // $bekar = ModelBerkasKerjasama::all();
        $beranda = ModelBeranda::all();
        // $tangkap1 = \DB::table('berkas_kerjasama')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layout.berkas-kerjasama', compact( 'beranda', 'tangkap2'));
    }

    public function layananonline()
    {
        // $layon = ModelLayananOnline::all();
        $beranda = ModelBeranda::all();
        // $tangkap1 = \DB::table('layanan_online')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layout.layanan-online', compact( 'beranda', 'tangkap2'));
    }

    public function layanankepuasan()
    {
        // $lakep = ModelLayananKepuasan::all();
        $beranda = ModelBeranda::all();
        // $tangkap1 = \DB::table('layanan_kepuasan')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layout.layanan-kepuasan', compact( 'beranda', 'tangkap2'));
    }

    public function layanankami()
    {
        // $laka = ModelBerkasKerjasama::all();
        $beranda = ModelBeranda::all();
        // $tangkap1 = \DB::table('layanan_kami')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layout.layanan-kami', compact( 'beranda', 'tangkap2'));
    }

    public function io()
    {
        $io = ModelIO::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('io')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layout.international-office', compact('io', 'beranda', 'tangkap1', 'tangkap2'));
    }

    public function mitra()
    {
        $mitra = ModelMitra::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('mitra')->get();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layout.mitra', compact('mitra', 'beranda', 'tangkap1', 'tangkap2'));
    }
}
