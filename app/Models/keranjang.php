<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $fillable = ['nft_id', 'user_id'];
    public function nft()
    {
        return $this->belongsTo(Nft::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
