<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'penulis',
        'penerbit_id',
        'tahun',
    ];

    // 1 buku belongs to 1 penerbit
    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class);
    }

    // 1 buku bisa dipinjam oleh banyak pengguna
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
