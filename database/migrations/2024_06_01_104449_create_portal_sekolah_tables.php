<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortalSekolahTables extends Migration
{
    public function up()
    {
        // Membuat tabel pengumuman
        Schema::create('tbl_pengumuman', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('keterangan');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('tempat')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });

        // membuat tabel event kalender
        Schema::create('tbl_event', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->dateTime('start');
    $table->dateTime('end')->nullable();
    $table->string('backgroundColor')->nullable();
    $table->string('borderColor')->nullable();
    $table->timestamps();
});


        // Membuat tabel profil_sekolah
        Schema::create('tbl_profil_sekolah', function (Blueprint $table) {
            $table->id();
            $table->enum('kategori', ['tentang_sekolah', 'program_sekolah']);
            $table->text('konten');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });

        // Membuat tabel siswa
        Schema::create('tbl_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nis')->nullable(); 
            $table->string('nama')->nullable();
            $table->enum('genre',['laki-laki','Perempuan']);
            $table->string('kelas')->nullable();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });

        

        // Membuat tabel visi_misi
        Schema::create('tbl_visi_misi', function (Blueprint $table) {
            $table->id();
            $table->enum('kategori', ['visi', 'misi']);
            $table->text('konten');
            $table->timestamps();
        });


        // Membuat tabel guru
        Schema::create('tbl_guru', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('nama');
            $table->string('status');
            $table->enum('genre',['laki-laki','Perempuan']);
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jabatan');
            $table->string('email')->nullable();
            $table->string('telepon')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
        // Membuat tabel karyawan
        Schema::create('tbl_karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
           $table->string('nama');
           $table->string('status');
           $table->enum('genre',['laki-laki','Perempuan']);
           $table->string('tempat_lahir')->nullable();
           $table->date('tanggal_lahir')->nullable();
           $table->string('jabatan');
           $table->string('email')->nullable();
           $table->string('telepon')->nullable();
           $table->string('gambar')->nullable();
           $table->timestamps();
       });

        
        // Membuat tabel alumni
        Schema::create('tbl_alumni', function (Blueprint $table) {
            $table->id();
            $table->year('tahun_lulus');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });

        // Membuat tabel galeri_foto
        Schema::create('tbl_galeri', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('url');
            $table->date('tanggal_upload');
            $table->timestamps();
        });

        // Membuat tabel kegiatan
        Schema::create('tbl_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->enum('kategori', ['uks', 'osis', 'pramuka']);
            $table->string('judul');
            $table->string('tempat');
            $table->time('waktu');
            $table->date('tanggal');
            $table->text('deskripsi');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });

        // Membuat tabel artikel
        Schema::create('tbl_artikel', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();
            $table->enum('jenis', ['artikel', 'berita']);
            $table->string('judul');
            $table->text('isi');
            $table->date('tanggal');
            $table->timestamps();
        });
        Schema::create('tbl_struktur_org', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_guru')->constrained('tbl_guru')->onDelete('cascade');
            $table->string('jabatan')->nullable();
            $table->string('email')->nullable();
            $table->string('telepon')->nullable();
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('tbl_artikel');
        Schema::dropIfExists('tbl_kegiatan');
        Schema::dropIfExists('tbl_galeri_foto');
        Schema::dropIfExists('tbl_alumni');
        Schema::dropIfExists('tbl_struktur_org');
        Schema::dropIfExists('tbl_guru');
        Schema::dropIfExists('tbl_karyawan');
        Schema::dropIfExists('tbl_siswa');
        Schema::dropIfExists('tbl_profil_sekolah');
        Schema::dropIfExists('tbl_pengumuman');
        Schema::dropIfExists('tbl_komponen');
        Schema::dropIfExists('tbl_event');
    }
}
