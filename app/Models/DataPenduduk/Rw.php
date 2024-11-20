<?php

namespace App\Models\DataPenduduk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    use HasFactory;

    protected $table = 'rw';

    protected $fillable = [
        'nomer_rw',
    ];

    // Relasi: RW memiliki banyak Dusun
    public function dusuns()
    {
        return $this->hasMany(Dusun::class);
    }

    // Relasi: RW memiliki banyak RT
    public function rts()
    {
        return $this->hasMany(Rt::class);
    }
}
