<?php

namespace App\Models\DataPenduduk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kk extends Model
{
    use HasFactory;

    protected $table = 'kk';

    protected $fillable = [
        'rw_id',             // ID RW
        'nomer_kk',          // Nomor KK
        'kepala_keluarga',   // Nama kepala keluarga
        'alamat',            // Alamat keluarga
        'jumlah_anggota_keluarga',  // Jumlah anggota keluarga
    ];

    // Relasi: KK memiliki banyak KTP (anggota keluarga)
    public function ktps()
    {
        return $this->hasMany(Ktp::class);
    }

    // Relasi: KK memiliki banyak anggota keluarga
    public function kkMembers()
    {
        return $this->hasMany(KkMember::class);
    }

    // Relasi: KK milik satu RW
    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }
}
