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

    // public function absensiFilter($query, array $filter)
    // {
    //     $query->when($filter['tanggal'] ?? false, function ($query, $tanggal) {
    //         return $query->where('tanggal', $tanggal);
    //     });
    // }

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