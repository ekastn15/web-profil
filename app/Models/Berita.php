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
        'title_berita',
        'tanggal',
        'dec_berita',
        'foto',	
        'id_users'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users', 'id_users'); // Sesuaikan dengan foreign key dan primary key
    }
}
