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
	function v_id($id,$field='',$table='news')
	{
		$db = DB::table($table)->where('id',$id);
	    if ($field) {
	        return isset($db->first([$field])->$field) ? $db->$field : null;
	    } else {
	        return $db->first();
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
	//为了获取方便增加 查询news_cats表函数
	function v_news_cats($id, $field='catname'){
		if ($field == 'catname') {
		    return DB::table('news_cats')->where('id',$id)->pluck($field);
		} else {
		    return DB::table('news_cats')->where('id',$id)->first($field);
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
		$GLOBALS['pid'] = $GLOBALS['ty'] = $GLOBALS['tty'] =
		$GLOBALS['pid_path'] = $GLOBALS['ty_path'] = $GLOBALS['tty_path'] =
		$GLOBALS['pid_data'] = $GLOBALS['ty_data'] = $GLOBALS['tty_data'] = null;
		$path = substr($path, -6)  == '/index' ? substr($path, 0, -6) : $path;
		$uri = explode('/', $path);
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
				}
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
            if(empty($img)){
                if(!$nopic)$nopic = "/uploadfile/nopic.jpg";
                $path = $nopic;
                unset($nopic);
            }else{
                $path= $imgPath;
            }
            // if(Request::instance()->isMobile()){
                return $path;
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
        return "/$args";
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

		$array[] = [config('trans.home'), '/'];
		$title = [];
		if($GLOBALS['pid']){
			$url = u($GLOBALS['pid_path']);
			$catname = $GLOBALS['pid_data']->catname;
			$array[] = [$catname, $url];
			array_push($title, $catname);
		}
		if($GLOBALS['ty']){
			$url = u($GLOBALS['pid_path'], $GLOBALS['ty_path']);
			$catname = $GLOBALS['ty_data']->catname;
			$array[] = [$catname, $url];
			array_push($title, $catname);
		}
		if($GLOBALS['tty']){
			$url = u($GLOBALS['pid_path'], $GLOBALS['ty_path'], $GLOBALS['tty_path']);
			$catname = $GLOBALS['tty_data']->catname;
			$array[] = [$catname, $url];
			array_push($title, $catname);
		}

		if (isset($GLOBALS['title']) && $GLOBALS['title']){
			$array[] = [$GLOBALS['title'], 'javascript:void(0);'];
			array_push($title, $GLOBALS['title']);
		}
		$count = count($array)-1;
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
/**/
];
		UNSET($url,$catname,$breadTemp,$bread);
	}
