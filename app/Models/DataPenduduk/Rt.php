<?php

namespace App\Models\DataPenduduk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    use HasFactory;

    protected $table = 'rt';

    protected $fillable = [
        'nomer_rt',
        'dusun_id',  // FK yang menghubungkan ke Dusun
        'rw_id',  // FK yang menghubungkan ke RW
    ];

    // Relasi: RT milik satu Dusun
    public function dusun()
    {
        return $this->belongsTo(Dusun::class);
    }

    // Relasi: RT milik satu RW
    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }
}
