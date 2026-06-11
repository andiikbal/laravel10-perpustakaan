<?php

namespace Database\Seeders;

use App\Models\Buku;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        Buku::create([
            'judul'         => 'Matematika VII',
            'penulis'       => 'Ranto',
            'penerbit_id'   => 1,
            'tahun'         => '2020'
        ]);

        Buku::create([
            'judul'         => 'Matematika VIII',
            'penulis'       => 'Ririn',
            'penerbit_id'   => 1,
            'tahun'         => '2021'
        ]);

        Buku::create([
            'judul'         => 'Matematika IX',
            'penulis'       => 'Budi',
            'penerbit_id'   => 1,
            'tahun'         => '2021'
        ]);
    }
}
