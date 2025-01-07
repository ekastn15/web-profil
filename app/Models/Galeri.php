<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;
    protected $table = 'galeri'; 
    protected $primaryKey = 'id_galeri'; 
    protected $fillable = [
        'foto_galeri',
        'id_agenda'
        		
    ];

    public function agenda()
    {
        return $this->belongsTo(Agenda::class, 'id_agenda', 'id_agenda'); // Sesuaikan dengan foreign key dan primary key
    }

    public function getRandomFotoAttribute()
    {
        if (!$this->foto_galeri) {
            return null;
        }

        $fotoArray = explode(',', $this->foto_galeri); // Pecah string menjadi array
        return $fotoArray[array_rand($fotoArray)]; // Ambil gambar secara acak
    }

}
