<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ResepObat;

class RekamMedis extends Model
{
    protected $table = 'rekam_medis';

    protected $fillable = [

        'jadwal_konsultasi_id',

        'tekanan_darah',

        'suhu_tubuh',

        'berat_badan',

        'tinggi_badan',

        'diagnosa',

        'tindakan',

        'catatan'
    ];

    public function jadwal()
    {
        return $this->belongsTo(
            JadwalKonsultasi::class,
            'jadwal_konsultasi_id'
        );
    }

    public function resepObat()
    {
        return $this->hasMany(
            ResepObat::class,
            'rekam_medis_id'
        );
    }
}
