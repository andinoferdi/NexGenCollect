<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NftUser extends Model
{
    use HasFactory;

    protected $table = 'nft_user';

    protected $fillable = ['user_id', 'nft_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function nft()
    {
        return $this->belongsTo(Nft::class);
    }
}
