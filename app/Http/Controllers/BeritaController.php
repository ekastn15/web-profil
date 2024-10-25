<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index() {

        $berita = Berita::orderBy('created_at', 'DESC')->get();
        return view('berita.index', compact('berita'));
    }

    public function add() {

        return view('berita.insert');
    }

    public function insert(Request $request) {
        Berita::create($request->all());

        return redirect()->route('berita')->with('success', 'Data Berhasi Ditambah...'); 
    }

    public function edit(string $id_berita) {

        $berita = Berita::findOrFail($id_berita);
        
        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, $id_berita) {

        $berita = Berita::findOrFail($id_berita);

        $berita->update($request->all());

        return redirect()->route('berita')->with('message', 'Edit Berita berhasil...');
    }

    public function destroy(string $id_berita) {

        $berita = Berita::findOrFail($id_berita);

        $berita->delete();

        return redirect()->route('berita')->with('message', 'Data delected succesfully');
    }
}
