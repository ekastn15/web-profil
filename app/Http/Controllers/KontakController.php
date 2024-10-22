<?php

namespace App\Http\Controllers;

use App\Models\Dinas;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::with('dinas')->orderBy('created_at', 'ASC')->get();
        return view('kontak.index', compact('kontak'));
    }

    public function add()
    {
        $dinas = Dinas::all(); 
        return view('kontak.insert', compact('dinas'));

    }

    public function insert(Request $request)
    {
        $request->validate
        ([
            'nomer_wa'=>'required',
            'email_dinas'=>'required',
            'instagram_dinas'=>'required',
            'id_dinas'=>'required'
        ]);

        Kontak::create
        ([
            'nomer_wa'=>$request->nomer_wa,
            'email_dinas'=>$request->email_dinas,
            'instagram_dinas'=>$request->instagram_dinas,
            'id_dinas'=>$request->id_dinas
        ]);
        return redirect()->route('kontak')->with('message', 'Data Behasil Ditambahkan');
    }

    // Method untuk menampilkan form edit
    public function edit($id_kontak)
    {
        $kontak = Kontak::findOrFail($id_kontak);
        $dinas = Dinas::all(); 
        return view('kontak.edit', compact('kontak','dinas'));
    }

    // Method untuk memperbarui data 
    public function update(Request $request, $id_kontak) 
    {
        $request->validate([
            'nomer_wa'=>'required',
            'email_dinas'=>'required',
            'instagram_dinas'=>'required',
            'id_dinas'=>'required'
        ]);

        $kontak = Kontak::findOrFail($id_kontak);
        $kontak->update([
           'nomer_wa'=>$request->nomer_wa,
           'email_dinas'=>$request->email_dinas,
           'instagram_dinas'=>$request->instagram_dinas,
           'id_dinas'=>$request->id_dinas
        ]);

        return redirect()->route('kontak')->with('message', 'Data Berhasil Diperbarui');
    }

    public function destroy(string $id_kontak)
    {
        $kontak = Kontak::findOrFail($id_kontak);
 
        $kontak->delete();
 
        return redirect()->route('kontak')->with('message', 'Data deleted successfully');
    }
}
