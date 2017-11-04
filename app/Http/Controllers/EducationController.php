<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Education;
use App\NewsCats;
use App\Enroll;
/*
 * Antvel - Company CMS Controller
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use App\Http\Requests\ContactFormRequest;

class EducationController extends Controller
{
    public function __construct()
    {

        if ($GLOBALS['tty'] == null) {

            $banimgsrc = img($GLOBALS['ty_data']->img1);
        } else {
            $banimgsrc = img($GLOBALS['tty_data']->img1);

        }

        view()->share('banimgsrc', $banimgsrc);
    }

//国际留学首页
    public function study_index()
    {
//左侧图片列表
        $sanlist = $this->sanlist();
//国际留学首页留学新闻
        $liuxuegood = $this->goodlist([4, 12, 20], ['id', 'title', 'img1', 'content'], 4);
//国际留学首页学院介绍
        $xueyuangood = $this->goodlist([4, 12, 21], ['id', 'title', 'img2', 'content'], 3);
//国际留学首页留学指南
        $zhinangood = $this->goodlist([4, 12, 22], ['id', 'title', 'content'], 9);
//国际留学活动公告
        $gonggaogood = $this->goodlist([4, 12, 23], ['id', 'title', 'img1', 'content'], 4);
        return view('education/study', compact('sanlist', 'liuxuegood', 'xueyuangood', 'zhinangood', 'gonggaogood'));
    }
//国际游学首页
    public function tour_index()
    {
//三级栏目
        $sanlist = $this->sanlist();
//国际游学首页国际游学
        $youxuegood = $this->goodlist([4, 13, 24], ['id', 'title', 'img1', 'content'], 5);
//国际游学首页游学路线
        $luxiangood = $this->goodlist([4, 13, 25], ['id', 'title', 'img1','enroll_num'], 8);
//国际游学首页游学解答
        $zixungood = $this->goodlist([4, 13, 26], ['id', 'title', 'img1', 'content'], 4);
//国际游学首页游学保障
        $baozhanggood = $this->goodlist([4, 13, 27], ['id', 'title', 'img1'], 5);
        return view('education/tour', compact('sanlist','youxuegood', 'luxiangood', 'zixungood', 'baozhanggood'));
    }
    //夏令营首页
    public function camp_index()
    {
//三级栏目
        $sanlist = $this->sanlist();
//夏令营首页首页火爆线路
        $huobaogood = $this->goodlist([4, 14, 29], ['id', 'title', 'img1', 'content'], 3);
//夏令营首页首页特色线路
        $tesegood = $this->goodlist([4, 14, 30], ['id', 'title', 'img1','enroll_num'], 8);
//夏令营首页首页精彩瞬间
        $jincaigood = $this->goodlist([4, 14, 31], ['id', 'title', 'img1', 'content'], 12);
//夏令营首页首页实时动态
        $dongtaigood = $this->goodlist([4, 14, 32], ['id', 'title', 'img1', 'content'], 4);
        return view('education/camp', compact('sanlist','huobaogood', 'tesegood', 'jincaigood', 'dongtaigood'));
    }

    //国际联合办学首页
    public function joint_index()
    {
//三级栏目
        $sanlist = $this->sanlist();
//国际联合办学首页国际院校
        $guojigood = $this->goodlist([4, 15, 33], ['id', 'title', 'img1', 'content'], 3);
//国际联合办学首页国内院校
        $guoneigood = $this->goodlist([4, 15, 34], ['id', 'title', 'img1', 'content'], 3);

//国际联合办学首页活动公告
        $huodonggood = $this->goodlist([4, 15, 35], ['id', 'title', 'img1', 'content'], 4);
        return view('education/joint', compact('sanlist','guojigood', 'guoneigood', 'huodonggood'));
    }
//路线详情
    public function show($id)
    {
        $viewrow = $id;
        $education = new Education();
        $id_arr = $education->v_id_arr($id);
        if(!$id_arr){
            about(404);
        }
        if ($id_arr->user_id) {
            $id_arr->qyname = v_id($id_arr->user_id, 'member_name', 'users');
        } else {
            $id_arr->qyname = '平台管理员';
        }
        $arr = $this->newsorder($id);
        $id_arr->previd = $arr['previd'];
        $id_arr->nextid = $arr['nextid'];
        if ($id_arr->previd > 0) {
            $id_arr->prevlink = u($GLOBALS['pid_path'], $GLOBALS['ty_path'], $GLOBALS['tty_path'], $id_arr->previd);
            $id_arr->prev = v_id($id_arr->previd, 'title');

        } else {
            $id_arr->prevlink = 'javascript:void(0)';
        }
        if ($id_arr->nextid > 0) {
            $id_arr->nextlink = u($GLOBALS['pid_path'], $GLOBALS['ty_path'], $GLOBALS['tty_path'], $id_arr->nextid);
            $id_arr->next = v_id($id_arr->nextid, 'title');
        } else {
            $id_arr->nextlink = 'javascript:void(0);';
        }
        return view('education/show', compact('id_arr'));

    }

//公共详情
    public function view($id)
    {
        $viewrow = $id;
        $education = new Education();
        $id_arr = $education->v_id_arr($id);
        if(!$id_arr){
            about(404);
        }
        if ($id_arr->user_id) {
            $id_arr->qyname = v_id($id_arr->user_id,'member_name', 'users');
        } else {
            $id_arr->qyname = '平台管理员';
        }
        $arr = $this->newsorder($id);
        $id_arr->previd = $arr['previd'];
        $id_arr->nextid = $arr['nextid'];
        if ($id_arr->previd > 0) {
            $id_arr->prevlink = u($GLOBALS['pid_path'], $GLOBALS['ty_path'], $GLOBALS['tty_path'], $id_arr->previd);
            $id_arr->prev = v_id($id_arr->previd, 'title');

        } else {
            $id_arr->prevlink = 'javascript:void(0)';
        }
        if ($id_arr->nextid > 0) {
            $id_arr->nextlink = u($GLOBALS['pid_path'], $GLOBALS['ty_path'], $GLOBALS['tty_path'], $id_arr->nextid);
            $id_arr->next = v_id($id_arr->nextid, 'title');
        } else {
            $id_arr->nextlink = 'javascript:void(0);';
        }
        return view('education/view', compact('id_arr'));

    }

    //文章排序
    protected function newsorder($id)
    {
        $arr = array();
        $education = new Education();
        $ordderlist = $education->v_list([$GLOBALS['pid'], $GLOBALS['ty'], $GLOBALS['tty']], ['id']);
        $arr['previd'] = $this->getPrevArticleId($id, $ordderlist);

        $arr['nextid'] = $this->getNextArticleId($id, $ordderlist);

        return $arr;
    }

//上一篇id
    protected function getPrevArticleId($id, $ordderlist)
    {
        foreach ($ordderlist as $k => $v) {

            if ($v->id == $id) {
                $key = $k - 1;
            }
        }
        if ($key < 0) {
            return 0;
        } else {
            return $ordderlist[$key]->id;
        }
    }

//下一篇id
    protected function getNextArticleId($id, $ordderlist)
    {
        foreach ($ordderlist as $k => $v) {
            if ($v->id == $id) {
                $key = $k + 1;
                break;
            }
        }
        if ($key == count($ordderlist)) {
            return 0;
        } else {
            return $ordderlist[$key]->id;
        }
        return $ordderlist[$key]->id;
    }

    //带翻页列表
    public function newslist()
    {
        $education = new Education();
        $ckey = '';
        $pagenewslist = $education->v_pages([$GLOBALS['pid'], $GLOBALS['ty'], $GLOBALS['tty']], ['id', 'title', 'sendtime', 'img1', 'content'], 9, 9);
        return view('education/newslist', compact('list', 'pagenewslist', 'ckey'));
    }

    //三级列表信息
    public function sanlist()
    {
        $arr = (new NewsCats)->getNavigation(['catname', 'path', 'img2', 'id'], $GLOBALS['ty']);
        return $arr;
    }

    //推荐列表
    public function goodlist($where = [], $field = ['*'], $num = 4)
    {
        $education = new Education();
        $goodlist = $education->v_list($where, $field, $num);
        return $goodlist;
    }

//学院介绍列表
    public function study_introduce()
    {
        $education = new Education();
        $newslist = $education->v_list([$GLOBALS['pid'], $GLOBALS['ty'], $GLOBALS['tty']], ['id', 'title', 'img1', 'content']);
        return view('education/shoollist', compact('newslist'));
    }
    //游学路线列表
    public function tourlist()
    {
        $education = new Education();
        $ckey = '';
        $pagenewslist = $education->v_pages([$GLOBALS['pid'], $GLOBALS['ty'], $GLOBALS['tty']], ['id', 'title', 'sendtime', 'img1', 'content','enroll_num'], 16, 9);
        return view('education/tourlist', compact('list', 'pagenewslist', 'ckey'));
    }
    //学院介绍详情
    public function introduce_view($id)
    {
        $viewrow = $id;
        $education = new Education();

        $id_arr = $education->v_id_arr($id);
        if(!$id_arr){
            about(404);
        }
        if ($id_arr->user_id) {
            $id_arr->qyname = v_id($id_arr->user_id, 'member_name', 'users');
        } else {
            $id_arr->qyname = '平台管理员';
        }
        $arr = $this->newsorder($id);
        $id_arr->previd = $arr['previd'];
        $id_arr->nextid = $arr['nextid'];
        if ($id_arr->previd > 0) {
            $id_arr->prevlink = u($GLOBALS['pid_path'], $GLOBALS['ty_path'], $GLOBALS['tty_path'], $id_arr->previd);
            $id_arr->prev = v_id($id_arr->previd, 'title');

        } else {
            $id_arr->prevlink = 'javascript:void(0)';
        }
        if ($id_arr->nextid > 0) {
            $id_arr->nextlink = u($GLOBALS['pid_path'], $GLOBALS['ty_path'], $GLOBALS['tty_path'], $id_arr->nextid);
            $id_arr->next = v_id($id_arr->nextid, 'title');
        } else {
            $id_arr->nextlink = 'javascript:void(0);';
        }
        $newslist = $education->v_list([$GLOBALS['pid'], $GLOBALS['ty'], $GLOBALS['tty']], ['id', 'title', 'img1', 'content']);
        return view('education/introduce_view', compact('id_arr','newslist'));

    }
}