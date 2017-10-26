<?php

namespace app\Http\Controllers;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\News;
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
        if($id_arr['cid']){
            $id_arr['qyname']=v_id($id_arr['cid'],"name","cmember");
        }else{
            $id_arr['qyname']="平台管理员";
        }
        return view('news/view', compact('id_arr'));

    }

    public function newslist()
    {
        $news = new News();

        // $carousel = $news->v_list([$request->get($pid,0),$request->get($ty,0),$request->get($tty,0)]);
        $newslist = $news->v_list([$GLOBALS['pid'],$GLOBALS['ty']],["id","title","sendtime","img1","content"]);

        $list['newslist']=$newslist;
        $list['hot_info']=$this->hot_info();
        $list['new_job']=$this->new_job();
        $list['hot_train']=$this->hot_train();
        return view('news/list', compact('list'));
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
//        $news = new Training();
//        $str = $news->v_list([2],["title","img1","price","id","address","pid"],10);
//        $str[0]['img1']=img($str[0]['img1']);
        $str='';
        return $str;
    }
}

