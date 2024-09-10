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
        Schema::create('skk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama');
            $table->string('upload_kk');
            $table->string('alamat');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('tempat_meninggal');
            $table->date('tanggal_meninggal');
            $table->time('waktu_meninggal');
            $table->string('pekerjaan');
            $table->enum('status', [0, 1, 2])->default(0)->note('0: data sedang di periksa, 1: data sudah lengkap, 2: data belum lengkap');
            $table->enum('keterangan', [0, 1, 2])->default(0)->note('0: menunggu konfirmasi, 1: sudah di konfirmasi, 2: surat selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skk');
    }
};
