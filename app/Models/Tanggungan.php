<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggungan extends Model
{
    use HasFactory;

    protected $table = 'tanggungan';

    protected $fillable = [
        'pengguna_id',
        'nama_tanggungan',
        'lama_bulan',
        'tagihan_per_bulan',
        'tanggal_mulai',
        'tanggal_jatuh_tempo',
    ];

    // Relasi ke Pengguna
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    // Relasi ke Transaksi
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'tanggungan_id');
    }
}
