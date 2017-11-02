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
        $zhengshugood1 = $this->goodmanagelist([3, 9, 54], 1, ['id', 'title'], 8);
        $zhengshugood2 = $this->goodmanagelist([3, 9, 54], 2, ['id', 'title'], 8);
        $zhengshugood3 = $this->goodmanagelist([3, 9, 54], 3, ['id', 'title'], 8);
//职业资格信息首页通知公告
        $gonggaogood = $this->goodlist([3, 9, 55], ['id', 'title', 'img1', 'content'], 4);
        return view('certificate/qualifications', compact('sanlist', 'zhengshugood1', 'zhengshugood2', 'zhengshugood3', 'gonggaogood'));
    }

//专升本首页
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
        return view('certificate/upgraded', compact('sanlist', 'zhuanyegood', 'yuanxiaogood', 'zixungood', 'wentigood'));
    }

    //考研信息首页
    public function graduate_index()
    {
//三级栏目
        $sanlist = $this->sanlist();
//考研信息首页考研辅导
        $fudaogood = $this->goodlist([3, 11, 60], ['id', 'title'], 15);
//考研信息首页团校一览表
        $yuanxiaogood = $this->goodlist([3, 11, 61], ['id', 'title', 'img2'], 10);

//考研信息首页考研资讯
        $kaoyangood = $this->goodlist([3, 11, 62], ['id', 'title', 'img1', 'content'], 4);
//考研信息首页常见问题
        $wentigood = $this->goodlist([3, 11, 63], ['id', 'title', 'content'], 5);
        return view('certificate/graduate', compact('sanlist', 'fudaogood', 'yuanxiaogood', 'kaoyangood','wentigood'));
    }

//证书详情
    public function show($id)
    {
        $viewrow = $id;
        $Certificate = new Certificate();
        $id_arr = $Certificate->v_id_arr($id);
        if ($id_arr->user_id) {
            $id_arr->qyname = v_id($id_arr->user_id, 'name', 'cmember');
        } else {
            $id_arr->qyname = '平台管理员';
        }
        $certificate_lid = $id_arr->certificate_lid;
        $arr = $this->zhengshuorder($id, $certificate_lid);
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
        $zhengshugood = $this->goodmanagelist([3, 9, 54], $certificate_lid, ['id', 'title'], 10);

        $huodonggood = (new \App\News)->v_list([5, 19], ['id', 'title', 'img1', 'sendtime'], 6);
        // dd($huodonggood);
        return view('certificate/show', compact('id_arr', 'zhengshugood', 'huodonggood', 'newslink'));

    }

    //报名详情
    public function major_show($id)
    {
        $viewrow = $id;

        $Certificate = new Certificate();
        $id_arr = $Certificate->v_id_arr($id);


        if ($id_arr->user_id) {
            $id_arr->qyname = v_id($id_arr->user_id, 'name', 'cmember');
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
        $zhengshugood = $this->goodlist([3, 9, 54], ['id', 'title'], 10);

        $huodonggood = (new \App\News)->v_list([5, 19], ['id', 'title', 'img1', 'sendtime'], 6);
        return view('certificate/show', compact('id_arr', 'zhengshugood', 'huodonggood', 'newslink'));

    }

//公共详情
    public function view($id)
    {
        $viewrow = $id;
        $Certificate = new Certificate();
        $id_arr = $Certificate->v_id_arr($id);
        if ($id_arr->user_id) {
            $id_arr->qyname = v_id($id_arr->user_id, 'name', 'cmember');
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
        //return $id_arr;
        return view('education/view', compact('id_arr'));
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
    protected function zhengshuorder($id, $certificate_lid)
    {
        $arr = array();
        $Certificate = new Certificate();
        $ordderlist = $Certificate->v_zhengshulist([$GLOBALS['pid'], $GLOBALS['ty'], $GLOBALS['tty']], $certificate_lid, ['id']);
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
        return view('education/newslist', compact('list', 'pagenewslist', 'ckey'));
    }
    public function majorlist()
    {
        $Certificate = new Certificate();
        $ckey = '';
        $pagenewslist = $Certificate->v_pages([$GLOBALS['pid'], $GLOBALS['ty'], $GLOBALS['tty']], ['id', 'title', 'img1'], 9, 9);
        return view('certificate/majorlist', compact('list', 'pagenewslist', 'ckey'));
    }
    //常见问题列表
    public function problemlist()
    {
        $Certificate = new Certificate();
        $ckey = '';
        $pagenewslist = $Certificate->v_pages([$GLOBALS['pid'], $GLOBALS['ty'], $GLOBALS['tty']], ['id', 'title', 'content'], 9, 9);
        return view('certificate/problemlist', compact('list', 'pagenewslist', 'ckey'));
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
    public function goodmanagelist($where = [], $certificate_lid, $field = ['*'], $num = 4)
    {
        $Certificate = new Certificate();
        $goodlist = $Certificate->v_zhengshulist($where, $certificate_lid, $field, $num);
        return $goodlist;
    }

    //职业证书列表
    public function managelist()
    {
        $Certificate = new Certificate();
        $ckey = '&genre=' . $GLOBALS['_GET']['genre'];
        $pagenewslist = $Certificate->v_zhengshupages([$GLOBALS['pid'], $GLOBALS['ty'], $GLOBALS['tty']], $GLOBALS['_GET']['genre'], ['id', 'title'], 45, 9);
        return view('certificate/managelist', compact('list', 'pagenewslist', 'ckey'));
    }
    //无图片信息列表列表
    public function nopiclist()
    {
        $Certificate = new Certificate();
        $ckey = '';
        $pagenewslist = $Certificate->v_pages([$GLOBALS['pid'], $GLOBALS['ty'], $GLOBALS['tty']], ['id', 'title'], 45, 9);
        return view('certificate/managelist', compact('list', 'pagenewslist', 'ckey'));
    }
    //学校信息列表
    public function schoollist()
    {
        $Certificate = new Certificate();
        $newslist = $Certificate->v_list([$GLOBALS['pid'], $GLOBALS['ty'], $GLOBALS['tty']], ['id', 'title', 'img1', 'content']);
        return view('education/shoollist', compact('newslist'));
    }
    public function school_view($id)
    {
        $viewrow = $id;
        $Certificate = new Certificate();
        $id_arr = $Certificate->v_id_arr($id);
        if ($id_arr->user_id) {
            $id_arr->qyname = v_id($id_arr->user_id, 'name', 'cmember');
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
        return view('education/introduce_view', compact('id_arr','newslist'));

    }
}
