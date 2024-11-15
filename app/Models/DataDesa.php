<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_desa',
        'nomer_hp',
        'alamat',
        'email',
        'logo',
    ];
}
