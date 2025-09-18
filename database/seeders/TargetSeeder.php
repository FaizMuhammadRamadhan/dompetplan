<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengguna;
use App\Models\Target;

class TargetSeeder extends Seeder
{
    public function run(): void
    {
        $pengguna = Pengguna::first();

        Target::create([
            'pengguna_id' => $pengguna->id,
            'nama_target' => 'Beli Motor',
            'jumlah_target' => 10000000,
            'tanggal_target' => '2025-12-31',
        ]);
    }
}
