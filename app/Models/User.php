<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
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
     * @return this user's preferences
     */
    public function preferences()
    {
        return $this->hasOne('App\Models\Preferences');
    }

    /**
     * User Preferences
     *
     * @return this user's restaurants
     */
        public function restaurants()
    {
        return $this->hasMany('App\Models\Restaurant');
    }
    /**
     * Is the user an admin
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
    /**
     * Is the user a restaurant owner
     *
     * @return bool
     */
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

    /**
     * Is the user a customer
     *
     * @return bool
     */
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

    /**
     * Returns a readable string of what kind of user this is
     *
     * @return String
     */
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

    public function result() {
      return $this->hasMany('App\Models\QuizResult');
    }




}
