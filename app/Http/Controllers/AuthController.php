<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|min:8|max:35|email|exists:users,email',
        ], [
            'email.required' => 'Email perlu diisi',
            'email.email' => 'Email tidak valid',
            'email.min' => 'Email minimal 8 karakter',
            'email.max' => 'Email maksimal 35 karakter',
            'email.exists' => 'Email tidak ditemukan'
        ]);

        $user = User::where('email', $request->email)->first();
        if (Hash::check($request->password, $user->password)) {
            Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            if (auth()->user()->role_id === 1) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        } else {
            return redirect()->back()->withErrors(['password' => 'Password yang Anda masukkan salah']);
        }
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|min:8|max:35|unique:users,email',
            'nama' => 'required|min:5|max:30',
            'password' => 'required|confirmed|min:6'
        ], [
            'email.required' => 'Email perlu diisi',
            'email.min' => 'Email minimal 8 angka',
            'email.max' => 'Email maksimal 35 angka',
            'email.unique' => 'Email sudah digunakan',
            'nama.required' => 'Nama perlu diisi',
            'nama.min' => 'Nama minimal 5 karakter',
            'nama.max' => 'Nama maksimal 30 karakter',
            'password.required' => 'Kata sandi perlu diisi',
            'password.confirmed' => 'Kata sandi tidak sama',
            'password.min' => 'Kata sandi minimal 6 karakter'
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->name = $request->nama;
        $user->password = Hash::make($request->password);
        $user->save();
        $request->session()->flash('message', 'Pendaftaran akun Anda Berhasil');
        return redirect()->route('register');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
