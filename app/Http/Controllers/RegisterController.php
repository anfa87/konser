<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('dashboard.register');
    }


    public function store(Request $request)
    {
        $dataValid = $request->validate([
            'name' => 'required|min:3|max:100',
            'username' => 'required|min:3|max:100|unique:users|alpha_dash',
            'password' => 'required|min:8|max:100|confirmed',
            'password_confirmation' => 'required|min:8|max:100'
        ],
        [
            
            'name.required' => 'Nama Lengkap harus diisi!',
            'name.min' => 'Nama Lengkap minimal 3 karakter!',
            'name.max' => 'Nama Lengkap maksimal 100 karakter!',
            'username.required' => 'Username harus diisi!',
            'username.min' => 'Username minimal 3 karakter!',
            'username.max' => 'Username maksimal 100 karakter!',
            'username.unique' => 'Username sudah digunakan!',
            'username.alpha_dash' => 'Username tidak boleh mengandung spasi!',
            'password.required' => 'Password harus diisi!',
            'password.min' => 'Password minimal 8 karakter!',
            'password.max' => 'Password maksimal 100 karakter!',
            'password.confirmed' => 'Konfirmasi password tidak sesuai!',
            'password_confirmation.required' => 'Konfirmasi password harus diisi!',
            'password_confirmation.min' => 'Konfirmasi password minimal 8 karakter!',
            'password_confirmation.max' => 'Konfirmasi password maksimal 100 karakter!',

        ]);

       

        $dataValid['password'] = Hash::make($dataValid['password']);

        $countUsers = User::all()->count();
        if ($countUsers == 0 ) {
            $dataValid['status'] = 'superadmin';
        }

        User::create($dataValid);
        
        return redirect('/admin/login')->with('sukses', 'Akun berhasil didaftarkan!!');

    }
}

