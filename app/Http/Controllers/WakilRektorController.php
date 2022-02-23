<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ModelSambutan;

use Illuminate\Validation\Rule;

class WakilRektorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sambutan = ModelSambutan::get();
        return view('admin.sambutan-wakil-rektor-edit', compact('sambutan'));
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
        $sambutan = ModelSambutan::findorfail($id);
        return view('admin.sambutan-wakil-rektor-edit', compact('sambutan'));
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
        Request()->validate([
            'poto' => 'mimes:png,jpg,jpeg',
            'nama' => 'required',
            'jabatan' => 'required',
            'nip' => 'required',
        ], [
            'poto.required' => 'Wajib diisi!!!',
            'nama.required' => 'Wajib diisi!!!',
            'jabatan.required' => 'Wajib diisi!!!',
            'nip.required' => 'Wajib diisi!!!',
        ]);
        if (Request()->poto <> "") {
            $file_name = $request->poto->getClientOriginalName();
            $image = $request->poto->storeAs('thumbnail', $file_name);
            ModelSambutan::where('id',$id)->update([
                'poto' => $image,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'nip' => $request->nip,
        ]);
        } else {
            ModelSambutan::where('id',$id)->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'nip' => $request->nip,
        ]);
        }

        return redirect('/wakilrektoredit/1')->with('pesan', 'Data Berhasil Di Update !!!');
   
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
