<?php

namespace app\Http\Controllers;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Training;
use App\User;
use App\Business;
use App\NewsCats;
/*
 * Antvel - Company CMS Controller
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use App\Company;

use App\Http\Requests\ContactFormRequest;



class TrainingController extends Training
{
    //二级列表信息
    public function sanlist()
    {
        $arr = (new NewsCats)->getNavigation(['catname', 'path', 'img2', 'id'], $GLOBALS['pid']);
        return $arr;
    }
    //培训首页
    public function index()
    {

//二级列表信息
        $sanlist = $this->sanlist();
//培训首页最新直播
        $zuixingood = $this->xinlist( ['id', 'title', 'ty','img1','price','introduce',  'period', 'name', 'enroll_num'], 6);
//培训首页推荐直播
        $tuijiangood = $this->tuijianlist( ['id', 'title','ty', 'img1','price','introduce', 'period', 'name', 'enroll_num'], 6);
//培训首页技能培训
        $jinenggood = $this->goodlist([2,28], ['id', 'title', 'img1','price', 'content'], 4);
//培训首页企业培训
        $qiyegood = $this->goodlist([2,65], ['id', 'title', 'img1', 'price','content'], 4);
//培训首页培训机构
        $jigougood = $this->usergoodlist( ['user_id', 'business_name', 'logo'], 10);
//培训首页在线学习
        $zaixiangood[0] = $this->omlinelist(1, ['id','img1', 'title','introduce', 'price','img1', 'enroll_num','content'], 3);
        $zaixiangood[1] = $this->omlinelist(2, ['id','img1', 'title','introduce', 'price','img1', 'enroll_num','content'], 3);
        $zaixiangood[2] = $this->omlinelist(3, ['id','img1','title','introduce', 'price','img1', 'enroll_num','content'], 3);
        $zaixiangood[3] = $this->omlinelist(4, ['id','img1','title','introduce', 'price','img1', 'enroll_num','content'], 3);

//培训首页培训机构
        return view('training/index', compact('sanlist', 'zuixingood', 'tuijiangood', 'jinenggood', 'qiyegood', 'zaixiangood','jigougood'));
    }
    //推荐列表
    public function goodlist($where = [], $field = ['*'], $num = 4)
    {
        $Training = new Training();
        $goodlist = $Training->v_list($where, $field, $num);
        return $goodlist;
    }
    //推荐在线学习
    public function omlinelist($onlineid, $field = ['*'], $num = 4)
    {
        $Training = new Training();
        $goodlist = $Training->v_onlinelist($onlineid, $field, $num);
        return $goodlist;
    }
    //推荐直播
    public function tuijianlist( $field = ['*'], $num = 4)
    {
        $Training = new Training();
        $goodlist = $Training->v_tuijianlist( $field, $num);
        return $goodlist;
    }
    //最新直播
    public function xinlist( $field = ['*'], $num = 4)
    {
        $Training = new Training();
        $goodlist = $Training->v_xinglist($field, $num);
        return $goodlist;
    }
    public function usergoodlist($where = [], $field = ['*'], $num = 4)
    {
        $arr=Business::where('has2','=','1')->get();
//        /dd($arr);
        return $arr;
    }


    public function __construct()
    {
        $left = (new NewsCats)->getNavigation(['catname', 'path', 'id'], $GLOBALS['pid']);
        view()->share('left', $left);
    }

    public function show($id)
    {
        $viewrow =  $id;
        $Training= new Training();
        $id_arr=$Training->v_id_arr($id);
        if($id_arr->user_id){
            $id_arr->qyname=v_id($id_arr->user_id,'member_name', 'users');
        }else{
            $id_arr->qyname="平台管理员";
        }
        $arr=$this->newsorder($id);
        $id_arr->previd=$arr['previd'];
        $id_arr->nextid=$arr['nextid'];
        if($id_arr->previd>0){
            $id_arr->prevlink=route($GLOBALS['ty_path'],$id_arr->previd);
            $id_arr->prev=v_id($id_arr->previd,"title");

        }else{
            $id_arr->prevlink='javascript:void(0)';
        }
        if($id_arr->nextid>0){
            $id_arr->nextlink=route($GLOBALS['ty_path'],$id_arr->nextid);
            $id_arr->next=v_id($id_arr->nextid,"title");
        }else{
            $id_arr->nextlink='javascript:void(0);';
        }
        return view('training/view', compact('id_arr'));

    }
    //文章排序
    protected function newsorder($id)
    {
        $arr=array();
        $Training = new Training();
        $ordderlist = $Training->v_list([$GLOBALS['pid'],$GLOBALS['ty']],["id"]);
        $arr['previd']=$this->getPrevArticleId($id,$ordderlist);

        $arr['nextid']=$this->getNextArticleId($id,$ordderlist);

        return $arr;
    }
    protected function getPrevArticleId($id,$ordderlist)
    {
        foreach ($ordderlist as $k=>$v){

            if($v->id==$id){
                $key=$k-1;
            }
        }
        if($key<0){
            return 0;
        }else{
            return $ordderlist[$key]->id;
        }
    }
    protected function getNextArticleId($id,$ordderlist)
    {
       foreach ($ordderlist as $k=>$v){
            if($v->id==$id){
                $key=$k+1;
                break;
            }
       }
        if($key==count($ordderlist)){
            return 0;
        }else{
            return $ordderlist[$key]->id;
        }
        return $ordderlist[$key]->id;
    }
    public function newslist()
    {
        $Training = new Training();

        $ckey='';
        $pagenewslist=$Training->v_pages([$GLOBALS['pid'], $GLOBALS['ty']],['id','title','sendtime','img1','content'],9,9);
        return view('training/list', compact('pagenewslist','ckey'));
    }
    //培训机构列表加分页
    public function userlist()
    {
        $Training = new Business();
        if(isset($_GET['business_name'])){
            $key=$_GET['business_name'];
            $ckey='&business_name='.$_GET['business_name'];
        }else{
            $ckey='';
            $key='';
        }

        // $carousel = $news->v_list([$request->get($pid,0),$request->get($ty,0),$request->get($tty,0)]);
//        $newslist = $news->v_list([$GLOBALS['pid'],$GLOBALS['ty']],['id','title','sendtime','img1','content'],9);
//
//        $list['newslist']=$newslist;

        $pagenewslist=$Training->v_pages($key,['user_id','business_name','logo','business_introduction'],16,9);
        //dd($pagenewslist);
        return view('training/userlist', compact('pagenewslist','ckey','key'));
    }
    public function seachlist()
    {
        if(isset($_GET['key'])){
            $key=str_limit($_GET['key'],20);
            $ckey='&key='.$key;
        }else{
            $key='';
            $ckey='';
        }
        $Training = new Training();

        $pagenewslist=$Training->v_seachpages($key,[$GLOBALS['pid']],['id','ty','title','sendtime','cid','content'],9,9);

        return view('training/seach', compact('pagenewslist','key','ckey'));
    }

}

