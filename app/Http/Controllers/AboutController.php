<?php

namespace App\Http\Controllers;

use App\NewsCats;
use App\Message;
use Illuminate\Http\Request;
use Validator;
class AboutController extends Controller
{
	public function __construct()
	{
		$left = (new NewsCats)->getNavigation(['catname', 'path', 'id'], $GLOBALS['pid']);
		view()->share('left', $left);
	}

	public function show(Request $request)
	{
		$content = htmlspecialchars_decode( v_news($GLOBALS['pid'], -$GLOBALS['ty'], 'content') );
		return view('about', compact('content'));
	}

	public function problem()
	{
		$list = (new \App\News)->v_list([$GLOBALS['pid'], $GLOBALS['ty']],['title', 'content']);
		return view('about', compact('list'));
	}

	public function create()
	{
	    return view('about.feedback');
	}

	/*public function registter(Request $request){
	    $messages = [
	        'email.required' => '邮箱不能为空',
	        'password.required' => '密码不能为空',
	        'password2.required' => '确认密码不能为空',
	    ];
	    $validator = Validator::make($request->all(),[
	        'email' => ['bail','required', 'email', Rule::unique('member')->ignore($user->id)],
	        'password' => 'required',
	        'password2' => 'required',
	    ],$messages);
	    $errors = $validator->errors(); // 输出的错误，自己打印看下
	    if ($validator->fails()){
	         return response()->json([
	             'success' => false,
	             'errors' =>  $errors
	         ]);
	    }
	}
*/
	public function store(Request $request)
	{
		$messages = [
		    'message.required' => '意见反馈字段不能为空!',
		    'contact.required' => '联系方式字段不能为空!',
		];
		$validator = Validator::make($request->all(),[
		    'message' => 'bail|required',
		    'contact' => 'bail|required',
		],$messages);
		$errors = $validator->errors(); // 输出的错误，自己打印看下
		if ($validator->fails()){
		     return noticeResponseJson(412, '意见反馈提交失败', $errors);
		}

		$message = $request->get('message');
		$contact = $request->get('contact');
		if (
			(new Message)->feedback([
				'phone' => $contact,
				'message' => $message,
			])
		) {
	        return handleResponseJson(200, '感谢您的反馈^_^!');
		}
        return handleResponseJson(201, '反馈失败或刷新页面重试');
	}



}


