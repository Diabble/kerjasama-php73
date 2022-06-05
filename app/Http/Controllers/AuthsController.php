<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginindex()
    {
        return view('auths.login');
    }

    // public function registerindex()
    // {
    //     return view('auths.register');
    // }

    // public function forgotindex()
    // {
    //     return view('auths.forgot');
    // }

    public function authenticate(Request $request)
    {
        // dd($request->all());
        // $credentials = $request->validate([
        //     'email' => 'required|email:dns',
        //     'password' => 'required',
        // ]);
        // if(Auth::attempt($credentials))
        // {
        //     $auth = Auth::user();
        //     if($auth->level == 'admin'){
        //         return redirect('/admin/dashboard');
        //     }
        //     elseif($auth->level == 'pimpinan'){
        //         return redirect('/dashboard');
        //     }
        //     elseif($auth->level == 'staff'){
        //         return redirect('/admin/dashboard');
        //     }
        //     elseif($auth->level == 'user'){
        //         return redirect('/dashboard');
        //     }
        // }
        // return redirect('/login');

        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $auth = Auth::user();
            if($auth->level == 'admin') {
                alert()->success('Login Berhasil','Selamat Menjelajah..');
                return redirect('/admin/dashboard');
            }
            elseif($auth->level == 'pimpinan'){
                alert()->success('Login Berhasil','Selamat Menjelajah..');
                return redirect('/pimpinan/dashboard');
            }
            elseif($auth->level == 'staff'){
                alert()->success('Login Berhasil','Selamat Menjelajah..');
                return redirect('/staff/dashboard');
            }
            elseif($auth->level == 'user'){
                alert()->success('Login Berhasil','Selamat Menjelajah..');
                return redirect('/user/dashboard');
            }
        }

        alert()->error('Login Gagal','Coba Lagi..');
        return back();
    }
    public function logout()
    {
        // Auth::logout();
        // return redirect('/login');

        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
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
