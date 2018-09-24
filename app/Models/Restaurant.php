<?php

namespace App\Models;

use App\Models\Franchise;

class Restaurant extends Franchise
{

	protected $fillable = [
        'longitude', 'latitude', 'phone_number', 'logo_image', 'restaurant_image'
    ];
    /**
     * 
     * @return the tags that this restaurant has
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'restaurant_tags');
    }
}
