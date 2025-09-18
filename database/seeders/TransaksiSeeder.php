<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengguna;
use App\Models\Dompet;
use App\Models\Tanggungan;
use App\Models\Transaksi;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        $pengguna = Pengguna::first();
        $cash = Dompet::where('jenis_dompet', 'cash')->first();
        $saldo = Dompet::where('jenis_dompet', 'saldo')->first();
        $tanggungan = Tanggungan::first();

        Transaksi::create([
            'pengguna_id' => $pengguna->id,
            'dompet_id' => $cash->id,
            'jenis' => 'pemasukan',
            'jumlah' => 2000000,
            'catatan' => 'Gaji Bulanan',
            'tanggungan_id' => $tanggungan->id,
            'tanggal' => '2025-01-05',
        ]);

        Transaksi::create([
            'pengguna_id' => $pengguna->id,
            'dompet_id' => $saldo->id,
            'jenis' => 'pengeluaran',
            'jumlah' => 500000,
            'catatan' => 'Bayar Cicilan HP',
            'tanggungan_id' => $tanggungan->id,
            'tanggal' => '2025-01-20',
        ]);
    }
}
