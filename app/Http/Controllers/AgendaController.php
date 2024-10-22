<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\User;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = Agenda::with('users')->orderBy('created_at', 'ASC')->get();
        return view('agenda.index', compact('agenda'));
    }

    public function add()
    {
        $user = User::all(); 
        return view('agenda.insert', compact('user'));

    }

    public function insert(Request $request)
    {
        $request->validate
        ([
            'name_agenda'=>'required',
            'tanggal'=>'required',
            'lokasi'=>'required',
            'id_users'=>'required'
        ]);

        Agenda::create
        ([
            'name_agenda'=>$request->name_agenda,
            'tanggal'=>$request->tanggal,
            'lokasi'=>$request->lokasi,
            'id_users'=>$request->id_users,
        ]);
        return redirect()->route('agenda')->with('message', 'Data Behasil Ditambahkan');
    }

    // Method untuk menampilkan form edit
    public function edit($id_agenda)
    {
        $agenda = Agenda::findOrFail($id_agenda);
        $users = User::all();
        return view('agenda.edit', compact('agenda','users'));
    }

    // Method untuk memperbarui data 
    public function update(Request $request, $id_agenda) 
    {
        $request->validate([
            'name_agenda'=>'required',
            'tanggal'=>'required',
            'lokasi',
            'id_users'=>'required'
        ]);

        $agenda = Agenda::findOrFail($id_agenda);
        $agenda->update([
            'name_agenda'=>$request->name_agenda,
            'tanggal'=>$request->tanggal,
            'lokasi'=>$request->lokasi,
            'id_users'=>$request->id_users,
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
