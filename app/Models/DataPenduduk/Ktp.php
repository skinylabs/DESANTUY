<?php

namespace App\Models\DataPenduduk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ktp extends Model
{
    use HasFactory;

    protected $table = 'ktp';

    protected $fillable = [
        'nik',            // Nomor KTP
        'nama',           // Nama lengkap
        'jenis_kelamin',  // Jenis kelamin
        'tanggal_lahir',  // Tanggal lahir
        'alamat',         // Alamat lengkap
        'agama',          // Agama
    ];

    // Relasi: KTP milik satu KK
    public function kk()
    {
        return $this->belongsTo(Kk::class);
    }

    // Relasi: KTP memiliki satu KK Member
    public function kkMember()
    {
        return $this->hasOne(KkMember::class);
    }
}
