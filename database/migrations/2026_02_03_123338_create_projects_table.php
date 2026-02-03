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
    Schema::create('projects', function (Blueprint $table) {
        $table->id(); // ID otomatis
        $table->string('title'); // Judul project
        $table->text('description'); // Deskripsi panjang
        $table->string('image')->nullable(); // Gambar, boleh kosong
        $table->timestamps(); // created_at & updated_at
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
