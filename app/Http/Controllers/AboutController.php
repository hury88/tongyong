<?php

namespace App\Http\Controllers;

use App\NewsCats;
use App\Message;
use Illuminate\Http\Request;

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
	   /* $kind_of_request = ['contact' => trans('company.contact'),
	                'sales'           => trans('company.sales'),
	                'support'         => trans('company.support'), ];

	    $panel = ['center' => ['width' => '12']];*/
	    return view('about.feedback');
	}

	public function store(ContactFormRequest $request)
	{
	    $company = Company::select('contact_email',
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

	    return \Redirect::route('contact')->with('message', $thanks);
	}



}


