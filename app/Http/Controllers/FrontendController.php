<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ModelBeranda;

use App\Models\ModelSambutan;

use App\Models\ModelVisi;

use App\Models\ModelMisi;

use App\Models\ModelTugasPokokFungsi;

use App\Models\ModelKebijakanProgram;

use App\Models\ModelStruktur;

use App\Models\ModelAlur;

use App\Models\ModelProgresPengajuanKerjasama;

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
        $sambutan = ModelSambutan::all();
        $tangkap1 = \DB::table('beranda')->first();
        $tangkap2 = \DB::table('sambutan')->first();
        return view('layout.index', compact('beranda', 'sambutan', 'tangkap1', 'tangkap2'));
    }

    public function sambutan()
    {
        $sambutan = ModelSambutan::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('sambutan')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layout.sambutan-wakil-rektor', compact('sambutan', 'tangkap1', 'tangkap2'));
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
        $tangkap1 = \DB::table('kebijakanprogram')->first();
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
        $alur = ModelAlur::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('alur')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layout.alur', compact('alur', 'beranda', 'tangkap1', 'tangkap2'));
    }

    public function propeker()
    {
        $progrespengajuankerjasama = ModelProgresPengajuanKerjasama::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('progrespengajuankerjasama')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layout.progres-pengajuan-kerjasama', compact('progrespengajuankerjasama', 'beranda', 'tangkap1', 'tangkap2'));
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
        
    }

    public function layananonline()
    {
        
    }

    public function layanankepuasan()
    {
        
    }

    public function layanankami()
    {
        
    }

    public function io()
    {
        
    }

    public function mitra()
    {
        $mitra = ModelMitra::all();
        $beranda = ModelBeranda::all();
        $tangkap1 = \DB::table('mitra')->first();
        $tangkap2 = \DB::table('beranda')->first();
        return view('layout.mitra', compact('mitra', 'beranda', 'tangkap1', 'tangkap2'));
    }
}
