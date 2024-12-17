<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananSaya extends Model
{
    use HasFactory;

    protected $table = 'pesanan_saya';

    protected $fillable = [
        'user_id',
        'nft_id',
        'status',
    ];

    public function nft()
    {
        return $this->belongsTo(Nft::class);
    }
}
