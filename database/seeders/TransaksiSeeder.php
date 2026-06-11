<?php

namespace Database\Seeders;

use App\Models\Transaksi;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        Transaksi::create([
            'user_id'   => 1,
            'buku_id'   => 1,
            'status'    => 'pengajuan',
            'tanggal_pengajuan' => now()->toDateString(),
        ]);

        Transaksi::create([
            'user_id'   => 1,
            'buku_id'   => 2,
            'status'    => 'pengajuan',
            'tanggal_pengajuan' => now()->toDateString(),
        ]);

        Transaksi::create([
            'user_id'   => 2,
            'buku_id'   => 1,
            'status'    => 'pengajuan',
            'tanggal_pengajuan' => now()->toDateString(),
        ]);

        Transaksi::create([
            'user_id'   => 2,
            'buku_id'   => 2,
            'status'    => 'pengajuan',
            'tanggal_pengajuan' => now()->toDateString(),
        ]);
    }
}
