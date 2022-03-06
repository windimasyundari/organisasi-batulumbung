<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengurus extends Authenticatable
{
    protected $table = 'pengurus';

    protected $fillable = [
        'nama',
        'jabatan', 
        'email', 
        'password', 
        'no_telp', 
        'jenis_kelamin', 
        'alamat', 
        'organisasi_id', 
        'status',
    ];

public function scopeFilter($query, array $filters) {
       
    $query->when($filters['cariPengurus'] ?? false, function($query, $cariPengurus) {
        return $query->where('nama', 'like', '%' . $cariPengurus . '%');
    });

    $query->when($filters['jenis'] ?? false, function($query, $organisasi) {
        return $query->whereHas('organisasi', function($query) use ($organisasi) {
            $query->where('jenis', $organisasi);
        });
    });
}


public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }

public function laporanKeuangan()
    {
        return $this->HasMany(LaporanKeuangan::class);
    }


}