<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Crypt;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('auths.loginpegawai');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|numeric',
            'password' => 'required'
        ]);

        $response = Http::asForm()->post('https://sip.uinsgd.ac.id/sip_module/ws/login', [
            'token' => '2y10bJ09e9jzVxNjKe8wis8eIgIUSQi0rrgQGmck313jL0mNJK9G',
            'username' => $request->username,
            'password' => $request->password
        ]);
        $data = $response->json();
        if ($response->successful() && $response->status() == 200 && $data['code'] == 1) {
            // dd($data);
            session([
                'token' => '2y10bJ09e9jzVxNjKe8wis8eIgIUSQi0rrgQGmck313jL0mNJK9G',
                'username' => $request->username,
                'password' => Crypt::encryptString($request->password),
                'user' => $data
            ]);
            alert('Sukses Login', 'Berhasil', 'success');
            return redirect('/pegawai/dashboard');
        } else {
            alert('Gagal Login', 'Nim atau Password Salah', 'warning');
            return back();
        }
    }
    public function logout()
    {
        session()->forget(['token', 'username', 'password', 'user']);
        return redirect()->route('loginpegawai');
    }
}
