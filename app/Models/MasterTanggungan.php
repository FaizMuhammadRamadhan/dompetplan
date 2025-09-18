<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasterTanggungan extends Model
{
    use HasFactory;

    protected $table = 'master_tanggungan';

    protected $fillable = [
        'nama_tanggungan',
        'tagihan_perbulan',
        'lama_cicilan',
        'tanggal_mulai',
        'tanggal_jatuh_tempo_perbulan',
    ];
}
