<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama'      => 'A. Ikbal',
            'email'     => 'anikanstd7@gmail.com',
            'password'  => bcrypt('password'),
            'alamat'    => 'Jl. Paisubit No.10, Kel. Dodung, Kec. Banggai',
            'no_hp'     => '081322555111',
            'role'      => 'admin',
        ]);

        User::create([
            'nama'      => 'Andi',
            'email'     => 'andi@gmail.com',
            'password'  => bcrypt('password'),
            'alamat'    => 'Jl. Baru No.1, Kel. Dodung, Kec. Banggai',
            'no_hp'     => '081322555222',
        ]);

        User::create([
            'nama'      => 'Sinta',
            'email'     => 'sinta@gmail.com',
            'password'  => bcrypt('password'),
            'alamat'    => 'Jl. Nyiur No.123, Kel. Tanobonunungan, Kec. Banggai',
            'no_hp'     => '081322555333',
        ]);

        User::create([
            'nama'      => 'Sabri',
            'email'     => 'sabri@gmail.com',
            'password'  => bcrypt('password'),
            'alamat'    => 'Jl. Katamso No.123, Kel. Tanobonunungan, Kec. Banggai',
            'no_hp'     => '081322555444',
        ]);
    }
}
