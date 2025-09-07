<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabunganTarget extends Model
{
    use HasFactory;

    protected $table = 'tabungan_target';

    protected $fillable = [
        'target_id',
        'pengguna_id',
        'jumlah',
        'tanggal',
    ];

    // Relasi ke Pengguna
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    // Relasi ke Target
    public function target()
    {
        return $this->belongsTo(Target::class, 'target_id');
    }
}
