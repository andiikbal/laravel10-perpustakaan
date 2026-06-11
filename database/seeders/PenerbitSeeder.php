<?php

namespace Database\Seeders;

use App\Models\Penerbit;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenerbitSeeder extends Seeder
{
    public function run(): void
    {
        Penerbit::create([
            'penerbit' => 'Air Langga',
        ]);

        Penerbit::create([
            'penerbit' => 'Gramedia',
        ]);

        Penerbit::create([
            'penerbit' => 'Tiga Serangkai',
        ]);
    }
}
