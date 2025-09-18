<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PenggunaSeeder::class,
            DompetSeeder::class,
            TanggunganSeeder::class,
            TargetSeeder::class,
            TransaksiSeeder::class,
            TabunganTargetSeeder::class,
        ]);
    }
}
