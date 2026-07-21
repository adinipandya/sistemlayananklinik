<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JadwalKonsultasi;

class Dokter extends Model
{
    protected $fillable = [
        'nama',
        'nik',
        'email',
        'no_str',
        'sip',
        'spesialis',
        'no_hp',
        'password',
        'status',
        'hari_praktek',
        'jam_praktek'
    ];

    public function jadwalKonsultasi()
    {
        return $this->hasMany(
            JadwalKonsultasi::class,
            'dokter_id'
        );
    }
}
