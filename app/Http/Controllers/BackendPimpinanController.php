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

class BackendPimpinanController extends Controller
{
    // Profile
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        // $user = User::first();
        $user = Auth::user();
        $rektor = ModelWakilRektor::first();
        // dd($mitrachart);
        return view('pimpinan.profile', compact('user', 'rektor'));
    }

    public function profileedit($id)
    {
        $user = User::findorfail($id);
        return view('pimpinan.profile', compact('user'));
    }

    public function profileupdate(Request $request, $id)
    {
        Request()->validate([
            'poto' => 'required|image|mimes:png,jpg,jpeg,gif|max:500',
            'name' => 'required',
            'email' => 'required',
        ]);

        // $data = [
        //     'name' => $request->name,
        //     'email' => $request->email,
        // ];

        // User::find($id)->update($data);
        $profile = User::find($id);
        if (Request()->hasFile('poto')) {
            if (Storage::exists($profile->poto)) {
                Storage::delete($profile->poto);
            }

            // $file_name = $request->poto->getClientOriginalName();
            //     $image = $request->poto->storeAs('avatar', $file_name);
            $image = $request->poto->store('avatar');
            $profile->update([
                'poto' => $image,
                'name' => $request->name,
                'email' => $request->email,
            ]);
        } else {
            $profile->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }

        alert()->success('Data Profile Berhasil Diperbarui!');
        return redirect('/pimpinan/profile');
    }

    public function avatarupdate(Request $request, $id)
    {
        $avatar = User::find($id);
            if (Storage::exists($avatar->poto)) {
                Storage::delete($avatar->poto);
            }
        $avatar->update([
            'poto' => "",
        ]);
        
        alert()->success('Avatar Berhasil Dihapus!');
        return redirect('/pimpinan/profile');
    }

    // Ubah Password
    public function password()
    {
        $user = Auth::user();
        return view('pimpinan.ubah-password', compact('user'));
    }

    public function passwordedit($id)
    {
        $user = User::findorfail($id);
        return view('pimpinan.ubah-password', compact('user'));
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

    // Dashboard
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $jenisnaskah = ModelMitra::get();
        $mou = ModelMitra::where('jenisnaskah', 1)->count();
        $moa = ModelMitra::where('jenisnaskah', 2)->count();
        $fakultas = User::where('level', 'staff')->count();
        $pengaju = User::where('level', 'user')->count();
        // dd($mitrachart);
        return view('pimpinan.dashboard', compact('jenisnaskah', 'mou', 'moa', 'fakultas', 'pengaju'));
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
        return view('pimpinan.mitra', compact('mitra', 'kakoin', 'kakein', 'kajenas'));
    }

    public function mitraprint()
    {
        $kakoin = ModelKategoriKodeInstansi::get();
        $kakein = ModelKategoriKetInstansi::get();
        $kajenas = ModelKategoriJenisNaskah::get();
        $mitra = ModelMitra::with('kakoin', 'kakein', 'kajenas')->get();
        return view('pimpinan.mitra-print', compact('mitra', 'kakoin', 'kakein', 'kajenas'));
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
}