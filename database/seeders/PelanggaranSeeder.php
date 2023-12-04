<?php

namespace Database\Seeders;

use App\Models\Pelanggaran;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PelanggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelanggaran::create([
            'nama_pelanggaran' => 'Pemeliharaan Ilegal',
        ]);

        Pelanggaran::create([
            'nama_pelanggaran' => 'Perdagangan Ilegal',
        ]);

        Pelanggaran::create([
            'nama_pelanggaran' => 'Pemusnahan Habitat',
        ]);

        Pelanggaran::create([
            'nama_pelanggaran' => 'Pemusnahan Satwa',
        ]);
        
        Pelanggaran::create([
            'nama_pelanggaran' => 'Pertandingan Satwa',
        ]);

        Pelanggaran::create([
            'nama_pelanggaran' => 'Penangkapan Satwa',
        ]);
        
        Pelanggaran::create([
            'nama_pelanggaran' => 'Eksperimen Satwa Yang Tidak Etis',
        ]);
    }
}