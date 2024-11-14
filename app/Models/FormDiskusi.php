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
<<<<<<< HEAD
        'kritik',
        'created_at'
=======
        'kritik'
>>>>>>> parent of 9b4bbdc (export data)
    ];
}
