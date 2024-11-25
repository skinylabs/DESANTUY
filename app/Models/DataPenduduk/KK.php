<?php

namespace App\Models\DataPenduduk;

use App\Models\DataGeografis\Rw;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kk extends Model
{
    use HasFactory;

    protected $table = 'kk';

    protected $fillable = [
        'nomer_kk',
        'nik',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'golongan_darah',
        'agama',
        'status_perkawinan',
        'status_hubungan_keluarga',
    ];

    // Relasi: KK memiliki banyak KTP
    public function ktps()
    {
        return $this->hasMany(Ktp::class); // Relasi One-to-Many
    }
}
