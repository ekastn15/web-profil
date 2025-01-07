<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth/login');
    }
  
    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();
  
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
  
        $request->session()->regenerate();
  
        return redirect()->route('dashboard');
    }
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
  
        $request->session()->invalidate();
  
        return redirect('login');
    }

    
    public function index()
    {
        $akun = User::with('karyawan')->orderBy('created_at', 'ASC')->get();
        return view('akun.index', compact('akun'));
    }
    
    public function add()
    {
        $karyawan = Karyawan::all(); 
        return view('akun.insert', compact('karyawan'));

    }

    public function insert(Request $request)
    {
        $request->validate
        ([
            'email'=>'required',
            'password'=>'required',
            'id_karyawan'=>'required'
        ]);
  
        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'operator',
            'id_karyawan' => $request->id_karyawan,
        ]);
  
        return redirect('akun')->with('message', 'Tambah Data berhasil..');
    }
    
    public function edit($id_akun)
    {
        $akun = User::findOrFail($id_akun);
        return view('akun.edit', compact('akun'));
    }

    public function update(Request $request, $id_akun)
    {
        $request->validate
        ([
            'password' => 'required|min:8|confirmed',
        ]);

        $akun = User::findOrFail($id_akun);

        $akun->update
        ([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('akun')->with('message', 'Data Behasil Diubah');
    }
}