<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $table = 'agenda'; 
    protected $primaryKey = 'id_agenda'; 
    protected $fillable = [
        'name_agenda',
        'tanggal',
        'lokasi',
        'id_users'
        		
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_users', 'id_users'); // Sesuaikan dengan foreign key dan primary key
    }
}
