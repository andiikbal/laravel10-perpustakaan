<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;

    protected $fillable = ['penerbit'];

    // 1 penerbit memiliki banyak buku
    public function bukus()
    {
        return $this->hasMany(Buku::class, 'penerbit_id');
    }
}
