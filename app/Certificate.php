<?php

namespace app;

use Exception;
use App\Eloquent\Model;

class Certificate extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'certificate';

    public $primaryKey = 'id';

    public static $TEMPLATE_MAP = [
        '__URL__' => '\'.$URL.\'',
        '__DATE__' => '%date(\'Y-m-d\',%$sendtime%)%',
        '__IMG__' => '%src@$img1@%',
        '__IMG1__' => '%src@$img1@%',
        '__IMG2__' => '%src@$img2@%',
        '__TITLE__' => '@$title@',
        '__INTRODUCE__' => '%htmlspecialchars_decode(%$introduce%)%',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // $fillable属性和$guarded
    protected $fillable = [
    ];

    public function v_list($where=[],$field=['*'],$num=null)
    {

        return $this->parseWhere($where)
            ->latest('isgood')
            ->latest('disorder')
            ->latest('id')
            ->take($num)
            ->get($field);
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

    public static function parseTpl(&$tpl)
    {
        $tpl = str_replace(array_keys(self::$TEMPLATE_MAP), array_values(self::$TEMPLATE_MAP), $tpl);
        #解析模板开始
        preg_match_all('/@(.*?)@/',$tpl,$match);
        // 先找函数
        $tpl = preg_replace('/%(.*?)\(@(.*?)@\)%/','\'.$1(\$obj->$2).\'',$tpl);
        // 解析变量
        $tpl = preg_replace('/@(.*?)@/','\'.\$obj->$1.\'',$tpl);
        // die(htmlspecialchars($tpl));
        $flag = strpos($tpl, '__URL__');
        if ($flag) {
            $tpl = str_replace('__URL__','\'.$URL.\'',$tpl);
            array_push($match[1],'pid','id');
        }
        $field = array_unique($match[1]);
        return [$field ? : [], $flag];
    }
}
