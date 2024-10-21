<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        return view('faq.index',[
            'faq'=>Faq::orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function add()
    {
        return view('faq.insert');

    }

    public function insert(Request $request)
    {
        $request->validate
        ([
            'question'=>'required',
            'answer'=>'required',
        ]);

        Faq::create
        ([
            'question'=> $request->question,
            'answer'=> $request->answer,
        ]);
        return redirect()->route('faq')->with('message', 'Data Behasil Ditambahkan');
    }

    // Method untuk menampilkan form edit
    public function edit($id_faq)
    {
        $faq = Faq::findOrFail($id_faq);
        return view('faq.edit', compact('faq'));
    }

    // Method untuk memperbarui data FAQ
    public function update(Request $request, $id_faq) 
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq = Faq::findOrFail($id_faq);
        $faq->update([
        'question' => $request->question,
        'answer' => $request->answer,
        ]);

        return redirect()->route('faq')->with('message', 'Data Berhasil Diperbarui');
    }

    public function destroy(string $id_faq)
    {
        $faq = Faq::findOrFail($id_faq);
 
        $faq->delete();
 
        return redirect()->route('faq')->with('message', 'Faq deleted successfully');
    }
}
