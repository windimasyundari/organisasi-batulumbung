<?php

namespace App\Imports;
use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AbsensiImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    *@return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Absensi([
            'anggota_id'    => $row['anggota_id'],
            'nama'          => $row['nama'],
            'nama_kegiatan' => $row['nama_kegiatan'],
            'tanggal'       => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal']),
            'jenis'         => $row['jenis'],
            'status'        => $row['status']
        ]);
    }
}
