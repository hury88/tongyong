<?php

namespace app\Http\Controllers;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Education;
use App\NewsCats;
/*
 * Antvel - Company CMS Controller
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use App\Company;

use App\Http\Requests\ContactFormRequest;

class EducationController extends Controller
{
    public function __construct()
    {

        if($GLOBALS['tty']==null){

            $banimgsrc=img($GLOBALS['ty_data']->img1);
        }else{
            $banimgsrc=img($GLOBALS['tty_data']->img1);

        }

        view()->share('banimgsrc', $banimgsrc);
    }
//国际留学首页
public function study_index(){
//左侧图片列表
    $sanlist=$this->sanlist();
//国际留学首页留学新闻
    $liuxuegood=$this->goodlist([4,12,20],['title','img1','content'],2);
//国际留学首页学院介绍
    $xueyuangood=$this->goodlist([4,12,21],['title','img2','content'],3);
//国际留学首页留学指南
    $zhinangood=$this->goodlist([4,12,22],['title','content'],9);
//国际留学活动公告
    $gonggaogood=$this->goodlist([4,12,23],['title','img1','content'],4);
    return view('education/study', compact('sanlist',"liuxuegood","xueyuangood",'zhinangood','gonggaogood'));
}
//国际留学留学新闻列表


//路线详情
    public function show($id)
    {
        $viewrow =  $id;
        $education = new Education();
        $id_arr=$education->v_id_arr($id);
        if($id_arr->cid){
            $id_arr->qyname=v_id($id_arr->cid,"name","cmember");
        }else{
            $id_arr->qyname="平台管理员";
        }
        $arr=$this->newsorder($id);
        $id_arr->previd=$arr['previd'];
        $id_arr->nextid=$arr['nextid'];
        if($id_arr->previd>0){
            $id_arr->prevlink=u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$GLOBALS['tty_path'],$id_arr->previd);
            $id_arr->prev=v_id($id_arr->previd,"title");

        }else{
            $id_arr->prevlink='javascript:void(0)';
        }
        if($id_arr->nextid>0){
            $id_arr->nextlink=u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$GLOBALS['tty_path'],$id_arr->nextid);
            $id_arr->next=v_id($id_arr->nextid,"title");
        }else{
            $id_arr->nextlink='javascript:void(0);';
        }
        return view('education/show', compact('id_arr'));

    }
//公共详情
    public function view($id)
    {
        $viewrow =  $id;
        $education = new Education();
        $id_arr=$education->v_id_arr($id);
        if($id_arr->cid){
            $id_arr->qyname=v_id($id_arr->cid,"name","cmember");
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
        return view('education/view', compact('id_arr'));

    }
    //文章排序
    protected function newsorder($id)
    {
        $arr=array();
        $education = new Education();
        $ordderlist = $education->v_list([$GLOBALS['pid'],$GLOBALS['ty'],$GLOBALS['tty']],["id"]);
        $arr['previd']=$this->getPrevArticleId($id,$ordderlist);

        $arr['nextid']=$this->getNextArticleId($id,$ordderlist);

        return $arr;
    }
//上一篇id
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
//下一篇id
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
    //带翻页列表
    public function newslist()
    {
        $education = new Education();
        $ckey='';
        $page=$education->v_pages([$GLOBALS['pid'], $GLOBALS['ty'],$GLOBALS['tty']],["id","title","sendtime","img1","content"],9,9);
        return view('education/newslist', compact('list',"page","ckey"));
    }
    //三级列表信息
    public function sanlist()
    {
        $arr = (new NewsCats)->getNavigation(['catname', 'path','img2', 'id'], $GLOBALS['ty']);
        return $arr;
    }
    //推荐列表
    public function goodlist($where=[],$field=['*'],$num=4)
    {
        $education = new Education();
        $goodlist=$education->v_list($where,$field,$num);
        return $goodlist;
    }
}

