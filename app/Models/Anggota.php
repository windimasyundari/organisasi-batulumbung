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
       
        $query->when($filters['cariSekaaTeruna'] ?? false, function($query, $cariSekaaTeruna) {
            return $query->where('nama', 'like', '%' . $cariSekaaTeruna . '%');
        });
        $query->when($filters['cariSekaaGong'] ?? false, function($query, $cariSekaaGong) {
            return $query->where('nama', 'like', '%' . $cariSekaaGong . '%');
        });
        $query->when($filters['cariSekaaSanti'] ?? false, function($query, $cariSekaaSanti) {
            return $query->where('nama', 'like', '%' . $cariSekaaSanti . '%');
        });
        $query->when($filters['cariPKK'] ?? false, function($query, $cariPKK) {
            return $query->where('nama', 'like', '%' . $cariPKK . '%');
        });

    }

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }

}
