<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Toastr;

class SessionController extends Controller
{
    function index()
    {
        return view('/home');
    }
    function logout()
    {
        Auth::logout();
        return redirect('/index')->with('Success', 'Berhasil Logout');
    }

    function register()
    {
        return view('sesi/register');
    }
    function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required'
        ], [
            'name.required' => 'Nama Wajib diisi',
            'email.required' => 'Email Wajib diisi',
            'email.email' => 'Silahkan masukan email yang valid',
            'email.unique' => 'Email sudah digunakan oleh user lain, silahkan gunakan email yang lain',
            'phone.required' => 'Nomor Wa / HP Wajib diisi',
            'password.required' => 'Password Wajib diisi',
            'password.min' => 'Minimum password yang diizinkan adalah 6 karakter',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ];
        User::create($data);

        Toastr::success('Registrasi Berhasil! Silahkan Melakukan log in.');

        return redirect('login');
    }
}
