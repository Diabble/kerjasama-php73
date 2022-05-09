<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;

class AuthPegawai
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->missing(['token', 'username', 'password'])) {
            alert('Anda Harus Login', 'Masukkan Nip & Pasword', 'error');
            // return redirect('/login-pegawai');
            return back();
        }

        $response = Http::withHeaders([
            'content-type' => 'application/json'
        ])->post('https://sip.uinsgd.ac.id/sip_module/ws/login', [
            'token' => '2y10bJ09e9jzVxNjKe8wis8eIgIUSQi0rrgQGmck313jL0mNJK9G',
            'username' => session('username'),
            'password' => Crypt::decryptString(session('password'))
        ]);

        if ($response->successful() && $response->status() == 200) {
            $data = $response->json();
            // dd($data);
            return $next($request);
        } else {
            alert('Anda Harus Login', 'Masukkan Nip & Pasword', 'error');
            return redirect('/');
        }
    }
}