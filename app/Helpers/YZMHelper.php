<?php
namespace app\Helpers;

class YZMHelper
{
	const NUMBER = 1;
	const MIX = 2;
	private $debug = false;
	private static $var = 'yzm';
	private static $var_expire = 'yzm_expire';

	private static $session = null;
	private static $data = null;

	protected $id = '';
	protected $needle = '';

	public function __construct($id)
	{
		self::init();
		$this->debug = env('APP_DEBUG', false);
		$this->id = md5($id);
	}

	public function debug() { return $this->debug; }

	public function legal($with_code)
	{
		$this->needle = $with_code;
		if ($this->debug) {
			return true;
		} else {
			return $this->valid() && $this->verify();
		}
	}

	public function valid() // expired
	{
		if ($session_expire = $this->get(self::$var_expire)) {
			return $session_expire - time() > 0;
		}
		return false;
	}

	/**
	 * Prevents Cross-Site Scripting Forgery
	 * @return boolean
	 */
	public function verify() {
		if ( $session_code = $this->get(self::$var) ) {
			if( $code && strtolower($code) == strtolower($this->needle) ) {
				return true;
			}
		}
		return false;
	}

	public function _YZM()
	{
		// dd(session()->get(self::$var));
		return 'get:'.$this->needle.',session:'.$this->get(self::$var);
	}

	public function push($time = 120, $length = 6)
	{
		$code = self::getCode($length);
		$this->set(self::$var, $code);
		$this->set(self::$var_expire, time() + $time);
		return $code;
	}

	public function pop()
	{
		unset(self::$data[$this->id]);
		$this->sync();
	}




	public static function getCode($num = 4, $type = self::NUMBER){
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

	public static function init()
	{
		if (self::$session) {
			self::$data = self::$session->get(self::$var, []);
		} else {
			self::$session = session();
			self::$session->has(self::$var) or self::$session->put(self::$var, []);
		}
	}

	public function get($var)
	{
		if (isset(self::$data[$this->id])) {
			return self::$data[$this->id][$var];
		} else {
			return null;
		}
	}
	public function set($var,$val)
	{
		self::$data[$this->id][$var] = $val;
		self::$session->put(self::$var, self::$data);
		$this->sync();
	}
	public function sync()
	{
		self::$session->put(self::$var, self::$data);
	}

}
