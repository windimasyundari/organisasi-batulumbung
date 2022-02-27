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

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }

    public function pengurus()
    {
        return $this->belongsTo(pengurus::class);
    }

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }
}


