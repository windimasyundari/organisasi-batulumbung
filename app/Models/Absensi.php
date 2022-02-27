<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';
    protected $fillable = [
        'anggota_id', 
        'nama', 
        'nama_kegiatan', 
        'tanggal',
        'jenis', 
        'status'];

    public function scopeFilter($query, array $filters) {
    
        $query->when($filters['cariAbsensi'] ?? false, function($query, $cariAbsensi) {
            return $query->where('nama', 'like', '%' . $cariAbsensi . '%')
            ->orWhere('status', 'like', '%' . $cariAbsensi . '%');
        });
    
        $query->when($filters['jenis'] ?? false, function($query, $absensi) {
            return $query->whereHas('absensi', function($query) use ($absensi) {
                $query->where('jenis', $absensi);
            });
        });
    }

    // relasi
    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    // scope
    public function scopeSearch($query, $nama)
    {
        return $query->where('nama', 'LIKE', "%{$nama}%");
    }

}