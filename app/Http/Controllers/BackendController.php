<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use Auth;

use App\Models\User;

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

use App\Models\ModelKategoriBerita;

use App\Models\ModelPengumuman;

use App\Models\ModelGaleri;

use App\Models\ModelBerkasKerjasama;

use App\Models\ModelAjukanKerjasama;

use App\Models\ModelAngketKepuasanLayanan;

use App\Models\ModelLayananKami;

use App\Models\ModelIO;

use App\Models\ModelMitra;

use App\Models\ModelKategoriKodeInstansi;

use App\Models\ModelKategoriKetInstansi;

use App\Models\ModelKategoriJenisNaskah;

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
        $user = User::all();
        $kaber = ModelKategoriBerita::all();
        $kakoin = ModelKategoriKodeInstansi::all();
        $kakein = ModelKategoriKetInstansi::all();
        $kajenas = ModelKategoriJenisNaskah::all();
        return view('admin.settings', compact('beranda', 'user', 'kaber', 'kakoin', 'kakein', 'kajenas'));
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
        
        return redirect('/settings')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
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
            'judulcarousel.required' => 'Wajib diisi!!!',
            'deskripsicarousel.required' => 'Wajib diisi!!!',
            'tombolcarousel.required' => 'Wajib diisi!!!',
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
        
        return redirect('/settings')->with('pesan', 'Data Berhasil Di Perbarui !!!');
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

        return redirect('/settings')->with('pesan', 'Data Berhasil Di Hapus !!!');
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
            'nama_kategori.required' => 'Wajib diisi!!!',
        ]);

        ModelKategoriBerita::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori),
        ]);

        return redirect('/settings')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
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
            'nama_kategori.required' => 'Wajib diisi!!!',
        ]);

        $data = [
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori),
        ];

        ModelKategoriBerita::find($id)->update($data);    
        return redirect('/settings')->with('pesan', 'Data Berhasil Di Perbarui !!!');
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

        return redirect('/settings')->with('pesan', 'Data Berhasil Di Hapus !!!');
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
            'nama_kategori.required' => 'Wajib diisi!!!',
        ]);

        ModelKategoriKodeInstansi::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori),
        ]);
        
        return redirect('/settings')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
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
            'slug' => 'required',
        ], [
            'nama_kategori.required' => 'Wajib diisi!!!',
            'slug.required' => 'Wajib diisi!!!',
        ]);

        $data = [
            'nama_kategori' => $request->nama_kategori,
            'slug' => $request->slug,
        ];

        ModelKategoriKodeInstansi::find($id)->update($data);    
        return redirect('/settings')->with('pesan', 'Data Berhasil Di Perbarui !!!');
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

        return redirect('/settings')->with('pesan', 'Data Berhasil Di Hapus !!!');
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
            'nama_kategori.required' => 'Wajib diisi!!!',
        ]);

        ModelKategoriKetInstansi::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori),
        ]);
        
        return redirect('/settings')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
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
            'slug' => 'required',
        ], [
            'nama_kategori.required' => 'Wajib diisi!!!',
            'slug.required' => 'Wajib diisi!!!',
        ]);

        $data = [
            'nama_kategori' => $request->nama_kategori,
            'slug' => $request->slug,
        ];

        ModelKategoriKetInstansi::find($id)->update($data);    
        return redirect('/settings')->with('pesan', 'Data Berhasil Di Perbarui !!!');
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

        return redirect('/settings')->with('pesan', 'Data Berhasil Di Hapus !!!');
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
            'nama_kategori.required' => 'Wajib diisi!!!',
        ]);

        ModelKategoriJenisNaskah::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori),
        ]);
        
        return redirect('/settings')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
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
            'slug' => 'required',
        ], [
            'nama_kategori.required' => 'Wajib diisi!!!',
            'slug.required' => 'Wajib diisi!!!',
        ]);

        $data = [
            'nama_kategori' => $request->nama_kategori,
            'slug' => $request->slug,
        ];

        ModelKategoriJenisNaskah::find($id)->update($data);    
        return redirect('/settings')->with('pesan', 'Data Berhasil Di Perbarui !!!');
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

        return redirect('/settings')->with('pesan', 'Data Berhasil Di Hapus !!!');
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
        return view('admin.wakil-rektor-admin', compact('wakilrektor'));
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
        return view('admin.wakil-rektor-admin', compact('wakilrektor'));
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
            'nama.required' => 'Wajib diisi!!!',
            'jabatan.required' => 'Wajib diisi!!!',
            'nip.required' => 'Wajib diisi!!!',
            'deskripsi.required' => 'Wajib diisi!!!',
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

        return redirect('/wakil-rektor-admin')->with('pesan', 'Data Berhasil Di Perbarui !!!');
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
        return view('admin.visi-misi-admin', compact('visi', 'misi'));
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
        return view('admin.visi-misi-admin', compact('visi'));
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
            'deskripsi.required' => 'Wajib diisi!!!',
        ]);

        $data = [
            'deskripsi' => Request()->deskripsi,
        ];

        ModelVisi::find($id)->update($data);
        return redirect('/visi-misi-admin')->with('pesan', 'Data Berhasil Di Perbarui !!!');
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
        return view('admin.visi-misi-admin', compact('misi'));
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
            'deskripsi.required' => 'Wajib diisi!!!',
        ]);

        $data = [
            'deskripsi' => Request()->deskripsi,
        ];

        ModelMisi::find($id)->update($data);
        return redirect('/visi-misi-admin')->with('pesan', 'Data Berhasil Di Perbarui !!!');
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
        return view('admin.tugas-pokok-fungsi-admin', compact('tupoksi'));
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
        return view('admin.tugas-pokok-fungsi-admin', compact('tupoksi'));
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
            'deskripsi.required' => 'Wajib diisi!!!',
        ]);

        $data = [
            'deskripsi' => Request()->deskripsi,
        ];

        ModelTugasPokokFungsi::find($id)->update($data);
        return redirect('/tugas-pokok-fungsi-admin')->with('pesan', 'Data Berhasil Di Perbarui !!!');
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
        return view('admin.kebijakan-program-admin', compact('kepro'));
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
        return view('admin.kebijakan-program-admin', compact('kepro'));
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
            'deskripsi.required' => 'Wajib diisi!!!',
        ]);

        $data = [
            'deskripsi' => Request()->deskripsi,
        ];

        ModelKebijakanProgram::find($id)->update($data);
        return redirect('/kebijakan-program-admin')->with('pesan', 'Data Berhasil Di Perbarui !!!');
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
        return view('admin.struktur-admin', compact('struktur'));
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
        return view('admin.struktur-admin', compact('struktur'));
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
            'deskripsi.required' => 'Wajib diisi!!!',
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

        return redirect('/struktur-admin')->with('pesan', 'Data Berhasil Di Perbarui !!!');
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
        return view('admin.alur-kerjasama-admin', compact('alur'));
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
        return view('admin.alur-kerjasama-admin', compact('alur'));
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
            'deskripsi.required' => 'Wajib diisi!!!',
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

        return redirect('/alur-kerjasama-admin')->with('pesan', 'Data Berhasil Di Perbarui !!!');
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
        $mitra = ModelMitra::all();
        $propeker = ModelPengajuanKerjasama::all();
        return view('admin.progres-pengajuan-kerjasama-admin', compact('propeker', 'mitra'));
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
        //
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
        $mitra = ModelMitra::findorfail($id);
        $propeker = ModelPengajuanKerjasama::findorfail($id);
        return view('admin.progres-pengajuan-kerjasama-admin', compact('propeker', 'mitra'));
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
            'instansi.required' => 'Wajib diisi!!!',
            'progres.required' => 'Wajib diisi!!!',
        ]);

        $data = [
            'instansi' => Request()->instansi,
            'progres' => Request()->progres,
        ];

        ModelPengajuanKerjasama::find($id)->update($data);
        return redirect('/progres-pengajuan-kerjasama-admin')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function propekerdestroy($id)
    {
        //
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
        return view('admin.faq-admin', compact('faq'));
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
            'pertanyaan.required' => 'Wajib diisi!!!',
            'jawaban.required' => 'Wajib diisi!!!',
        ]);

        ModelFAQ::create([
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban,
        ]);
        
        return redirect('/faq-admin')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
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
        return view('admin.faq-admin', compact('faq'));
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
            'pertanyaan.required' => 'Wajib diisi!!!',
            'jawaban.required' => 'Wajib diisi!!!',
        ]);

        $data = [
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban,
        ];

        ModelFAQ::find($id)->update($data);    
        return redirect('/faq-admin')->with('pesan', 'Data Berhasil Di Perbarui !!!');
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

        return redirect('/faq-admin')->with('pesan', 'Data Berhasil Di Hapus !!!');
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
        return view('admin.kategori-berita-admin', compact('kaber'));
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
        return view('admin.berita-admin', compact('berita', 'kaber'));
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
            'poto.required' => 'Wajib diisi!!!',
            'judul.required' => 'Wajib diisi!!!',
            'deskripsi.required' => 'Wajib diisi!!!',
            'kategori_id.required' => 'Wajib diisi!!!',
            'views.required' => 'Wajib diisi!!!',
            'aktif.required' => 'Wajib diisi!!!',
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
        
        return redirect('/berita-admin')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
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
        return view('admin.berita-admin', compact('berita', 'kaber'));
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
            'judul.required' => 'Wajib diisi!!!',
            'deskripsi.required' => 'Wajib diisi!!!',
            'kategori_id.required' => 'Wajib diisi!!!',
            'views.required' => 'Wajib diisi!!!',
            'aktif.required' => 'Wajib diisi!!!',
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
        
        return redirect('/berita-admin')->with('pesan', 'Data Berhasil Di Perbarui !!!');
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

        return redirect('/berita-admin')->with('pesan', 'Data Berhasil Di Hapus !!!');
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
        return view('admin.pengumuman-admin', compact('pengumuman'));
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
        return view('admin.galeri-admin', compact('galeri'));
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
            'poto' => 'Wajib diisi!!!',
            'caption.required' => 'Wajib diisi!!!',
        ]);

        $file_name = $request->poto->getClientOriginalName();
            $image = $request->poto->storeAs('thumbnail', $file_name);
        ModelGaleri::create([
            'poto' => $image,
            'caption' => $request->caption,
        ]);
        
        return redirect('/galeri-admin')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
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
        return view('admin.galeri-admin', compact('galeri'));
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
            'caption.required' => 'Wajib diisi!!!',
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
        
        return redirect('/galeri-admin')->with('pesan', 'Data Berhasil Di Perbarui !!!');
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

        return redirect('/galeri-admin')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }

    // Berkas Kerjasama
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function berkaskerjasama()
    {
        return view('admin.berkas-kerjasama-admin');
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
        return view('admin.ajukan-kerjasama-admin', compact('ajuker'));
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
            'berkaspengaju' => 'required|file',
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
        
        return redirect('/ajukan-kerjasama-admin')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
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
        return view('admin.ajukan-kerjasama-admin', compact('ajuker'));
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
            'nama.required' => 'Wajib diisi!!!',
            'nohp.required' => 'Wajib diisi!!!',
            'instansi.required' => 'Wajib diisi!!!',
            'jabatan.required' => 'Wajib diisi!!!',
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
        
        return redirect('/ajukan-kerjasama-admin')->with('pesan', 'Data Berhasil Di Perbarui !!!');
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

        return redirect('/ajukan-kerjasama-admin')->with('pesan', 'Data Berhasil Di Hapus !!!');
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
        return view('admin.angket-kepuasan-layanan-admin', compact('akela'));
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
        Request()->validate([
            'nama' => 'required',
            'nohp' => 'required',
            'email' => 'required|email:dns',
            'subject' => 'required',
            'pesan' => 'required',
        ], [
            'nama.required' => 'Wajib diisi!!!',
            'nohp.required' => 'Wajib diisi!!!',
            'email.required' => 'Wajib diisi!!!',
            'subject.required' => 'Wajib diisi!!!',
            'pesan.required' => 'Wajib diisi!!!',
        ]);

        ModelAngketKepuasanLayanan::create([
            'nama' => $request->nama,
            'nohp' => $request->nohp,
            'email' => $request->email,
            'subject' => $request->subject,
            'pesan' => $request->pesan,
        ]);
        
        return redirect('/angket-kepuasan-layanan-admin')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
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
        return view('admin.angket-kepuasan-layanan-admin', compact('akela'));
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
            'nama' => 'required',
            'nohp' => 'required',
            'email' => 'required|email:dns',
            'subject' => 'required',
            'pesan' => 'required',
        ], [
            'nama.required' => 'Wajib diisi!!!',
            'nohp.required' => 'Wajib diisi!!!',
            'email.required' => 'Wajib diisi!!!',
            'subject.required' => 'Wajib diisi!!!',
            'pesan.required' => 'Wajib diisi!!!',
        ]);

        $data = [
            'nama' => $request->nama,
            'nohp' => $request->nohp,
            'email' => $request->email,
            'subject' => $request->subject,
            'pesan' => $request->pesan,
        ];

        ModelIO::find($id)->update($data);
        return redirect('/angket-kepuasan-layanan-admin')->with('pesan', 'Data Berhasil Di Perbarui !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function angketkepuasanlayanandestroy($id)
    {
        ModelAngketKepuasanLayanan::find($id)->delete();

        return redirect('/angket-kepuasan-layanan-admin')->with('pesan', 'Data Berhasil Di Hapus !!!');
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
        return view('admin.international-office-admin', compact('io'));
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
        return view('admin.international-office-admin', compact('io'));
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
            'deskripsi.required' => 'Wajib diisi!!!',
        ]);

        $data = [
            'deskripsi' => Request()->deskripsi,
        ];

        ModelIO::find($id)->update($data);
        return redirect('/international-office-admin')->with('pesan', 'Data Berhasil Di Perbarui !!!');
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
        return view('admin.kategori-mitra-admin', compact('kakoin', 'kakein', 'kajenas'));
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
        return view('admin.mitra-admin', compact('mitra', 'kakoin', 'kakein', 'kajenas'));
    }

    public function mitraprint()
    {
        $kakoin = ModelKategoriKodeInstansi::get();
        $kakein = ModelKategoriKetInstansi::get();
        $kajenas = ModelKategoriJenisNaskah::get();
        $mitra = ModelMitra::with('kakoin', 'kakein', 'kajenas')->get();
        return view('admin.mitra-print-admin', compact('mitra', 'kakoin', 'kakein', 'kajenas'));
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
            'kodeinstansi.required' => 'Wajib diisi!!!',
            'ketinstansi.required' => 'Wajib diisi!!!',
            'instansi.required' => 'Wajib diisi!!!',
            'bidkerjasama.required' => 'Wajib diisi!!!',
            'mulai.required' => 'Wajib diisi!!!',
            'selesai.required' => 'Wajib diisi!!!',
            'jenisnaskah.required' => 'Wajib diisi!!!',
            'ketunit.required' => 'Wajib diisi!!!',
            'berkasmitra.required' => 'Wajib diisi!!!',
        ]);

        $file_name = $request->berkasmitra->getClientOriginalName();
            $file = $request->berkasmitra->storeAs('berkasmitra', $file_name);
        ModelMitra::create([
            'kodeinstansi' => $request->kodeinstansi,
            'ketinstnasi' => $request->ketinstnasi,
            'instansi' => $request->instansi,
            'bidkerjasama' => $request->bidkerjasama,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'jenisnaskah' => $request->jenisnaskah,
            'ketunit' => $request->ketunit,
            'berkasmitra' => $file,
        ]);
        
        return redirect('/mitra-admin')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
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
        return view('admin.mitra-admin', compact('mitra', 'kakoin', 'kakein', 'kajenas'));
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
            'kodeinstansi.required' => 'Wajib diisi!!!',
            'ketinstansi.required' => 'Wajib diisi!!!',
            'instansi.required' => 'Wajib diisi!!!',
            'bidkerjasama.required' => 'Wajib diisi!!!',
            'mulai.required' => 'Wajib diisi!!!',
            'selesai.required' => 'Wajib diisi!!!',
            'jenisnaskah.required' => 'Wajib diisi!!!',
            'ketunit.required' => 'Wajib diisi!!!',
        ]);

        if (Request()->hasFile('berkasmitra')) {
            $file_name = $request->berkasmitra->getClientOriginalName();
                $file = $request->berkasmitra->storeAs('berkasmitra', $file_name);
            ModelMitra::where('id',$id)->update([
                'kodeinstansi' => $request->kodeinstansi,
                'ketinstansi' => $request->ketinstansi,
                'instansi' => $request->instansi,
                'bidkerjasama' => $request->bidkerjasama,
                'mulai' => $request->mulai,
                'selesai' => $request->selesai,
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
                'mulai' => $request->mulai,
                'selesai' => $request->selesai,
                'jenisnaskah' => $request->jenisnaskah,
                'ketunit' => $request->ketunit,
            ]);
        }
        
        return redirect('/mitra-admin')->with('pesan', 'Data Berhasil Di Perbarui !!!');
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

        return redirect('/mitra-admin')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }
}