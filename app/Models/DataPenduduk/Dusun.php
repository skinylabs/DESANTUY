<?php

namespace App\Models\DataPenduduk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    use HasFactory;

    protected $table = 'dusun';

    protected $fillable = [
        'nama_dusun',
        'rw_id',  // FK yang menghubungkan ke RW
    ];

    // Relasi: Dusun memiliki banyak RT
    public function rt()
    {
        return $this->hasMany(Rt::class);
    }

    // Relasi: Dusun milik satu RW
    public function rw()
    {
        return $this->hasMany(Rw::class);
    }
}
