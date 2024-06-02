<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabel untuk menyimpan data siswa
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('class_id')->nullable();
            $table->string('batch')->nullable();
            $table->string('internship_status')->nullable();
            $table->timestamps();
        });

        // Tabel untuk menyimpan data guru
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('specialization')->nullable();
            $table->timestamps();
        });

        // Tabel untuk menyimpan materi-materi mata pelajaran
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content')->nullable();
            $table->string('subject')->nullable();
            $table->timestamps();
        });

        // Tabel untuk menyimpan tugas-tugas yang diunggah oleh siswa
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('file_path')->nullable();
            $table->date('deadline')->nullable();
            $table->string('status');
            $table->timestamps();
        });

        // Tabel untuk menyimpan informasi ujian pilihan ganda
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subject')->nullable();
            $table->integer('duration')->nullable();
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->timestamps();
        });

        // Tabel untuk menyimpan pertanyaan-pertanyaan dalam ujian
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->timestamps();
        });

        // Tabel penyambung untuk menyimpan keterhubungan antara ujian dan pertanyaan
        Schema::create('exam_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_id');
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->timestamps();
        });

        // Tabel untuk menyimpan opsi jawaban untuk setiap pertanyaan
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->text('option');
            $table->boolean('is_correct')->default(false);
            $table->timestamps();
        });

        // Tabel untuk menyimpan jawaban yang diberikan oleh siswa untuk setiap pertanyaan
        Schema::create('user_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->unsignedBigInteger('option_id')->nullable();
            $table->foreign('option_id')->references('id')->on('options')->onDelete('cascade');
            $table->timestamps();
        });



        // Tabel untuk menyimpan kegiatan yang diikuti oleh siswa
        Schema::create('user_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->string('activity');
            $table->date('activity_date');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Tabel untuk menyimpan penghargaan yang diterima oleh siswa
        Schema::create('awards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('date_received');
            $table->timestamps();
        });

        // Tabel untuk menyimpan informasi tentang kompetisi yang diikuti oleh siswa
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('date_participated');
            $table->string('result')->nullable();
            $table->timestamps();
        });

        // Tabel untuk menyimpan informasi tentang acara yang diikuti oleh siswa
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('event_date');
            $table->string('location')->nullable();
            $table->timestamps();
        });

        // Tabel untuk menyimpan log kegiatan pengguna
        Schema::create('user_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('action');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Tabel untuk menyimpan pengumuman
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
        Schema::dropIfExists('teachers');
        Schema::dropIfExists('materials');
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('exams');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('exam_questions');
        Schema::dropIfExists('user_answers');
        Schema::dropIfExists('options');
        Schema::dropIfExists('user_activities');
        Schema::dropIfExists('awards');
        Schema::dropIfExists('competitions');
        Schema::dropIfExists('events');
        Schema::dropIfExists('user_logs');
        Schema::dropIfExists('announcements');
        
    }
};
