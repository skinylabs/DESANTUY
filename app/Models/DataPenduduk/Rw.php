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
        'dusun_id',
    ];

    // Relasi: RW memiliki banyak Dusun
    public function dusun()
    {
        return $this->belongsTo(Dusun::class);
    }

    public function rt()
    {
        return $this->hasMany(Rt::class);
    }
}
