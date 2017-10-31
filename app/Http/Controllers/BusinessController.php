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
    public function __construct()
    {
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
    public function job()
    {
        $user = \Auth::user()->relationsToArray();
        return view('business.job', compact('user'));
    }

    /**
     * 简历管理
     */
    public function resume()
    {
        $user = \Auth::user()->relationsToArray();
        return view('business.resume', compact('user'));
    }

    /**
     * 职业培训管理
     */
    public function training($action = '')
    {
        return $this->relatedToNewsCats($action, $id);
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
    public function education()
    {
        $user = \Auth::user()->relationsToArray();
        return view('business.certificate', compact('user'));
    }

    /**
     * 实名认证
     */
    public function certification()
    {
        $user = \Auth::user()->relationsToArray();
        return view('business.certification', compact('user'));
    }

    /**
     * 订单管理
     */
    public function order()
    {
        $user = \Auth::user()->relationsToArray();
        return view('business.order', compact('user'));
    }

    /**
     * 用户管理
     */
    public function users()
    {
        $user = \Auth::user()->relationsToArray();
        return view('business.users', compact('user'));
    }

    /**
     * 安全设置
     */
    public function safe()
    {
        $user = \Auth::user()->relationsToArray();
        return view('business.safe', compact('user'));
    }

    private function relatedToNewsCats($action, $id, $compact = [])
    {
        $user = \Auth::user()->id;
        switch ($action) {
            case 'create':
            case 'update':
                // $id = Db()

                break;
            case 'delete':
                break;

            default://列表
                $user = \Auth::user()->relationsToArray();
                $view = 'list';
                break;
        }
        return view('business.related-news_cats-list', array_merge(['user' => $user], $compact));
    }
}
