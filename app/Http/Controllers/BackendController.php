<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use Auth;

use App\Models\User;

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

use App\Models\ModelLayananKami;

use App\Models\ModelIO;

use App\Models\ModelMitra;

use Maatwebsite\Excel\Facades\Excel;

// use App\Http\Controllers\Controller;

use App\Exports\MitraExport;

use App\Imports\MitraImport;

use App\Models\ModelKategoriKodeInstansi;

use App\Models\ModelKategoriKetInstansi;

use App\Models\ModelKategoriJenisNaskah;

use Carbon\Carbon;

class BackendController extends Controller
{
    // Dashboard
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $mou = DB::table('mitra')->where('jenisnaskah', 1)->count();
        $moa = DB::table('mitra')->where('jenisnaskah', 2)->count();
        // dd($mitrachart);
        return view('admin.dashboard', compact('mou', 'moa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Settings
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function settings()
    {
        $beranda = ModelBeranda::get();
        $profil = ModelProfilUINSGD::get();
        $caper = ModelCapaianKinerja::get();
        $user = User::all();
        $kaber = ModelKategoriBerita::all();
        $kakoin = ModelKategoriKodeInstansi::all();
        $kakein = ModelKategoriKetInstansi::all();
        $kajenas = ModelKategoriJenisNaskah::all();
        return view('admin.settings', compact('beranda', 'profil', 'caper', 'user', 'kaber', 'kakoin', 'kakein', 'kajenas'));
    }

    // Beranda/Slide Carousel
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function berandacreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function berandastore(Request $request)
    {
        Request()->validate([
            'poto' => 'required|mimes:png,jpg,jpeg',
            'judulcarousel' => 'required',
            'deskripsicarousel' => 'required',
            'tombolcarousel' => 'required',
        ], [
            'poto.required' => 'Gambar tidak boleh kosong!',
            'judulcarousel.required' => 'Judul tidak boleh kosong!',
            'deskripsicarousel.required' => 'Deskripsi tidak boleh kosong!',
            'tombolcarousel.required' => 'Nama Tombol tidak boleh kosong!',
        ]);

        $file_name = $request->poto->getClientOriginalName();
            $image = $request->poto->storeAs('thumbnail', $file_name);
            // $image = $request->poto->store('thumbnail');
        ModelBeranda::create([
            'poto' => $image,
            'judulcarousel' => $request->judulcarousel,
            'deskripsicarousel' => $request->deskripsicarousel,
            'tombolcarousel' => $request->tombolcarousel,
        ]);
        
        return redirect('/admin/settings')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function berandashow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function berandaedit($id)
    {
        $beranda = ModelBeranda::findorfail($id);
        return view('admin.settings', compact('beranda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function berandaupdate(Request $request, $id)
    {
        Request()->validate([
            'poto' => 'mimes:png,jpg,jpeg',
            'judulcarousel' => 'required',
            'deskripsicarousel' => 'required',
            'tombolcarousel' => 'required',
        ], [
            'judulcarousel.required' => 'Judul tidak boleh kosong!',
            'deskripsicarousel.required' => 'Deskripsi tidak boleh kosong!',
            'tombolcarousel.required' => 'Nama Tombol tidak boleh kosong!',
        ]);

        if (Request()->hasFile('poto')) {
            $file_name = $request->poto->getClientOriginalName();
                $image = $request->poto->storeAs('thumbnail', $file_name);
                // $image = $request->poto->store('thumbnail');
            ModelBeranda::where('id',$id)->update([
                'poto' => $image,
                'judulcarousel' => $request->judulcarousel,
                'deskripsicarousel' => $request->deskripsicarousel,
                'tombolcarousel' => $request->tombolcarousel,
            ]);
        } else {
            ModelBeranda::where('id',$id)->update([
                'judulcarousel' => $request->judulcarousel,
                'deskripsicarousel' => $request->deskripsicarousel,
                'tombolcarousel' => $request->tombolcarousel,
            ]);
        }
        
        return redirect('/admin/settings')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function berandadestroy($id)
    {
        ModelBeranda::find($id)->delete();

        return redirect('/admin/settings')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }

    // Profil UIN SGD
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profiluinsgdcreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profiluinsgdstore(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profiluinsgdshow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profiluinsgdedit($id)
    {
        $profil = ModelProfilUINSGD::findorfail($id);
        return view('admin.settings', compact('profil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profiluinsgdupdate(Request $request, $id)
    {
        Request()->validate([
            'judul' => 'required',
            'link' => 'required',
            'deskripsi' => 'required',
        ], [
            'judul.required' => 'Judul tidak boleh kosong!',
            'link.required' => 'Link tidak boleh kosong!',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong!',
        ]);

        $data = [
            'judul' => $request->judul,
            'link' => $request->link,
            'deskripsi' => $request->deskripsi,
        ];

        ModelProfilUINSGD::find($id)->update($data);        
        return redirect('/admin/settings')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profiluinsgddestroy($id)
    {
        //
    }

    // Capaian Kinerja
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function capercreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function caperstore(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function capershow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function caperedit($id)
    {
        $caper = ModelCapaianKinerja::findorfail($id);
        return view('admin.settings', compact('caper'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function caperupdate(Request $request, $id)
    {
        Request()->validate([
            'judul' => 'required',
            'link' => 'required',
            'deskripsi' => 'required',
        ], [
            'judul.required' => 'Judul tidak boleh kosong!',
            'link.required' => 'Link tidak boleh kosong!',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong!',
        ]);

        $data = [
            'judul' => $request->judul,
            'link' => $request->link,
            'deskripsi' => $request->deskripsi,
        ];

        ModelCapaianKinerja::find($id)->update($data);        
        return redirect('/admin/settings')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function caperdestroy($id)
    {
        //
    }

    // User
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function usercreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userstore(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function usershow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function useredit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userupdate(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userdestroy($id)
    {
        //
    }

    // Kategori Berita
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kabercreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function kaberstore(Request $request)
    {
        Request()->validate([
            'nama_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Nama Kategori Berita tidak boleh kosong!',
        ]);

        ModelKategoriBerita::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori),
        ]);

        return redirect('/admin/settings')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kabershow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kaberedit($id)
    {
        $kaber = ModelKategoriBerita::findorfail($id);
        return view('admin.settings', compact('kaber'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kaberupdate(Request $request, $id)
    {
        Request()->validate([
            'nama_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Nama Kategori Berita tidak boleh kosong!',
        ]);

        $data = [
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori),
        ];

        ModelKategoriBerita::find($id)->update($data);
        return redirect('/admin/settings')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kaberdestroy($id)
    {
        ModelKategoriBerita::find($id)->delete();

        return redirect('/admin/settings')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }

    // Kategori Kode Instansi
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kakoincreate()
    {
        //
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function kakoinstore(Request $request)
    {
        Request()->validate([
            'nama_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Nama Kategori Kode Instansi tidak boleh kosong!',
        ]);

        ModelKategoriKodeInstansi::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori),
        ]);
        
        return redirect('/admin/settings')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kakoinshow($id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kakoinedit($id)
    {
        $kakoin = ModelKategoriKodeInstansi::findorfail($id);
        return view('admin.settings', compact('kakoin'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kakoinupdate(Request $request, $id)
    {
        Request()->validate([
            'nama_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Nama Kategori Kode Instansi tidak boleh kosong!',
        ]);

        $data = [
            'nama_kategori' => $request->nama_kategori,
            'slug' => $request->slug,
        ];

        ModelKategoriKodeInstansi::find($id)->update($data);    
        return redirect('/admin/settings')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kakoindestroy($id)
    {
        ModelKategoriKodeInstansi::find($id)->delete();

        return redirect('/admin/settings')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }

    // Kategori Keterangan Instansi
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kakeincreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function kakeinstore(Request $request)
    {
        Request()->validate([
            'nama_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Nama Kategori Keterangan Instansi tidak boleh kosong!',
        ]);

        ModelKategoriKetInstansi::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori),
        ]);
        
        return redirect('/admin/settings')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kakeinshow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kakeinedit($id)
    {
        $kakein = ModelKategoriKetInstansi::findorfail($id);
        return view('admin.settings', compact('kakein'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kakeinupdate(Request $request, $id)
    {
        Request()->validate([
            'nama_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Nama Kategori Keterangan Instansi tidak boleh kosong!',
        ]);

        $data = [
            'nama_kategori' => $request->nama_kategori,
            'slug' => $request->slug,
        ];

        ModelKategoriKetInstansi::find($id)->update($data);    
        return redirect('/admin/settings')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kakeindestroy($id)
    {
        ModelKategoriKetInstansi::find($id)->delete();

        return redirect('/admin/settings')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }

    // Kategori Jenis Naskah
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kajenacreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function kajenastore(Request $request)
    {
        Request()->validate([
            'nama_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Nama Kategori Jenis Naskah tidak boleh kosong!',
        ]);

        ModelKategoriJenisNaskah::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori),
        ]);
        
        return redirect('/admin/settings')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kajenashow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kajenaedit($id)
    {
        $kajenas = ModelKategoriJenisNaskah::findorfail($id);
        return view('admin.settings', compact('kajenas'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kajenaupdate(Request $request, $id)
    {
        Request()->validate([
            'nama_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Nama Kategori Jenis Naskah tidak boleh kosong!',
        ]);

        $data = [
            'nama_kategori' => $request->nama_kategori,
            'slug' => $request->slug,
        ];

        ModelKategoriJenisNaskah::find($id)->update($data);    
        return redirect('/admin/settings')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kajenadestroy($id)
    {
        ModelKategoriJenisNaskah::find($id)->delete();

        return redirect('/admin/settings')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }

    // Wakil Rektor
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function wakilrektor()
    {
        $wakilrektor = ModelWakilRektor::get();
        return view('admin.wakil-rektor', compact('wakilrektor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function wakilrektorcreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wakilrektorstore(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function wakilrektorshow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function wakilrektoredit($id)
    {
        $wakilrektor = ModelWakilRektor::findorfail($id);
        return view('admin.wakil-rektor', compact('wakilrektor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function wakilrektorupdate(Request $request, $id)
    {
        Request()->validate([
            'poto' => 'mimes:png,jpg,jpeg',
            'nama' => 'required',
            'jabatan' => 'required',
            'nip' => 'required',
            'deskripsi' => 'required',
        ], [
            'nama.required' => 'Nama tidak boleh kosong!',
            'jabatan.required' => 'Jabatan tidak boleh kosong!',
            'nip.required' => 'Nip tidak boleh kosong!',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong!',
        ]);
        if (Request()->hasFile('poto')) {
            $file_name = $request->poto->getClientOriginalName();
                $image = $request->poto->storeAs('thumbnail', $file_name);
            ModelWakilRektor::where('id',$id)->update([
                'poto' => $image,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'nip' => $request->nip,
                'deskripsi' => $request->deskripsi,
        ]);
        } else {
            ModelWakilRektor::where('id',$id)->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'nip' => $request->nip,
                'deskripsi' => $request->deskripsi,
        ]);
        }

        return redirect('/admin/wakil-rektor')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function wakilrektordestroy($id)
    {
        //
    }

    // Visi & Misi
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function visimisi()
    {
        $visi = ModelVisi::get();
        $misi = ModelMisi::get();
        return view('admin.visi-misi', compact('visi', 'misi'));
    }

    // Visi
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function visicreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function visistore(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function visishow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function visiedit($id)
    {
        $visi = ModelVisi::findorfail($id);
        return view('admin.visi-misi', compact('visi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function visiupdate(Request $request, $id)
    {
        Request()->validate([
            'deskripsi' => 'required',
        ], [
            'deskripsi.required' => 'Deskripsi tidak boleh kosong!',
        ]);

        $data = [
            'deskripsi' => Request()->deskripsi,
        ];

        ModelVisi::find($id)->update($data);
        return redirect('/admin/visi-misi')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function visidestroy($id)
    {
        //
    }

    // Misi
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function misicreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function misistore(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function misishow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function misiedit($id)
    {
        $misi = ModelMisi::findorfail($id);
        return view('admin.visi-misi', compact('misi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function misiupdate(Request $request, $id)
    {
        Request()->validate([
            'deskripsi' => 'required',
        ], [
            'deskripsi.required' => 'Deskripsi tidak boleh kosong!',
        ]);

        $data = [
            'deskripsi' => Request()->deskripsi,
        ];

        ModelMisi::find($id)->update($data);
        return redirect('/admin/visi-misi')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function misidestroy($id)
    {
        //
    }

    // Tugas Pokok Fungsi
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tupoksi()
    {
        $tupoksi = ModelTugasPokokFungsi::get();
        return view('admin.tugas-pokok-fungsi', compact('tupoksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tupoksicreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tupoksistore(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tupoksishow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tupoksiedit($id)
    {
        $tupoksi = ModelTugasPokokFungsi::findorfail($id);
        return view('admin.tugas-pokok-fungsi', compact('tupoksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tupoksiupdate(Request $request, $id)
    {
        Request()->validate([
            'deskripsi' => 'required',
        ], [
            'deskripsi.required' => 'Deskripsi tidak boleh kosong!',
        ]);

        $data = [
            'deskripsi' => Request()->deskripsi,
        ];

        ModelTugasPokokFungsi::find($id)->update($data);
        return redirect('/admin/tugas-pokok-fungsi')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tupoksidestroy($id)
    {
        //
    }

    // Kebijakan & Program
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kepro()
    {
        $kepro = ModelKebijakanProgram::get();
        return view('admin.kebijakan-program', compact('kepro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function keprocreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function keprostore(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function keproshow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function keproedit($id)
    {
        $kepro = ModelKebijakanProgram::findorfail($id);
        return view('admin.kebijakan-program', compact('kepro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function keproupdate(Request $request, $id)
    {
        Request()->validate([
            'deskripsi' => 'required',
        ], [
            'deskripsi.required' => 'Deskripsi tidak boleh kosong!',
        ]);

        $data = [
            'deskripsi' => Request()->deskripsi,
        ];

        ModelKebijakanProgram::find($id)->update($data);
        return redirect('/admin/kebijakan-program')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function keprodestroy($id)
    {
        //
    }

    // Struktur
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function struktur()
    {
        $struktur = ModelStruktur::get();
        return view('admin.struktur', compact('struktur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function strukturcreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function strukturstore(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function strukturshow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function strukturedit($id)
    {
        $struktur = ModelStruktur::findorfail($id);
        return view('admin.struktur', compact('struktur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function strukturupdate(Request $request, $id)
    {
        Request()->validate([
            'poto' => 'mimes:png,jpg,jpeg',
            'deskripsi' => 'required',
        ], [
            'deskripsi.required' => 'Deskripsi tidak boleh kosong!',
        ]);
        if (Request()->hasFile('poto')) {
            $file_name = $request->poto->getClientOriginalName();
                $image = $request->poto->storeAs('thumbnail', $file_name);
            ModelStruktur::where('id',$id)->update([
                'poto' => $image,
                'deskripsi' => $request->deskripsi,
        ]);
        } else {
            ModelStruktur::where('id',$id)->update([
                'deskripsi' => $request->deskripsi,
        ]);
        }

        return redirect('/admin/struktur')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function strukturdestroy($id)
    {
        //
    }

    // Alur Kerjasama
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function alurkerjasama()
    {
        $alur = ModelAlurKerjasama::get();
        return view('admin.alur-kerjasama', compact('alur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function alurkerjasamacreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function alurkerjasamastore(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function alurkerjasamashow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function alurkerjasamaedit($id)
    {
        $alur = ModelAlurKerjasama::findorfail($id);
        return view('admin.alur-kerjasama', compact('alur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function alurkerjasamaupdate(Request $request, $id)
    {
        Request()->validate([
            'poto' => 'mimes:png,jpg,jpeg',
            'deskripsi' => 'required',
        ], [
            'deskripsi.required' => 'Deskripsi tidak boleh kosong!',
        ]);
        if (Request()->hasFile('poto')) {
            $file_name = $request->poto->getClientOriginalName();
                $image = $request->poto->storeAs('thumbnail', $file_name);
            ModelAlurKerjasama::where('id',$id)->update([
                'poto' => $image,
                'deskripsi' => $request->deskripsi,
        ]);
        } else {
            ModelAlurKerjasama::where('id',$id)->update([
                'deskripsi' => $request->deskripsi,
        ]);
        }

        return redirect('/admin/alur-kerjasama')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function alurkerjasamadestroy($id)
    {
        //
    }

    // Progres Pengajuan Kerjasama
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function propeker()
    {
        $propeker = ModelPengajuanKerjasama::all();
        $mitra = ModelMitra::all();
        return view('admin.progres-pengajuan-kerjasama', compact('propeker', 'mitra'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function propekercreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function propekerstore(Request $request)
    {
        Request()->validate([
            'instansi' => 'required',
            'progres' => 'required',
        ], [
            'instansi.required' => 'Nama Instansi tidak boleh kosong!',
            'progres.required' => 'Progres Instansi tidak boleh kosong!',
        ]);

        ModelPengajuanKerjasama::create([
            'instansi' => $request->instansi,
            'progres' => $request->progres,
        ]);
        
        return redirect('/admin/progres-pengajuan-kerjasama')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function propekershow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function propekeredit($id)
    {
        $propeker = ModelPengajuanKerjasama::findorfail($id);
        $mitra = ModelMitra::findorfail($id);
        return view('admin.progres-pengajuan-kerjasama', compact('propeker', 'mitra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function propekerupdate(Request $request, $id)
    {
        Request()->validate([
            'instansi' => 'required',
            'progres' => 'required',
        ], [
            'instansi.required' => 'Instansi tidak boleh kosong!',
            'progres.required' => 'Progres tidak boleh kosong!',
        ]);

        $data = [
            'instansi' => Request()->instansi,
            'progres' => Request()->progres,
        ];

        ModelPengajuanKerjasama::find($id)->update($data);
        return redirect('/admin/progres-pengajuan-kerjasama')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function propekerdestroy($id)
    {
        ModelPengajuanKerjasama::find($id)->delete();

        return redirect('/admin/progres-pengajuan-kerjasama')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }

    // FAQ
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function faq()
    {
        $faq = ModelFAQ::all();
        return view('admin.faq', compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function faqcreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function faqstore(Request $request)
    {
        Request()->validate([
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ], [
            'pertanyaan.required' => 'Pertanyaan tidak boleh kosong!',
            'jawaban.required' => 'Jawaban tidak boleh kosong!',
        ]);

        ModelFAQ::create([
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban,
        ]);
        
        return redirect('/admin/faq')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function faqshow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function faqedit($id)
    {
        $faq = ModelFAQ::findorfail($id);
        return view('admin.faq', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function faqupdate(Request $request, $id)
    {
        Request()->validate([
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ], [
            'pertanyaan.required' => 'Pertanyaan tidak boleh kosong!',
            'jawaban.required' => 'Jawaban tidak boleh kosong!',
        ]);

        $data = [
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban,
        ];

        ModelFAQ::find($id)->update($data);    
        return redirect('/admin/faq')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function faqdestroy($id)
    {
        ModelFAQ::find($id)->delete();

        return redirect('/admin/faq')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }

    // Kategori Berita
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kaber()
    {
        $kaber = ModelKategoriBerita::all();
        return view('admin.kategori-berita', compact('kaber'));
    }

    // Berita
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function berita()
    {
        $kaber = ModelKategoriBerita::all();
        $berita = ModelBerita::all();
        // dd($berita);
        return view('admin.berita', compact('berita', 'kaber'));
    }

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function beritacreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function beritastore(Request $request)
    {
        Request()->validate([
            'poto' => 'required|mimes:png,jpg,jpeg',
            'judul' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
            'views' => 'required',
            'aktif' => 'required',
        ], [
            'poto.required' => 'Gambar tidak boleh kosong!',
            'judul.required' => 'Judul tidak boleh kosong!',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong!',
            'kategori_id.required' => 'Kategori Berita tidak boleh kosong!',
            'views.required' => 'Jumlah Views tidak boleh kosong!',
            'aktif.required' => 'Status tidak boleh kosong!',
        ]);

        $file_name = $request->poto->getClientOriginalName();
            $image = $request->poto->storeAs('thumbnail', $file_name);
        ModelBerita::create([
            'poto' => $image,
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'user_id' => Auth::user()->id,
            'views' => $request->views,
            'aktif' => $request->aktif,
        ]);
        
        return redirect('/admin/berita')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function beritashow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function beritaedit($id)
    {
        $kaber = ModelKategoriBerita::all();
        $berita = ModelBerita::findorfail($id);
        return view('admin.berita', compact('berita', 'kaber'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function beritaupdate(Request $request, $id)
    {
        Request()->validate([
            'poto' => 'mimes:png,jpg,jpeg',
            'judul' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
            'views' => 'required',
            'aktif' => 'required',
        ], [
            'judul.required' => 'Judul tidak boleh kosong!',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong!',
            'kategori_id.required' => 'Kategori Berita tidak boleh kosong!',
            'views.required' => 'Jumlah Views tidak boleh kosong!',
            'aktif.required' => 'Status tidak boleh kosong!',
        ]);

        if (Request()->hasFile('poto')) {
            $file_name = $request->poto->getClientOriginalName();
                $image = $request->poto->storeAs('thumbnail', $file_name);
            ModelBerita::where('id',$id)->update([
                'poto' => $image,
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'deskripsi' => $request->deskripsi,
                'kategori_id' => $request->kategori_id,
                'views' => $request->views,
                'aktif' => $request->aktif,
            ]);
        } else {
            ModelBerita::where('id',$id)->update([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'deskripsi' => $request->deskripsi,
                'kategori_id' => $request->kategori_id,
                'views' => $request->views,
                'aktif' => $request->aktif,
            ]);
        }
        
        return redirect('/admin/berita')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function beritadestroy($id)
    {
        ModelBerita::find($id)->delete();

        return redirect('/admin/berita')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }

    // Pengumuman
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pengumuman()
    {
        $pengumuman = ModelPengumuman::all();
        return view('admin.pengumuman', compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pengumumancreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pengumumanstore(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pengumumanshow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pengumumanedit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pengumumanupdate(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pengumumandestroy($id)
    {
        //
    }

    // Galeri
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function galeri()
    {
        $galeri = ModelGaleri::all();
        return view('admin.galeri', compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function galericreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function galeristore(Request $request)
    {
        Request()->validate([
            'poto' => 'required|mimes:png,jpg,jpeg',
            'caption' => 'required',
        ], [
            'poto.required' => 'Gambar tidak boleh kosong!',
            'caption.required' => 'Caption tidak boleh kosong!',
        ]);

        $file_name = $request->poto->getClientOriginalName();
            $image = $request->poto->storeAs('thumbnail', $file_name);
        ModelGaleri::create([
            'poto' => $image,
            'caption' => $request->caption,
        ]);
        
        return redirect('/admin/galeri')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function galerishow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function galeriedit($id)
    {
        $galeri = ModelGaleri::findorfail($id);
        return view('admin.galeri', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function galeriupdate(Request $request, $id)
    {
        Request()->validate([
            'poto' => 'mimes:png,jpg,jpeg',
            'caption' => 'required',
        ], [
            'caption.required' => 'Caption tidak boleh kosong!',
        ]);

        if (Request()->hasFile('poto')) {
            $file_name = $request->poto->getClientOriginalName();
                $image = $request->poto->storeAs('thumbnail', $file_name);
                // $image = $request->poto->store('thumbnail');
            ModelGaleri::where('id',$id)->update([
                'poto' => $image,
                'caption' => $request->caption,
            ]);
        } else {
            ModelGaleri::where('id',$id)->update([
                'caption' => $request->caption,
            ]);
        }
        
        return redirect('/admin/galeri')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function galeridestroy($id)
    {
        ModelGaleri::find($id)->delete();

        return redirect('/admin/galeri')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }

    // Berkas Kerjasama
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function berkaskerjasama()
    {
        return view('admin.berkas-kerjasama');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function berkaskerjasamacreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function berkaskerjasamastore(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function berkaskerjasamashow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function berkaskerjasamaedit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function berkaskerjasamaupdate(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function berkaskerjasamadestroy($id)
    {
        //
    }

    // Ajukan Kerjasama
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajukankerjasama()
    {
        $ajuker = ModelAjukanKerjasama::get();
        return view('admin.ajukan-kerjasama', compact('ajuker'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajukankerjasamacreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajukankerjasamastore(Request $request)
    {
        Request()->validate([
            'nama' => 'required',
            'nohp' => 'required',
            'instansi' => 'required',
            'jabatan' => 'required',
            'berkaspengaju' => 'required',
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'nohp.required' => 'No Whatsapp tidak boleh kosong',
            'instansi.required' => 'Instansi tidak boleh kosong',
            'jabatan.required' => 'Jabatan tidak boleh kosong',
            'berkaspengaju.required' => 'Berkas Pengajuan Kerjasama tidak boleh kosong',
        ]);

        $file_name = $request->berkaspengaju->getClientOriginalName();
            $file = $request->berkaspengaju->storeAs('berkaspengaju', $file_name);
            ModelAjukanKerjasama::create([
            'nama' => $request->nama,
            'nohp' => $request->nohp,
            'instansi' => $request->instansi,
            'jabatan' => $request->jabatan,
            'berkaspengaju' => $file,
        ]);
        
        return redirect('/admin/ajukan-kerjasama')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ajukankerjasamashow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ajukankerjasamaedit($id)
    {
        $ajuker = ModelAjukanKerjasama::findorfail($id);
        return view('admin.ajukan-kerjasama', compact('ajuker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ajukankerjasamaupdate(Request $request, $id)
    {
        Request()->validate([
            'nama' => 'required',
            'nohp' => 'required',
            'instansi' => 'required',
            'jabatan' => 'required',
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'nohp.required' => 'No Whatsapp tidak boleh kosong',
            'instansi.required' => 'Instansi tidak boleh kosong',
            'jabatan.required' => 'Jabatan tidak boleh kosong',
        ]);

        if (Request()->hasFile('berkaspengaju')) {
            $file_name = $request->berkaspengaju->getClientOriginalName();
                $file = $request->berkaspengaju->storeAs('berkaspengaju', $file_name);
            ModelAjukanKerjasama::where('id',$id)->update([
                'nama' => $request->nama,
                'nohp' => $request->nohp,
                'instansi' => $request->instansi,
                'jabatan' => $request->jabatan,
                'berkaspengaju' => $file,
            ]);
        } else {
            ModelAjukanKerjasama::where('id',$id)->update([
                'nama' => $request->nama,
                'nohp' => $request->nohp,
                'instansi' => $request->instansi,
                'jabatan' => $request->jabatan,
            ]);
        }
        
        return redirect('/admin/ajukan-kerjasama')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ajukankerjasamadestroy($id)
    {
        ModelAjukanKerjasama::find($id)->delete();

        return redirect('/admin/ajukan-kerjasama')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }

    // Angket Kepuasan Layanan
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function angketkepuasanlayanan()
    {
        $akela = ModelAngketKepuasanLayanan::get();
        return view('admin.angket-kepuasan-layanan', compact('akela'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function angketkepuasanlayanancreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function angketkepuasanlayananstore(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function angketkepuasanlayananshow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function angketkepuasanlayananedit($id)
    {
        $akela = ModelAngketKepuasanLayanan::findorfail($id);
        return view('admin.angket-kepuasan-layanan', compact('akela'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function angketkepuasanlayananupdate(Request $request, $id)
    {
        Request()->validate([
            'link' => 'required',
        ], [
            'link.required' => 'Link tidak boleh kosong',
        ]);

        $data = [
            'link' => $request->link,
        ];

        ModelAngketKepuasanLayanan::find($id)->update($data);
        return redirect('/admin/angket-kepuasan-layanan')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function angketkepuasanlayanandestroy($id)
    {
        //
    }

    // Kontak
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kontak()
    {
        $kontak = ModelKontak::get();
        return view('admin.kontak', compact('kontak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kontakcreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        
        return redirect('/admin/kontak')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kontakshow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kontakedit($id)
    {
        $kontak = ModelKontak::findorfail($id);
        return view('admin.kontak', compact('kontak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kontakupdate(Request $request, $id)
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

        $data = [
            'nama' => $request->nama,
            'nohp' => $request->nohp,
            'email' => $request->email,
            'subject' => $request->subject,
            'pesan' => $request->pesan,
        ];

        ModelKontak::find($id)->update($data);
        return redirect('/admin/kontak')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kontakdestroy($id)
    {
        ModelKontak::find($id)->delete();

        return redirect('/admin/kontak')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }

    // International Office
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function io()
    {
        $io = ModelIO::get();
        return view('admin.international-office', compact('io'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function iocreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function iostore(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ioshow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ioedit($id)
    {
        $io = ModelIO::findorfail($id);
        return view('admin.international-office', compact('io'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ioupdate(Request $request, $id)
    {
        Request()->validate([
            'deskripsi' => 'required',
        ], [
            'deskripsi.required' => 'Deskripsi tidak boleh kosong!',
        ]);

        $data = [
            'deskripsi' => Request()->deskripsi,
        ];

        ModelIO::find($id)->update($data);
        return redirect('/admin/international-office')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function iodestroy($id)
    {
        //
    }

    // Kategori Mitra
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kamit()
    {
        $kakoin = ModelKategoriKodeInstansi::all();
        $kakein = ModelKategoriKetInstansi::all();
        $kajenas = ModelKategoriJenisNaskah::all();
        return view('admin.kategori-mitra', compact('kakoin', 'kakein', 'kajenas'));
    }
    
    // Mitra
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mitra()
    {
        $kakoin = ModelKategoriKodeInstansi::all();
        $kakein = ModelKategoriKetInstansi::all();
        $kajenas = ModelKategoriJenisNaskah::all();
        $mitra = ModelMitra::with('kakoin', 'kakein', 'kajenas')->get();
        return view('admin.mitra', compact('mitra', 'kakoin', 'kakein', 'kajenas'));
    }

    public function mitraexport()
    {
        return Excel::download(new MitraExport, 'Mitra.xlsx');
    }

    public function mitraimport(Request $request)
    {
        $file = $request->file('import');
        $namaFile = $file->getClientOriginalName();
        $file->move('berkasmitra', $namaFile);

        Excel::import(new MitraImport, public_path('/berkasmitra/' . $namaFile));
        return redirect('/admin/mitra')->with('pesan', 'Data Berhasil Di Import !!!');
    }

    public function mitraprint()
    {
        $kakoin = ModelKategoriKodeInstansi::get();
        $kakein = ModelKategoriKetInstansi::get();
        $kajenas = ModelKategoriJenisNaskah::get();
        $mitra = ModelMitra::with('kakoin', 'kakein', 'kajenas')->get();
        return view('admin.mitra-print', compact('mitra', 'kakoin', 'kakein', 'kajenas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mitracreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function mitrastore(Request $request)
    {
        Request()->validate([
            'kodeinstansi' => 'required',
            'ketinstansi' => 'required',
            'instansi' => 'required',
            'bidkerjasama' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'jenisnaskah' => 'required',
            'ketunit' => 'required',
            'berkasmitra' => 'required|file',
        ], [
            'kodeinstansi.required' => 'Kode Instansi tidak boleh kosong!',
            'ketinstansi.required' => 'Keterangan Instansi tidak boleh kosong!',
            'instansi.required' => 'Instansi tidak boleh kosong!',
            'bidkerjasama.required' => 'Bidang Kerjasama tidak boleh kosong!',
            'mulai.required' => 'Tanggal Dimulai Kerjasama tidak boleh kosong!',
            'selesai.required' => 'Tanggal Berakhir Kerjasama tidak boleh kosong!',
            'jenisnaskah.required' => 'Jenis Naskah tidak boleh kosong!',
            'ketunit.required' => 'Keterangan/Unit tidak boleh kosong!',
            'berkasmitra.required' => 'Berkas Mitra tidak boleh kosong!',
        ]);

        $mulai = Carbon::createFromFormat('m/d/Y g:i A', $request->mulai);
        $selesai = Carbon::createFromFormat('m/d/Y g:i A', $request->selesai);

        $file_name = $request->berkasmitra->getClientOriginalName();
            $file = $request->berkasmitra->storeAs('berkasmitra', $file_name);
        ModelMitra::create([
            'kodeinstansi' => $request->kodeinstansi,
            'ketinstnasi' => $request->ketinstnasi,
            'instansi' => $request->instansi,
            'bidkerjasama' => $request->bidkerjasama,
            'mulai' => $mulai->toDateTimeString(),
            'selesai' => $selesai->toDateTimeString(),
            'jenisnaskah' => $request->jenisnaskah,
            'ketunit' => $request->ketunit,
            'berkasmitra' => $file,
        ]);
        
        return redirect('/admin/mitra')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mitrashow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mitraedit($id)
    {
        $kakoin = ModelKategoriKodeInstansi::findorfail($id);
        $kakein = ModelKategoriKetInstansi::findorfail($id);
        $kajenas = ModelKategoriJenisNaskah::findorfail($id);
        $mitra = ModelMitra::findorfail($id);
        return view('admin.mitra', compact('mitra', 'kakoin', 'kakein', 'kajenas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mitraupdate(Request $request, $id)
    {
        Request()->validate([
            'kodeinstansi' => 'required',
            'ketinstansi' => 'required',
            'instansi' => 'required',
            'bidkerjasama' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'jenisnaskah' => 'required',
            'ketunit' => 'required',
        ], [
            'kodeinstansi.required' => 'Kode Instansi tidak boleh kosong!',
            'ketinstansi.required' => 'Keterangan Instansi tidak boleh kosong!',
            'instansi.required' => 'Instansi tidak boleh kosong!',
            'bidkerjasama.required' => 'Bidang Kerjasama tidak boleh kosong!',
            'mulai.required' => 'Tanggal Dimulai Kerjasama tidak boleh kosong!',
            'selesai.required' => 'Tanggal Berakhir Kerjasama tidak boleh kosong!',
            'jenisnaskah.required' => 'Jenis Naskah tidak boleh kosong!',
            'ketunit.required' => 'Keterangan/Unit tidak boleh kosong!',
        ]);

        $mulai = Carbon::createFromFormat('m/d/Y g:i A', $request->mulai);
        $selesai = Carbon::createFromFormat('m/d/Y g:i A', $request->selesai);

        if (Request()->hasFile('berkasmitra')) {
            $file_name = $request->berkasmitra->getClientOriginalName();
                $file = $request->berkasmitra->storeAs('berkasmitra', $file_name);
            ModelMitra::where('id',$id)->update([
                'kodeinstansi' => $request->kodeinstansi,
                'ketinstansi' => $request->ketinstansi,
                'instansi' => $request->instansi,
                'bidkerjasama' => $request->bidkerjasama,
                'mulai' => $mulai->toDateTimeString(),
                'selesai' => $selesai->toDateTimeString(),
                'jenisnaskah' => $request->jenisnaskah,
                'ketunit' => $request->ketunit,
                'berkasmitra' => $file,
            ]);
        } else {
            ModelMitra::where('id',$id)->update([
                'kodeinstansi' => $request->kodeinstansi,
                'ketinstansi' => $request->ketinstansi,
                'instansi' => $request->instansi,
                'bidkerjasama' => $request->bidkerjasama,
                'mulai' => $mulai->toDateTimeString(),
                'selesai' => $selesai->toDateTimeString(),
                'jenisnaskah' => $request->jenisnaskah,
                'ketunit' => $request->ketunit,
            ]);
        }
        
        return redirect('/admin/mitra')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mitradestroy($id)
    {
        ModelMitra::find($id)->delete();

        return redirect('/admin/mitra')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }
}