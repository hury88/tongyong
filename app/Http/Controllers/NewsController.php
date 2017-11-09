<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Training;
use App\NewsCats;
/*
 * Antvel - Company CMS Controller
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use App\Company;

use App\Http\Requests\ContactFormRequest;

class NewsController extends Controller
{
    public function __construct()
    {
        $left = (new NewsCats)->getNavigation(['catname', 'path', 'id'], $GLOBALS['pid']);
        view()->share('left', $left);
    }

    public function show($id)
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
        return view('news/view', compact('id_arr'));

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
    public function newslist()
    {
        $news = new News();

        // $carousel = $news->v_list([$request->get($pid,0),$request->get($ty,0),$request->get($tty,0)]);
//        $newslist = $news->v_list([$GLOBALS['pid'],$GLOBALS['ty']],["id","title","sendtime","img1","content"],9);
//
//      $list['newslist']=$newslist;
        $list['hot_info']=$this->hot_info();
        $ckey='';
        $list['new_job']=$this->new_job();
        $list['hot_train']=$this->hot_train();
        $pagenewslist=$news->v_pages([$GLOBALS['pid'], $GLOBALS['ty']],["id","title","sendtime","img1","content"],9,9);
        return view('news/list', compact('list',"pagenewslist","ckey"));
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
        $news = new News();

        $pagenewslist=$news->v_seachpages($key,[$GLOBALS['pid']],["id",'pid','ty',"title","sendtime","user_id","content"],9,9);

        return view('news/seach', compact("pagenewslist","key","ckey"));
    }
    public function helplist()
    {
        $news = new News();

        $helplist=$news->v_list([47,69,72],["title","content"]);
        return view('auth/help', compact("helplist"));
    }
    private function hot_info()
    {
        $news = new News();
        $str = $news->v_list([5],["title","sendtime"],10);

        return $str;
    }
    private function new_job()
    {
        //$news = new Job();
        //$str = $news->v_list([1],["title","address"],5);
        $str='';
        return $str;
    }
    private function hot_train()
    {
       $news = new Training();
       $str = $news->v_xinglist(['id','ty','img1', 'title','introduce', 'price','img1', 'enroll_num','content'],5);
       //$str[0]['img1']=img($str[0]['img1']);
     //  dd($str);
        return $str;
    }
}

