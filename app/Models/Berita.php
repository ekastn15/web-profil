<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $fillable = [
        'judul_berita',
        'nama_penulis',
        'tanggal',
        'foto',
        'berita'
    ];
}
