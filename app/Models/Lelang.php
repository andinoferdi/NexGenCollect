<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    use HasFactory;

    protected $table = 'lelangs';

    protected $fillable = [
        'nft_id',
        'tanggal_awal',
        'tanggal_akhir',
        'status',
    ];

  
    public function nft()
    {
        return $this->belongsTo(Nft::class, 'nft_id');
    }


    public function penawaranLelangs()
    {
        return $this->hasMany(PenawaranLelang::class, 'lelang_id');
    }

    public function penawaranTertinggi()
    {
        return $this->hasOne(PenawaranLelang::class, 'lelang_id')
            ->orderBy('harga', 'desc');
    }
}
