<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dompet', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')
                  ->constrained('pengguna')
                  ->onDelete('cascade');
            $table->string('nama_dompet', 50); 
            $table->string('jenis_dompet', 20);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dompet');
    }
};
