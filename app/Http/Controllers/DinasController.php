<?php

namespace App\Http\Controllers;

use App\Models\Dinas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DinasController extends Controller
{
    public function index()
    {
        return view('dinas.index',[
            'dinas'=>Dinas::orderBy('created_at', 'ASC')->get()
        ]);
    }

    public function add()
    {
        return view('dinas.insert');

    }

    public function insert(Request $request)
    {
    
        $request->validate
        ([
            'name_dinas'=>'required',
            'alamat'=>'required',
            'tugas_fungsi'=>'required',
            'visi_misi'=>'required',
            'logo'  => 'mimes:jpg,jpeg,png,svg|max:2048',
           
        ]);

        $dinas = [
            'name_dinas' => $request->name_dinas,
            'alamat' => $request->alamat,
            'tugas_fungsi' => $request->tugas_fungsi,
            'visi_misi' => $request->visi_misi,
        ];
        if ($request->hasFile('logo')){
            $foto_file  = $request->file('logo');
            $foto_nama  = $foto_file->hashName();
            $foto_file->move(public_path('images'), $foto_nama);

            $dinas['logo'] = $foto_nama;
        }
        Dinas::create($dinas);

        return redirect('dinas')->with('message', 'Tambah data warga berhasil..');

            
        }

    // Method untuk menampilkan form edit
    public function edit($id_dinas)
    {
        $dinas= Dinas::findOrFail($id_dinas);
        return view('dinas.edit', compact('dinas'));
    }

    // // Method untuk memperbarui data 
    
    public function update(Request $request,  $id_dinas)
    {
        $request->validate(
            [
                'name_dinas' => 'required',
                'alamat' => 'required',
                'tugas_fungsi' => 'required',
                'visi_misi' => 'required',
            ]);

        $dataEdit = [
            'name_dinas'  => $request->name_dinas,
            'alamat'  => $request->alamat,
            'tugas_fungsi'  => $request->tugas_fungsi,
            'visi_misi'  => $request->visi_misi,
        ];
        
        // cek gambar yg diupload
        if ($request->hasFile('logo')){
            $request->validate([
                'logo'  => 'mimes:jpg,jpeg,png,svg|max:2048'
            ]);
            $foto_file  = $request->file('logo');
            $foto_nama  = $foto_file->hashName();
            $foto_file->move(public_path('images'), $foto_nama);
            
            $dinas = Dinas::where('id_dinas', $id_dinas)->first();
            File::delete(public_path('images').'/'. $dinas->logo);

            $dataEdit['logo'] = $foto_nama;
        }
        
        Dinas::where('id_dinas', $id_dinas)->update($dataEdit);
        
        return redirect('dinas')->with('message', 'Edit data Dinas berhasil..');
    }

    public function destroy(string $id_dinas)
    {
        $dinas = Dinas::where('id_dinas', $id_dinas)->first();
        File::delete(public_path('images').'/'.$dinas->logo);
        Dinas::where('id_dinas', $id_dinas)->delete();
 
        return redirect()->route('dinas')->with('message', 'Data deleted successfully');
    }
}
