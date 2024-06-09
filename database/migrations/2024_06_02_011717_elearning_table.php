<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */ public function up(): void
    {
        // Tabel untuk menyimpan data kelas
        Schema::create('tbl_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tingkat');
            $table->timestamps();
        });

        // Tabel untuk menyimpan data siswa
        Schema::create('tbl_siswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kelas')->nullable(); // Tambahkan kolom untuk kelas
            $table->foreign('id_kelas')->references('id')->on('tbl_kelas')->onDelete('cascade'); // Relasi ke tabel kelas
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('angkatan')->nullable();
            $table->string('status')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('foto')->nullable();
            $table->string('sekolah_sebelumnya')->nullable();
            $table->string('nisn')->nullable();
            $table->string('phone')->nullable();
            $table->enum('gender', ['Laki-laki', 'Perempuan'])->nullable();
            $table->year('tahun_masuk')->nullable();
            $table->string('kelas_sekarang')->nullable();
            $table->string('status_beasiswa')->nullable();
            $table->text('catatan_prestasi')->nullable();
            $table->text('catatan_disiplin')->nullable();
            $table->text('informasi_kesehatan')->nullable();
            $table->timestamps();
        });

        // Tabel untuk menyimpan data guru
        Schema::create('tbl_guru', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('spesialisasi')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->string('phone')->nullable();
            $table->enum('gender', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('photo')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->string('kualifikasi')->nullable();
            $table->integer('pengalaman')->nullable();
            $table->timestamps();
        });

        // Tabel untuk menyimpan materi-materi mata pelajaran
        Schema::create('tbl_materi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kelas')->nullable();
            $table->string('judul');
            $table->text('konten')->nullable();
            $table->string('mata_pelajaran')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamps();
            $table->foreign('id_kelas')->references('id')->on('tbl_kelas')->onDelete('cascade');
        });

        // Tabel untuk menyimpan tugas-tugas yang diunggah oleh siswa
        Schema::create('tbl_tugas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_kelas');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('file_path')->nullable();
            $table->date('deadline')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_siswa')->references('id')->on('tbl_siswa')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id')->on('tbl_kelas')->onDelete('cascade');
        });

        // Tabel untuk menyimpan pertanyaan-pertanyaan dalam ujian
        Schema::create('tbl_pertanyaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kelas')->nullable();
            $table->unsignedBigInteger('id_materi')->nullable();
            $table->enum('type', ['UTS', 'UAS', 'UN'])->nullable();
            $table->text('pertanyaan');
            $table->integer('durasi');
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai');
            $table->timestamps();
            // Menambahkan foreign key constraint
            $table->foreign('id_kelas')->references('id')->on('tbl_kelas')->onDelete('cascade');
            $table->foreign('id_materi')->references('id')->on('tbl_materi')->onDelete('cascade');
        });


        // Tabel untuk menyimpan opsi jawaban untuk setiap pertanyaan
        Schema::create('tbl_opsi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pertanyaan');
            $table->foreign('id_pertanyaan')->references('id')->on('tbl_pertanyaan')->onDelete('cascade');
            $table->text('opsi');
            $table->boolean('benar')->default(false);
            $table->timestamps();
        });

        // Tabel untuk menyimpan jawaban yang diberikan oleh siswa untuk setiap pertanyaan
        Schema::create('tbl_jawaban_pengguna', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_materi');
            $table->unsignedBigInteger('id_pertanyaan');
            $table->unsignedBigInteger('id_kelas');
            $table->unsignedBigInteger('id_tugas');
            $table->unsignedBigInteger('id_opsi');
            $table->text('jawaban')->nullable();
            $table->decimal('nilai', 5, 2)->nullable();
            $table->enum('status', ['lulus', 'tidak lulus']);
            $table->timestamps();
            $table->foreign('id_siswa')->references('id')->on('tbl_siswa')->onDelete('cascade');
            $table->foreign('id_materi')->references('id')->on('tbl_materi')->onDelete('cascade');
            $table->foreign('id_pertanyaan')->references('id')->on('tbl_pertanyaan')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id')->on('tbl_kelas')->onDelete('cascade');
            $table->foreign('id_tugas')->references('id')->on('tbl_tugas')->onDelete('cascade');
            $table->foreign('id_opsi')->references('id')->on('tbl_opsi')->onDelete('cascade');
        });


        // Tabel untuk menyimpan kegiatan yang diikuti oleh siswa
        Schema::create('tbl_kegiatan_pengguna', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->foreign('id_siswa')->references('id')->on('tbl_siswa')->onDelete('cascade');
            $table->string('kegiatan');
            $table->date('tanggal_kegiatan');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        // Tabel untuk menyimpan penghargaan yang diterima oleh siswa
        Schema::create('tbl_penghargaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->foreign('id_siswa')->references('id')->on('tbl_siswa')->onDelete('cascade');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal_diterima');
            $table->timestamps();
        });

        // tabel mneyiimpan informasi tentang kompetisi yang diikuti oleh siswa
        Schema::create('tbl_kompetisi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->foreign('id_siswa')->references('id')->on('tbl_siswa')->onDelete('cascade');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal_partisipasi');
            $table->string('hasil')->nullable();
            $table->timestamps();
        });
        // Tabel untuk menyimpan informasi tentang acara yang diikuti oleh siswa
        Schema::create('tbl_acara', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->foreign('id_siswa')->references('id')->on('tbl_siswa')->onDelete('cascade');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal_acara');
            $table->string('lokasi')->nullable();
            $table->timestamps();
        });

        // Tabel untuk menyimpan log kegiatan pengguna
        Schema::create('tbl_log_pengguna', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('aksi');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        // Tabel untuk menyimpan pengumuman
        Schema::create('tbl_pengumuman', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('konten');
            $table->timestamps();
        });
        // Tabel untuk menyimpan nilai
        Schema::create('tbl_nilai', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis', ['tugas', 'UTS', 'UAS', 'UN'])->nullable();
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_materi');
            $table->unsignedBigInteger('id_pertanyaan')->nullable();
            $table->unsignedBigInteger('id_tugas')->nullable();
            $table->unsignedBigInteger('id_kelas')->nullable();
            $table->decimal('nilai', 5, 2);
            $table->timestamps();

            $table->foreign('id_siswa')->references('id')->on('tbl_siswa')->onDelete('cascade');
            $table->foreign('id_materi')->references('id')->on('tbl_materi')->onDelete('cascade');
            $table->foreign('id_pertanyaan')->references('id')->on('tbl_pertanyaan')->onDelete('cascade');
            $table->foreign('id_tugas')->references('id')->on('tbl_tugas')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id')->on('tbl_kelas')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('tbl_nilai');
        Schema::dropIfExists('tbl_pengumuman');
        Schema::dropIfExists('tbl_log_pengguna');
        Schema::dropIfExists('tbl_acara');
        Schema::dropIfExists('tbl_kompetisi');
        Schema::dropIfExists('tbl_penghargaan');
        Schema::dropIfExists('tbl_kegiatan_pengguna');
        Schema::dropIfExists('tbl_jawaban_pengguna');
        Schema::dropIfExists('tbl_opsi');
        Schema::dropIfExists('tbl_pertanyaan');
        Schema::dropIfExists('tbl_tugas');
        Schema::dropIfExists('tbl_materi');
        Schema::dropIfExists('tbl_guru');
        Schema::dropIfExists('tbl_siswa');
        Schema::dropIfExists('tbl_kelas');
    }
};
