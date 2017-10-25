<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
	public function show(Request $request)
	{
		//默认 about/index 或 about 都指向 第一个 about/contact
		//情况一 about => contact
		//情况二 about/index => contact
		// $default = 'contact';
		// $uri = explode('/', $request->path(), 2);
		// if (isset($uri[1])) {
			// $uri[1] == 'index' && $uri[1] = $default;
		// } else {
			// $uri[1] = $default;
		// }
		// list($pid, $ty) = getPT($uri[0], $uri[1]);
		return v_news(36, 37, 'content');
	}

}


