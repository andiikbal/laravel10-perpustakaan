<?php

namespace App\Imports;

use App\Models\Buku;
use App\Models\Penerbit;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
// use Maatwebsite\Excel\Concerns\ToModel;

class BukuImport implements ToCollection
{
    protected int $jumlah_penerbit;

    public function __construct(int $jumlah_penerbit)
    {
        $this->jumlah_penerbit = $jumlah_penerbit;
    }

    public function collection(Collection $collection)
    {
        $barisKe = 1;
        $baris_awal_data_buku = $this->jumlah_penerbit + 6;

        foreach ($collection as $row) {
            if ($barisKe >= $baris_awal_data_buku) {
                // cek jika ada data yang kosong, maka proses import dihentikan
                $check_row = ($row[0] == null) || ($row[2] == null) || ($row[3] == null) || ($row[4] == null);
                if ($check_row) break;

                // cek buku, jika sudah ada maka proses import akan dilewati
                $buku = Buku::where('judul', $row[0])->first();
                if ($buku) continue;

                // cek penerbit, jika tidak ada maka proses import akan dilewati
                $penerbit = Penerbit::find($row[3]);
                if (!$penerbit) break;

                // buat buku baru
                Buku::create([
                    'judul' => $row[0],
                    'penulis' => $row[2],
                    'penerbit_id' => $row[3],
                    'tahun' => $row[4],
                ]);
            }
            $barisKe++;
        }
    }
}
