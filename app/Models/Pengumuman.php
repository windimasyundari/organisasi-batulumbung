<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';
    protected $fillable = [
        'judul', 
        'organisasi_id', 
        'tanggal', 
        'waktu', 
        'isi', 
        'file'];

    public function scopeFilter($query, array $filters) {
       
        $query->when($filters['cari'] ?? false, function($query, $cari) {
            return $query->where('judul', 'like', '%' . $cari . '%')
            ->orWhere('isi', 'like', '%' . $cari . '%');        
        });
    }

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }
}



