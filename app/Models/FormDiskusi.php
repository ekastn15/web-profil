<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormDiskusi extends Model
{
    use HasFactory;
    protected $table = 'form_diskusi';
    protected $primaryKey = 'id_form';
    protected $fillable = [
        'nama_pengirim',
        'saran',
        'kritik',
<<<<<<< HEAD
        'tanggal'
=======
        'created_at'
>>>>>>> eka
    ];
}
