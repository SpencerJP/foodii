<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'user_type',
    ];

    /**
     * User Preferences
     *
     * @return mixed
     */
    public function preferences()
    {
        return $this->hasOne('App\Models\Preferences');
    }

    /**
     * User Preferences
     *
     * @return bool 
     */
    public function isAdmin()
    {
        if ($this->user_type == 'admin')
        {
            return true;
        }
        else 
        {
            return false;
        }
    }

    public function isRestaurantOwner()
    {
        if ($this->user_type == 'restaurant_owner')
        {
            return true;
        }
        else 
        {
            return false;
        }
    }

    public function isCustomer()
    {
        if ($this->isRestaurantOwner()) {
            return false;
        }
        if ($this->isAdmin()) {
            return false;
        }
        return true;
        //return ( !($this->isAdmin() or $this->isRestaurantOwner()));
    }

    public function getUserTypeToString()
    {
        if ($this->isRestaurantOwner())
        {
            return "Restaurant Owner";
        }
        if ($this->isAdmin())
        {
            return "Admin";
        }
        return "Customer";
    }


}
