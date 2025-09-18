<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengguna;
use App\Models\Target;
use App\Models\TabunganTarget;

class TabunganTargetSeeder extends Seeder
{
    public function run(): void
    {
        $pengguna = Pengguna::first();
        $target = Target::first();

        TabunganTarget::create([
            'pengguna_id' => $pengguna->id,
            'target_id' => $target->id,
            'jumlah' => 200000,
            'tanggal' => '2025-01-10',
        ]);
    }
}
