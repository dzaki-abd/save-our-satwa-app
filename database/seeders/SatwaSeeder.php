<?php

namespace Database\Seeders;

use App\Models\Satwa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatwaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Satwa::withoutEvents(function () {
            Satwa::insert([
                [
                    'taxonid' => '1',
                    'nama_ilmiah' => 'Panthera leo',
                    'nama_lokal' => 'Singa',
                    'nama_inggris' => 'Lion',
                    'deskripsi' => 'Sebuah spesies mamalia karnivora dari keluarga Felidae.',
                    'kingdom' => 'Animalia',
                    'filum' => 'Chordata',
                    'kelas' => 'Mammalia',
                    'ordo' => 'Carnivora',
                    'famili' => 'Felidae',
                    'genus' => 'Panthera',
                    'tren_populasi' => 'Menurun',
                    'kategori_iucn' => 'Rentan',
                    'populasi' => '5000',
                    'lokasi' => 'Jawa',
                    'gambar' => 'singa.jpg',
                    'slug' => 'singa',
                ],
                [
                    'taxonid' => '2',
                    'nama_ilmiah' => 'Elephas maximus',
                    'nama_lokal' => 'Gajah',
                    'nama_inggris' => 'Elephant',
                    'deskripsi' => 'Sebuah spesies mamalia besar dari keluarga Elephantidae.',
                    'kingdom' => 'Animalia',
                    'filum' => 'Chordata',
                    'kelas' => 'Mammalia',
                    'ordo' => 'Proboscidea',
                    'famili' => 'Elephantidae',
                    'genus' => 'Elephas',
                    'tren_populasi' => 'Stabil',
                    'kategori_iucn' => 'Rentan',
                    'populasi' => '3000',
                    'lokasi' => 'Sumatra',
                    'gambar' => 'gajah.jpg',
                    'slug' => 'gajah',
                ],
                [
                    'taxonid' => '3',
                    'nama_ilmiah' => 'Pongo pygmaeus',
                    'nama_lokal' => 'Orangutan',
                    'nama_inggris' => 'Orangutan',
                    'deskripsi' => 'Sebuah spesies kera besar yang mendiami hutan hujan Indonesia.',
                    'kingdom' => 'Animalia',
                    'filum' => 'Chordata',
                    'kelas' => 'Mammalia',
                    'ordo' => 'Primates',
                    'famili' => 'Hominidae',
                    'genus' => 'Pongo',
                    'tren_populasi' => 'Menurun',
                    'kategori_iucn' => 'Kritis',
                    'populasi' => '2500',
                    'lokasi' => 'Kalimantan',
                    'gambar' => 'orangutan.jpg',
                    'slug' => 'orangutan',
                ],
                [
                    'taxonid' => '4',
                    'nama_ilmiah' => 'Tarsius tarsier',
                    'nama_lokal' => 'Tarsius',
                    'nama_inggris' => 'Tarsier',
                    'deskripsi' => 'Sebuah spesies primata kecil yang aktif pada malam hari.',
                    'kingdom' => 'Animalia',
                    'filum' => 'Chordata',
                    'kelas' => 'Mammalia',
                    'ordo' => 'Primates',
                    'famili' => 'Tarsiidae',
                    'genus' => 'Tarsius',
                    'tren_populasi' => 'Stabil',
                    'kategori_iucn' => 'Rentan',
                    'populasi' => '1000',
                    'lokasi' => 'Sulawesi',
                    'gambar' => 'tarsius.jpg',
                    'slug' => 'tarsius',
                ],
                [
                    'taxonid' => '5',
                    'nama_ilmiah' => 'Casuarius casuarius',
                    'nama_lokal' => 'Kasuari',
                    'nama_inggris' => 'Cassowary',
                    'deskripsi' => 'Sebuah burung besar yang tidak bisa terbang, endemik di Papua.',
                    'kingdom' => 'Animalia',
                    'filum' => 'Chordata',
                    'kelas' => 'Aves',
                    'ordo' => 'Casuariiformes',
                    'famili' => 'Casuariidae',
                    'genus' => 'Casuarius',
                    'tren_populasi' => 'Menurun',
                    'kategori_iucn' => 'Kritis',
                    'populasi' => '500',
                    'lokasi' => 'Papua',
                    'gambar' => 'kasuari.jpg',
                    'slug' => 'kasuari',
                ],
            ]);
        });        
    }
}
