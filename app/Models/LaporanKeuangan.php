<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKeuangan extends Model
{
    use HasFactory;
    protected $table = 'laporan_keuangan';
    protected $fillable = [
        'jmlh_pemasukan', 
        'jmlh_pengeluaran', 
        'tanggal',
        'keterangan', 
        'organisasi_id',
        'kegiatan_id', 
        'pengurus_id'];

    public function scopeFilter($query, array $filters) {

        $query->when($filters['cariLaporan'] ?? false, function($query, $cariLaporan) {
            return $query->where('keterangan', 'like', '%' . $cariLaporan . '%');
        });
    
        $query->when($filters['jenis'] ?? false, function($query, $organisasi) {
            return $query->whereHas('organisasi', function($query) use ($organisasi) {
                $query->where('jenis', $organisasi);
            });
        });
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }

    public function pengurus()
    {
        return $this->hasOne(pengurus::class);
    }

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }

}


