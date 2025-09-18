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
        Schema::create('master_tanggungan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tanggungan', 100);   
            $table->integer('tagihan_perbulan');      
            $table->integer('lama_cicilan');          
            $table->date('tanggal_mulai');            
            $table->integer('tanggal_jatuh_tempo_perbulan');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_tanggungan');
    }
};
