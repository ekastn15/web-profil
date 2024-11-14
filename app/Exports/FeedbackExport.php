<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat as StyleNumberFormat;

class FeedbackExport implements FromCollection, WithHeadings, WithColumnFormatting
{
    private $bulan;
    private $tahun;

    public function __construct($bulan, $tahun)
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function headings(): array
    {
        return [
            'ID Form',
            'Nama Pengirim',
            'Saran',
            'Kritik',
            'Tanggal',
        ];
    }

    public function collection()
    {
        // Filter data berdasarkan bulan dan tahun
        return DB::table('form_diskusi')
            ->select('id_form', 'nama_pengirim', 'saran', 'kritik', 'created_at')
            ->whereMonth('created_at', $this->bulan)
            ->whereYear('created_at', $this->tahun)
            ->get();
    }

    public function columnFormats(): array
    {
        return [
            'A' => StyleNumberFormat::FORMAT_NUMBER,
            'E' => 'yyyy-mm-dd', // Format tanggal untuk kolom tanggal
        ];
    }
}
