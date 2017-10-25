<?php
// 自定义函数
use App\News;
use Illuminate\Contracts\Routing\UrlGenerator;
use App\Http\FileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Db;

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
	    if ($field) {
	        return Db::table($table)->where('id',$id)->pluck($field);
	    } else {
	        return Db::table($table)->where('id',$id)->first();
	    }
	}
	//为了获取方便增加 查询news表函数
	function v_news($pid,$ty,$field){
	    return Db::table('news')->where('pid', $pid)->where('ty', $ty)->pluck($field);
	}
	//为了获取方便增加 查询news_cats表函数
	function v_news_cats($id,$field='catname'){
		if ($field == 'catname') {
		    return Db::table('news_cats')->where('id',$id)->pluck($field);
		} else {
		    return Db::table('news_cats')->where('id',$id)->first();
		}
	}


	function getPTT($map_pid, $map_ty, $map_tty = null) {
		if (isset(config('options.ptt')[$map_pid])) {
			if (isset(config('options.ptt')[$map_pid][$map_ty])) {
				// 没有tty
				if (is_null($map_tty)) {
				// pid存储在 _v_下标中
					return [config('options.ptt')[$map_pid]['_v_'], config('options.ptt')[$map_pid][$map_ty]];
				} else {
					return [config('options.ptt')[$map_pid]['_v_'], config('options.ptt')[$map_pid][$map_ty], config('options.ptt')[$map_pid][$map_ty][$map_tty]];
				}
			}
		}
		App::abort();
	}


	function img($filepath, $width = 0, $height = 0)
	{
		static $file;
		if (is_null($file)) {
			$file = new FileController;
		}
		$file->img;
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
    function u($path = null, $parameters = [], $secure = null)
    {
        if (is_null($path)) {
            return app(UrlGenerator::class);
        }

        return app(UrlGenerator::class)->to($path, $parameters, $secure);
    }
