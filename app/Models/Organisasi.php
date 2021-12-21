<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    protected $table = 'organisasi';
    protected $fillable = ['jenis'];

    public function anggota()
    {
        return $this->HasMany(Anggota::class);
    }

    public function pengurus()
    {
        return $this->HasMany(Pengurus::class);
    }
}


