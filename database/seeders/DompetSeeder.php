<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengguna;
use App\Models\Dompet;

class DompetSeeder extends Seeder
{
    public function run(): void
    {
        $pengguna = Pengguna::first();

        Dompet::create([
            'pengguna_id' => $pengguna->id,
            'nama_dompet' => 'Dompet Cash',
            'jenis_dompet' => 'cash',
        ]);

        Dompet::create([
            'pengguna_id' => $pengguna->id,
            'nama_dompet' => 'Dompet Saldo',
            'jenis_dompet' => 'saldo',
        ]);
    }
}
