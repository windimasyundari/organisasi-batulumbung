<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';
    protected $fillable = [
        'nama_kegiatan', 
        'organisasi_id', 
        'tanggal', 
        'waktu', 
        'tempat', 
        'deskripsi', 
        'image'];
        
    protected $guarded = ['id'];

    public function laporanKeuangan()
    {
        return $this->HasMany(LaporanKeuangan::class);
    }

    public function scopeFilter($query, array $filters) {
       
        $query->when($filters['cari'] ?? false, function($query, $cari) {
            return $query->where('nama_kegiatan', 'like', '%' . $cari . '%')
            ->orWhere('tempat', 'like', '%' . $cari . '%')
            ->orWhere('deskripsi', 'like', '%' . $cari . '%');        
        });
    }

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }
}
