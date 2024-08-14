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
        Schema::create('master_karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('NIK', 16)->unique();
            $table->string('nama_karyawan')->unique();
            $table->string('email')->nullable();
            $table->text('alamat')->nullable();
            $table->Integer('nomor_telepon')->nullable();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('foto_karyawan')->nullable();
            $table->date('tanggal_awal_bekerja')->nullable();
            $table->date('tanggal_akhir_bekerja')->nullable();
            $table->Integer('id_jabatan');
            $table->Integer('id_departemen')->nullable();
            $table->enum('status_karyawan', ['A', 'N'])->default('A');
            $table->enum('status', ['A', 'N'])->default('A');
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_karyawan');
    }
};
