<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_users');
            $table->string('email', 25)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 225);
            $table->enum('role', ['operator', 'admin']);
            $table->rememberToken();
            $table->unsignedBigInteger('id_karyawan');
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawan')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
