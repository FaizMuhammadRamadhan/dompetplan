<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'pengguna_id',
        'dompet_id',
        'jenis',
        'jumlah',
        'catatan',
        'tanggungan_id',
        'tanggal',
    ];

    // Relasi ke Pengguna
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    // Relasi ke Dompet
    public function dompet()
    {
        return $this->belongsTo(Dompet::class, 'dompet_id');
    }

    // Relasi ke Tanggungan (opsional)
    public function tanggungan()
    {
        return $this->belongsTo(Tanggungan::class, 'tanggungan_id');
    }
}
