<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class AboutController extends Controller
{
	public function show(Request $request)
	{
		// $ty == 0 && $ty = 37;
		if ($GLOBALS['ty'] == 40) {
			$content = Message::feedback();
		} elseif($GLOBALS['ty'] == 41) {
		} else {
			$content = htmlspecialchars_decode( v_news($GLOBALS['pid'], -$GLOBALS['ty'], 'content') );
		}

		$newCats = new NewsCats();
		$left = $newCats->getNavigation(['catname', 'path', 'id'], $GLOBALS['pid']);
		return view('about', compact('content', 'left'));
	}

}


