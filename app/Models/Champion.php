<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Champion extends Model
{
    use HasFactory;
    protected $fillable =[
     'championName',
    ];

   /* public function winners ()
    {
       return $this->hasMany(Winner::class );
    }*/
    public function players(){
        return $this->belongsToMany(Player::class,'winners','champion_id','player_id');
    }
}
