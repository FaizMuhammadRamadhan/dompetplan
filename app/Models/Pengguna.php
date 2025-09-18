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
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function dompet()
    {
        return $this->hasMany(Dompet::class, 'pengguna_id');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'pengguna_id');
    }

    public function tanggungan()
    {
        return $this->hasMany(Tanggungan::class, 'pengguna_id');
    }

    public function target()
    {
        return $this->hasMany(Target::class, 'pengguna_id');
    }

    public function tabunganTarget()
    {
        return $this->hasMany(TabunganTarget::class, 'pengguna_id');
    }
}
