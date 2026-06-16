<?php

namespace App\Http\Controllers;

use App\Exports\PenerbitExport;
use App\Exports\TemplatePenerbitExport;
use App\Imports\PenerbitImport;
use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PenerbitController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekSudahLogin');
    }


    // tampil data penerbit
    public function index()
    {
        $profile = User::find(session('id'));

        if ($profile->role != 'admin') {
            return redirect('/dashboard')->with('warning', 'Anda tidak memiliki akses ke halaman Penerbit.');
        }

        return view('penerbit/index', [
            'title'     => 'Penerbit',
            'profile'   => $profile,
            'penerbits' => Penerbit::all(),
        ]);
    }


    // tambah penerbit
    public function create()
    {
        $profile = User::find(session('id'));

        if ($profile->role != 'admin') {
            return redirect('/dashboard')->with('warning', 'Anda tidak memiliki akses ke halaman Penerbit.');
        }

        return view('penerbit/create', [
            'title'     => 'Penerbit',
            'profile'   => $profile,
        ]);
    }


    // simpan penerbit
    public function store(Request $request)
    {
        $request->validate([
            'penerbit'  => 'required|string|max:100|unique:penerbits,penerbit'
        ]);

        Penerbit::create([
            'penerbit' => $request->penerbit
        ]);

        return redirect('/penerbit')->with('success', 'Data Penerbit berhasil ditambahkan.');
    }


    // edit penerbit
    public function edit(Penerbit $penerbit)
    {
        $profile = User::find(session('id'));

        if ($profile->role != 'admin') {
            return redirect('/dashboard')->with('warning', 'Anda tidak memiliki akses ke halaman Penerbit.');
        }

        return view('penerbit/edit', [
            'title'     => 'Penerbit',
            'profile'   => $profile,
            'penerbit'  => $penerbit,
        ]);
    }


    // update penerbit
    public function update(Penerbit $penerbit, Request $request)
    {
        $request->validate([
            'penerbit'  => 'required|string|max:100|unique:penerbits,penerbit,' . $penerbit->id,
        ]);

        $penerbit->update([
            'penerbit' => $request->penerbit
        ]);

        return redirect('/penerbit')->with('success', 'Data Penerbit berhasil diubah.');
    }


    // delete penerbit
    public function destroy(Penerbit $penerbit)
    {
        $jumlahBuku = Buku::where('penerbit_id', $penerbit->id)->count();

        if ($jumlahBuku > 0) {
            return redirect('/penerbit')->with('error', 'Data Penerbit tidak dapat dihapus karena masih digunakan oleh beberapa buku.');
        }

        $penerbit->delete();
        return redirect('/penerbit')->with('success', 'Data Penerbit berhasil dihapus.');
    }


    // halaman import penerbit
    public function import()
    {
        $profile = User::find(session('id'));

        if ($profile->role != 'admin') {
            return redirect('/dashboard')->with('warning', 'Anda tidak memiliki akses ke halaman Import Penerbit.');
        }

        return view('penerbit/import', [
            'title'     => 'Penerbit',
            'profile'   => $profile,
        ]);
    }


    // proses import penerbit
    public function import_process(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls',
        ]);

        Excel::import(new PenerbitImport, $request->file('file'));

        return redirect('/penerbit')->with('success', 'Data Penerbit berhasil diimport.');
    }


    // download template penerbit
    public function download_template()
    {
        return Excel::download(new TemplatePenerbitExport, 'penerbit_template.xlsx');
    }


    // export penerbit
    public function export()
    {
        $penerbits = Penerbit::all();
        return Excel::download(new PenerbitExport($penerbits), 'data_penerbit.xlsx');
    }
}
