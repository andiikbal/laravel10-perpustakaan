<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BukuExport implements FromView
{
    protected Collection $bukus;

    public function __construct(Collection $bukus)
    {
        $this->bukus = $bukus;
    }

    public function view(): View
    {
        return view('buku.export', [
            'judul' => 'Data Buku',
            'bukus' => $this->bukus
        ]);
    }
}
