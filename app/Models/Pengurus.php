<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengurus extends Model
{
    protected $table = 'pengurus';

    protected $fillable = [
        'nama',
        'jabatan', 
        'email', 
        'password', 
        'jenis_kelamin', 
        'alamat', 
        'organisasi_id', 
        'status',
    ];


public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }
}