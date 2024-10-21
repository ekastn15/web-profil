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
        Schema::create('dinas', function (Blueprint $table) {
            $table->id('id_dinas');
            $table->string('opd_id');
            $table->string('KODE_SATKER', 3);
            $table->string('NAMA_SATKER', 100);
            $table->string('alamat', 100);
            $table->string('tugas_fungsi');
            $table->string('visi_misi');
            $table->string('logo');
            $table->string('gambar_lokasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dinas');
    }
};
