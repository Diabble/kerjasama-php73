<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\ValidationException;

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
    // Profile
    public function profile()
    {
        $user = User::first();
        // dd($mitrachart);
        return view('admin.profile', compact('user'));
    }

    public function profileedit($id)
    {
        $user = User::findorfail($id);
        return view('admin.profile', compact('user'));
    }

    public function profileupdate(Request $request, $id)
    {
        Request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        User::find($id)->update($data);
        alert()->success('Data Profile Berhasil Diperbarui!');
        return redirect('/admin/profile');
    }

    // Ubah Password
    public function password()
    {
        $user = Auth::user();
        return view('admin.ubah-password', compact('user'));
    }

    public function passwordedit($id)
    {
        $user = User::findorfail($id);
        return view('admin.ubah-password', compact('user'));
    }

    public function passwordupdate(Request $request, $id)
    {
        // dd('success');
        Request()->validate([
            'current_password' => 'required',
            'password' => 'required|min:7|confirmed',
        ]);

        if (Hash::check($request->current_password, auth()->user()->password)) {
            Auth::user()->update(['password' => Hash::make($request->password)]);
                alert()->success('Ubah Password','Password berhasil diperbarui');
            return back();
        }
        throw ValidationException::withMessages([
            'current_password' => 'Password tidak sama dengan data',
        ]);   
    }

    // User
    public function useradmin()
    {
        $user = User::get();
        return view('admin.user', compact('user'));
    }
    
    public function userstore(Request $request)
    {
        Request()->validate([
            'name' => 'required|min:5|max:15',
            'level' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:14',
        ]);

        User::create([
            'name' => $request->name,
            'level' => $request->level,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        alert()->success('Akun','Pembuatan Akun Berhasil!');
        return redirect('/admin/user');
    }

    public function useredit($id)
    {
        $user = User::findorfail($id);
        return view('admin.user', compact('user'));
    }

    public function userupdate(Request $request, $id)
    {
        Request()->validate([
            'name' => 'required',
            'level' => 'required',
            'email' => 'required',
        ]);

        $user->update([
            'name' => $request->name,
            'level' => $request->level,
            'email' => $request->email,
        ]);
        
        $user = User::find($id);
        alert()->success('Akun','Data Akun Berhasil Diperbarui!');
        return redirect('/admin/user');
    }

    public function userpassupdate(Request $request, $id)
    {
        Request()->validate([
            'password' => 'required',
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);
        
        $user = User::find($id);
        alert()->success('Akun','Data Akun Berhasil Diperbarui!');
        return redirect('/admin/user');
    }

    public function userdestroy($id)
    {
        User::find($id)->delete();

        alert()->success('Akun','Data Akun Berhasil Dihapus!');
        return redirect('/admin/user');
    }

    // Dashboard
    public function dashboard()
    {
        $jenisnaskah = DB::table('mitra')->get();
        $mou = DB::table('mitra')->where('jenisnaskah', 1)->count();
        $moa = DB::table('mitra')->where('jenisnaskah', 2)->count();
        $fakultas = DB::table('users')->where('level', 'staff')->count();
        $pengaju = DB::table('users')->where('level', 'user')->count();
        // dd($mitrachart);
        return view('admin.dashboard', compact('jenisnaskah', 'mou', 'moa', 'fakultas', 'pengaju'));
    }

    // Settings
    public function settings()
    {
        $beranda = ModelBeranda::get();
        $profil = ModelProfilUINSGD::get();
        $caper = ModelCapaianKinerja::get();
        $kaber = ModelKategoriBerita::all();
        $kakoin = ModelKategoriKodeInstansi::all();
        $kakein = ModelKategoriKetInstansi::all();
        $kajenas = ModelKategoriJenisNaskah::all();
        return view('admin.settings', compact('beranda', 'profil', 'caper', 'kaber', 'kakoin', 'kakein', 'kajenas'));
    }

    // Beranda/Slide Carousel
    public function berandacreate()
    {
        //
    }
    
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

    public function berandashow($id)
    {
        //
    }

    public function berandaedit($id)
    {
        $beranda = ModelBeranda::findorfail($id);
        return view('admin.settings', compact('beranda'));
    }

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

    public function berandadestroy($id)
    {
        ModelBeranda::find($id)->delete();

        return redirect('/admin/settings')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }

    // Profil UIN SGD
    public function profiluinsgdcreate()
    {
        //
    }
    
    public function profiluinsgdstore(Request $request)
    {
        //
    }

    public function profiluinsgdshow($id)
    {
        //
    }

    public function profiluinsgdedit($id)
    {
        $profil = ModelProfilUINSGD::findorfail($id);
        return view('admin.settings', compact('profil'));
    }

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

    public function profiluinsgddestroy($id)
    {
        //
    }

    // Capaian Kinerja
    public function capercreate()
    {
        //
    }
    
    public function caperstore(Request $request)
    {
        //
    }

    public function capershow($id)
    {
        //
    }

    public function caperedit($id)
    {
        $caper = ModelCapaianKinerja::findorfail($id);
        return view('admin.settings', compact('caper'));
    }

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

    public function caperdestroy($id)
    {
        //
    }

    // Kategori Berita
    public function kabercreate()
    {
        //
    }
    
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

    public function kabershow($id)
    {
        //
    }

    public function kaberedit($id)
    {
        $kaber = ModelKategoriBerita::findorfail($id);
        return view('admin.settings', compact('kaber'));
    }

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

    public function kaberdestroy($id)
    {
        ModelKategoriBerita::find($id)->delete();

        return redirect('/admin/settings')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }

    // Kategori Kode Instansi
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
    public function kakeincreate()
    {
        //
    }
    
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

    public function kakeinshow($id)
    {
        //
    }

    public function kakeinedit($id)
    {
        $kakein = ModelKategoriKetInstansi::findorfail($id);
        return view('admin.settings', compact('kakein'));
    }

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

    public function kakeindestroy($id)
    {
        ModelKategoriKetInstansi::find($id)->delete();

        return redirect('/admin/settings')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }

    // Kategori Jenis Naskah
    public function kajenacreate()
    {
        //
    }
    
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

    public function kajenashow($id)
    {
        //
    }

    public function kajenaedit($id)
    {
        $kajenas = ModelKategoriJenisNaskah::findorfail($id);
        return view('admin.settings', compact('kajenas'));
    }


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

    public function kajenadestroy($id)
    {
        ModelKategoriJenisNaskah::find($id)->delete();

        return redirect('/admin/settings')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }

    // Wakil Rektor
    public function wakilrektor()
    {
        $wakilrektor = ModelWakilRektor::get();
        return view('admin.wakil-rektor', compact('wakilrektor'));
    }

    public function wakilrektorcreate()
    {
        //
    }
    
    public function wakilrektorstore(Request $request)
    {
        //
    }

    public function wakilrektorshow($id)
    {
        //
    }

    public function wakilrektoredit($id)
    {
        $wakilrektor = ModelWakilRektor::findorfail($id);
        return view('admin.wakil-rektor', compact('wakilrektor'));
    }

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

    public function wakilrektordestroy($id)
    {
        //
    }

    // Visi & Misi
    public function visimisi()
    {
        $visi = ModelVisi::get();
        $misi = ModelMisi::get();
        return view('admin.visi-misi', compact('visi', 'misi'));
    }

    // Visi
    public function visicreate()
    {
        //
    }
    
    public function visistore(Request $request)
    {
        //
    }

    public function visishow($id)
    {
        //
    }

    public function visiedit($id)
    {
        $visi = ModelVisi::findorfail($id);
        return view('admin.visi-misi', compact('visi'));
    }

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

    public function visidestroy($id)
    {
        //
    }

    // Misi
    public function misicreate()
    {
        //
    }
    
    public function misistore(Request $request)
    {
        //
    }

    public function misishow($id)
    {
        //
    }

    public function misiedit($id)
    {
        $misi = ModelMisi::findorfail($id);
        return view('admin.visi-misi', compact('misi'));
    }

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

    public function misidestroy($id)
    {
        //
    }

    // Tugas Pokok Fungsi
    public function tupoksi()
    {
        $tupoksi = ModelTugasPokokFungsi::get();
        return view('admin.tugas-pokok-fungsi', compact('tupoksi'));
    }

    public function tupoksicreate()
    {
        //
    }
    
    public function tupoksistore(Request $request)
    {
        //
    }

    public function tupoksishow($id)
    {
        //
    }

    public function tupoksiedit($id)
    {
        $tupoksi = ModelTugasPokokFungsi::findorfail($id);
        return view('admin.tugas-pokok-fungsi', compact('tupoksi'));
    }

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

    public function tupoksidestroy($id)
    {
        //
    }

    // Kebijakan & Program
    public function kepro()
    {
        $kepro = ModelKebijakanProgram::get();
        return view('admin.kebijakan-program', compact('kepro'));
    }

    public function keprocreate()
    {
        //
    }
    
    public function keprostore(Request $request)
    {
        //
    }

    public function keproshow($id)
    {
        //
    }

    public function keproedit($id)
    {
        $kepro = ModelKebijakanProgram::findorfail($id);
        return view('admin.kebijakan-program', compact('kepro'));
    }

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

    public function keprodestroy($id)
    {
        //
    }

    // Struktur
    public function struktur()
    {
        $struktur = ModelStruktur::get();
        return view('admin.struktur', compact('struktur'));
    }

    public function strukturcreate()
    {
        //
    }
    
    public function strukturstore(Request $request)
    {
        //
    }

    public function strukturshow($id)
    {
        //
    }

    public function strukturedit($id)
    {
        $struktur = ModelStruktur::findorfail($id);
        return view('admin.struktur', compact('struktur'));
    }

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

    public function strukturdestroy($id)
    {
        //
    }

    // Alur Kerjasama
    public function alurkerjasama()
    {
        $alur = ModelAlurKerjasama::get();
        return view('admin.alur-kerjasama', compact('alur'));
    }

    public function alurkerjasamacreate()
    {
        //
    }
    
    public function alurkerjasamastore(Request $request)
    {
        //
    }

    public function alurkerjasamashow($id)
    {
        //
    }

    public function alurkerjasamaedit($id)
    {
        $alur = ModelAlurKerjasama::findorfail($id);
        return view('admin.alur-kerjasama', compact('alur'));
    }

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

    public function alurkerjasamadestroy($id)
    {
        //
    }

    // Progres Pengajuan Kerjasama
    public function propeker()
    {
        $propeker = ModelPengajuanKerjasama::all();
        $users = User::where('level', 'user')->get();
        return view('admin.progres-pengajuan-kerjasama', compact('propeker', 'users'));
    }

    public function propekercreate()
    {
        //
    }
    
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

    public function propekershow($id)
    {
        //
    }

    public function propekeredit($id)
    {
        $propeker = ModelPengajuanKerjasama::findorfail($id);
        $mitra = ModelMitra::findorfail($id);
        return view('admin.progres-pengajuan-kerjasama', compact('propeker', 'mitra'));
    }

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

    public function propekerdestroy($id)
    {
        ModelPengajuanKerjasama::find($id)->delete();

        return redirect('/admin/progres-pengajuan-kerjasama')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }

    // FAQ
    public function faq()
    {
        $faq = ModelFAQ::all();
        return view('admin.faq', compact('faq'));
    }

    public function faqcreate()
    {
        //
    }
    
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

    public function faqshow($id)
    {
        //
    }

    public function faqedit($id)
    {
        $faq = ModelFAQ::findorfail($id);
        return view('admin.faq', compact('faq'));
    }

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

    public function faqdestroy($id)
    {
        ModelFAQ::find($id)->delete();

        return redirect('/admin/faq')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }

    // Kategori Berita
    public function kaber()
    {
        $kaber = ModelKategoriBerita::all();
        return view('admin.kategori-berita', compact('kaber'));
    }

    // Berita
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

    public function beritashow($id)
    {
        //
    }

    public function beritaedit($id)
    {
        $kaber = ModelKategoriBerita::all();
        $berita = ModelBerita::findorfail($id);
        return view('admin.berita', compact('berita', 'kaber'));
    }

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

    public function beritadestroy($id)
    {
        ModelBerita::find($id)->delete();

        return redirect('/admin/berita')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }

    // Pengumuman
    public function pengumuman()
    {
        $pengumuman = ModelPengumuman::all();
        return view('admin.pengumuman', compact('pengumuman'));
    }

    public function pengumumancreate()
    {
        //
    }
    
    public function pengumumanstore(Request $request)
    {
        //
    }

    public function pengumumanshow($id)
    {
        //
    }

    public function pengumumanedit($id)
    {
        //
    }

    public function pengumumanupdate(Request $request, $id)
    {
        //
    }

    public function pengumumandestroy($id)
    {
        //
    }

    // Galeri
    public function galeri()
    {
        $galeri = ModelGaleri::all();
        return view('admin.galeri', compact('galeri'));
    }

    public function galericreate()
    {
        //
    }
    
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

    public function galerishow($id)
    {
        //
    }

    public function galeriedit($id)
    {
        $galeri = ModelGaleri::findorfail($id);
        return view('admin.galeri', compact('galeri'));
    }

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

    public function galeridestroy($id)
    {
        ModelGaleri::find($id)->delete();

        return redirect('/admin/galeri')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }

    // Berkas Kerjasama
    public function berkaskerjasama()
    {
        return view('admin.berkas-kerjasama');
    }

    public function berkaskerjasamacreate()
    {
        //
    }
    
    public function berkaskerjasamastore(Request $request)
    {
        //
    }

    public function berkaskerjasamashow($id)
    {
        //
    }

    public function berkaskerjasamaedit($id)
    {
        //
    }

    public function berkaskerjasamaupdate(Request $request, $id)
    {
        //
    }

    public function berkaskerjasamadestroy($id)
    {
        //
    }

    // Ajukan Kerjasama
    public function ajukankerjasama()
    {
        $ajuker = ModelAjukanKerjasama::get();
        return view('admin.ajukan-kerjasama', compact('ajuker'));
    }

    public function ajukankerjasamacreate()
    {
        //
    }
    
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

    public function ajukankerjasamashow($id)
    {
        //
    }

    public function ajukankerjasamaedit($id)
    {
        $ajuker = ModelAjukanKerjasama::findorfail($id);
        return view('admin.ajukan-kerjasama', compact('ajuker'));
    }

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

    public function ajukankerjasamadestroy($id)
    {
        ModelAjukanKerjasama::find($id)->delete();

        return redirect('/admin/ajukan-kerjasama')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }

    // Angket Kepuasan Layanan
    public function angketkepuasanlayanan()
    {
        $akela = ModelAngketKepuasanLayanan::get();
        return view('admin.angket-kepuasan-layanan', compact('akela'));
    }

    public function angketkepuasanlayanancreate()
    {
        //
    }
    
    public function angketkepuasanlayananstore(Request $request)
    {
        //
    }

    public function angketkepuasanlayananshow($id)
    {
        //
    }

    public function angketkepuasanlayananedit($id)
    {
        $akela = ModelAngketKepuasanLayanan::findorfail($id);
        return view('admin.angket-kepuasan-layanan', compact('akela'));
    }

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

    public function angketkepuasanlayanandestroy($id)
    {
        //
    }

    // Kontak
    public function kontak()
    {
        $kontak = ModelKontak::get();
        return view('admin.kontak', compact('kontak'));
    }

    public function kontakcreate()
    {
        //
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
        
        return redirect('/admin/kontak')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
    }

    public function kontakshow($id)
    {
        //
    }

    public function kontakedit($id)
    {
        $kontak = ModelKontak::findorfail($id);
        return view('admin.kontak', compact('kontak'));
    }

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

    public function kontakdestroy($id)
    {
        ModelKontak::find($id)->delete();

        return redirect('/admin/kontak')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }

    // International Office
    public function io()
    {
        $io = ModelIO::get();
        return view('admin.international-office', compact('io'));
    }

    public function iocreate()
    {
        //
    }
    
    public function iostore(Request $request)
    {
        //
    }

    public function ioshow($id)
    {
        //
    }

    public function ioedit($id)
    {
        $io = ModelIO::findorfail($id);
        return view('admin.international-office', compact('io'));
    }

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

    public function iodestroy($id)
    {
        //
    }

    // Kategori Mitra
    public function kamit()
    {
        $kakoin = ModelKategoriKodeInstansi::all();
        $kakein = ModelKategoriKetInstansi::all();
        $kajenas = ModelKategoriJenisNaskah::all();
        return view('admin.kategori-mitra', compact('kakoin', 'kakein', 'kajenas'));
    }
    
    // Mitra
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

    public function mitracreate()
    {
        //
    }
    
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

    public function mitrashow($id)
    {
        //
    }

    public function mitraedit($id)
    {
        $kakoin = ModelKategoriKodeInstansi::findorfail($id);
        $kakein = ModelKategoriKetInstansi::findorfail($id);
        $kajenas = ModelKategoriJenisNaskah::findorfail($id);
        $mitra = ModelMitra::findorfail($id);
        return view('admin.mitra', compact('mitra', 'kakoin', 'kakein', 'kajenas'));
    }

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

    public function mitradestroy($id)
    {
        ModelMitra::find($id)->delete();

        return redirect('/admin/mitra')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }
}