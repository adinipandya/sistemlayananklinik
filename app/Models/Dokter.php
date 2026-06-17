<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JadwalKonsultasi;

class Dokter extends Model
{
    protected $fillable = [
    'nama',
    'no_sip',
    'spesialis',
    'no_hp',
    'email',
    'status'

    ];

    public function jadwalKonsultasi()
{
    return $this->hasMany(
        JadwalKonsultasi::class,
        'dokter_id'
    );
}
}