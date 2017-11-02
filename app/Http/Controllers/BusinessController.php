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
use Validator;
use App\Notice;

class BusinessController extends base\UserController
{
    public function __construct(Request $request)
    {
        if ($request->method() == 'GET')
            parent::__construct();
    }

    private $fillTable = ['certificate', 'education', 'training'];

    private $paginate = 15;
    private $toArray = 10;

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
    public function job(&$compact)
    {
        return $compact;
    }

    /**
     * 简历管理
     */
    public function resume(&$compact)
    {
        $table = __FUNCTION__;
        return $compact;
    }

    /**
     * 职业培训管理
     */
    public function training(&$compact)
    {
        $_GET['certificate_lid'] = isset($_GET['certificate_lid']) ? (int)$_GET['certificate_lid'] : 0;
        $_GET['title'] = isset($_GET['title']) ? $_GET['title'] : '';
        $_GET['industryid'] = isset($_GET['industryid']) ? intval($_GET['industryid']) : 0;
        $_GET['neixunid'] = isset($_GET['neixunid']) ? intval($_GET['neixunid']) : 0;
        $_GET['publicid'] = isset($_GET['publicid']) ? intval($_GET['publicid']) : 0;
        $_GET['qualificationid1'] = isset($_GET['qualificationid1']) ? intval($_GET['qualificationid1']) : 0;
        $_GET['qualificationid2'] = isset($_GET['qualificationid2']) ? intval($_GET['qualificationid2']) : 0;
        $_GET['qualificationid'] = isset($_GET['qualificationid']) ? intval($_GET['qualificationid']) : 0;
        $_GET['trainingid'] = isset($_GET['trainingid']) ? intval($_GET['trainingid']) : 0;

        if(empty($_GET['qualificationid'])){
            if($_GET['qualificationid1']){
                if(empty($_GET['qualificationid2'])){
                    $_GET['qualificationid2'] = get_first(76, $_GET['qualificationid1']);
                }
                $_GET['qualificationid'] = get_first(76, $_GET['qualificationid2']);
            }else{
                $_GET['qualificationid'] = 0;
            }

        }
        $compact['pagenewslist'] = \Auth::user()->hasManyTraining()->where('ty', $GLOBALS['ty'])->where('isstate', 1)->where(function ($query) {
            $_GET['trainingid'] and $query->where('trainingid', $_GET['trainingid']);
            $_GET['industryid'] and $query->where('industryid', $_GET['industryid']);
            $_GET['neixunid'] and $query->where('neixunid', $_GET['neixunid']);
            $_GET['publicid'] and $query->where('publicid', $_GET['publicid']);
            $_GET['qualificationid'] and $query->where('qualificationid', $_GET['qualificationid']);
            $_GET['title'] and $query->where('title', 'like', '%' . $_GET['title'] . '%');
        })->paginate($this->paginate)->toArray($this->toArray);
        $compact['ckey'] = '';
        foreach ($_GET as $key => $value) {
            if($key<>'page' && $value) $compact['ckey'] .= "&$key=$value";
        }
        return $compact;
    }

    /**
     * 证书管理
     */
    public function certificate(&$compact)
    {
        $_GET['certificate_lid'] = isset($_GET['certificate_lid']) ? (int)$_GET['certificate_lid'] : 0;
        $_GET['title'] = isset($_GET['title']) ? $_GET['title'] : '';
        $compact['pagenewslist'] = \Auth::user()->hasManyCertificate()->where('tty', $GLOBALS['tty'])->where('isstate', 1)->where(function ($query) {
            empty($_GET['certificate_lid']) or $query->where('certificate_lid', intval($_GET['certificate_lid']));
            empty($_GET['title']) or $query->where('title', 'like', '%' . $_GET['title'] . '%');
        })->paginate($this->paginate)->toArray($this->toArray);
        $compact['ckey'] = isset($_GET['certificate_lid']) ? '&certificate_lid=' . intval($_GET['certificate_lid']) : '';
        return $compact;
    }

    /**
     * 国际教育管理
     */
    public function education(&$compact)
    {
        $_GET['title'] = isset($_GET['title']) ? $_GET['title'] : '';
        $compact['pagenewslist'] = \Auth::user()->hasManyEducation()->where('tty', $GLOBALS['tty'])->where('isstate', 1)->where(function ($query) {
            empty($_GET['title']) or $query->where('title', 'like', '%' . $_GET['title'] . '%');
        })->paginate($this->paginate)->toArray($this->toArray);
//        $compact['ckey'] = isset($_GET['certificate_lid']) ? '&certificate_lid=' . intval($_GET['certificate_lid']) : '';
        return $compact;
    }

    /**
     * 实名认证
     */
    public function certification(Request $request)
    {
        $request = request();
        $rules = [
//            'org' => 'required|between:2,20',
            'registerid' => 'required|numeric',
            'legal' => 'required|between:2,6',
            'business_time' => 'required_with:business_time|date_format:Y-m-d',
            'islonger' => 'required_with:islonger',
//            'uploadimg' => 'image',
        ];

        $validator = Validator::make($request->all(), $rules);
        $errors = $validator->errors(); // 输出的错误，自己打印看下
        if ($validator->fails()) {
            return noticeResponseJson(412, '执行失败', $errors);
        }

        $user = \Auth::user();
        $user_id = $user->id;
        $business = $user->profile;
        $business->business_time = $request->get('islonger') ? null : $request->get('business_time');
        $business->legal = $request->get('legal');
        $business->registerid = $request->get('registerid');
        $business->certified_status = 1;
        if ($business->save()) {
            #发送认证请求
            $flag = Notice::create([
                'user_id'        => 0,
                'sender_id'      => $user_id,
                'action_type_id' => 1,
                'source_id'      => $user_id,
                'status'         => 1,
            ]);
            if ($flag) {
                return handleResponseJson(200, '申请认证成功!', '?');
            }
        }
        return handleResponseJson(412, '申请认证失败!');


    }

    /**
     * 订单管理
     */
    public function order(&$compact)
    {
        $table = __FUNCTION__;
        return $this->relatedToNewsCats($table, $action, $id);
    }

    /**
     * 用户管理
     */
    public function users(&$compact)
    {
        $table = __FUNCTION__;
        return $this->relatedToNewsCats($table, $action, $id);
    }

    /**
     * 安全设置
     */
    public function safe(Request $request)
    {

        $rules = [
            'origin' => 'required|between:6,20',
            'new' => 'required|between:6,20',
            'password2' => 'required|between:6,20|same:new',
        ];

        $validator = Validator::make($request->all(), $rules);

        $user = \Auth::user();
        $origin = $request->origin;
        $user_id = $user->id;
        $hashedPassword = $user->password;

        $validator->after(function ($validator) use ($hashedPassword, $origin) {
            if (!\Hash::check($origin, $hashedPassword)) {
                $validator->errors()->add('origin', '旧密码错误');
            }
        });

        $errors = $validator->errors(); // 输出的错误，自己打印看下
        if ($validator->fails()) {
            return noticeResponseJson(412, '执行失败', $errors);
        }
        $user->password = bcrypt($request->new);
        if ($user->save()) {
            return handleResponseJson(200, '密码修改成功!', '?');
        } else {
            return handleResponseJson(412, '密码修改失败,请稍后再试', '?');
        }
    }

    public function dispatch($action = '', $id = '')
    {
        #将一级栏目的路劲名作为表名
        $table = $GLOBALS['uri'][1];
        path2ptt(substr(Request()->path(), 8));
        //dd($GLOBALS);

        $compact = ['user' => \Auth::user()->relationsToArray(), 'table' => $table];
        switch ($action) {
            case 'create':
            case 'update':
                $row = \Auth::user()->{'hasMany' . ucfirst($table)}->find($id);
                $compact['row'] = $row ? $row->toArray() : [];
                return view("business.cu", $compact);
                break;
            default://列表
                if (in_array($table, $this->fillTable)) {
                    if (is_null($GLOBALS['tty'])) {
                        if ($db_tty = v_path(null, $GLOBALS['ty'])) {
                            $GLOBALS['tty'] = $db_tty->id;
                            $GLOBALS['tty_data'] = $db_tty;
                            $GLOBALS['tty_path'] = $db_tty->path;
                        }
                    }
                    $compact = $this->$table($compact);
                }
                return view("business.$table", $compact);
                break;
        };
    }

    public function delete($table, Request $request)
    {
        if (in_array($table, $this->fillTable)) {
            #出入表名
            $DeleteData = new \App\Helpers\DeleteData($table, $request->get('ids'), \Auth::user()->id);
        }
        return handleResponseJson(200, '');
    }

    /**
     * 添加或修改
     */
    public function with($table = '', $id = '', Request $request)
    {
        path2ptt(substr(Request()->path(), 8));
        if (is_numeric($table)) {
            $id = $table;
            $table = $GLOBALS['pid_path'];
        }
        if (in_array($table, $this->fillTable)) {
            #出入表名
            $WithData = new \App\Helpers\WithData($table, $id, $request->all());
            $return = $WithData->submit(\Auth::user()->id);
            $redirect = $request->path();
            $redirect = preg_replace('/cu(.*)$/', '', $redirect);
            return handleResponseJson($return[0], $return[1], u($redirect));
        }
        return handleResponseJson(203, '你没有权限执行此操作', '?');
    }
}
