<?php

namespace App\Http\Controllers;

use App\Models\Dinas;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::with('dinas')->orderBy('created_at', 'ASC')->get();
        return view('layanan.index', compact('layanan'));
    }

    public function add()
    {
        $dinas = Dinas::all(); 
        return view('layanan.insert', compact('dinas'));

    }

    public function insert(Request $request)
    {
        $request->validate
        ([
            'name_layanan'=>'required',
            'link_layanan'=>'required',
            'id_dinas'=>'required'
        ]);

        Layanan::create
        ([
            'name_layanan'=>$request->name_layanan,
            'link_layanan'=>$request->link_layanan,
            'id_dinas'=>$request->id_dinas,
        ]);
        return redirect()->route('layanan')->with('message', 'Data Behasil Ditambahkan');
    }

    // Method untuk menampilkan form edit
    public function edit($id_layanan)
    {
        $layanan = Layanan::findOrFail($id_layanan);
        $dinas = Dinas::all(); 
        return view('layanan.edit', compact('layanan','dinas'));
    }

    // Method untuk memperbarui data 
    public function update(Request $request, $id_layanan) 
    {
        $request->validate([
           'name_layanan'=>'required',
           'link_layanan'=>'required',
           'id_dinas'=>'required'
        ]);

        $layanan = Layanan::findOrFail($id_layanan);
        $layanan->update([
           'name_layanan'=>$request->name_layanan,
           'link_layanan'=>$request->link_layanan,
           'id_dinas'=>$request->id_dinas,
        ]);

        return redirect()->route('layanan')->with('message', 'Data Berhasil Diperbarui');
    }

    public function destroy(string $id_layanan)
    {
        $layanan = Layanan::findOrFail($id_layanan);
 
        $layanan->delete();
 
        return redirect()->route('layanan')->with('message', 'Data deleted successfully');
    }
}
