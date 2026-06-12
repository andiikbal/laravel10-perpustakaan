<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekSudahLogin');
    }

    // tampil data pengajuan
    public function pengajuan()
    {
        $profile = User::find(session('id'));

        if ($profile->role === 'admin') {
            $pengajuans = Transaksi::where('status', 'pengajuan')->get();
        } else {
            $pengajuans = Transaksi::where(['status' => 'pengajuan', 'user_id' => session('id')])->get();
        }

        return view('transaksi/pengajuan', [
            'title'         => 'Pengajuan',
            'profile'       => $profile,
            'pengajuans'    => $pengajuans,
        ]);
    }


    // tampil form tambah pengajuan
    public function create()
    {
        $profile = User::find(session('id'));

        if ($profile->role != 'user') {
            return redirect('/pengajuan')->with('warning', 'Anda tidak dapat melakukan pengajuan.');
        }

        return view('transaksi/create', [
            'title'     => 'Pengajuan',
            'profile'   => $profile,
            'bukus'     => Buku::all()->sortBy('judul'),
        ]);
    }


    // simpan data pengajuan
    public function store(Request $request)
    {
        $request->validate([
            'buku'  => 'required',
        ]);

        Transaksi::create([
            'user_id'   => session('id'),
            'buku_id'   => $request->buku,
            'tanggal_pengajuan' => now()->toDateString(),
        ]);

        return redirect('/pengajuan')->with('success', 'Data Pengajuan berhasil ditambahkan.');
    }


    // update pengajuan dan peminjaman
    public function update(Transaksi $transaksi)
    {
        if ($transaksi->status === 'pengajuan') {
            $transaksi->update([
                'status'             => 'peminjaman',
                'tanggal_peminjaman' => now()->toDateString(),
            ]);
            return redirect('/pengajuan')->with('success', 'Data Pengajuan berhasil disetujui.');
        } elseif ($transaksi->status === 'peminjaman') {
            $transaksi->update([
                'status'               => 'pengembalian',
                'tanggal_pengembalian' => now()->toDateString(),
            ]);
            return redirect('/peminjaman')->with('success', 'Data Peminjaman berhasil dikembalikan.');
        }
    }


    // batal pengajuan
    public function batal(Transaksi $transaksi)
    {
        if ($transaksi->status === 'pengajuan') {
            $transaksi->update(['status' => 'batal']);
            return redirect('/pengajuan')->with('success', 'Data Pengajuan berhasil dibatalkan.');
        }
    }


    // tampil data peminjaman
    public function peminjaman()
    {
        $profile = User::find(session('id'));

        if ($profile->role === 'admin') {
            $peminjamans = Transaksi::where('status', 'peminjaman')->get();
        } else {
            $peminjamans = Transaksi::where(['status' => 'peminjaman', 'user_id' => session('id')])->get();
        }

        return view('transaksi/peminjaman', [
            'title'         => 'Peminjaman',
            'profile'       => $profile,
            'peminjamans'    => $peminjamans,
        ]);
    }


    // tampil data pengembalian
    public function pengembalian()
    {
        $profile = User::find(session('id'));

        if ($profile->role === 'admin') {
            $pengembalians = Transaksi::where('status', 'pengembalian')->get();
        } else {
            $pengembalians = Transaksi::where(['status' => 'pengembalian', 'user_id' => session('id')])->get();
        }

        return view('transaksi/pengembalian', [
            'title'         => 'Pengembalian',
            'profile'       => $profile,
            'pengembalians' => $pengembalians,
        ]);
    }
}
