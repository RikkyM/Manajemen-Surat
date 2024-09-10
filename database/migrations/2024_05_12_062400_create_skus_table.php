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
        Schema::create('sku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama');
            $table->string('nik');
            $table->string('upload_kk');
            $table->string('alamat');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('kewarganegaraan');
            $table->string('pekerjaan');
            $table->enum('status', [0, 1, 2])->default(0)->note('0: data sedang diperiksa, 1: data sudah lengkap, 2: data tidak lengkap');
            $table->enum('keterangan', [0, 1, 2])->default(0)->note('0: menunggu konfirmasi, 1: sudah dikonfirmasi, 2: surat selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sku');
    }
};
