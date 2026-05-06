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
        Schema::create('jabatan_pengurus', function (Blueprint $table) {
            $table->unsignedBigInteger('pengurus_id');
            $table->unsignedBigInteger('jabatan_id');
            $table->year('tahun_kepengurusan');
            $table->integer('rank');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('jabatan_id')->references('id')->on('jabatans')->onDelete('cascade');
            $table->foreign('pengurus_id')->references('id')->on('pengurus')->onDelete('cascade');

            // Define primary key constraint (optional)
            $table->primary(['jabatan_id', 'pengurus_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jabatan_pengurus');
    }
};
