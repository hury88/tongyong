<?php

namespace app;

use App\Eloquent\Model;

class NewsCats extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news_cats';

    public $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // $fillable属性和$guarded
    protected $fillable = [
    ];

    public static function v($id,$field=['*'])
    {
        if (is_array($field)) {
            return $this->find($id,$field);
        }
        return $this->find($id,$field)->$field;

    }
    /**
     * [parseWhere 解析条件]
     * @param  [type] $where [description]
     * @return [type]        [description]
     */
    private function parseWhere($where)
    {
        if ($count = count($where)) {
            if($count == 1) {
                return self::where('pid','=',$where[0]);
            } elseif($count == 2 && $where[1]) {
                return self::where('pid','=',$where[0])->where('ty','=',$where[1]);
            } elseif($where[2]) {
                return self::where('pid','=',$where[0])
                        ->where('ty','=',$where[1])
                        ->where('tty','=',$where[2]);
            }
        }
        throw new Exception('Model:News 条件解析出错 in parseWhere');

    }
}
