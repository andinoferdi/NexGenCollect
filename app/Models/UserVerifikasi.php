<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVerifikasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ktp_file',
        'portfolio_file',
        'deskripsi',
        'sosial_media_info',
        'status_verifikasi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
