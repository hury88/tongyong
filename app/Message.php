<?php

namespace App;

use Exception;
use App\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';

    public static function feedback()
	{
		$U = u('about', 'feedback');
		return <<<T
<form action="" method="post" class="form">
	<div class="contactsBom">
		<ul>
			<li class="first">$contact_copy</li>
			<li class="two">
				<span><input type="text" name="realname" placeholder="Name"/></span>
				<span><input type="text" name="email" placeholder="Email"/></span>
				<span style="padding-right: 0;"><input type="text" name="phone" placeholder="Phone"/></span>
			</li>
			<li class="three"><textarea name="message" rows="" cols="" placeholder="Message"></textarea></li>
			<li class="four"><a onclick="return model(this, '$U');" ><img src="/style/images/submit.jpg"/></a></li>
		</ul>
	</div>

</form>
<script type="text/javascript" src="/public/tools/js/jquery.js"></script>
<script>
	$("#message").click(function(){
		return model(this, "$U");
	})
</script>
T;
	}

}

function dieJson($error,$message,$redirect=false){
    $arr = [
    	'error' => $error,
    	'message'    => $message,
    ];
    $redirect && $arr['redirect'] = $redirect;
    unset($error,$message,$redirect);
    die( json_encode($arr) );
}
