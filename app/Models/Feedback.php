<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Feedback extends Model
{
    protected $table = 'feedback';

    protected $fillable = [
        'user_id',
        'kategori',
        'rating',
        'komentar',
        'respon',
        'status'
    ];

    public function user()
{
    return $this->belongsTo(
        User::class
    );
}
}