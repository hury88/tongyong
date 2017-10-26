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
		    'message.required' => '请留下您的宝贵意见!',
		    'contact.required' => '我怎么联系您?',
		];
		$validator = Validator::make($request->all(),[
		    'message' => 'bail|required',
		    'contact' => 'bail|required',
		],$messages);
		$errors = $validator->errors(); // 输出的错误，自己打印看下
		if ($validator->fails()){
		     return responseJson(-100, '反馈失败', $errors);
		}
	    /*$company = Company::select('contact_email',
	                              'sales_email',
	                              'support_email',
	                              'website_name')
	                     ->find(1)
	                     ->toArray();

	    $from_address = $company[$request->get('type_of_request').'_email'];
	    $name = $request->get('name');
	    $email = $request->get('email');
	    $message_ = $request->get('message');
	    $title = trans('company.email_title_'.$request->get('type_of_request'));
	    $thanks = trans('company.email_thanks_'.$request->get('type_of_request'));

	    return view('emails.contact', compact('thanks', 'title', 'name', 'email', 'message_'));

	    \Mail::send('emails.contact', compact('thanks', 'title', 'name', 'email', 'message_'),
	        function ($message) use ($request, $company, $from_address, $email) {
	            $message->from($from_address, $company['website_name']);
	            $message->to($email)
	                    ->cc($from_address)
	                    ->subject(trans('about.contact').' :: '.$company['website_name']);
	        });

	    return \Redirect::route('contact')->with('message', $thanks);*/
	}



}


