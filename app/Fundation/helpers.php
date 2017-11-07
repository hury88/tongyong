<?php
// 自定义函数
use App\News;
use Illuminate\Contracts\Routing\UrlGenerator;
use App\Http\FileController;
use App\Helpers\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

function _r_($box)
{
	return sprintf($box, base64_encode(url()->previous()));
}
function qq_online($qq)
{
	return 'http://wpa.qq.com/msgrd?v=3&uin='.$qq.'&site=qq&menu=yes';
}


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
	}

	function reimg($img,$width = 0, $height = 0)
	{
		$p = '/img/'.$img;
		$width && $p .= "&w=$width";
		$height && $p .= "&h=$height";
        return $p;
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
        $args = array_filter(func_get_args());
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
	$d = [];
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


function upload(Request $request, $file)
{
	$v = \Validator::make($request->all(), [$file => 'image']);
	if ($v->fails()) {
		return false;
	}
	return File::section('upload_img')->upload($request->file($file));
}

function uppro($file, &$fields) {
     if ($filename = upload(Request(), $file)) {
         $fields[$file] = $filename;
     } else {
         return false;
     }}

function ifUploadCheckIt(Request $request, $file, $origin, $mind) {
     if ($file = $request->file($file)) {
     	if ($file->isValid()) {
            File::deleteFile($origin);
     		return File::section('upload_img')->upload($file);
     	} else {
            return noticeResponseJson(412, '执行失败', trans('validation.attributes.'.$mind) . '上传失败!');
     	}
     }
     return false;
}