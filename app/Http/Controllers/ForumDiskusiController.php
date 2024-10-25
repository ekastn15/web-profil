<?php

namespace App\Http\Controllers;

use App\Models\FormDiskusi;
use Illuminate\Http\Request;

class ForumDiskusiController extends Controller
{
    public function index() {

        $forumdiskusi = FormDiskusi::orderBy('created_at', 'DESC')->get();

        return view('forumdiskusi.index', compact('forumdiskusi'));
    }

    public function insert(){
        return view('forumdiskusi.insert');
    }

    public function store(Request $request) {
        
        FormDiskusi::create($request->all());

        return redirect()->route('forumdiskusi')->with('success', 'Forum added successfully');
    }

    public function cetakforumdiskusi() {
        return view('forumdiskusi.cetak-forumdiskusi');
    }
}
