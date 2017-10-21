<?php
// 自定义函数
use App\News;
use Illuminate\Contracts\Routing\UrlGenerator;
use App\Http\FileController;

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
