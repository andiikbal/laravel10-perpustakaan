<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\User;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekSudahLogin');
    }


    // tampil buku
    public function index()
    {
        $profile = User::find(session('id'));

        return view('buku/index', [
            'title'     => 'Buku',
            'profile'   => $profile,
            'bukus'     => Buku::all()
        ]);
    }


    // tambah buku
    public function create()
    {
        $profile = User::find(session('id'));

        return view('buku/create', [
            'title'     => 'Buku',
            'profile'   => $profile,
            'penerbits' => Penerbit::all(),
        ]);
    }


    // simpan buku
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255|unique:bukus,judul',
            'penulis' => 'required|string|max:100',
            'penerbit' => 'required',
            'tahun' => 'required|numeric',
        ]);

        Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit_id' => $request->penerbit,
            'tahun' => $request->tahun,
        ]);

        return redirect('/buku')->with('success', 'Data Buku berhasil ditambahkan.');
    }


    // edit buku
    public function edit(Buku $buku)
    {
        $profile = User::find(session('id'));

        return view('buku/edit', [
            'title'     => 'Buku',
            'profile'   => $profile,
            'buku'      => $buku,
            'penerbits' => Penerbit::all(),
        ]);
    }


    // update buku
    public function update(Buku $buku, Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255|unique:bukus,judul,' . $buku->id,
            'penulis'   => 'required|string|max:100',
            'penerbit'  => 'required',
            'tahun'     => 'required|numeric',
        ]);

        $buku->update([
            'judul'         => $request->judul,
            'penulis'       => $request->penulis,
            'penerbit_id'   => $request->penerbit,
            'tahun'         => $request->tahun,
        ]);

        return redirect('/buku')->with('success', 'Data Buku berhasil diubah.');
    }


    // delete buku
    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect('/buku')->with('success', 'Data Buku berhasil dihapus.');
    }
}
