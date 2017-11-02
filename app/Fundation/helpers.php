<?php
// 自定义函数
use App\News;
use Illuminate\Contracts\Routing\UrlGenerator;
use App\Http\FileController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

if (!function_exists('v_show')) {
	//{{vv(3, 7, '<div title="@$title@" class="swiper-slide"> <img src="__IMG__" /> </div>')}}

	function v_show($where,$tpl,$limit=null) {
		$new = new News();
		list($field, $flag) = News::parseTpl($tpl);
		$enty = $new->v_list($where, $field, $limit);

		$list = '';
		foreach ($enty as $key => $obj) {
			/*extract($value);
			if ($flag) {
				$URL = U($pid.'/detail', ['id'=>$id]);
			}*/
			eval(" \$list .= '$tpl';");
		}
		return $list;
	}
}
	function v_id($id,$field='*',$table='news')
	{
		$db = DB::table($table)->where('id',$id)->first([$field]);
	    if ($field == '*') {
	        return $db;
	    } else {
	        return  $db ? $db->$field : null;
	    }
	}
	//为了获取方便增加 查询news表函数
	function v_news($pid,$ty,$field='title'){
		$db = DB::table('news')->where('pid', $pid)->where('ty', $ty)->first([$field]);
		if (is_array($field)) {
		    return $db;
		} else {
		    return isset($db->$field) ? $db->$field : null;
		}
	}
//为了获取方便查询pic表函数
function v_pic($pid){
    $db = DB::table('pic')->where('ti', $pid)->get();

    return $db;
}
	//为了获取方便增加 查询news_cats表函数
	function v_news_cats($id, $field='catname'){
		$db = DB::table('news_cats')->where('id',$id)->first([$field]);
	    if ($field == '*') {
	        return $db;
	    } else {
	        return  $db ? $db->$field : null;
	    }
	}
	//为了获取方便增加 查询news_cats表函数
	function v_path($path=null, $pid=0){
		$db = DB::table('news_cats')
		    ->where('pid', $pid)
		    ->orderBy('disorder', 'desc')
		    ->orderBy('id', 'asc');
		if ($path) $db->where('path', $path);// 获取默认ty

		if ($db) {
			return $db->first(['id', 'catname', 'img1', 'img2', 'path']);
		} else {
			abort(404);
		}

	}

	// 将path => pid/ty/tty
	function path2ptt($path) {
        $path = trim($path, '/');
		$GLOBALS['pid'] = $GLOBALS['ty'] = $GLOBALS['tty'] =
		$GLOBALS['pid_path'] = $GLOBALS['ty_path'] = $GLOBALS['tty_path'] =
		$GLOBALS['pid_data'] = $GLOBALS['ty_data'] = $GLOBALS['tty_data'] = null;
		$path = substr($path, -6)  == '/index' ? substr($path, 0, -6) : $path;
		if (empty($path) || $path == '/') {
			return false;
		} else {
			$uri = explode('/', $path);
			$uri = array_slice($uri, 0, 3);
			$GLOBALS['uri'] = $uri;
		}
		$level = count($uri);
		if ($level == 1) {
			if ( $db_pid = v_path($uri[0]) ) {
				$GLOBALS['pid'] =  $db_pid->id;
				$GLOBALS['pid_path'] = $uri[0];
				$GLOBALS['pid_data'] = $db_pid;
				if ( $db_ty = v_path(null, $db_pid->id) ) {
					$GLOBALS['ty'] = $db_ty->id;
					$GLOBALS['ty_path'] = $db_ty->path;
					$GLOBALS['ty_data'] = $db_ty;
				}
			}
		} elseif($level == 2) {
			if ( $db_pid = v_path($uri[0]) ) {
				$GLOBALS['pid'] =  $db_pid->id;
				$GLOBALS['pid_path'] = $uri[0];
				$GLOBALS['pid_data'] = $db_pid;
				if ( $db_ty = v_path($uri[1], $db_pid->id) ) {
					$GLOBALS['ty'] = $db_ty->id;
					$GLOBALS['ty_path'] = $uri[1];
					$GLOBALS['ty_data'] = $db_ty;
				} /*elseif ( $db_ty = v_path(null, $db_pid->id) ) {
					$GLOBALS['ty'] = $db_ty->id;
					$GLOBALS['ty_path'] = $db_ty->path;
					$GLOBALS['ty_data'] = $db_ty;
				}*/
			}
		} elseif($level == 3) {
			if ( $db_pid = v_path($uri[0]) ) {
				$GLOBALS['pid'] =  $db_pid->id;
				$GLOBALS['pid_path'] = $uri[0];
				$GLOBALS['pid_data'] = $db_pid;
				if ( $db_ty = v_path($uri[1], $db_pid->id) ) {
					$GLOBALS['ty'] = $db_ty->id;
					$GLOBALS['ty_path'] = $uri[1];
					$GLOBALS['ty_data'] = $db_ty;
					if ( $db_tty = v_path($uri[2], $db_ty->id) ) {
						$GLOBALS['tty'] = $db_tty->id;
						$GLOBALS['tty_data'] = $db_tty;
						$GLOBALS['tty_path'] = $uri[2];
					}
				}
			}
		} else {
			abort(404);
		}
	}

	function img($img,$nopic=false, $width = 0, $height = 0)
	{
            $upload ='/uploadfile/upload/';
            $imgPath = $upload .$img;
            if ($img) {
                $path= $imgPath;
            } else {
            	if ($nopic) {
	                $path= $nopic;
            	} else {
	                $path= '/uploadfile/nopic.jpg';
            	}
            }
            return $path;
            // if(Request::instance()->isMobile()){
//		static $file;
//		if (is_null($file)) {
//			$file = new FileController;
//		}
//		$file->img;
	    // return $filepath . "?imageView2/1/w/{$width}/h/{$height}";
	}


    /**
     * Generate a u for the application.
     *
     * @param  string  $path
     * @param  mixed   $parameters
     * @param  bool    $secure
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    function u()
    {
        $args = func_get_args();
        $args =  $args ? implode('/', $args) : '';
        return '/'.trim($args, '/');
    }

	function bread()
	{	//面包屑导航
		/*if ($q) {
			// ECHO '搜索"'.$q.'"的结果';
			echo '搜索';
			return;
		}*/
		$array = [];
		$sp = ' > ';
		$breadTemp = '';

		$array[] = ['首页', '/'];
		$title = [];
		if($GLOBALS['pid']){
			$url = u($GLOBALS['pid_path']);
			$catname = $GLOBALS['pid_data']->catname;
			$array[] = [$catname, $url];
			array_unshift($title, $catname);
		}
		if($GLOBALS['ty']){
			$url = u($GLOBALS['pid_path'], $GLOBALS['ty_path']);
			$catname = $GLOBALS['ty_data']->catname;
			$array[] = [$catname, $url];
			array_unshift($title, $catname);
		}
		if($GLOBALS['tty']){
			$url = u($GLOBALS['pid_path'], $GLOBALS['ty_path'], $GLOBALS['tty_path']);
			$catname = $GLOBALS['tty_data']->catname;
			$array[] = [$catname, $url];
			array_unshift($title, $catname);
		}

		if (isset($GLOBALS['title']) && $GLOBALS['title']){
			$array[] = [$GLOBALS['title'], 'javascript:void(0);'];
			array_unshift($title, $GLOBALS['title']);
		}
		return [$array, $title];
	/*	$count = count($array)-1;
		foreach ($array as $key => $value) {
			if ($count==$key) {
				$breadTemp .= '<a href="javascript:;" style="color:#f00;">'.$value[0].'</a>';
			} else {
				$breadTemp .= '<a href="'.$value[1].'" style="font-style:italic">'.$value[0].'</a>'.$sp;
			}
		}
		global $news_cats_ty_catname;
		$news_cats_ty_catname = ucfirst($news_cats_ty_catname);
		return [
<<<T
<p style="padding-bottom: 30px;">
	<span style="color: #333;font-weight: bold;font-size: 26px;">$news_cats_ty_catname</span>
	<span style="float: right;cursor: pointer;font-size: 14px;">
		$breadTemp
	</span>
</p>
T
,
<<<T
<p style="padding-bottom: 30px;">
	<span style="color: #333;font-weight: bold;font-size: 26px;">$news_cats_ty_catname</span>

</p>
T
];
		UNSET($url,$catname,$breadTemp,$bread);*/
	}

/**
 * @param $state h_s = 200,h_i = 201;h_w = 203,h_e = 412;h_c = 2011; //验证码
 * @param $message
 * @param bool $redirect
 * @return \Illuminate\Http\JsonResponse
 */
function handleResponseJson($state,$message,$redirect=false){
    $arr = [
        'state' => $state,
        'message' => $message,
        'status' => 'handle',
    ];
    $redirect && $arr['redirect'] = $redirect;
    unset($state,$title,$message,$redirect);
    return response()->json($arr);
}

/**
 * @param $state n_s = 200,n_i = 201;n_w = 303,n_e = 412;
 * @param $title
 * @param $message
 * @param bool $redirect
 * @return \Illuminate\Http\JsonResponse
 */
function noticeResponseJson($state,$title,$message,$redirect=false){
    $arr = [
        'state' => $state,
        'title' => $title,
        'message' => $message,
        'status' => 'notice',
    ];
    $redirect && $arr['redirect'] = $redirect;
    unset($state,$title,$message,$redirect);
    return response()->json($arr);
}

function get_arr($typeid,$pid=0)
{
    $data = DB::table('nature')->select('id','catname')->where("pid",$pid)->where("typeid",$typeid)->orderBy('disorder','desc')->orderBy('id','asc')->get();

    foreach ($data as $v) {
        $d[$v->id]=$v->catname;
    }

    return $d;

}

function get_first($typeid,$pid=0)
{

    $data = DB::table('nature')->select("id")->where("pid",$pid)->where("typeid",$typeid)->orderBy('disorder','desc')->orderBy('id','asc')->first();

    return $data->id;
}
function get_edselect($d,$lm,$n,$select){
    $str='';
    foreach ($d as $k => $v){
        if($k==$select){
            $sl='selected';
        }else{
            $sl='';
        }
        $str.="<option {$sl} value='{$k}'>{$v}</option>";
    }
    $cs= "<div class='layui-form-item'>
            <label title=\"{$n}\" class='layui-form-label' style='width: 85px;'>{$lm}<b>*</b></label>
            <div class='layui-input-block'><select name=\"{$n}\" id=\"{$n}\" style='width:80%;height:35px;font-size:15px;'>{$str}</select> </div>
          </div>";
    return $cs;
}
function upload()
{
     $file = Input::file('Filedata');
     if($file->isValid()){
         $extension = $file->getClientOriginalExtension();
         $newName = date('YmdHis').mt_rand(100,999).".".$extension;
         $path = $file->move(base_path()."/uploads",$newName);
         $filepath = 'uploads/'.$newName;
         return $filepath;
         //检验上传的文件是否有效
         $clientName = $file->getClientOriginalName();//获取文件名称
         $tmpName = $file->getFileName();  //缓存在tmp文件中的文件名 例如 php9732.tmp 这种类型的
         $realPath = $file->getRealPath();  //这个表示的是缓存在tmp文件夹下的文件绝对路径。
         $entension = $file->getClientOriginalExtension(); //上传文件的后缀
         $mimeType = $file->getMimeType(); //得到的结果是imgage/jpeg
         $path = $file->move('storage/uploads');
         //如果这样写的话,默认会放在我们 public/storage/uploads/php9372.tmp
         //如果我们希望将放置在app的uploads目录下 并且需要改名的话
         $path = $file->move(app_path().'/uploads'.$newName);
         //这里app_path()就是app文件夹所在的路径。$newName 可以是通过某种算法获得的文件名称
         //比如 $newName = md5(date('YmdHis').$clientName).".".$extension;
     }
}

/**
 * [uppro 上传文件及图片]
 * @return [type] [description]
 */
/*function uppro($iptname,$path,$originname='',$savename='',$active=Image::IMAGE_THUMB_SCALE)
{
	$file = Input::file($iptname);
	if($file->isValid()){
	    $extension = $file->getClientOriginalExtension();
	    $newName = date('YmdHis').mt_rand(100,999).".".$extension;
	    $path = $file->move(base_path()."/uploads",$newName);
	    $filepath = 'uploads/'.$newName;
	    return $filepath;
	    //检验上传的文件是否有效
	    $clientName = $file->getClientOriginalName();//获取文件名称
	    $tmpName = $file->getFileName();  //缓存在tmp文件中的文件名 例如 php9732.tmp 这种类型的
	    $realPath = $file->getRealPath();  //这个表示的是缓存在tmp文件夹下的文件绝对路径。
	    $entension = $file->getClientOriginalExtension(); //上传文件的后缀
	    $mimeType = $file->getMimeType(); //得到的结果是imgage/jpeg
	    $path = $file->move('storage/uploads');
	    //如果这样写的话,默认会放在我们 public/storage/uploads/php9372.tmp
	    //如果我们希望将放置在app的uploads目录下 并且需要改名的话
	    $path = $file->move(app_path().'/uploads'.$newName);
	    //这里app_path()就是app文件夹所在的路径。$newName 可以是通过某种算法获得的文件名称
	    //比如 $newName = md5(date('YmdHis').$clientName).".".$extension;
	}

    $realpath = trim(ROOT_PATH, DS) . $path;

    // $delimg=isset($_POST[$name]) ? $_POST[$name] : '';
    if(!isset($_FILES[$iptname]))return 0;
    $img_name = $_FILES[$iptname]['name'];
    $ext = pathinfo($img_name, PATHINFO_EXTENSION);
    $savename or $savename = date("YmdHis").mt_rand(10,99);
    $savename = "$savename.$ext";
    if($img_name){
        if ($originname && file_exists($realpath.$originname)) @unlink($realpath.$originname);
        uploadimg($iptname,$realpath,$savename,$active);
        return $savename;
    }
    return false;
}
*/

//图片上传
/*function uploadimg($obj,$path,$name,$active){
    global $system_pictype,$system_picsize;
    $picaExt = explode('|',$system_pictype);                          //图片文件
    $uppic=$_FILES[$obj]['name'];                                   //文件名称
    $thumbs_type=strtolower(substr($uppic,strrpos($uppic,".")+1));  //上传类型
    $thumbs_file=$_FILES[$obj]['tmp_name'];                         //临时文件
    $thumbs_size=$_FILES[$obj]['size'];                             //文件大小
    $imageinfo = getimagesize($thumbs_file);


    $upfile=$path.$name;
    if(in_array($thumbs_type,$picaExt)&&$thumbs_size>intval($system_picsize)*1024){
        returnJson(-100,"图片上传大小超过上限:".ceil($system_picsize/1024)."M！");
    }

    if($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/png' && $imageinfo['mime'] != 'image/bmp') {
        returnJson(-100,"非法图像文件！");
    }

    if(!in_array($thumbs_type,$picaExt)){
        returnJson(-100,"上传图片格式不对，请上传".$system_pictype."格式的图片！");
    }
    if (!is_writable($path)){
        //修改文件夹权限
        $oldumask = umask(0);
        mkdir($path,0777);
        umask($oldumask);
        returnJson(-100,"请确保文件夹的存在或文件夹有写入权限");
    }

    $imgsize = config('pic.imgsize');
    if($imgsize && strpos($imgsize, '*')) {
        list($w, $h) = explode('*', $imgsize, 2);
        $image = new Image();
        $result = $image->open($thumbs_file)->thumb($w, $h, $active)->save($upfile);
    } else {
        $result = copy($thumbs_file,$upfile);
    }

    if(!$result){
        returnJson(-100,"上传失败!");
    }
}*/

