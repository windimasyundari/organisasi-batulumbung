<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Anggota extends Authenticatable
{
    use HasFactory;
    
    protected $table = 'anggota';

    protected $fillable = [
        'nama', 
        'nik', 
        'tempat_lahir', 
        'tgl_lahir', 
        'email', 
        'password', 
        'no_telp', 
        'jenis_kelamin', 
        'pekerjaan', 
        'alamat', 
        'organisasi_id',
        'status',
    ];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }
}
