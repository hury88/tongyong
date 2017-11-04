<?php

namespace App\Http\Controllers;
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
        if(!$id_arr){
            about(404);
        }
        if($id_arr->user_id){
            $id_arr->qyname=v_id($id_arr->user_id,'member_name', 'users');
        }else{
            $id_arr->qyname="平台管理员";
        }
     //   $arr=$this->newsorder($id);
//        $id_arr->previd=$arr['previd'];
//        $id_arr->nextid=$arr['nextid'];
//        if($id_arr->previd>0){
//            $id_arr->prevlink=u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$id_arr->previd);
//            $id_arr->prev=v_id($id_arr->previd,"title");
//
//        }else{
//            $id_arr->prevlink='javascript:void(0)';
//        }
//        if($id_arr->nextid>0){
//            $id_arr->nextlink=u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$id_arr->nextid);
//            $id_arr->next=v_id($id_arr->nextid,"title");
//        }else{
//            $id_arr->nextlink='javascript:void(0);';
//        }
        $userinfo= Business::where('user_id','=',$id_arr->user_id)->select("logo","business_name",'business_introduction')->get();
        $qiyegood = $this->goodlist([2], ['id','ty','img1', 'title','introduce', 'price','img1', 'enroll_num','content'], 4);
        return view('training/view', compact('id_arr','userinfo','qiyegood'));
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
        $sanlist = $this->sanlist();
        $Training = new Training();
        $ckey='';
        if(isset($_GET['title'])&&$_GET['title']!=0){

            $title=$_GET['title'];
            $ckey.='&title='.$title;
        }else{
            $title='';
        }
        if(isset($_GET['neixunid'])&&$_GET['neixunid']!=0){
            $neixunid=(int)$_GET['neixunid'];
            $ckey.='&neixunid='.$neixunid;
        }else{
            $neixunid=0;
        }
        if(isset($_GET['publicid'])&&$_GET['publicid']!=0){
            $publicid=(int)$_GET['publicid'];
            $ckey.='&publicid='.$publicid;
        }else{
            $publicid=0;
        }
        if(isset($_GET['qualificationid'])&&$_GET['qualificationid']!=0){
            $qualificationid=$_GET['qualificationid'];
            $qualificationidarr=explode(',',$qualificationid);
            $ckey.='&qualificationid='.$qualificationid;
        }else{
            $qualificationidarr=array();
            $qualificationid=0;
        }
        if(isset($_GET['industryid'])&&$_GET['industryid']!=0){
            $industryid=(int)$_GET['industryid'];
            $ckey.='&industryid='.$industryid;
        }else{
            $industryid=0;
        }
        if(isset($_GET['trainingid'])&&$_GET['trainingid']!=0){
            $trainingid=(int)$_GET['trainingid'];
            $ckey.='&trainingid='.$trainingid;
        }else{
            $trainingid=0;
        }

        $sousuoarr=get_ssarr();
        $industryids=$sousuoarr[75][0];
        $neixunids=$sousuoarr[73][0];
        $publicids=$sousuoarr[74][0];
        $qiyezige=$sousuoarr[76];
        $pagenewslist=$Training->v_pages([$GLOBALS['pid'], $GLOBALS['ty']],$title,$neixunid,$publicid,$qualificationidarr,$industryid,$trainingid,['id','title','price','enroll_num','img1','content'],16,9);
        return view('training/list', compact('pagenewslist','sanlist','ckey','title', 'neixunid', 'publicid', 'qualificationid', 'trainingid','industryid','industryids','neixunids','publicids','qiyezige','qualificationidarr'));
    }
    //培训机构列表加分页
    public function userlist()
    {
        $sanlist = $this->sanlist();
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
        return view('training/userlist', compact('pagenewslist','sanlist','ckey','key'));
    }
    public function view($id)
    {
        $id_arr = User::find($id);
        abort(404);
        if($id_arr){
            $id_arr = $id_arr->business;
        } else {
            abort(404);
        }
//        return view('errors.404');
        if($id_arr->user_id){
            $id_arr->qyname=v_id($id_arr->user_id,'member_name', 'users');
        }else{
            $id_arr->qyname="平台管理员";
        }
//        $arr=$this->newsorder($id);
//        $id_arr->previd=$arr['previd'];
//        $id_arr->nextid=$arr['nextid'];
//        if($id_arr->previd>0){
//            $id_arr->prevlink=route($GLOBALS['ty_path'],$id_arr->previd);
//            $id_arr->prev=v_id($id_arr->previd,"title");
//
//        }else{
//            $id_arr->prevlink='javascript:void(0)';
//        }
//        if($id_arr->nextid>0){
//            $id_arr->nextlink=route($GLOBALS['ty_path'],$id_arr->nextid);
//            $id_arr->next=v_id($id_arr->nextid,"title");
//        }else{
//            $id_arr->nextlink='javascript:void(0);';
//        }
        return view('news/view', compact('id_arr'));

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
function get_ssarr()
{
    $data = \Illuminate\Support\Facades\DB::table('nature')->select('id','pid','typeid','catname')->orderBy('disorder','desc')->orderBy('id','asc')->get();

    foreach ($data as $v) {
        $d[$v->typeid][$v->pid][$v->id]=$v->catname;
    }

    return $d;
}
