<?php

namespace app;

use Exception;
use App\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'job';

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

    public function v_list($where=[],$user_id,$field=['*'],$num=null)
    {
        if($user_id){$user_id=$user_id;}else{$user_id=0;}
        return $this->parseWhere($where)
            ->where('isstate','=' ,'1')
            ->where('user_id','=',$user_id)
            ->latest('isgood')
            ->latest('disorder')
            ->latest('id')
            ->take($num)
            ->get($field);
    }
    //在线学习
    public function v_onlinelist($onlineid,$field=['*'],$num=null)
    {
        return $this
            ->where('isstate','=' ,'1')
            ->where('ty','=' ,'66')
            ->where('onlineid','=',$onlineid)
            ->latest('isgood')
            ->latest('disorder')
            ->latest('id')
            ->take($num)
            ->get($field);
    }
    //最新直播
    public function v_xinglist($field=['*'],$num=null)
    {
        return $this ->where('isstate','=' ,'1')
            ->where('pid','=' ,'2')
            ->where('trainingid','=' ,'1')
            ->latest('id')
            ->take($num)
            ->get($field);
    }
    //推荐直播
    public function v_tuijianlist($field=['*'],$num=null)
    {
        return $this
            ->where('isstate','=' ,'1')
            ->where('pid','=' ,'2')
            ->where('trainingid','=' ,'1')
            ->latest('isgood')
            ->latest('disorder')
            ->latest('id')
            ->take($num)
            ->get($field);
    }
    public function v_id_arr($id)
    {
        return $this->findOrFail($id);
    }
    public function v_pages($where=[],$title,$salary,$education,$experience,$nature,$stime,$order,$work_nature,$industryidarr,$positionidarr,$field=['*'],$num=15,$linknum=5){
        return $this->parseWhere($where)
            ->W("isstate","=" ,"1")
            ->W("issued","=" ,"1")
            ->where(function($query) use($title,$salary,$education,$experience,$nature,$stime,$order,$work_nature,$industryidarr,$positionidarr){
                if($title) {
                    $query->W('title','like' ,'%'.$title.'%');
                }
                if($salary) {
                    $query->W('salary','>' ,$salary);
                }
                if($education) {
                    $query->W('education','>' ,$education);
                }
                if($experience) {
                    $query->W('experience','>' ,$experience);
                }
                if($nature) {
                    $query->W('nature','=' ,$nature);
                }
                if($work_nature) {
                    $query->W('work_nature','=' ,$work_nature);
                }
                if($industryidarr&&$industryidarr[0]>0){
                    $query->W('industryid','in' ,$industryidarr);
                }
                if($positionidarr&&$positionidarr[0]>0){
                    $query->W('positionid','in' ,$positionidarr);
                }
                if($stime){
                    $ts1=strtotime(date("Y-m-d",time()));
                    $ts2=strtotime(date("Y-m-d",time()))-3600*24*2;
                    $ts3=strtotime(date("Y-m-d",time()))-3600*24*6;
                    $ts4=strtotime(date("Y-m-d",time()))-3600*24*30;
                    if($stime==1){
                        $query->W('sendtime','>' ,$ts1);
                    }elseif($stime==2){
                        $query->W('sendtime','>' ,$ts2);
                    }elseif($stime==3){
                        $query->W('sendtime','>' ,$ts3);
                    }elseif($stime==4){
                        $query->W('sendtime','>' ,$ts4);
                    }
                }
                if($order){
                    if($order==1){
                        $query->latest('job.id');
                    }elseif($order==2){
                        $query->latest('job.isgood');
                    }
                }elseif($order==3){
                    $query->latest('job.hits');
                }
            })
            ->latest('job.disorder')
            ->latest('job.updated_at')
            ->latest('job.id')
            ->leftjoin('businesses','job.user_id','=','businesses.user_id')
            ->select($field)
            ->paginate($num)
            ->toArray($linknum);
    }

    /*
     * [parseWhere 解析条件]
     * @param  [type] $where [description]
     * @return [type]        [description]
     */
    private function parseWhere($where)
    {
        if ($count = count($where)) {
            if($count == 1) {
                return self::W('pid','=',$where[0]);
            } elseif($count == 2 && $where[1]) {
                return self::W('pid','=',$where[0])->where('ty','=',$where[1]);
            } elseif($where[2]) {
                return self::W('pid','=',$where[0])
                    ->W('ty','=',$where[1])
                    ->W('tty','=',$where[2]);
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

    public function scopeW($query,$field,$condition,$value)
    {
        return $query->where('job.'.$field,$condition,$value);
    }

    public function scopeleftJoinBusiness()
    {
        return $this->leftjion('App\Business', 'job.user_id', '=', 'business.user_id');
    }

}
