<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;
    protected $fillable = [

        'photoCoach',
        'nameCoach',
        'ageCoach',
        'addresCoach',
        'phoneCoach',
        'timeCoach',
        'shipCoach',
        'salaryCoach',
        'QRCodeCoach',
        'freeCoach',
    ];

    /* public function week()
    {
        return $this->belongsTo(Week::class);
    }*/
}
