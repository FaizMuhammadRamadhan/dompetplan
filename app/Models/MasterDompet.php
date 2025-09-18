<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasterDompet extends Model
{
    use HasFactory;

    protected $table = 'master_dompet';

    protected $fillable = [
        'nama_dompet',
    ];
}
