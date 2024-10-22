<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;
    protected $table = 'kontak';
    protected $primaryKey = 'id_kontak'; 
    protected $fillable = [
        'nomer_wa',
        'email_dinas',
        'instagram_dinas',
        'id_dinas'
    ];

    // Mendefinisikan relasi dengan Dinas
    public function dinas()
    {
        return $this->belongsTo(Dinas::class, 'id_dinas', 'id_dinas'); // Sesuaikan dengan foreign key dan primary key
    }
}
