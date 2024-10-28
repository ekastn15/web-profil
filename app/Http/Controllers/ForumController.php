<?php

namespace App\Http\Controllers;

use App\Exports\KritikSaranExport;
use App\Models\FormDiskusi;
use GuzzleHttp\Psr7\Request;
use Maatwebsite\Excel\Facades\Excel;

class ForumController extends Controller
{
    public function index () {

        $kritiksaran = FormDiskusi::all();
        return view('feedback.index', compact('kritiksaran'));
    }

    public function export () {
        return Excel::download(new KritikSaranExport(), 'forum.xlsx');
    }

    public function filter(Request $request) {
    
        // Ambil tanggal yang sudah divalidasi
        $start_date = $request['start_date'];
        $end_date = $request['end_date'];
    
        // Ambil data dengan pagination
        $users = FormDiskusi::whereBetween('created_at', [$start_date, $end_date])
                             ->paginate(10); // Ambil 10 hasil per halaman
    
        return view('feedback.index', compact('users'));
    }
}