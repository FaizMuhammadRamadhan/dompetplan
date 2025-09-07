<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('target', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')
                  ->constrained('pengguna')
                  ->onDelete('cascade');
            $table->string('nama_target', 100);
            $table->decimal('jumlah_target', 15, 2);
            $table->date('tanggal_target');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('target');
    }
};
