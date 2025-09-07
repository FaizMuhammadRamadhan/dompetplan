<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tanggungan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')
                  ->constrained('pengguna')
                  ->onDelete('cascade');
            $table->string('nama_tanggungan', 100);
            $table->integer('lama_bulan'); 
            $table->decimal('tagihan_per_bulan', 15, 2);
            $table->date('tanggal_mulai');
            $table->integer('tanggal_jatuh_tempo'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tanggungan');
    }
};
