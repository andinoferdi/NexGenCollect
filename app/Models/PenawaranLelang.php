<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenawaranLelang extends Model
{
    use HasFactory;

    protected $table = 'penawaran_lelangs';

    protected $fillable = [
        'user_id',
        'lelang_id',
        'harga',
    ];

  
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

 
    public function lelang()
    {
        return $this->belongsTo(Lelang::class, 'lelang_id');
    }
}
