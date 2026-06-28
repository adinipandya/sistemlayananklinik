<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RekamMedis;

class JadwalKonsultasi extends Model
{
    protected $table = 'jadwal_konsultasi';

    protected $fillable = [

        'user_id',

        'dokter_id',

        'tanggal',

        'jam',

        'keluhan',

        'status',
        'nomor_antrian',

    ];

    public function pasien()
    {
        return $this->belongsTo(
            User::class,
            'user_id'
        );
    }

    public function dokter()
    {
        return $this->belongsTo(
            Dokter::class,
            'dokter_id'
        );
    }

    public function rekamMedis()
    {
        return $this->hasOne(
            RekamMedis::class,
            'jadwal_konsultasi_id'
        );
    }
}
