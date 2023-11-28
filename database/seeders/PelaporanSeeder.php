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
            'waktu_kejadian' => '2021-05-01 00:00:00',
            'lokasi_kejadian' => 'Jl. Raya Bogor',
            'jenis_pelanggaran' => 'Pemeliharaan Ilegal',
            'jenis_satwa' => 'Harimau Sumatera',
            'deskripsi_kejadian' => 'Pemilik satwa tidak memiliki izin pemeliharaan',
            'status' => 'Ditinjau',
            'user_id' => '1',
        ]);
        
        Pelaporan::create([
            'uniqid' => uniqid(),
            'waktu_kejadian' => '2021-05-01 00:00:00',
            'lokasi_kejadian' => 'Jl. Raya Bogor',
            'jenis_pelanggaran' => 'Pemeliharaan Ilegal',
            'jenis_satwa' => 'Harimau Sumatera',
            'deskripsi_kejadian' => 'Pemilik satwa tidak memiliki izin pemeliharaan',
            'status' => 'Ditolak',
            'user_id' => '1',
        ]);
    }
}