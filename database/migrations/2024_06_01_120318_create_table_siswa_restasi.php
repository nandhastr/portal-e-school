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
        // Membuat tabel siswa_berprestasi
        Schema::create('tbl_siswa_berprestasi', function (Blueprint $table) {
            $table->id();
            $table->string('prestasi');
            $table->enum('kategori', ['akademik','non_akademik']);
            $table->year('tahun');
            $table->timestamps();
            $table->foreignId('siswa_id')->constrained('tbl_siswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_siswa_berprestasi');
    }
};
