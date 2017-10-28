<?php
namespace app\Helpers;

class YZMHelper
{
	const NUMBER = 1;
	const MIX = 2;
	private $debug = false;
	private static $var = 'yzm';
	private static $var_expire = 'yzm_expire';
	public $form = null;

	protected $id = '';

	public function __construct($id)
	{
		$this->debug = config('debug');
		$this->id = md5($id);
	}

	public function legal()
	{
		return !$this->expired() && $this->verify();
	}

	public function expired()
	{
		if ($this->debug) {
			return false;
		} else {
			if (isset($_SESSION[self::$var][$this->id])) {
				return time() - $_SESSION[self::$var][$this->id][self::$var_expire] < 0;
			} else {
				return false;
			}
		}
	}

	/**
	 * Prevents Cross-Site Scripting Forgery
	 * @return boolean
	 */
	public function verify() {
		if ( isset($_SESSION[self::$var][$this->id]) ) {
			if( isset($_GET[self::$var]) && strtolower($_GET[self::$var]) == strtolower($_SESSION[self::$var][$this->id][self::$var]) ) {
				return true;
			}
			if( isset($_POST[self::$var]) && strtolower($_POST[self::$var]) == strtolower($_SESSION[self::$var][$this->id][self::$var]) ) {
				return true;
			}
		}
		return false;
	}

	public function setCode($time = 63)
	{
		if (!isset($_SESSION[self::$var]) || is_array($_SESSION[self::$var])) {
			$_SESSION[self::$var] = [];
		}
		$_SESSION[self::$var][$this->id][self::$var_expire] = time() + $time;
		$code = $_SESSION[self::$var][$this->id][self::$var] = getCode(6, GETCODE_NUMBER);
		return $code;
	}

	public static function clear($id)
	{
		$id = md5($id);
		if (isset($_SESSION[self::$var][$id])) {
			$_SESSION[self::$var][$id][self::$var_expire] = time();
			$_SESSION[self::$var][$id][self::$var] = '';
		}
	}




	public static function getCode($num = 4, $type=MIX){
	    if ($type == self::MIX) {
	        $str = "1,2,3,4,5,6,7,8,9,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z";      //要显示的字符，可自己进行增删
	    } elseif($type == self::NUMBER){
	        $str = "1,2,3,4,5,6,7,8,9,0";      //要显示的字符，可自己进行增删
	    }
	    $list = explode(",", $str);
	    $cmax = count($list) - 1;
	    $verifyCode = '';
	    for ( $i=0; $i < $num; $i++ ){
	          $randnum = mt_rand(0, $cmax);
	          $verifyCode .= $list[$randnum];           //取出字符，组合成为我们要的验证码字符
	    }
	    return $verifyCode;        //将字符放入SESSION中

	}

}
