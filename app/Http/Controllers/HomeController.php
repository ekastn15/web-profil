<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Dinas;
use App\Models\Faq;
use App\Models\FormDiskusi;
use App\Models\Karyawan;
use App\Models\Layanan;
use App\Models\Unduh;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $dinas = Dinas::Find(1);
        $posts = Berita::latest()->simplePaginate(6); 
        return view('user.home', compact('dinas', 'posts'));
        
    }
    public function show($id_berita)
    {
        // Ambil data post berdasarkan ID
        $berita = Berita::findOrFail($id_berita);  // Menggunakan findOrFail untuk memastikan data ditemukan

        // Return view dengan data post
        return view('user.berita', compact('berita'));
    }

    public function layanan()
    {
        $layanan = Layanan::latest()->simplePaginate(10);
        $faqs =Faq::all();
        return view('user.layanan', compact('layanan', 'faqs'));
    }

    public function agenda()
    {
        $agenda = Agenda::latest()->simplePaginate(10);
        return view('user.agenda', compact('agenda'));
    }
    public function unduh()
    {
        $unduh = Unduh::latest()->simplePaginate(10);
        return view('user.unduhan', compact('unduh'));
    }

    public function about()
    {
        $dinas= Dinas::find(1);
        return view('user.about', compact ('dinas'));
    }

    public function pejabat()
    {
        $pejabat = Karyawan::whereIn('jabatan', ['Kepala Dinas', 'sekretaris', 'kepala bidang'])->get();
        return view('user.pejabat', compact('pejabat'));
    }
    
    public function lainnya()
    {
        $pegawai = Karyawan::whereNotIn('jabatan', ['Kepala Dinas', 'sekretaris', 'kepala bidang'])->simplePaginate(6);
        return view('user.lainnya', compact('pegawai'));
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
