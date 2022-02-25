<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengurus;
use App\Models\Organisasi;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Pengurus::create([
            'nama'            => 'Ni Putu Windi Masyundari',
            'jabatan'         => 'Sekretaris',
            'email'           => 'windimasyundarii@gmail.com',         
            'password'        => bcrypt('12345'),
            'no_telp'         => '085872300219',
            'jenis_kelamin'   => 'Perempuan',
            'alamat'          => 'Br. Batulumbung, Gulingan',
            'organisasi_id'   => '1',
            'status'          => 'Aktif'
        ]);

        Organisasi::create([
            'jenis' => 'Sekaa Teruna'
        ]);

        Organisasi::create([
            'jenis' => 'Sekaa Gong'
        ]);

        Organisasi::create([
            'jenis' => 'Sekaa Santi'
        ]);

        Organisasi::create([
            'jenis' => 'PKK'
        ]);
    }
}
