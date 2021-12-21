<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKeuangan extends Model
{
    use HasFactory;
    protected $table = 'laporan_keuangan';
    protected $filable = ['jmlh_pemasukkan', 'jmlh_pengeluaran', 'keterangan', 'kegiatan_id', 'pengurus_id'];
}
