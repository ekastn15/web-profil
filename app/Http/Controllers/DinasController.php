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
            'opd_id'=>'required',
            'KODE_SATKER'=>'required',
            'NAMA_SATKER'=>'required',
            'alamat'=>'required',
            'tugas_fungsi'=>'required',
            'visi_misi'=>'required',
            'logo'  => 'mimes:jpg,jpeg,png,svg|max:2048',
            'gambar_lokasi'  => 'mimes:jpg,jpeg,png,svg|max:2048',
           
        ]);

        $dinas = [
            'opd_id'=> $request->opd_id,
            'KODE_SATKER'=> $request->KODE_SATKER,
            'NAMA_SATKER'=> $request->NAMA_SATKER,
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
        if ($request->hasFile('gambar_lokasi')) {
            $gambar_lokasi_file = $request->file('gambar_lokasi');
            $gambar_lokasi_nama = $gambar_lokasi_file->hashName();
            $gambar_lokasi_file->move(public_path('images'), $gambar_lokasi_nama);

            $dinas['gambar_lokasi'] = $gambar_lokasi_nama;
        }
        Dinas::create($dinas);

        return redirect('dinas')->with('message', 'Tambah Data berhasil..');    
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
                'opd_id'=>'required',
                'KODE_SATKER'=>'required',
                'NAMA_SATKER'=>'required',
                'alamat' => 'required',
                'tugas_fungsi' => 'required',
                'visi_misi' => 'required',
            ]);

        $dataEdit = [
            'opd_id'=> $request->opd_id,
            'KODE_SATKER'=> $request->KODE_SATKER,
            'NAMA_SATKER'=> $request->NAMA_SATKER,
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

        if ($request->hasFile('gambar_lokasi')) {
            $gambar_lokasi_file = $request->file('gambar_lokasi');
            $gambar_lokasi_nama = $gambar_lokasi_file->hashName();
            $gambar_lokasi_file->move(public_path('images'), $gambar_lokasi_nama);

            $dinas = Dinas::where('id_dinas', $id_dinas)->first();
            File::delete(public_path('images') . '/' . $dinas->gambar_lokasi);

            $dataEdit['gambar_lokasi'] = $gambar_lokasi_nama;
        }
        
        
        Dinas::where('id_dinas', $id_dinas)->update($dataEdit);
        
        return redirect('dinas')->with('message', 'Edit Data berhasil..');
    }

    public function destroy(string $id_dinas)
    {
        $dinas = Dinas::where('id_dinas', $id_dinas)->first();
        File::delete(public_path('images').'/'.$dinas->logo);
        File::delete(public_path('images').'/'.$dinas->gambar_lokasi);
        Dinas::where('id_dinas', $id_dinas)->delete();
 
        return redirect()->route('dinas')->with('message', 'Data deleted successfully');
    }
}
