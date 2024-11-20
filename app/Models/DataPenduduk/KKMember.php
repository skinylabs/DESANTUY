<?php

namespace App\Models\DataPenduduk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KkMember extends Model
{
    use HasFactory;

    protected $table = 'kk_members';

    protected $fillable = [
        'kk_id',         // ID Kartu Keluarga
        'ktp_id',        // ID KTP
        'relationship',   // Hubungan anggota dengan kepala keluarga
    ];

    // Relasi: KK Member milik satu KK
    public function kk()
    {
        return $this->belongsTo(Kk::class);
    }

    // Relasi: KK Member memiliki satu KTP
    public function ktp()
    {
        return $this->belongsTo(Ktp::class);
    }
}
