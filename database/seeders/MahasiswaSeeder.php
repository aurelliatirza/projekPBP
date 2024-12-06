<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        $mahasiswas = [
            [
                'id_user' => 5,
                'nim' => '24060122130071',
                'nama' => 'Muthia Zhafira Sahnah',
                'semester' => 3,
                'id_prodi' => 1,  // Informatika
                'id_dosen' => 20,  // Bu Dinar
                'angkatan' => '2023',
                'created_at' => now(),
            ],
            [
                'id_user' => 8,
                'nim' => '24060122130047',
                'nama' => 'Tirza Aurellia Wijaya',
                'semester' => 3,
                'id_prodi' => 1,  // Informatika
                'id_dosen' => 20,  // Bu Dinar
                'angkatan' => '2023',
                'created_at' => now(),
            ],
            [
                'id_user' => 7,
                'nim' => '24060122130093',
                'nama' => 'Nadiva Aulia Inayah',
                'semester' => 5,
                'id_prodi' => 1,  // Informatika
                'id_dosen' => 20,  // Bu Dinar
                'angkatan' => '2022',
                'created_at' => now(),
            ],
            [
                'id_user' => 6,
                'nim' => '24060122140123',
                'nama' => 'Alya Safina',
                'semester' => 5,
                'id_prodi' => 1,  // Informatika
                'id_dosen' => 20,  // Bu Dinar
                'angkatan' => '2022',
                'created_at' => now(),
            ]
        ];

        // Insert all mahasiswa data at once
        DB::table('mahasiswa')->insert($mahasiswas);
    }
}
