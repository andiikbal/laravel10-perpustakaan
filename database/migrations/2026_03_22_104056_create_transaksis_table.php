<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('buku_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('status', 50)->default('pengajuan');
            $table->date('tanggal_pengajuan');
            $table->date('tanggal_peminjaman')->nullable();
            $table->date('tanggal_pengembalian')->nullable();
            $table->timestamps();

            $table->foreign('buku_id')->references('id')->on('bukus')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
