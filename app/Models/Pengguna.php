<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
    use HasFactory;

    protected $table = 'pengguna';

    protected $fillable = [
        'nama',
        'email',
        'kata_sandi',
    ];

    protected $hidden = [
        'kata_sandi',
    ];

    // Relasi ke Dompet
    public function dompet()
    {
        return $this->hasMany(Dompet::class, 'pengguna_id');
    }

    // Relasi ke Transaksi
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'pengguna_id');
    }

    // Relasi ke Tanggungan
    public function tanggungan()
    {
        return $this->hasMany(Tanggungan::class, 'pengguna_id');
    }

    // Relasi ke Target
    public function target()
    {
        return $this->hasMany(Target::class, 'pengguna_id');
    }

    // Relasi ke Tabungan Target
    public function tabunganTarget()
    {
        return $this->hasMany(TabunganTarget::class, 'pengguna_id');
    }
}
