<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromView;

class PenerbitExport implements FromView
{
    protected Collection $penerbits;

    public function __construct(Collection $penerbits)
    {
        $this->penerbits = $penerbits;
    }

    public function view(): View
    {
        return view('penerbit.export', [
            'judul' => 'Data Penerbit',
            'penerbits' => $this->penerbits,
        ]);
    }
}
