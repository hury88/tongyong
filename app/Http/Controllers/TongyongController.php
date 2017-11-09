<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;

class TongyongController extends Controller
{
    public function __construct()
    {
        $this->middleware('App\Http\Middleware\Authenticate');
    }

    // 举报
    public function complaint(Request $request)
    {
    	if (empty($request->content)) {
    		return noticeResponseJson(412, '举报失败', '请填写举报内容');
    	}
    	$person_id = \Auth::id();
    	if (Notice::whereSenderId($person_id)->whereActionTypeId(15)->whereSource_id($request->job_id)->first()) {
    		return noticeResponseJson(412, '举报失败', '您已举报过此内容');
    	}
    	$ext = $request->ext ?: '职位';
    	$public_title = '举报了'.$request->business_name.'发布的'.$request->job_title;
    	$flag = Notice::create([
    	    'user_id'        => 0,
    	    'sender_id'      => $person_id,
    	    'action_type_id' => 15,
    	    'source_id'      => $request->job_id,
    	    'title' => '用户'.\Auth::user()->member_name . $public_title.'<b style="color:red">'.$ext.'</b>',
    	    'content' => '举报内容: '.$request->content,
    	]);
    	if ($flag) {
    	    Notice::create([
    	        'user_id'        => $person_id,
    	        'sender_id'      => 0,
    	        'action_type_id' => 15,
    	        'source_id'      => 0,
    	    	'title' => '您刚刚' . $public_title.$ext,
	    	    'content' => '举报内容: '.$request->content,
    	    ]);
            return handleResponseJson(200, '举报成功');
    	}
        return handleResponseJson(201, '举报失败,请稍后再试');

    }
}
