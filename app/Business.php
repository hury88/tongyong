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
    protected $fillable = [
        'user_id',
        'business_name',
        'business_introduction',
        'business_time',
        'registerid',
        'legal',
        'contact',
        'img',
        'headimg',
        'creation_date',
        'qq',
        'weixin',
        'location',
        'has1',
        'has2',
        'certified_status',
        'logo',
        'jing',
        'wei',
        'siteurl',
        'cate',
        'nature',
        'size',
    ];
    /**
     * Get business user.
     *
     * @return belongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function v_pages($business_name,$field=['*'],$num=15,$linknum=5){
        return $this
            ->where('has2','=' ,'1')
            ->where(function($query) use($business_name){
                if($business_name) {
                    $query->where('business_name','like' ,'%'.$business_name.'%');
                }
            })
            ->latest('disorder')
            ->latest('user_id')
            ->select($field)
            ->paginate($num)
            ->toArray($linknum);
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
        return $this->business_name;
    }
}
