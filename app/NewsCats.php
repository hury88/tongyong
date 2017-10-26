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

    // 获取导航 默认返回全部 传pid则返回对应子级
    public function getNavigation($field = ['catname','path'], $pid = null)
    {
        if (is_null($pid)) {
            return $this->where('id', '<=', 5)
                ->orderBy('disorder', 'desc')
                ->orderBy('id', 'asc')
                ->get($field);
        } else {
            return $this->where('pid',$pid)
                ->orderBy('disorder', 'desc')
                ->orderBy('id', 'asc')
                ->get($field);
        }
    }
}
