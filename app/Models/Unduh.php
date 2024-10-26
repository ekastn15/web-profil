<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unduh extends Model
{
    use HasFactory;
    protected $table = 'unduh';
    protected $primaryKey = 'id_dokumen';
    protected $fillable = [
        'name_doc',
        'deskripsi',
        'tanggal_terbit',
        'dokumen',
        'id_users'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users', 'id_users'); // Sesuaikan dengan foreign key dan primary key
    }
}
