<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;


    protected $fillable = [
        'photoPlayer',
        'namePlayer',
        'agePlayer',
        'addresPlayer',
        'phonePlayer',
    ];

   /* public function winners ()
    {
       return $this->hasMany(Winner::class);
    }*/

    public function champions (){

        return $this->belongsToMany(Champion::class, 'winners','player_id','championship_id');

    }
}
