<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
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

    /**
     * A profile belongs to a user.
     *
     * @return the user that this belongs to.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * 
     * @return the tags that this restaurant has
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
}
