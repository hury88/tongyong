<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Job;
use App\User;
use App\Business;
use App\NewsCats;
use App\News;
/*
 * Antvel - Company CMS Controller
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use App\Company;

use App\Http\Requests\ContactFormRequest;



class JobController extends Job
{
    //二级列表信息
    public function sanlist()
    {
        $arr = (new NewsCats)->getNavigation(['catname', 'path', 'img2', 'id'], $GLOBALS['pid']);
        return $arr;
    }
//企业列表
    public function usergoodlist($where = [], $field = ['*'], $num = 4)
    {
        $arr=Business::where('has2','=','1')->get();
//        /dd($arr);
        return $arr;
    }


    public function __construct()
    {


            $banimgsrc = img($GLOBALS['pid_data']->img1);

        view()->share('banimgsrc', $banimgsrc);
    }
//招聘信息详情
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
        return view('job/show', compact('id_arr','userinfo','qiyegood'));
    }
    //文章排序
    protected function newsorder($id)
    {
        $arr=array();
        $news = new News();
        $ordderlist = $news->v_list([$GLOBALS['pid'],$GLOBALS['ty']],["id"]);
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
//招聘信息列表
    public function joblist()
    {
        $sanlist = $this->sanlist();
//        /dd($sanlist);
        $Job = new Job();
        $ckey='';
        if(isset($_GET['title'])&&$_GET['title']!=''){
            $title=$_GET['title'];
            $ckey.='&title='.$title;
        }else{
            $title='';
        }
//        if(isset($_GET['neixunid'])&&$_GET['neixunid']!=0){
//            $neixunid=(int)$_GET['neixunid'];
//            $ckey.='&neixunid='.$neixunid;
//        }else{
//            $neixunid=0;
//        }
//        if(isset($_GET['publicid'])&&$_GET['publicid']!=0){
//            $publicid=(int)$_GET['publicid'];
//            $ckey.='&publicid='.$publicid;
//        }else{
//            $publicid=0;
//        }
//        if(isset($_GET['qualificationid'])&&$_GET['qualificationid']!=0){
//            $qualificationid=$_GET['qualificationid'];
//            $qualificationidarr=explode(',',$qualificationid);
//            $ckey.='&qualificationid='.$qualificationid;
//        }else{
//            $qualificationidarr=array();
//            $qualificationid=0;
//        }
//        if(isset($_GET['industryid'])&&$_GET['industryid']!=0){
//            $industryid=(int)$_GET['industryid'];
//            $ckey.='&industryid='.$industryid;
//        }else{
//            $industryid=0;
//        }
//        if(isset($_GET['trainingid'])&&$_GET['trainingid']!=0){
//            $trainingid=(int)$_GET['trainingid'];
//            $ckey.='&trainingid='.$trainingid;
//        }else{
//            $trainingid=0;
//        }
//
//        $sousuoarr=get_ssarr();
//        $industryids=$sousuoarr[75][0];
//        $neixunids=$sousuoarr[73][0];
//        $publicids=$sousuoarr[74][0];
//        $qiyezige=$sousuoarr[76];
//        $pagenewslist=$Job->v_pages([$GLOBALS['pid'], $GLOBALS['ty']],$title,$neixunid,$publicid,$qualificationidarr,$industryid,$trainingid,['id','title','price','enroll_num','img1','content'],16,9);
//        return view('job/list', compact('pagenewslist','sanlist','ckey','title', 'neixunid', 'publicid', 'qualificationid', 'trainingid','industryid','industryids','neixunids','publicids','qiyezige','qualificationidarr'));
        return view('job/list', compact('sanlist'));
    }
    //院校信息发布
    public function newslist()
    {
        $sanlist = $this->sanlist();
        $News = new News();
        $sousuoarr=get_ssarr();
        $yxarr=$sousuoarr[78][0];
        $xxarr=config('config.webarr.infotypeid');

        $ckey='';
        if(isset($_GET['title'])&&$_GET['title']!=''){
            $title=$_GET['title'];
            $ckey.='&title='.$title;
        }else{
            $title='';
        }
        if(isset($_GET['academyid'])&&$_GET['academyid']!=0){
            $academyid=(int)$_GET['academyid'];
            $ckey.='&academyid='.$academyid;
        }else{
            $academyid=0;
        }
        if(isset($_GET['infotypeid'])&&$_GET['infotypeid']!=0){
            $infotypeid=(int)$_GET['infotypeid'];
            $ckey.='&infotypeid='.$infotypeid;
        }else{
            $infotypeid=0;
        }
        if(isset($_GET['order'])&&$_GET['order']!=0){
            $order=(int)$_GET['order'];
            $ckey.='&order='.$order;
        }else{
            $order=0;
        }
        $pagenewslist=$News->v_yxpages([$GLOBALS['pid'], $GLOBALS['ty']],$title,$academyid,$infotypeid,$order,['id','title','img1','content'],8,7);
        return view('job/yxlist', compact('sanlist','yxarr','xxarr','title','ckey','academyid','infotypeid','order','pagenewslist'));
    }
    //简历列表加分页
    public function resumelist()
    {
        $sanlist = $this->sanlist();
        $Job = new Job();
        // $carousel = $news->v_list([$request->get($pid,0),$request->get($ty,0),$request->get($tty,0)]);
//        $newslist = $news->v_list([$GLOBALS['pid'],$GLOBALS['ty']],['id','title','sendtime','img1','content'],9);
//
//        $list['newslist']=$newslist;

//        $pagenewslist=$Job->v_pages($key,['user_id','business_name','logo','business_introduction'],16,9);
        //dd($pagenewslist);
        return view('job/resumelist', compact('sanlist'));
    }
    //院校信息发布详情
    public function view($id)
    {
        $viewrow =  $id;
        $news = new News();
        $id_arr=$news->v_id_arr($id);
        if(!$id_arr){
            about(404);
        }
        if($id_arr->user_id){
            $id_arr->qyname=v_id($id_arr->user_id,'member_name', 'users');
        }else{
            $id_arr->qyname="平台管理员";
        }
        $arr=$this->newsorder($id);
        $id_arr->previd=$arr['previd'];
        $id_arr->nextid=$arr['nextid'];
        if($id_arr->previd>0){
            $id_arr->prevlink=u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$id_arr->previd);
            $id_arr->prev=v_id($id_arr->previd,"title");

        }else{
            $id_arr->prevlink='javascript:void(0)';
        }
        if($id_arr->nextid>0){
            $id_arr->nextlink=u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$id_arr->nextid);
            $id_arr->next=v_id($id_arr->nextid,"title");
        }else{
            $id_arr->nextlink='javascript:void(0);';
        }
        return view('job/view', compact('id_arr'));

    }
    //简历详情
    public function resumeview($id)
{
    $id_arr = User::where("certified",1)->find($id);

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
    //机构职业证书

    return view('job/resumeview', compact('id_arr'));

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
