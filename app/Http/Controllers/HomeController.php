<?php

namespace App\Http\Controllers;

use App\Models\Dinas;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $logo = Dinas::find(1)->logo;
        return view('user.home',compact('logo'));
    }

    public function services()
    {
        return view('user.services');
    }

    public function portfolio()
    {
        return view('user.portfolio');
    }

    public function about()
    {
        return view('user.about');
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
}
