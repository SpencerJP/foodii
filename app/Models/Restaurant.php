<?php

namespace App\Models;

use App\Models\Franchise;

class Restaurant extends Franchise
{
    /**
     * 
     * @return the tags that this restaurant has
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'restaurant_tags');
    }
}
