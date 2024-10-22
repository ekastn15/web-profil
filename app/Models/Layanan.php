<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $table = 'layanan';
    protected $primaryKey = 'id_layanan'; 
    protected $fillable = [
        'name_layanan',
        'link_layanan',
        'id_dinas'
    ];

    // Mendefinisikan relasi dengan Dinas
    public function dinas()
    {
        return $this->belongsTo(Dinas::class, 'id_dinas', 'id_dinas'); // Sesuaikan dengan foreign key dan primary key
    }
}
