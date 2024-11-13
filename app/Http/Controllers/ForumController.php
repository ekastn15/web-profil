<?php

namespace App\Http\Controllers;

use App\Exports\KritikSaranExport;
use App\Models\FormDiskusi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class ForumController extends Controller
{
    public function index() {
        $kritiksaran = FormDiskusi::all();
        return view('forumdiskusi.index', compact('kritiksaran'));
    }

    public function export(Request $request) {
        // Validasi input bulan
        $request->validate([
            'month' => 'required|date_format:Y-m',
        ]);

        // Ambil bulan dari input
        $month = $request->input('month');

        // Tentukan tanggal mulai dan akhir untuk bulan yang dipilih
        $startDate = Carbon::createFromFormat('Y-m', $month)->startOfMonth();
        $endDate = Carbon::createFromFormat('Y-m', $month)->endOfMonth();

        // Ambil data berdasarkan bulan yang dipilih
        $data = FormDiskusi::whereBetween('created_at', [$startDate, $endDate])->get();

        // Periksa jika data kosong
        if ($data->isEmpty()) {
            return response()->json(['message' => 'Tidak ada data untuk bulan ini.'], 404);
        }

        // Kembalikan file Excel
        return Excel::download(new KritikSaranExport($data), 'kritiksaran-' . $month . '.xlsx');
    }
}