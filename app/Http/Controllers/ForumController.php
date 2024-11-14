<?php

namespace App\Http\Controllers;

use App\Exports\FeedbackExport;
use App\Models\FormDiskusi;
<<<<<<< HEAD
use Illuminate\Http\Request; // Import yang benar
=======
use GuzzleHttp\Psr7\Request;
>>>>>>> parent of 9b4bbdc (export data)
use Maatwebsite\Excel\Facades\Excel;

class ForumController extends Controller
{
<<<<<<< HEAD
    public function index()
    {
        $feedback = FormDiskusi::all();
        return view('feedback.index', compact('feedback'));
    }

    public function export(Request $request)
    {
        // Validasi input bulan dan tahun
        $request->validate(['month_year' => 'required|date_format:Y-m']);

        // Memisahkan bulan dan tahun dari input
        [$year, $month] = explode('-', $request->month_year);

        // Eksekusi ekspor
        return Excel::download(new FeedbackExport($month, $year), 'feedback.xlsx');
=======
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
>>>>>>> parent of 9b4bbdc (export data)
    }
}
