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
        Schema::create('master_departemen', function (Blueprint $table) {
            $table->id();
            $table->string('nama_departemen')->unique();
            $table->Integer('id_head_departemen')->nullable();
            $table->enum('status_departemen', ['A', 'N'])->default('A');
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
        Schema::dropIfExists('master_departemen');
    }
};
