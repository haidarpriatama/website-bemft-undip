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
        Schema::create('pengurus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bidang_id')->nullable();
            $table->unsignedBigInteger('divisi_id')->nullable();
            $table->unsignedBigInteger('proker_id')->nullable();
            $table->unsignedBigInteger('jurusan_id');
            $table->string('tahun_kepengurusan');
            $table->string('nama');
            $table->string('nim');
            $table->string('angkatan');
            $table->string('foto')->nullable();
            $table->string('instagram')->nullable();
            $table->timestamps();

            $table->foreign('bidang_id')
                ->references('id')
                ->on('bidangs')->nullOnDelete();
            $table->foreign('divisi_id')
                ->references('id')
                ->on('divisis')->nullOnDelete();
            $table->foreign('proker_id')
                ->references('id')
                ->on('program_kerjas')->nullOnDelete();
            $table->foreign('jurusan_id')
                ->references('id')
                ->on('jurusans')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengurus');
    }
};
