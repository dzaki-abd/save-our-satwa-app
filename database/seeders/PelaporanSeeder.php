<?php

namespace Database\Seeders;

use App\Models\Pelaporan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PelaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelaporan::create([
            'uniqid' => uniqid(),
            'waktu_kejadian' => '2022-08-19 00:00:00',
            'lokasi_kejadian' => 'Jl. Raya Bogor',
            'pelanggaran_id' => 2,
            'satwa_id' => 3,
            'deskripsi_kejadian' => 'Penjualan satwa dilakukan di pinggir jalan',
            'status' => 'Ditinjau',
            'user_id' => '1',
        ]);
        
        Pelaporan::create([
            'uniqid' => uniqid(),
            'waktu_kejadian' => '2023-10-01 00:00:00',
            'lokasi_kejadian' => 'Jl. Bojongsoang',
            'pelanggaran_id' => 1,
            'satwa_id' => 1,
            'deskripsi_kejadian' => 'Pemelihaaraan satwa dilakukan di rumah',
            'status' => 'Ditinjau',
            'user_id' => '1',
        ]);
    }
}