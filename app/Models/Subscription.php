<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable =
    ["id","player_id","subtype","offers_id","basic_amount","basic_paid","basic_rest","start_subscription","end_subscription"];



    public function players(){
        return $this->belongsTo(Player::class);
    }

    public function offers()
    {
        return $this->belongsTo(offer::class);
    }
}