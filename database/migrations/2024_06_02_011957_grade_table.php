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
        // tabel untuk menyimpan nilai
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['tugas', 'UTS', 'UAS', 'UN'])->nullable();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('exam_id')->nullable();
            $table->unsignedBigInteger('task_id')->nullable();
            $table->decimal('grade', 5, 2);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade')->nullOnDelete(); // Tambahkan nullOnDelete
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade')->nullOnDelete(); // Tambahkan nullOnDelete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
