<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\ValidationException;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

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
        $uin = User::whereIn('level', ['admin', 'pimpinan', 'staff'])->get();
        $user = User::where('level', 'user')->get();
        return view('admin.user', compact('uin', 'user'));
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
        alert()->success('Akun','Password Berhasil Diperbarui!');
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
        
        alert()->success('Data Slide Carousel Berhasil Ditambahkan!');
        return redirect('/admin/settings');
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
            $beranda = ModelBeranda::find($id);
            if (Storage::exists($beranda->poto)) {
                Storage::delete($beranda->poto);
            }

            $file_name = $request->poto->getClientOriginalName();
                $image = $request->poto->storeAs('thumbnail', $file_name);
                // $image = $request->poto->store('thumbnail');
            $beranda->update([
                'poto' => $image,
                'judulcarousel' => $request->judulcarousel,
                'deskripsicarousel' => $request->deskripsicarousel,
                'tombolcarousel' => $request->tombolcarousel,
            ]);
        } else {
            $beranda->update([
                'judulcarousel' => $request->judulcarousel,
                'deskripsicarousel' => $request->deskripsicarousel,
                'tombolcarousel' => $request->tombolcarousel,
            ]);
        }
        
        alert()->success('Data Slide Carousel Berhasil Diperbarui!');
        return redirect('/admin/settings');
    }

    public function berandadestroy($id)
    {
        $beranda = ModelBeranda::find($id);
        if (Storage::exists($beranda->poto)) {
            Storage::delete($beranda->poto);
        }
        $beranda->delete();

        alert()->success('Data Slide Carousel Berhasil Dihapus!');
        return redirect('/admin/settings');
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
        alert()->success('Data Profile Berhasil Diperbarui!');
        return redirect('/admin/settings');
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
        alert()->success('Data Capaian Kinerja Berhasil Diperbarui!');       
        return redirect('/admin/settings');
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
        
        alert()->success('Kategori Berita Berhasil Ditambahkan!');
        return redirect('/admin/settings');
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
        alert()->success('Data Kategori Berita Berhasil Diperbarui!');
        return redirect('/admin/settings');
    }

    public function kaberdestroy($id)
    {
        ModelKategoriBerita::find($id)->delete();
        
        alert()->success('Kategori Berita Berhasil Dihapus!');
        return redirect('/admin/settings');
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
        
        alert()->success('Kategori Kode Instansi Berhasil Ditambahkan!');
        return redirect('/admin/settings');
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
        alert()->success('Data Kategori Kode Instansi Berhasil Diperbarui!');
        return redirect('/admin/settings');
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
        
        alert()->success('Kategori Kode Instansi Berhasil Dihapus!');
        return redirect('/admin/settings');
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
        
        alert()->success('Kategori Keterangan Instansi Berhasil Ditambahkan!');
        return redirect('/admin/settings');
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
        alert()->success('Data Kategori Keterangan Instansi Berhasil Diperbarui!');
        return redirect('/admin/settings');
    }

    public function kakeindestroy($id)
    {
        ModelKategoriKetInstansi::find($id)->delete();
        
        alert()->success('Kategori Keterangan Instansi Berhasil Dihapus!');
        return redirect('/admin/settings');
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
        
        alert()->success('Kategori Jenis Naskah Berhasil Ditambahkan!');
        return redirect('/admin/settings');
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
        alert()->success('Data Kategori Jenis Instansi Berhasil Diperbarui!');
        return redirect('/admin/settings');
    }

    public function kajenadestroy($id)
    {
        ModelKategoriJenisNaskah::find($id)->delete();
        
        alert()->success('Kategori Jenis Instansi Berhasil Dihapus!');
        return redirect('/admin/settings');
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
            $rektor = ModelWakilRektor::find($id);
            if (Storage::exists($rektor->poto)) {
                Storage::delete($rektor->poto);
            }
            // if ($request->oldImage) {
            //     Storage::delete($request->oldImage);
            // }

            $file_name = $request->poto->getClientOriginalName();
                $image = $request->poto->storeAs('thumbnail', $file_name);
            $rektor->update([
                'poto' => $image,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'nip' => $request->nip,
                'deskripsi' => $request->deskripsi,
        ]);
        } else {
            $rektor->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'nip' => $request->nip,
                'deskripsi' => $request->deskripsi,
        ]);
        }
        
        alert()->success('Data Wakil Rektor Berhasil Diperbarui!');
        return redirect('/admin/wakil-rektor');
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
        alert()->success('Data Visi Berhasil Diperbarui!');
        return redirect('/admin/visi-misi');
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
        alert()->success('Data Misi Berhasil Diperbarui!');
        return redirect('/admin/visi-misi');
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
        alert()->success('Data Tugas Pokok Fungsi Berhasil Diperbarui!');
        return redirect('/admin/tugas-pokok-fungsi');
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
        alert()->success('Data Kebijakan & Program Berhasil Diperbarui!');
        return redirect('/admin/kebijakan-program');
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
            $struktur = ModelStruktur::find($id);
            if (Storage::exists($struktur->poto)) {
                Storage::delete($struktur->poto);
            }

            $file_name = $request->poto->getClientOriginalName();
                $image = $request->poto->storeAs('thumbnail', $file_name);
            $struktur->update([
                'poto' => $image,
                'deskripsi' => $request->deskripsi,
        ]);
        } else {
            $struktur->update([
                'deskripsi' => $request->deskripsi,
        ]);
        }
        
        alert()->success('Data Struktur Berhasil Diperbarui!');
        return redirect('/admin/struktur');
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
            $alur = ModelAlurKerjasama::find($id);
            if (Storage::exists($alur->poto)) {
                Storage::delete($alur->poto);
            }

            $file_name = $request->poto->getClientOriginalName();
                $image = $request->poto->storeAs('thumbnail', $file_name);
            $alur->update([
                'poto' => $image,
                'deskripsi' => $request->deskripsi,
        ]);
        } else {
            $alur->update([
                'deskripsi' => $request->deskripsi,
        ]);
        }
        
        alert()->success('Data Alur Kerjasama Berhasil Diperbarui!');
        return redirect('/admin/alur-kerjasama');
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
        
        alert()->success('Data Progres Pengajuan Kerjasama Berhasil Ditambahkan!');
        return redirect('/admin/progres-pengajuan-kerjasama');
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
        alert()->success('Data Progres Pengajuan Kerjasama Berhasil Diperbarui!');
        return redirect('/admin/progres-pengajuan-kerjasama');
    }

    public function propekerdestroy($id)
    {
        ModelPengajuanKerjasama::find($id)->delete();
        
        alert()->success('Data Progres Pengajuan Kerjasama Berhasil Dihapus!');
        return redirect('/admin/progres-pengajuan-kerjasama');
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
        
        alert()->success('Data FAQ Berhasil Ditambahkan!');
        return redirect('/admin/faq');
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
        alert()->success('Data FAQ Berhasil Diperbarui!');
        return redirect('/admin/faq');
    }

    public function faqdestroy($id)
    {
        ModelFAQ::find($id)->delete();
        
        alert()->success('Data FAQ Berhasil Dihapus!');
        return redirect('/admin/faq');
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
            'aktif' => 'required',
        ], [
            'poto.required' => 'Gambar tidak boleh kosong!',
            'judul.required' => 'Judul tidak boleh kosong!',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong!',
            'kategori_id.required' => 'Kategori Berita tidak boleh kosong!',
            'aktif.required' => 'Status tidak boleh kosong!',
        ]);

        $file_name = $request->poto->getClientOriginalName();
            $image = $request->poto->storeAs('berita', $file_name);
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
        
        alert()->success('Berita Berhasil Ditambahkan!');
        return redirect('/admin/berita');
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
            'aktif' => 'required',
        ], [
            'judul.required' => 'Judul tidak boleh kosong!',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong!',
            'kategori_id.required' => 'Kategori Berita tidak boleh kosong!',
            'aktif.required' => 'Status tidak boleh kosong!',
        ]);

        $berta = ModelBerita::find($id);
        if (Request()->hasFile('poto')) {
            if (Storage::exists($berta->poto)) {
                Storage::delete($berta->poto);
            }

            $file_name = $request->poto->getClientOriginalName();
                $image = $request->poto->storeAs('berita', $file_name);
            $berta->update([
                'poto' => $image,
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'deskripsi' => $request->deskripsi,
                'kategori_id' => $request->kategori_id,
                'aktif' => $request->aktif,
            ]);
        } else {
            $berta->update([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'deskripsi' => $request->deskripsi,
                'kategori_id' => $request->kategori_id,
                'aktif' => $request->aktif,
            ]);
        }
        
        alert()->success('Data Berita Berhasil Diperbarui!');
        return redirect('/admin/berita');
    }

    public function beritadestroy($id)
    {
        $berta = ModelBerita::find($id);
            if (Storage::exists($berta->poto)) {
                Storage::delete($berta->poto);
            }
        $berta->delete();
        
        alert()->success('Data Berita Berhasil Dihapus!');
        return redirect('/admin/berita');
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
        Request()->validate([
            'poto' => 'required|mimes:png,jpg,jpeg',
            'judul' => 'required',
            'deskripsi' => 'required',
            'aktif' => 'required',
        ], [
            'poto.required' => 'Gambar tidak boleh kosong!',
            'judul.required' => 'Judul tidak boleh kosong!',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong!',
            'aktif.required' => 'Status tidak boleh kosong!',
        ]);

        $file_name = $request->poto->getClientOriginalName();
            $image = $request->poto->storeAs('pengumuman', $file_name);
        ModelPengumuman::create([
            'poto' => $image,
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'deskripsi' => $request->deskripsi,
            'user_id' => Auth::user()->id,
            'aktif' => $request->aktif,
        ]);
        
        alert()->success('Pengumuman Berhasil Ditambahkan!');
        return redirect('/admin/pengumuman');
    }

    public function pengumumanshow($id)
    {
        //
    }

    public function pengumumanedit($id)
    {
        $pengumuman = ModelPengumuman::findorfail($id);
        return view('admin.pengumuman', compact('pengumuman'));
    }

    public function pengumumanupdate(Request $request, $id)
    {
        Request()->validate([
            'poto' => 'mimes:png,jpg,jpeg',
            'judul' => 'required',
            'deskripsi' => 'required',
            'aktif' => 'required',
        ], [
            'judul.required' => 'Judul tidak boleh kosong!',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong!',
            'aktif.required' => 'Status tidak boleh kosong!',
        ]);

        $pengumuman = ModelPengumuman::find($id);
        if (Request()->hasFile('poto')) {
            if (Storage::exists($pengumuman->poto)) {
                Storage::delete($pengumuman->poto);
            }

            $file_name = $request->poto->getClientOriginalName();
                $image = $request->poto->storeAs('pengumuman', $file_name);
            $pengumuman->update([
                'poto' => $image,
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'deskripsi' => $request->deskripsi,
                'aktif' => $request->aktif,
            ]);
        } else {
            $pengumuman->update([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'deskripsi' => $request->deskripsi,
                'aktif' => $request->aktif,
            ]);
        }
        
        alert()->success('Data Pengumuman Berhasil Diperbarui!');
        return redirect('/admin/pengumuman');
    }

    public function pengumumandestroy($id)
    {
        $pengumuman = ModelPengumuman::find($id);
            if (Storage::exists($pengumuman->poto)) {
                Storage::delete($pengumuman->poto);
            }
        $pengumuman->delete();
        
        alert()->success('Data Pengumuman Berhasil Dihapus!');
        return redirect('/admin/pengumuman');
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
            $image = $request->poto->storeAs('galeri', $file_name);
        ModelGaleri::create([
            'poto' => $image,
            'caption' => $request->caption,
        ]);
        
        alert()->success('Gambar Berhasil Ditambahkan!');
        return redirect('/admin/galeri');
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

        $galeri = ModelGaleri::find($id);
        if (Request()->hasFile('poto')) {
            if (Storage::exists($galeri->poto)) {
                Storage::delete($galeri->poto);
            }

            $file_name = $request->poto->getClientOriginalName();
                $image = $request->poto->storeAs('galeri', $file_name);
            $galeri->update([
                'poto' => $image,
                'caption' => $request->caption,
            ]);
        } else {
            $galeri->update([
                'caption' => $request->caption,
            ]);
        }
        
        alert()->success('Data Gambar Berhasil Diperbarui!');
        return redirect('/admin/galeri');
    }

    public function galeridestroy($id)
    {
        $galeri = ModelGaleri::find($id);
            if (Storage::exists($galeri->poto)) {
                Storage::delete($galeri->poto);
            }
        $galeri->delete();
        
        alert()->success('Data Gambar Berhasil Dihapus!');
        return redirect('/admin/galeri');
    }

    // Berkas Kerjasama
    public function berkaskerjasama()
    {
        $beker = ModelBerkasKerjasama::get();
        return view('admin.berkas-kerjasama', compact('beker'));
    }

    public function berkaskerjasamacreate()
    {
        //
    }
    
    public function berkaskerjasamastore(Request $request)
    {
        Request()->validate([
            'nama' => 'required',
            'berkaskerjasama' => 'required',
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'berkaskerjasama.required' => 'Berkas Kerjasama tidak boleh kosong',
        ]);

        $file_name = $request->berkaskerjasama->getClientOriginalName();
            $file = $request->berkaskerjasama->storeAs('kerjasama', $file_name);
            ModelBerkasKerjasama::create([
            'nama' => $request->nama,
            'berkaskerjasama' => $file,
        ]);
        
        alert()->success('Berkas Kerjasama Berhasil Ditambahkan!');
        return redirect('/admin/berkas-kerjasama');
    }

    public function berkaskerjasamashow($id)
    {
        //
    }

    public function berkaskerjasamaedit($id)
    {
        $beker = ModelBerkasKerjasama::findorfail($id);
        return view('admin.berkas-kerjasama', compact('beker'));
    }

    public function berkaskerjasamaupdate(Request $request, $id)
    {
        Request()->validate([
            'nama' => 'required',
        ], [
            'nama.required' => 'Nama Berkas tidak boleh kosong',
        ]);

        if (Request()->hasFile('berkaskerjasama')) {
            $kerjasama = ModelBerkasKerjasama::find($id);
            if (Storage::exists($kerjasama->berkaskerjasama)) {
                Storage::delete($kerjasama->berkaskerjasama);
            }

            $file_name = $request->berkaskerjasama->getClientOriginalName();
                $file = $request->berkaskerjasama->storeAs('kerjasama', $file_name);
            $kerjasama->update([
                'nama' => $request->nama,
                'berkaskerjasama' => $file,
            ]);
        } else {
            $kerjasama->update([
                'nama' => $request->nama,
            ]);
        }
        
        alert()->success('Data Pengajuan Kerjasama Berhasil Diperbarui!');
        return redirect('/admin/berkas-kerjasama');
    }

    public function berkaskerjasamadestroy($id)
    {
        $kerjasama = ModelBerkasKerjasama::find($id);
        if (Storage::exists($kerjasama->berkaskerjasama)) {
            Storage::delete($kerjasama->berkaskerjasama);
        }
        $kerjasama->delete();
        
        alert()->success('Data Pengajuan Kerjasama Berhasil Dihapus!');
        return redirect('/admin/berkas-kerjasama');
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
            $file = $request->berkaspengaju->storeAs('pengajuan', $file_name);
            ModelAjukanKerjasama::create([
            'nama' => $request->nama,
            'nohp' => $request->nohp,
            'instansi' => $request->instansi,
            'jabatan' => $request->jabatan,
            'berkaspengaju' => $file,
        ]);
        
        alert()->success('Pengajuan Kerjasama Berhasil Ditambahkan!');
        return redirect('/admin/ajukan-kerjasama');
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
            $ajukan = ModelAjukanKerjasama::find($id);
            if (Storage::exists($ajukan->berkaspengaju)) {
                Storage::delete($ajukan->berkaspengaju);
            }

            $file_name = $request->berkaspengaju->getClientOriginalName();
                $file = $request->berkaspengaju->storeAs('pengajuan', $file_name);
            $ajukan->update([
                'nama' => $request->nama,
                'nohp' => $request->nohp,
                'instansi' => $request->instansi,
                'jabatan' => $request->jabatan,
                'berkaspengaju' => $file,
            ]);
        } else {
            $ajukan->update([
                'nama' => $request->nama,
                'nohp' => $request->nohp,
                'instansi' => $request->instansi,
                'jabatan' => $request->jabatan,
            ]);
        }
        
        alert()->success('Data Pengajuan Kerjasama Berhasil Diperbarui!');
        return redirect('/admin/ajukan-kerjasama');
    }

    public function ajukankerjasamadestroy($id)
    {
        $ajukan = ModelAjukanKerjasama::find($id);
            if (Storage::exists($ajukan->berkaspengaju)) {
                Storage::delete($ajukan->berkaspengaju);
            }
        $ajukan->delete();
        
        alert()->success('Data Pengajuan Kerjasama Berhasil Dihapus!');
        return redirect('/admin/ajukan-kerjasama');
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
        alert()->success('Data Angket Kepuasan Layanan Berhasil Diperbarui!');
        return redirect('/admin/angket-kepuasan-layanan');
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
        
        alert()->success('Kontak Berhasil Ditambahkan!');
        return redirect('/admin/kontak');
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
        alert()->success('Data Kontak Berhasil Diperbarui!');
        return redirect('/admin/kontak');
    }

    public function kontakdestroy($id)
    {
        ModelKontak::find($id)->delete();
        
        alert()->success('Data Kontak Berhasil Dihapus!');
        return redirect('/admin/kontak');
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
        alert()->success('Data International Office Berhasil Diperbarui!');
        return redirect('/admin/international-office');
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
        $namaFile = $file();
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
            $file = $request->berkasmitra->storeAs('mitra', $file_name);
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
        
        alert()->success('Data Mitra Berhasil Ditambahkan!');
        return redirect('/admin/mitra');
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
            $mitra = ModelMitra::find($id);
            if (Storage::exists($mitra->berkasmitra)) {
                Storage::delete($mitra->berkasmitra);
            }

            $file_name = $request->berkasmitra->getClientOriginalName();
                $file = $request->berkasmitra->storeAs('mitra', $file_name);
            $mitra->update([
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
            $mitra->update([
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
        
        alert()->success('Data Mitra Berhasil Diperbarui!');
        return redirect('/admin/mitra');
    }

    public function mitradestroy($id)
    {
        $mitra = ModelMitra::find($id);
            if (Storage::exists($mitra->berkasmitra)) {
                Storage::delete($mitra->berkasmitra);
            }
        $mitra->delete();
        
        alert()->success('Data Mitra Berhasil Dihapus!');
        return redirect('/admin/mitra');
    }
}