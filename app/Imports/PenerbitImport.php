<?php

namespace App\Imports;

use App\Models\Penerbit;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
// use Maatwebsite\Excel\Concerns\ToModel;

class PenerbitImport implements ToCollection
{
    public function collection(Collection $collection)
    {
        $barisKe = 1;
        foreach ($collection as $row) {
            if ($barisKe > 3) {
                if ($row[0] == null) break;
                Penerbit::where('penerbit', $row[0])->firstOrCreate([
                    'penerbit' => $row[0],
                ]);
            }
            $barisKe++;
        }
    }
}
