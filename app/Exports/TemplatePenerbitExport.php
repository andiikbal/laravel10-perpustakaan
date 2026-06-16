<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TemplatePenerbitExport implements FromView
{
    public function view(): View
    {
        return view('penerbit.template');
    }

    // public function registerEvents(): array
    // {
    //     return [
    //         AfterSheet::class => function (AfterSheet $event) {
    //             $sheet = $event->sheet->getDelegate();

    //             $jumlahPenerbit = count($this->penerbits);
    //             if ($jumlahPenerbit === 0) {
    //                 return;
    //             }

    //             // Hitung koordinat baris berdasarkan file blade
    //             $startPenerbitRow = 5;
    //             $endPenerbitRow = $startPenerbitRow + $jumlahPenerbit - 1;

    //             $startInputRow = $endPenerbitRow + 3;
    //             $endInputRow = $startInputRow + 9;

    //             // Perulangan untuk setiap sel di kolom A (untuk input data)
    //             for ($row = $startInputRow; $row <= $endInputRow; $row++) {

    //                 // Daftarkan/aktifkan koordinat sel dengan string kosong terlebih dahulu
    //                 $sheet->setCellValue('A' . $row, '');

    //                 // Buat objek validasi baru
    //                 $validation = new DataValidation();
    //                 $validation->setType(DataValidation::TYPE_LIST);
    //                 $validation->setErrorStyle(DataValidation::STYLE_STOP);
    //                 $validation->setAllowBlank(false);
    //                 $validation->setShowDropDown(true);

    //                 $validation->setShowErrorMessage(true);
    //                 $validation->setErrorTitle('Pilihan Salah');
    //                 $validation->setError('Silakan pilih penerbit yang ada di dalam daftar dropdown.');

    //                 $validation->setShowInputMessage(true);
    //                 $validation->setPromptTitle('Pilih Penerbit');
    //                 $validation->setPrompt('Silakan klik panah kecil untuk memilih referensi penerbit.');

    //                 // Rumus mengambil data dari kolom A (daftar penerbit)
    //                 $validation->setFormula1('=$A$' . $startPenerbitRow . ':$A$' . $endPenerbitRow);

    //                 // Tanamkan objek validasi ke sel target Kolom A
    //                 $sheet->setDataValidation('A' . $row, $validation);
    //             }
    //         },
    //     ];
    // }
}
