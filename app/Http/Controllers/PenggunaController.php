<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekSudahLogin');
    }


    // tampil data pengguna
    public function index()
    {
        $profile = User::find(session('id'));

        if ($profile->role != 'admin') {
            return redirect('/dashboard')->with('warning', 'Anda tidak memiliki akses ke halaman Pengguna.');
        }

        return view('pengguna/index', [
            'title'     => 'Pengguna',
            'users'     => User::where('role', 'user')->get(),
            'profile'   => $profile,
        ]);
    }


    // tambah pengguna
    public function create()
    {
        $profile = User::find(session('id'));

        if ($profile->role != 'admin') {
            return redirect('/dashboard')->with('warning', 'Anda tidak memiliki akses ke halaman Pengguna.');
        }

        return view('pengguna/create', [
            'title'     => 'Pengguna',
            'profile'   => $profile,
        ]);
    }


    protected function validatePengguna(string $process, Request $request)
    {
        $uniqueEmail = "";
        $uniqueNoHp = "";

        if ($process === 'store') {
            $uniqueEmail = 'unique:users,email';
            $uniqueNoHp = 'unique:users,no_hp';
        } elseif ($process === 'update') {
            $uniqueEmail = 'unique:users,email,' . $request->user->id;
            $uniqueNoHp = 'unique:users,no_hp,' . $request->user->id;
        }

        $request->validate([
            'nama'    => 'required|string|max:100',
            'email'   => 'required|string|max:100|email:rfc,dns|' . $uniqueEmail,
            'alamat'  => 'required|string|max:150',
            'no_hp'   => 'required|numeric|digits_between:11,13|' . $uniqueNoHp,
        ]);
    }


    // simpan pengguna
    public function store(Request $request)
    {
        // 1. Validasi data pengguna
        $this->validatePengguna('store', $request);

        // 2. Simpan data pengguna ke database
        User::create([
            'nama'      => $request->nama,
            'email'     => $request->email,
            'alamat'    => $request->alamat,
            'password'  => bcrypt('password'),
            'no_hp'     => $request->no_hp,
        ]);

        // 3. Redirect ke halaman pengguna dengan pesan sukses
        return redirect('/pengguna')->with('success', 'Data Pengguna berhasil ditambahkan.');
    }


    // edit pengguna
    public function edit(User $user)
    {
        $profile = User::find(session('id'));

        if ($profile->role != 'admin') {
            return redirect('/dashboard')->with('warning', 'Anda tidak memiliki akses ke halaman Pengguna.');
        }

        return view('pengguna/edit', [
            'title' => 'Pengguna',
            'profile' => $profile,
            'user' => $user,
        ]);
    }


    // update pengguna
    public function update(User $user, Request $request)
    {
        // 1. Validasi data pengguna
        $this->validatePengguna('update', $request);

        // 2. Update data pengguna di database
        $user->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);

        // 3. Redirect ke halaman pengguna dengan pesan sukses
        return redirect('/pengguna')->with('success', 'Data Pengguna berhasil diubah.');
    }


    // delete pengguna
    public function destroy(User $user)
    {
        $jumlahTransaksi = Transaksi::where('user_id', $user->id)->count();

        if ($jumlahTransaksi > 0) {
            return redirect('/pengguna')->with('error', 'Data Pengguna tidak dapat dihapus karena masih memiliki transaksi.');
        }

        $user->delete();
        return redirect('/pengguna')->with('success', 'Data Pengguna berhasil dihapus.');
    }
}
