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
        'image',
        'status',
    ];

    public function scopeFilter($query, array $filters) {
       
        $query->when($filters['cariAnggota'] ?? false, function($query, $cariAnggota) {
            return $query->where('nama', 'like', '%' . $cariAnggota . '%')
            ->orWhere('nik', 'like', '%' . $cariAnggota . '%');
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

}
