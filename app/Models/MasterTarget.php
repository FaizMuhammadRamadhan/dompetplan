<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasterTarget extends Model
{
    use HasFactory;

    protected $table = 'master_target';

    protected $fillable = [
        'nama_target',
        'nominal_target',
        'tanggal_mulai',
        'tanggal_berakhir'
    ];
}
