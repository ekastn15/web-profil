<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dinas extends Model
{
    use HasFactory;
    protected $table = 'dinas'; 
    protected $primaryKey = 'id_dinas'; 
    protected $fillable = [
        'name_dinas',
        'alamat',
        'tugas_fungsi',
        'visi_misi',
        'logo'
    ];
}
