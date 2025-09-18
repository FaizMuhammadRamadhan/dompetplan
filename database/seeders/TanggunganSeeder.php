<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengguna;
use App\Models\Tanggungan;

class TanggunganSeeder extends Seeder
{
    public function run(): void
    {
        $pengguna = Pengguna::first();

        Tanggungan::create([
            'pengguna_id' => $pengguna->id,
            'nama_tanggungan' => 'Kredit HP',
            'lama_bulan' => 6,
            'tagihan_per_bulan' => 500000,
            'tanggal_mulai' => '2025-01-01',
            'tanggal_jatuh_tempo' => 20,
        ]);
    }
}
