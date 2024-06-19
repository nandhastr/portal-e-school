<?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('tbl_pivot_siswa_ruangkelas', function (Blueprint $table) {
//             $table->id();
//             $table->unsignedBigInteger('id_siswa');
//             $table->unsignedBigInteger('id_ruangkelas');
//             $table->foreign('id_siswa')->references('id')->on('tbl_siswa')->onDelete('cascade');
//             $table->foreign('id_ruangkelas')->references('id')->on('tbl_ruangKelas')->onDelete('cascade');

//             $table->unique(['id_siswa', 'id_ruangkelas']);
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('tbl_pivot_siswa_ruangkelas');
//     }
// };
