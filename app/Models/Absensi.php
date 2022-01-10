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

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

}