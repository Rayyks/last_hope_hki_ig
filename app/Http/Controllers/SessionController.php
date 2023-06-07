<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class SessionController extends Controller
{
    function index()
    {
        return view('sesi/index');
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
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        Session::flash('phone', $request->phone);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required',
            'nim' => 'required',
        ], [
            'name.required' => 'Nama Wajib diisi',
            'email.required' => 'Email Wajib diisi',
            'email.email' => 'Silahkan masukan email yang valid',
            'email.unique' => 'Email sudah digunakan oleh user lain, silahkan gunakan email yang lain',
            'password.required' => 'Password Wajib diisi',
            'password.min' => 'Minimum password yang diizinkan adalah 6 karakter',
            'phone.required' => 'Nomor Wa Wajib diisi',
            'nim.required' => 'NIM Wajib diisi',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => ($request->phone),
            'nim' => ($request->nim),

        ];
        User::create($data);

        return redirect()->route('login')->with('success', __('menu.general.success'));
    }

    public function changePassword()
    {
        return view('sesi/change-password');
    }
}
