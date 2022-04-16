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

class BackendStaffController extends Controller
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
        // dd($mitrachart);
        return view('staff.profile', compact('user'));
    }

    public function profileedit($id)
    {
        $user = User::findorfail($id);
        return view('staff.profile', compact('user'));
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
        return redirect('/staff/profile');
    }

    public function password()
    {
        $user = Auth::user();
        return view('staff.ubah-password', compact('user'));
    }

    public function passwordedit($id)
    {
        $user = User::findorfail($id);
        return view('staff.ubah-password', compact('user'));
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
        return view('staff.dashboard', compact('jenisnaskah', 'mou', 'moa', 'fakultas', 'pengaju'));
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
        return view('staff.mitra', compact('mitra', 'kakoin', 'kakein', 'kajenas'));
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
        return redirect('/staff/mitra')->with('pesan', 'Data Berhasil Di Import !!!');
    }

    public function mitraprint()
    {
        $kakoin = ModelKategoriKodeInstansi::get();
        $kakein = ModelKategoriKetInstansi::get();
        $kajenas = ModelKategoriJenisNaskah::get();
        $mitra = ModelMitra::with('kakoin', 'kakein', 'kajenas')->get();
        return view('staff.mitra-print', compact('mitra', 'kakoin', 'kakein', 'kajenas'));
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
        
        return redirect('/staff/mitra')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
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
        return view('staff.mitra', compact('mitra', 'kakoin', 'kakein', 'kajenas'));
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
        
        return redirect('/staff/mitra')->with('pesan', 'Data Berhasil Di Perbarui !!!');
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

        return redirect('/staff/mitra')->with('pesan', 'Data Berhasil Di Hapus !!!');
    }
}