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
        Schema::create('tbl_pivot_siswa_kelas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_kelas');
            $table->foreign('id_siswa')->references('id')->on('tbl_siswa')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id')->on('tbl_kelas')->onDelete('cascade');
            $table->unique(['id_siswa', 'id_kelas']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_pivot_siswa_kelas');
    }
};
