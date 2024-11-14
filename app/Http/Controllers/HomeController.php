<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Dinas;
use App\Models\Faq;
use App\Models\FormDiskusi;
use App\Models\Karyawan;
use App\Models\Layanan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $logo = Dinas::find(1)->logo;
        $berita = Berita::orderBy('tanggal', 'desc')->get();
        $data = [
                    'logo' => $logo,
                    'berita' => $berita
                ];
                
        return view('user.home', $data );
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
        $pegawai = Karyawan::whereNotIn('jabatan', ['Kepala Dinas', 'Sekretaris', 'Kepala Bidang'])->simplePaginate(6);
        return view('user.lainnya', compact('pegawai'));
    }

    public function layanan()
    {
        $faqs = Faq::orderBy('created_at', 'DESC')->get();
        $layanan = Layanan::orderBy('created_at', 'DESC')->simplePaginate(6);
        return view('user.layanan', compact('layanan', 'faqs'));
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