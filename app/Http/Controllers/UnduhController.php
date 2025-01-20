<?php

namespace App\Http\Controllers;

use App\Models\Unduh;
use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UnduhController extends Controller
{
    public function index() {

        $dokumen = Unduh::with('users')->orderBy('created_at', 'ASC')->get();
        return view('unduh.index', compact('dokumen'));
    }

    public function add() 
    {
        $users = User::all(); 
        return view('unduh.insert', compact('users'));
    }

    public function insert(Request $request) {
        $request->validate(
            [
            'name_doc'=>'required',
            'deskripsi'=>'required',
            'tanggal_terbit'=>'required',
            'dokumen'=>'mimes:pdf, doc, docx, xlsx|max:10240',
            'id_users'=>'required'
        ]);

        $dokumen =[
            'name_doc'=>$request->name_doc,
            'deskripsi'=>$request->deskripsi,
            'tanggal_terbit'=>$request->tanggal_terbit,
            'id_users'=>$request->id_users,
        ];
        if ($request->hasFile('dokumen')){
            $dokumen_file  = $request->file('dokumen');
            $dokumen_nama  = $dokumen_file->hashName();
            $dokumen_file->move(public_path('dokumen'), $dokumen_nama);
            $dokumen['dokumen'] = $dokumen_nama;
        }
        Unduh::create($dokumen);

        return redirect('unduh')->with('message', 'Tambah Data berhasil..');
    }

    public function edit(string $id_dokumen) {

        $dokumen = Unduh::findOrFail($id_dokumen);
        $user = User::all(); 
        return view('unduh.edit', compact('dokumen', 'user'));
    }

    public function update(Request $request, $id_dokumen) {

        $request->validate(
        [
            'name_doc'=>'required',
            'deskripsi'=>'required',
            'tanggal_terbit'=>'required',
            'id_users'=>'required'
        ]);
        $dataEdit =[
            'name_doc'=>$request->name_doc,
            'deskripsi'=>$request->deskripsi,
            'tanggal_terbit'=>$request->tanggal_terbit,
            'id_users'=>$request->id_users,
        ];
        if ($request->hasFile('dokumen')){
            $dokumen_file  = $request->file('dokumen');
            $dokumen_nama  = $dokumen_file->hashName();
            $dokumen_file->move(public_path('dokumen'), $dokumen_nama);
            $unduh['dokumen'] = $dokumen_nama;
        }
        Unduh::where('id_dokumen', $id_dokumen)->update($dataEdit);
        
        return redirect('unduh')->with('message', 'Edit Data berhasil..');
    }

    public function destroy(string $id_dokumen) {

        $dokumen = Unduh::where('id_dokumen', $id_dokumen)->first();
        File::delete(public_path('dokumen').'/'.$dokumen->dokumen);
        Unduh::where('id_dokumen', $id_dokumen)->delete();

        return redirect()->route('unduh')->with('message', 'Data delected succesfully');
    }
}
