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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->unique();
            $table->string('penulis', 100);
            $table->bigInteger('penerbit_id')->unsigned();
            $table->string('tahun', 4);
            $table->timestamps();

            $table->foreign('penerbit_id')->references('id')->on('penerbits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
