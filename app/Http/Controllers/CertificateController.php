<?php

namespace app\Http\Controllers;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Certificate;
use App\NewsCats;
use App\News;
use App\Enroll;
/*
 * Antvel - Company CMS Controller
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use App\Http\Requests\ContactFormRequest;

class CertificateController extends Controller
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

//职业资格信息首页
    public function qualifications_index()
    {
//左侧图片列表
        $sanlist = $this->sanlist();
//职业资格信息首页证书管理
        $zhengshugood1 = $this->goodmanagelist([3, 9, 54],1, ['id', 'title'], 8);
        $zhengshugood2 = $this->goodmanagelist([3, 9, 54],2, ['id', 'title'], 8);
        $zhengshugood3 = $this->goodmanagelist([3, 9, 54],3, ['id', 'title'], 8);
//职业资格信息首页通知公告
        $gonggaogood = $this->goodlist([3, 9, 55], ['id', 'title', 'img1', 'content'], 4);
        return view('certificate/qualifications', compact('sanlist', 'zhengshugood1', 'zhengshugood2', 'zhengshugood3', 'gonggaogood'));
    }
//职业资格信息首页专升本
    public function upgraded_index()
    {
//三级栏目
        $sanlist = $this->sanlist();
//专升本首页热门专业
        $zhuanyegood = $this->goodlist([3, 10, 56], ['id', 'title', 'img1'], 8);
//专升本首页招考院校信息
        $yuanxiaogood = $this->goodlist([3, 10, 57], ['id', 'title', 'content'], 29);
//专升本首页考研咨询
        $zixungood = $this->goodlist([3, 10, 58], ['id', 'title', 'img1', 'content'], 4);
//专升本首页常见问题
        $wentigood = $this->goodlist([3, 10, 59], ['id', 'title', 'content'], 5);
        return view('certificate/upgraded', compact('sanlist','zhuanyegood', 'yuanxiaogood', 'zixungood', 'wentigood'));
    }
    //夏令营首页
    public function camp_index()
    {
//三级栏目
        $sanlist = $this->sanlist();
//夏令营首页首页火爆线路
        $huobaogood = $this->goodlist([4, 14, 29], ['id', 'title', 'img1', 'content'], 3);
//夏令营首页首页特色线路
        $tesegood = $this->goodlist([4, 14, 30], ['id', 'title', 'img1'], 8);
//夏令营首页首页精彩瞬间
        $jincaigood = $this->goodlist([4, 14, 31], ['id', 'title', 'img1', 'content'], 12);
//夏令营首页首页实时动态
        $dongtaigood = $this->goodlist([4, 14, 32], ['id', 'title', 'img1', 'content'], 4);
        return view('certificate/camp', compact('sanlist','huobaogood', 'tesegood', 'jincaigood', 'dongtaigood'));
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
        return view('certificate/joint', compact('sanlist','guojigood', 'guoneigood', 'huodonggood'));
    }
//证书详情
    public function show($id)
    {
        $viewrow = $id;
        $Certificate = new Certificate();
        $id_arr = $Certificate->v_id_arr($id);
        if ($id_arr->cid) {
            $id_arr->qyname = v_id($id_arr->cid, 'name', 'cmember');
        } else {
            $id_arr->qyname = '平台管理员';
        }
        $certificate_lid=$id_arr->certificate_lid;
        $arr = $this->zhengshuorder($id,$certificate_lid);
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
        $zhengshugood = $this->goodmanagelist([3, 9, 54],$certificate_lid, ['id', 'title'], 10);

        $huodonggood = (new \App\News)->v_list([5, 19], ['id', 'title','img1','sendtime'], 6);
       // dd($huodonggood);
        return view('certificate/show', compact('id_arr','zhengshugood','huodonggood','newslink'));

    }

//公共详情
    public function view($id)
    {
        $viewrow = $id;
        $Certificate = new Certificate();
        $id_arr = $Certificate->v_id_arr($id);
        if ($id_arr->cid) {
            $id_arr->qyname = v_id($id_arr->cid, 'name', 'cmember');
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
        return view('certificate/view', compact('id_arr'.'zhengshugood'));

    }

    //文章排序
    protected function newsorder($id)
    {
        $arr = array();
        $Certificate = new Certificate();
        $ordderlist = $Certificate->v_list([$GLOBALS['pid'], $GLOBALS['ty'], $GLOBALS['tty']], ['id']);
        $arr['previd'] = $this->getPrevArticleId($id, $ordderlist);

        $arr['nextid'] = $this->getNextArticleId($id, $ordderlist);

        return $arr;
    }
    //证书类排序
    protected function zhengshuorder($id,$certificate_lid)
    {
        $arr = array();
        $Certificate = new Certificate();
        $ordderlist = $Certificate->v_zhengshulist([$GLOBALS['pid'], $GLOBALS['ty'], $GLOBALS['tty']],$certificate_lid, ['id']);
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
        $Certificate = new Certificate();
        $ckey = '';
        $pagenewslist = $Certificate->v_pages([$GLOBALS['pid'], $GLOBALS['ty'], $GLOBALS['tty']], ['id', 'title', 'sendtime', 'img1', 'content'], 9, 9);
        return view('certificate/newslist', compact('list', 'pagenewslist', 'ckey'));
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
        $Certificate = new Certificate();
        $goodlist = $Certificate->v_list($where, $field, $num);
        return $goodlist;
    }
    //证书推荐列表
    public function goodmanagelist($where = [],$certificate_lid, $field = ['*'], $num = 4)
    {
        $Certificate = new Certificate();
        $goodlist = $Certificate->v_zhengshulist($where,$certificate_lid, $field, $num);
        return $goodlist;
    }
    //职业证书列表
    public function manage_index()
    {
        $Certificate = new Certificate();
        $ckey = '&genre='.$GLOBALS['_GET']['genre'];
        $pagenewslist = $Certificate->v_zhengshupages([$GLOBALS['pid'], $GLOBALS['ty'], $GLOBALS['tty']],$GLOBALS['_GET']['genre'], ['id', 'title'], 45, 9);
        return view('certificate/managelist', compact('list', 'pagenewslist', 'ckey'));
    }
//学院介绍列表
    public function study_introduce()
    {
        $Certificate = new Certificate();
        $newslist = $Certificate->v_list([$GLOBALS['pid'], $GLOBALS['ty'], $GLOBALS['tty']], ['id', 'title', 'img1', 'content']);
        return view('certificate/shoollist', compact('newslist'));
    }
    //游学路线列表
    public function tourlist()
    {
        $Certificate = new Certificate();
        $ckey = '';
        $pagenewslist = $Certificate->v_pages([$GLOBALS['pid'], $GLOBALS['ty'], $GLOBALS['tty']], ['id', 'title', 'sendtime', 'img1', 'content'], 16, 9);
        return view('certificate/tourlist', compact('list', 'pagenewslist', 'ckey'));
    }
    //学院介绍详情
    public function introduce_view($id)
    {
        $viewrow = $id;
        $Certificate = new Certificate();
        $id_arr = $Certificate->v_id_arr($id);
        if ($id_arr->cid) {
            $id_arr->qyname = v_id($id_arr->cid, 'name', 'cmember');
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
        $newslist = $Certificate->v_list([$GLOBALS['pid'], $GLOBALS['ty'], $GLOBALS['tty']], ['id', 'title', 'img1', 'content']);
        return view('certificate/introduce_view', compact('id_arr','newslist'));

    }
}