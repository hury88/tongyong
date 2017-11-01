<?php

namespace App\Http\Controllers;

/*
 * Antvel - Users Controller
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use App\User;
use App\Helpers\File;
use App\Helpers\UserHelper;
use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BusinessController extends base\UserController
{
    public function __construct(Request $request)
    {
        if ($request->method() == 'GET')
            parent::__construct();
    }

    /**
     * 会员首页
     * @return
     */
    public function profile()
    {
        $user = \Auth::user()->relationsToArray();
        return view('business.profile', compact('user'));
    }

    /**
     * 招聘
     */
    public function job($action = '', $id= '')
    {
        $table = __FUNCTION__;
        return $this->relatedToNewsCats($table, $action, $id);
    }

    /**
     * 简历管理
     */
    public function resume($action = '', $id= '')
    {
        $table = __FUNCTION__;
        return $this->relatedToNewsCats($table, $action, $id);
    }

    /**
     * 职业培训管理
     */
    public function training($action = '', $id= '')
    {
        $table = __FUNCTION__;
        return $this->relatedToNewsCats($table, $action, $id);
    }

    /**
     * 证书管理
     */
    public function certificate($action = '', $id= '')
    {
        $table = __FUNCTION__;
        return $this->relatedToNewsCats($table, $action, $id);
    }

    /**
     * 国际教育管理
     */
    public function education($action = '', $id= '')
    {
        $table = __FUNCTION__;
        return $this->relatedToNewsCats($table, $action, $id);
    }

    /**
     * 实名认证
     */
    public function certification($action = '', $id= '')
    {
        $table = __FUNCTION__;
        return $this->relatedToNewsCats($table, $action, $id);
    }

    /**
     * 订单管理
     */
    public function order($action = '', $id= '')
    {
        $table = __FUNCTION__;
        return $this->relatedToNewsCats($table, $action, $id);
    }

    /**
     * 用户管理
     */
    public function users($action = '', $id= '')
    {
        $table = __FUNCTION__;
        return $this->relatedToNewsCats($table, $action, $id);
    }

    /**
     * 安全设置
     */
    public function safe($action = '', $id= '')
    {
        $table = __FUNCTION__;
        return $this->relatedToNewsCats($table, $action, $id);
    }

    public function dispatch($action = '', $id = '')
    {
        #将一级栏目的路劲名作为表名
        $table = $GLOBALS['uri'][1];
        path2ptt(substr(Request()->path(), 8));
        $compact = ['user' => \Auth::user()->relationsToArray(), 'table' => $table];
        switch ($action) {
            case 'create':
            case 'update':
                $hasMany = \Auth::user()->{'hasMany'.ucfirst($table)};
                $row = $hasMany->find($id);
                if ($row) {
                    $row->toArray();
                } else {
                    $row = $hasMany->fillable;
                }
                return view("business.cu", $compact);
            $compact['row'] = $row;
                break;
            case 'delete':
                return $this->delete($table, $id);
                break;
            default://列表
                $_GET['certificate_lid'] = isset($_GET['certificate_lid']) ? (int) $_GET['certificate_lid'] : 0;
                $_GET['title'] = isset($_GET['title']) ? $_GET['title'] : '';
                $compact['pagenewslist'] = \Auth::user()->hasManyCertificate()->where('isstate',1)->where(function($query){
                    empty($_GET['certificate_lid']) or $query->where('certificate_lid', intval($_GET['certificate_lid']));
                    empty($_GET['title']) or $query->where('title', 'like', '%'.$_GET['title'].'%');
                })->paginate(15)->toArray(10);
                $compact['ckey'] = isset($_GET['certificate_lid']) ? '&certificate_lid='.intval($_GET['certificate_lid']) : '';
                return view("business.$table", $compact);
                break;
        }
        ;
    }

    private function relatedToNewsCats($table, $action, $id, $compact = [])
    {
        $haystack = ['user' => \Auth::user()->relationsToArray()];
        switch ($action) {
            case 'create':
            case 'update':
                $row = \Auth::user()->{'hasMany'.ucfirst($table)}->find($id);
                $view = 'cu';
                $haystack['row'] = $row;
                break;
            case 'delete':
                return $this->delete($table, $id);
                break;
            default://列表
                $haystack['table'] = $table;
                $view = 'list';
                $_GET['certificate_lid'] = isset($_GET['certificate_lid']) ? (int) $_GET['certificate_lid'] : 0;
                $_GET['title'] = isset($_GET['title']) ? $_GET['title'] : '';
                $haystack['pagenewslist'] = \Auth::user()->hasManyCertificate()->where('isstate',1)->where(function($query){
                    empty($_GET['certificate_lid']) or $query->where('certificate_lid', intval($_GET['certificate_lid']));
                    empty($_GET['title']) or $query->where('title', 'like', '%'.$_GET['title'].'%');
                })->paginate(15)->toArray(10);
                $haystack['ckey'] = isset($_GET['certificate_lid']) ? '&certificate_lid='.intval($_GET['certificate_lid']) : '';
                break;
        }
        ;
        return view('business.related-news_cats-'.$view, array_merge($haystack, $compact));
    }

    public function delete(Request $request)
    {
        dd($request->all());
    }
}
