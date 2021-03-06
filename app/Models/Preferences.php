<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Preferences extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'preferences';
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];
    /**
     * Fillable fields for a Profile.
     *
     * @var array
     */
    protected $fillable = [
        'dietary_mode',
        'preferred_price_range',
        'preferred_radius_size',
    ];
    /**
     * A profile belongs to a user.
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}