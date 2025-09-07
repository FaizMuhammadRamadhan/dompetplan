<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;

    protected $table = 'target';

    protected $fillable = [
        'pengguna_id',
        'nama_target',
        'jumlah_target',
        'tanggal_target',
    ];

    // Relasi ke Pengguna
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    // Relasi ke TabunganTarget
    public function tabunganTarget()
    {
        return $this->hasMany(TabunganTarget::class, 'target_id');
    }
}
