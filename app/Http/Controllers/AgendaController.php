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
        return view('agenda.index', compact('karyawan'));
    }

    public function add()
    {
        $dinas = User::all(); 
        return view('agenda.insert', compact('users'));

    }

    public function insert(Request $request)
    {
        $request->validate
        ([
            'name_agenda'=>'required',
            'tanggal'=>'required',
            'lokasi',
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
        return view('agenda.edit', compact('agenda','users'));
    }

    // Method untuk memperbarui data FAQ
    public function update(Request $request, $id_faq) 
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq = Agenda::findOrFail($id_faq);
        $faq->update([
        'question' => $request->question,
        'answer' => $request->answer,
        ]);

        return redirect()->route('faq')->with('message', 'Data Berhasil Diperbarui');
    }

    public function destroy(string $id_faq)
    {
        $faq = Agenda::findOrFail($id_faq);
 
        $faq->delete();
 
        return redirect()->route('faq')->with('message', 'Faq deleted successfully');
    }
}
