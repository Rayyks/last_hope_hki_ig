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
    function login(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
<<<<<<< HEAD
                'email.required' => 'Email Tidak Boleh Kosong',
                'password.required' => 'Password Tidak Boleh Kosong',
            ]);
=======
            'email.required' => 'Email Tidak Boleh Kosong',
            'password.required' => 'Password Tidak Boleh Kosong',
        ]);
>>>>>>> 5eb218676ce0a951e4cdd224d0603b053a2897f3

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($infologin)) {
            return redirect('/')->with('Success', 'Berhasil');
        } else {
            return redirect('sesi')->withErrors('Username dan Password tidak valid');
        }
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
<<<<<<< HEAD
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
=======
            'phone' => 'required',
            'password' => 'required|min:6'
        ], [
            'name.required' => 'Nama Wajib diisi',
            'email.required' => 'Email Wajib diisi',
            'email.email' => 'Silahkan masukan email yang valid',
            'email.unique' => 'Email sudah digunakan oleh user lain, silahkan gunakan email yang lain',
            'phone.required' => 'Nomor WA / HP Wajib diisi',
            'password.required' => 'Password Wajib diisi',
            'password.min' => 'Minimum password yang diizinkan adalah 6 karakter',
        ]);
>>>>>>> 5eb218676ce0a951e4cdd224d0603b053a2897f3

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ];
        User::create($data);
        // return redirect('login')->with('Success', 'Berhasil Register');
        return redirect()->route('login')->with('success', __('menu.general.success'));
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 5eb218676ce0a951e4cdd224d0603b053a2897f3
