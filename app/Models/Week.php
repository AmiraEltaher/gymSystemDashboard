<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;
    protected $fillable = [
        'day',
    ];

    /*   public function coaches()
    {
        return $this->hasMany(Coach::class);
    }*/
}
