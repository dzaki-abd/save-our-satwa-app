<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artikel::withoutEvents(function () {
            Artikel::insert([
                [
                    'id' => '1',
                    'judul' => 'Lorem ipsum dolor sit amet',
                    'slug' => 'lorem-ipsum-dolor-sit-amet',
                    'tag' => 'lorem, ipsum, dolor, sit, amet',
                    'konten' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nis
                    lacinia. Nulla euismod, nisi ut posuere dictum, quam nisl lacinia mi, quis aliquet est
                    urna ut sapien. Nulla euismod, nisi ut posuere dictum, quam nisl lacinia mi, quis aliquet
                    est urna ut sapien. Nulla euismod, nisi ut posuere dictum, quam nisl lacinia mi, quis
                    aliquet est urna ut sapien. Nulla euismod, nisi ut posuere dictum, quam nisl lacinia mi,
                    quis aliquet est urna ut sapien. Nulla euismod, nisi ut posuere dictum, quam nisl lacinia
                    mi, quis aliquet est urna ut sapien. Nulla euismod, nisi ut posuere dictum, quam nisl
                    lacinia mi, quis aliquet est urna ut sapien. Nulla euismod, nisi ut posuere dictum, quam
                    nisl lacinia mi, quis aliquet est urna ut sapien. Nulla euismod, nisi ut posuere dictum,
                    quam nisl lacinia mi, quis aliquet est urna ut sapien. Nulla euismod, nisi ut posuere
                    dictum, quam nisl lacinia mi, quis aliquet est urna ut sapien. Nulla euismod, nisi ut
                    posuere dictum, quam nisl lacinia mi, quis aliquet est urna ut sapien.',
                    'gambar' => 'lorem-ipsum-dolor-sit-amet.jpg',
                    'users_id' => '1',
                    'jenis' => 'artikel',
                    'di_posting' => 'Tidak',
                ]
            ]);
        });
    }
}
