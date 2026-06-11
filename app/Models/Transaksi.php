<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User as Siswa;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'buku_id',
        'status',
        'tanggal_pengajuan',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
    ];

    public function user()
    {
        return $this->belongsTo(Siswa::class, 'user_id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
