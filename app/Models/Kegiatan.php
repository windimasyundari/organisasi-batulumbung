<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';
    protected $fillable = ['nama_kegiatan', 'tanggal', 'waktu', 'tempat', 'deskripsi'];

    public function absensi()
    {
        return $this->HasMany(Absensi::class);
    }
}
