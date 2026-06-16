<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;

// class BukuExport implements FromView, WithEvents
class TemplateBukuExport implements FromView
{
    protected Collection $penerbits;

    public function __construct(Collection $penerbits)
    {
        $this->penerbits = $penerbits;
    }

    public function view(): View
    {
        return view('buku.template', [
            'penerbits' => $this->penerbits
        ]);
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

    //             // Hitung koordinat baris berdasarkan file blade Anda
    //             $startPenerbitRow = 5;
    //             $endPenerbitRow = $startPenerbitRow + $jumlahPenerbit - 1;

    //             $startInputRow = $endPenerbitRow + 4;
    //             $endInputRow = $startInputRow + 9;

    //             // --- PERULANGAN UNTUK SETIAP SEL DI KOLOM C ---
    //             for ($row = $startInputRow; $row <= $endInputRow; $row++) {

    //                 // PERBAIKAN UTAMA: Daftarkan/aktifkan koordinat sel dengan string kosong terlebih dahulu
    //                 $sheet->setCellValue('C' . $row, '');

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

    //                 // Rumus mengambil data dari kolom A
    //                 $validation->setFormula1('=$A$' . $startPenerbitRow . ':$A$' . $endPenerbitRow);

    //                 // Tanamkan objek validasi ke sel target Kolom C
    //                 $sheet->setDataValidation('C' . $row, $validation);
    //             }
    //         },
    //     ];
    // }
}
