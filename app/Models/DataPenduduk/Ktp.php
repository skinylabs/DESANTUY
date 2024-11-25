<?php

namespace App\Models\DataPenduduk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ktp extends Model
{
    use HasFactory;

    protected $table = 'ktp';

    protected $fillable = [
        'kk_id',
        'nik',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'golongan_darah',
        'agama',
        'alamat',
        'pekerjaan',
        'kewarganegaraan',
        'pas_foto',
    ];

    // Relasi: KTP milik satu KK
    public function kk()
    {
        return $this->belongsTo(Kk::class); // Relasi Many-to-One
    }
}
