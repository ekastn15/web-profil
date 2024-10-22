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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id('id_karyawan');
            $table->string('name');
            $table->string('nip', 16);
            $table->string('jabatan');
            $table->string('bidang');
            $table->string('foto');
            $table->string('nomer_karyawan', 13);
            $table->unsignedBigInteger('id_dinas');
            $table->foreign('id_dinas')->references('id_dinas')->on('dinas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
