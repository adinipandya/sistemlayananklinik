<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResepObat extends Model
{
    protected $table = 'resep_obat';

    protected $fillable = [

        'rekam_medis_id',
        'nama_obat',
        'jumlah',
        'aturan_pakai'
    ];

    public function rekamMedis()
    {
        return $this->belongsTo(
            RekamMedis::class,
            'rekam_medis_id'
        );
    }

}
