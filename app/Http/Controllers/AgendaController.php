<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        return view('agenda.index',[
            'agenda'=>Agenda::orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function add()
    {
        return view('agenda.insert');

    }

    public function insert(Request $request)
    {
        $request->validate
        ([
            'name_agenda'=>'required',
            'tanggal'=>'required',
            'lokasi'=>'required',
        ]);

        Agenda::create
        ([
            'name_agenda'=>$request->name_agenda,
            'tanggal'=>$request->tanggal,
            'lokasi'=>$request->lokasi,
        ]);
        return redirect()->route('agenda')->with('message', 'Data Behasil Ditambahkan');
    }

    // Method untuk menampilkan form edit
    public function edit($id_agenda)
    {
        $agenda = Agenda::findOrFail($id_agenda);
        return view('agenda.edit', compact('agenda'));
    }

    // Method untuk memperbarui data 
    public function update(Request $request, $id_agenda) 
    {
        $request->validate([
            'name_agenda'=>'required',
            'tanggal'=>'required',
            'lokasi',
        ]);

        $agenda = Agenda::findOrFail($id_agenda);
        $agenda->update([
            'name_agenda'=>$request->name_agenda,
            'tanggal'=>$request->tanggal,
            'lokasi'=>$request->lokasi,
        ]);

        return redirect()->route('agenda')->with('message', 'Data Berhasil Diperbarui');
    }

    public function destroy(string $id_agenda)
    {
        $agenda = Agenda::findOrFail($id_agenda);
 
        $agenda->delete();
 
        return redirect()->route('agenda')->with('message', 'Data deleted successfully');
    }
}
