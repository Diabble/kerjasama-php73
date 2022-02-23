<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ModelBeranda;

use Illuminate\Validation\Rule;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index-edit');
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
        $beranda = ModelBeranda::findorfail($id);
        return view('admin.index-edit', compact('beranda'));
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
            'judulcarousel' => 'required',
            'deskripsicarousel' => 'required',
            'tombolcarousel' => 'required',
        ], [
            'poto.required' => 'Wajib diisi!!!',
            'judulcarousel.required' => 'Wajib diisi!!!',
            'deskripsicarousel.required' => 'Wajib diisi!!!',
            'tombolcarousel.required' => 'Wajib diisi!!!',
        ]);

        if (Request()->poto <> "") {
            $file_name = $request->poto->getClientOriginalName();
            $image = $request->poto->storeAs('thumbnail', $file_name);
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
        
        return redirect('/admin')->with('pesan', 'Data Berhasil Di Update !!!');
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
