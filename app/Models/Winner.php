<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    use HasFactory;
    protected $fillable=[
        'championship_id',
        'player_id',
    ];
    /*
    public function players()
    {
      return $this->belongsToMany(Player::class , 'player','championship_id', 'player_id');

    }
    public function champions()
    {
         return $this->belongsToMany(Champion::class , 'winners','player_id', 'championship_id' );
    }*/


}
