<?php

namespace app;

/*
 * Antvel - Business Model
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use App\Eloquent\Model;
use App\User;

class Business extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'businesses';
    public $timestamps = false;
    public $primaryKey = 'user_id';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'business_name', 'contact', 'creation_date'];

    /**
     * Get business user.
     *
     * @return belongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getAgeAttribute()
    {
        return \Carbon\Carbon::parse($this->creation_date)->age;
    }

    public function getHasPhoneAttribute()
    {
        return !is_null($this->local_phone);
    }

    public function getFullNameAttribute()
    {
        return "$this->business_name";
    }
}
