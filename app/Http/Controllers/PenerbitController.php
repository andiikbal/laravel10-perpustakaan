<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\User;
use Illuminate\Http\Request;

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
}
