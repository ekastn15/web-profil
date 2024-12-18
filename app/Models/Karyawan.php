<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';
    protected $primaryKey = 'id_karyawan'; 
    protected $fillable = [
        'name',
        'nip',
        'jabatan',
        'bidang',
        'foto',
        'nomer_karyawan',
        'id_dinas'
    ];

    // Mendefinisikan relasi dengan Dinas
    public function dinas()
    {
        return $this->belongsTo(Dinas::class, 'id_dinas', 'id_dinas'); // Sesuaikan dengan foreign key dan primary key
    }
}
