<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\JadwalKonsultasi;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'foto',
        'nik',
        'no_hp',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'golongan_darah',
        'alergi',
        'kontak_darurat'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function jadwalKonsultasi()
    {
        return $this->hasMany(
            JadwalKonsultasi::class,
            'user_id'
        );
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}