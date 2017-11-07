<?php

namespace app;

use App\Eloquent\Model;


class Enroll extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'enroll';

    public $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // $fillable属性和$guarded
    protected $fillable = [
    ];
    public static function get_count()
    {
        $keys = ['typeid', 'tid', 'uid'];
        $values = func_get_args();
        $relations = array_combine($keys, $values);
        $i = 0;
        foreach($relations as $key => $val) {
            if ($val) {
                if ($i==0) {
                    $query = self::where($key,$val);
                } else {
                    $query->where($key,$val);
                }
            }
            ++$i;
        }
        return $query->count();
    }
    public function scopeOfEncroll($query, $uid, $tid)
    {
        return $query->where('uid',$uid)->where('tid',$tid);
    }



}
