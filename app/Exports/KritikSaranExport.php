<?php

namespace App\Exports;

use App\Models\FormDiskusi;
use Maatwebsite\Excel\Concerns\FromCollection;

class KritikSaranExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FormDiskusi::all();
    }

    public function headings(): array
    {
        return[
            'nama_pengirim', 'saran', 'kritik'
        ];
    }
}
