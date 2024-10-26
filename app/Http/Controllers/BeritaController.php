<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    public function index() {

        $berita = Berita::with('users')->orderBy('created_at', 'ASC')->get();
        return view('berita.index', compact('berita'));
    }

    public function add() 
    {
        $users = User::all(); 
        return view('berita.insert', compact('users'));
    }

    public function insert(Request $request) {
        $request->validate
        ([
            'title_berita'=>'required',
            'tanggal'=>'required',
            'dec_berita'=>'required',
            'foto'  => 'mimes:jpg,jpeg,png,svg|max:5120',
            'id_users'=>'required'
        ]);

        $berita =[
            'title_berita'=>$request->title_berita,
            'tanggal'=>$request->tanggal,
            'dec_berita'=>$request->dec_berita,
            'id_users'=>$request->id_users,
        ];
        if ($request->hasFile('foto')){
            $foto_file  = $request->file('foto');
            $foto_nama  = $foto_file->hashName();
            $foto_file->move(public_path('images'), $foto_nama);
            $berita['foto'] = $foto_nama;
        }
        Berita::create($berita);

        return redirect('berita')->with('message', 'Tambah Data berhasil..');
    }

    public function edit(string $id_berita) {

        $berita = Berita::findOrFail($id_berita);
        $user = User::all(); 
        return view('berita.edit', compact('berita', 'user'));
    }

    public function update(Request $request, $id_berita) {

        $request->validate(
            [
            'title_berita'=>'required',
            'tanggal'=>'required',
            'dec_berita'=>'required',
            'foto'  => 'mimes:jpg,jpeg,png,svg|max:5120',
            'id_users'=>'required'
        ]);
        $dataEdit =[
            'title_berita'=>$request->title_berita,
            'tanggal'=>$request->tanggal,
            'dec_berita'=>$request->dec_berita,
            'id_users'=>$request->id_users,
        ];
        if ($request->hasFile('foto')){
            $foto_file  = $request->file('foto');
            $foto_nama  = $foto_file->hashName();
            $foto_file->move(public_path('images'), $foto_nama);

            $berita['foto'] = $foto_nama;
        }
        Berita::where('id_berita', $id_berita)->update($dataEdit);
        
        return redirect('berita')->with('message', 'Edit Data berhasil..');
    }

    public function destroy(string $id_berita) {

        $berita = Berita::where('id_berita', $id_berita)->first();
        File::delete(public_path('images').'/'.$berita->foto);
        Berita::where('id_berita', $id_berita)->delete();

        return redirect()->route('berita')->with('message', 'Data delected succesfully');
    }
}
