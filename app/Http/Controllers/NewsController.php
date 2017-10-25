<?php

namespace app\Http\Controllers;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\News;
/*
 * Antvel - Company CMS Controller
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use App\Company;

use App\Http\Requests\ContactFormRequest;

class NewsController extends Controller
{
    public function about_tongyong()
    {
        return view('home', compact('carousel'));
    }
    public function education($pid=5,$ty=16)
    {
        $this->newslist($pid,$ty);
    }
    public function company($pid=5,$ty=17)
    {
        $this->newslist($pid,$ty);
    }
    public function industry($pid=5,$ty=18)
    {
       $this->newslist($pid,$ty);
    }
    public function Lately($pid=5,$ty=19)
    {
        $this->newslist($pid,$ty);
    }
    private function newslist($pid,$ty)
    {
        $news = new News();

        // $carousel = $news->v_list([$request->get($pid,0),$request->get($ty,0),$request->get($tty,0)]);
        $newslist = $news->v_list([$pid,$ty],["title","sendtime","img1","content"]);
        foreach ($newslist as $v){
            $v['introduction']=cutstr(strip_tags($v['content']),500);
            $v['img1']="uploadfile/upload/".$v['img1'];
        }
        $list['newslist']=$newslist;
        $list['hot_info']=$this->hot_info();
        $list['new_job']=$this->new_job();
        $list['hot_train']=$this->hot_train();
        return view('list', compact('list'));
    }

    private function hot_info()
    {
        $news = new News();
        $str = $news->v_list([5],["title","sendtime"],10);
        return $str;
    }
    private function new_job()
    {
        $news = new Job();
        $str = $news->v_list([1],["title","address"],5);
        return $str;
    }
    private function hot_train()
    {
        $news = new Training();
        $str = $news->v_list([2],["title","img1","price","id","address","pid"],10);
        $str[0]['img1']="uploadfile/upload/". $str[0]['img1'];
        return $str;
    }
}

