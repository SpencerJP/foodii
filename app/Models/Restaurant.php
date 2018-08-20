<?php

namespace App;

use App\Models\Franchise;

class Restaurant extends Franchise
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'rating', 
    ];
}
