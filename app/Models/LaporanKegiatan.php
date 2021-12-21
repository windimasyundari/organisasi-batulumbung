<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKegiatan extends Model
{
    protected $table = 'laporan_kegiatan';
    protected $fillable = ['nama_kegiatan', 'tanggal', 'waktu', 'tempat', 'foto', 'keterangan'];
}
