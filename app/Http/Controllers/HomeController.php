<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Dinas;
use App\Models\Faq;
use App\Models\FormDiskusi;
use App\Models\Galeri;
use App\Models\Karyawan;
use App\Models\Layanan;
use App\Models\Video;
use App\Models\Agenda;
use App\Models\Unduh;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $dinas= Dinas::find(1);
        $logo = Dinas::find(1)->logo;
        $berita = Berita::orderBy('tanggal', 'desc')->get();
        $data = [
                    'logo' => $logo,
                    'berita' => $berita,
                    'dinas' => $dinas
                ];
                
        return view('user.home', $data);
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

    public function pejabat()
    {
        $pejabat = Karyawan::whereIn('jabatan', ['Kepala Dinas', 'Sekretaris', 'Kepala Bidang'])->get();
        return view('user.pejabat', compact('pejabat'));
    }

    public function pegawai()
    {
        $pegawai = Karyawan::whereNotIn('jabatan', ['Kepala Dinas', 'Sekretaris', 'Kepala Bidang'])->get();
        return view('user.lainnya', compact('pegawai'));
    }

    public function agenda()
    {
        $agenda = Agenda::all();
        return view('user.agenda', compact('agenda'));
    }

    public function unduh()
    {
        $unduh = Unduh::all();
        return view('user.unduhan', compact('unduh'));
    }

    public function layanan()
    {
        $faqs = Faq::orderBy('created_at', 'DESC')->get();
        $layanan = Layanan::orderBy('created_at', 'DESC')->simplePaginate(6);
        return view('user.layanan', compact('layanan', 'faqs'));
    }

    public function foto()
    {
        $gambar= Galeri::with('agenda')->get(); 
        return view('user.foto', compact('gambar'));
    }

    public function video()
    {
        $video = Video::all();
        return view('user.video', compact('video'));
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