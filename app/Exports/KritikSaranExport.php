<?php

namespace App\Exports;

use App\Models\FormDiskusi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KritikSaranExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data; // Mengembalikan data yang telah diterima
    }

    public function headings(): array
    {
        return [
            'nama_pengirim',
        'saran',
        'kritik'
            // Tambahkan kolom lain sesuai dengan struktur tabel Anda
        ];
    }
}