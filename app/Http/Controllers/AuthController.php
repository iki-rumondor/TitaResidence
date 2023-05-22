<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function viewLogin()
    {
        return view('auth.login', [
            'title' => 'Login Akun'
        ]);
    }

    public function viewRegister()
    {
        return view('auth.register', [
            'title' => 'Registrasi Akun'
        ]);
    }

    public function register(Request $request)
    {
        $request['phone_num'] =   formatPhoneNumber($request['phone_num']);
        
        $validatedData = $request->validate([
            "username" => "required|min:8|max:20|unique:users",
            "password" => "required|min:8|max:255",
            "password_confirm" => "required|min:8|max:255|same:password",
            "phone_num" => "required|unique:users"
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['level'] = "Basic";

        $user = User::create($validatedData);
        $user->assignRole('customer');

        return redirect('/auth/login')->with('success', 'Berhasil mendaftar user baru');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            "username" => "required|exists:users",
            "password" => "required",
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if ($credentials['username'] == 'admin') {
                return redirect()->intended('/admin')->with('success', 'Selamat datang Admin');
            } else {
                return redirect()->intended('/')->with('success', 'Selamat datang Admin');
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/home');
    }
}
