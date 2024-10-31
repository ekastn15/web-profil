<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Dinas;
use App\Models\FormDiskusi;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $logo = Dinas::find(1)->logo;
        return view('user.home',compact('logo'));
    }

    public function berita()
    {
        $berita = Berita::all();
        return view('user.berita', compact('berita'));
    }

    public function about()
    {
        $dinas= Dinas::find(1);
        return view('user.about', compact ('dinas'));
    }

    public function team()
    {
        $karyawan = Karyawan::all();
        return view('user.team', compact('karyawan'));
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function insert(Request $request)
    {
        $request->validate
        ([
            'nama_pengirim'=>'required',
            'saran'=>'required',
            'kritik'=>'required',
        ]);

        FormDiskusi::create
        ([
            'nama_pengirim'=> $request->nama_pengirim,
            'saran'=> $request->saran,
            'kritik'=> $request->kritik,
        ]);
        return redirect()->route('home.contact')->with('message', 'Terimakasih Atas Saran dan Kritiknya');
    }
    
}
