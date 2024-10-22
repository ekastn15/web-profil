<?php

namespace App\Http\Controllers;

use App\Models\Dinas;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::with('dinas')->orderBy('created_at', 'ASC')->get(); 
        return view('karyawan.index', compact('karyawan'));
    }
    public function add()
    {
        $dinas = Dinas::all(); 
        return view('karyawan.insert', compact('dinas'));

    }

    public function insert(Request $request)
    {
        $request->validate
        ([
            'name'=>'required',
            'nip'=>'required|numeric|digits:16',
            'jabatan'=>'required',
            'bidang'=>'required',
            'nomer_karyawan'=>'required|numeric|digits:13',
            'foto'  => 'mimes:jpg,jpeg,png,svg|max:2048',
            'id_dinas'=>'required|exists:dinas,id_dinas' 
           
        ]);

        $karyawan = [
            'name'=> $request->name,
            'nip'=>$request->nip,
            'jabatan'=>$request->jabatan,
            'bidang'=>$request->bidang,
            'nomer_karyawan'=>$request->nomer_karyawan,
            'id_dinas'=>$request->id_dinas
        ];
        if ($request->hasFile('foto')){
            $foto_file  = $request->file('foto');
            $foto_nama  = $foto_file->hashName();
            $foto_file->move(public_path('images'), $foto_nama);

            $karyawan['foto'] = $foto_nama;
        }
        Karyawan::create($karyawan);

        return redirect('karyawan')->with('message', 'Tambah Data berhasil..');
    }

    public function edit($id_karyawan)
    {
        $karyawan = Karyawan::findOrFail($id_karyawan);
        $dinas = Dinas::all(); 
        return view('karyawan.edit', compact('karyawan','dinas'));

    }
    public function update(Request $request,  $id_karyawan)
    {
        $request->validate(
            [
                'name'=>'required',
                'nip'=>'required|numeric|digits:16',
                'jabatan'=>'required',
                'bidang'=>'required',
                'nomer_karyawan'=>'required|numeric|digits:13',
                'id_dinas'=>'required'
            ]);

        $dataEdit = [
                'name'=> $request->name,
                'nip'=>$request->nip,
                'jabatan'=>$request->jabatan,
                'bidang'=>$request->bidang,
                'nomer_karyawan'=>$request->nomer_karyawan,
                'id_dinas'=>$request->id_dinas
        ];
        
        // cek gambar yg diupload
        if ($request->hasFile('foto')){
            $request->validate([
                'foto'  => 'mimes:jpg,jpeg,png,svg|max:2048'
            ]);
            $foto_file  = $request->file('foto');
            $foto_nama  = $foto_file->hashName();
            $foto_file->move(public_path('images'), $foto_nama);
            
            $karyawan = Karyawan::where('id_karyawan', $id_karyawan)->first();
            File::delete(public_path('images').'/'. $karyawan->foto);

            $dataEdit['foto'] = $foto_nama;
        }
        
        Karyawan::where('id_karyawan', $id_karyawan)->update($dataEdit);
        
        return redirect('karyawan')->with('message', 'Edit Data berhasil..');
    }

    public function destroy(string $id_karyawan)
    {
        $karyawan = Karyawan::where('id_karyawan', $id_karyawan)->first();
        File::delete(public_path('images').'/'.$karyawan->logo);
        Karyawan::where('id_karyawan', $id_karyawan)->delete();
 
        return redirect()->route('karyawan')->with('message', 'Data deleted successfully');
    }
}
