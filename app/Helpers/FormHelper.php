<?php
/* +----------------------------------------------------------------------
*  hury 2017年5月7日14:28:38
*  +----------------------------------------------------------------------
*  后端打印html标签类 打印表单 编辑器 上传文件
*  +----------------------------------------------------------------------
	打印出一种类型的
	$opt->cache()->verify('number')->word('请用|隔开')->display('inline')->input('标题','title')->input('标题','title')->cache(false)
*  +----------------------------------------------------------------------
	input框同一行
	<?php $opt->cache()->input('1','1')->input('2','2')->input('3','3')->flur() ?></div>
*  +----------------------------------------------------------------------
	选择框
	radio <?php $opt->choose('性 别','linkurl')->radio('男',1)->radio('女',2,1)->radio('禁用',3)->flur() ?>

	<?php //复选框
			$d = M('news')->where(m_gWhere(14,19))->getField('id,title');
			$opt->choose('标签','relative')->checkboxSet($d)->flur();
	 ?>

*  +----------------------------------------------------------------------
	逻辑判断
	->ifs($istop==1)->img('配图','img2','387*253')->endifs()
*  +----------------------------------------------------------------------
   <?php Output::img('1','img1',$ty) ?>
   <?php Output::file('2','img2','719 * 469') ?>
   <?php Output::editor('车型属性') ?>
   <!-- 多选 -->
   <?php $sa=M('news')->where('isstate=1 AND ty=15')->order('isgood desc,disorder desc,id desc')->getField('id,title'); $multi=explode(',',$file) ?>
   <?php Output::selects($sa,'城市','city',$multi) ?>
   <!-- 单选 -->
   <?php $d = M('news')->where('pid=21 and ty=25 and tty=0')->getField('id,title');Output::select($d,'选择部门','istop') ?>
   <!-- 分组下拉框 -->
   $groupCate = array('13'=>'产品分类','20'=>'成分分类');//自己构造分组
   $d = M('news')->where('pid=2 and (ty=13 or ty=20)')->getField('id,ty,title');
   Output::groupSelect($d,$groupCate,'选择分类','istop','ty');
*  +----------------------------------------------------------------------
*/
namespace App\Helpers;
class FormHelper{
	private $display = 'block';//长度 inline短一些
	private $verify  = '';//必填项  number:数字 email:邮箱 phone:手机号 date:日期 url:链接 http://www....
	private $word  = '';	//红色提示语
	public static $DEL  = false;	//是否删除文件

	public static $config = [];

	private $cache = false;//缓存
	private $in_if = '';// if函数的条件
	private $temp  = '';//全局 临时变量
	private $in    = '';//全局 临时变量

	const CHECKED = 1;// 选中状态

	public function __construct($row)
	{
		$this->row = $row;
	}

	public function __get($index)
	{
		return isset($this->row[$index]) ? $this->row[$index] : '';
	}

	public function echoString($string)
	{
		if($this->in_if === false) $string = '';
		echo $string;
		return $this;
	}

	public function word($word,$b=true){
		if ($b) {$word = "<b>$word</b>"; }
		$this->word = $word;
		return $this;
	}
	public function display($dpl){
		$this->display = $dpl;
		return $this;
	}
	public function verify($sty){
		$this->verify = $sty;
		return $this;
	}

	public function ifs($cdt)
	{
		$this->in_if = $cdt;
		return $this;
	}

	//释放缓存
	public function endifs()
	{
		$this->in_if = '';
		return $this;
	}

	public function __call($func, $arg){
		exit('不存在的Output函数' . $func);
	}



	private static function angular_walk(&$val,$type='string'){
		array_walk($brands, 'angular_filter','string');
	}
	private static function angular_filter(&$val,$key,$type='string'){
		// $val = strtr($val,$type.':','');
		$val = str_replace($type.':','',$val);
	}

	//生成input
	public function input($l,$i){
		$this->in = 'input';
		$this->input_text($l,$i,0);
		return $this;
	}
	//生成textarea
	public function textarea($l,$i){
		$this->in = 'textarea';
		$this->input_text($l,$i,1);
		return $this;
	}
	//是否开启缓存 默认关闭
	public function cache(){
		$this->cache = true;
		$this->display = 'inline';
		return $this;
	}
	//释放缓存
	public function flur(){
		$str = '';
		switch ($this->in) {
			case 'input':
			case 'time':
				$str = '<div class="layui-form-item">'.$this->temp.'</div>';
				break;
			case 'radio':

				$str = '<div class="job-posted-dv">
							 <span class="job-posted-property"><b>*</b>'.$this->labelName.'</span>
						     <div class="job-posted-values">
									'.$this->temp.'</div></div>';
				break;
			case 'checkbox':
				$str = '<div class="job-posted-dv">
               			    <span class="job-posted-property"><b>*</b>'.$this->labelName.'</span>
					     	<div class="job-posted-values">
							'.$this->temp.'</div></div>';
				break;
			case 'textarea':
				$str = '<div class="layui-form-item layui-form-text"> '.$this->temp.'</div>';
				break;
			default:
				break;
		}
		echo $str;
		$this->cache=false;
		$this->clear();
		return $this;
	}

	//清空
	private function clear(){
		if (!$this->cache) {
			$this->display = 'block';
			$this->verify  = '';
			$this->word  = '';
			$this->temp  = '';
		}
	}

	//编辑器调用
	public function editor($lablename='信息内容',$name='content',$width = '47%', $height = '350',$b=''){ if($this->in_if === false) return $this;global $$name;$val  = htmlspecialchars_decode($$name);?>
		<div class="job-posted-dv">
		    <span class="job-posted-property"><?php echo $lablename?></span>
		    <div class="job-posted-values">
		       <?php echo $this->initEditor($name,$width,$height)?>
		    </div>
		</div>
	<?php return $this;}

	//生成select $d:d $lm=lablename $n:name $v:value $t:text
	public function selects($d,$lm,$n,$vv='v',$tt='t'){ $multi = $this->$n ? explode(',', $this->$n): []?>
	<div class="job-posted-dv">
		<span title="<?php echo $lm?>" class="job-posted-property"><b>*</b><?php echo $lm?></span>
		<div class="job-posted-values">
			<select name="<?php echo $n?>[]" multiple style="height:10%;" lay-filter="">
				<?php foreach ($d as $v => $t): $sl=in_array($$vv, $multi)?'selected':'' ?>
				<option <?php echo $sl?> value="<?php echo $$vv?>"><?php echo $$tt?></option>
			<?php endforeach ?>
			</select>
		</div>
	</div>
	<?php return $this;}

	//分组下拉框
	//$d:未处理的分类
	//$groupCate:自己构造的分组
	//$key:option的value $val:option的text
	//$group:按照指定key给二维数组分组
	public static function groupSelect($d,$groupCate,$lm,$n,$group='分组字段名',$key='id',$val='title'){ global $$n; $d=array_group($d,$group)?>
		  <div class="layui-form-item">
			  <label title="<?php echo $n?>" class="layui-form-label"><?php echo $lm?><b>*</b></label>
			  <div class="layui-input-block">
			    <select name="<?php echo $n?>" style="width:80%;height:35px;font-size:15px;">
			    		<option value="0">请选择</option>
			    	<?php foreach ($groupCate as $catek => $catev):?>
				    	<optgroup label="<?php echo $catev?>">
					    	<?php foreach ($d[$catek] AS $k => $v): $sl=$v[$key]==$$n?'selected':'' ?>
				    		<option <?php echo $sl?> value="<?php echo $v[$key]?>"><?php echo $v[$val]?></option>
					    	<?php endforeach ?>
				    	</optgroup>
			    	<?php endforeach ?>
			    </select>
			  </div>
		 </div>
		 <?php UNSET($d,$lm,$n,$v,$t)?>
	<?php }


	public function select($d,$lm,$n){ ?>
        <div class="job-posted-dv">
            <span title="<?php echo $lm?>" class="job-posted-property"><b>*</b><?php echo $lm?></span>
            <div class="job-posted-values">
                <select name="<?php echo $n?>">
                    <?php foreach ($d as $k => $v): $sl=$k==$this->$n?'selected':'' ?>
                        <option <?php echo $sl?> value="<?php echo $k?>"><?php echo $v?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
		 <?php UNSET($d,$lm,$n,$v,$t);return $this;?>
	<?php }

	public static function select2($d,$lm,$n){  $$n = isset($_GET[$n]) ? $_GET[$n] : '';  ?>
			    <select title="<?php echo $lm?>" name="<?php echo $n?>">
			    		<option value="0"><?php echo $lm?></option>
			    	<?php foreach ((array)$d as $k => $v): $sl=$k==$$n?'selected':'' ?>
			    		<option <?php echo $sl?> value="<?php echo $k?>"><?php echo $v?></option>
			    	<?php endforeach ?>
			    </select>
		 <?php UNSET($d,$lm,$n,$v,$t)?>
	<?php }

    public static function select2s($d,$lm,$n){  $$n = isset($_GET[$n]) ? $_GET[$n] : '';  ?>
        <select title="<?php echo $lm?>" name="<?php echo $n?>">
            <?php foreach ($d as $k => $v): $sl=$k==$$n?'selected':'' ?>
                <option <?php echo $sl?> value="<?php echo $k?>"><?php echo $v?></option>
            <?php endforeach ?>
        </select>
        <?php UNSET($d,$lm,$n,$v,$t)?>
    <?php }

	//生成隐藏域
	public function hide($n,$v=''){
		if (empty($v)) {
			$v = $this->$n;
		}
		echo '<input name="'.$n.'" value="'.$v.'" type="hidden">';
		return $this;
	}


	// 时间选择
	public function time($lablename,$inputname)
	{
		$this->in = 'time';

		//替换映射
		$replaceMap = [
			'%word%'      => $this->word,
			'%display%'   => 'inline',
			'%name%'      => $inputname,
			'%value%'     => $this->$inputname ? date("Y-m-d", $this->$inputname) : '',
			'%lablename%' => $lablename,
		];

			$tpl = <<<HTML
<div class="job-posted-dv">
    <span class="job-posted-property"><b>*</b>%lablename%</span>
    <div class="job-posted-values">
        <input size="10" value="%value%" maxlength="10" onclick="new Calendar().show(this);" readonly="readonly" class="job-name %display%" type="text" name="%name%" value="%value%" autocomplete="off" placeholder="请填写%lablename%"/>
    </div>
</div>
HTML;
			$temp = str_replace(array_keys($replaceMap), array_values($replaceMap), $tpl);

		# 使用ifs函数 如果条件不成立 输出空
		if($this->in_if === false) $temp = '';

		if ($this->cache && $temp) {//缓冲
			$this->temp .= '<div class="layui-inline">'.$temp.'</div>';
			return $this;
		}
		$this->temp = $temp;
		$this->flur();
	    unset($replaceMap, $lablename, $inputname, $tpl, $temp);
	    return $this;
	}

	//生成input或者textarea
	private function input_text($lablename,$inputname,$type=0){
		//替换映射
		$replaceMap = [
			'%word%'      => $this->word,
			'%verify%'    => $this->verify,
			'%display%'   => $this->display,
			'%name%'      => $inputname,
			'%value%'     => $this->$inputname,
			'%lablename%' => $lablename,
		];

		if($type){//textarea
			$tpl = <<<HTML
     	%word% <label title="%name%" class="layui-form-label">%lablename%<b>*</b></label>
				<div class="layui-input-%display%">
					<textarea name="%name%" lay-verify="%verify%" placeholder="请输入%lablename%" class="layui-textarea">%value%</textarea>
				</div>
HTML;
		# 使用ifs函数 如果条件不成立 输出空

		$temp = str_replace(array_keys($replaceMap), array_values($replaceMap), $tpl);
		if($this->in_if === false) $temp = '';

		}else{
			// %word%
			$tpl = <<<HTML
			<div class="job-posted-dv">
			    <span class="job-posted-property"><b>*</b>%lablename%</span>
			    <div class="job-posted-values">
			        <input class="job-name %display%" type="text" name="%name%" value="%value%" autocomplete="off" placeholder="请填写%lablename%"/>
			        %word%
			    </div>
			</div>
HTML;
			$temp = str_replace(array_keys($replaceMap), array_values($replaceMap), $tpl);

		# 使用ifs函数 如果条件不成立 输出空
		if($this->in_if === false) $temp = '';

			if ($this->cache && $temp) {//缓冲
				$this->temp .= '<div class="layui-inline">'.$temp.'</div>';
				return $this;
			}
		}
		$this->temp = $temp;
		$this->flur();
	    unset($lablename,$inputname,$width,$height,$style,$type,$display,$b,$verify);
	}

	// 生成图片
	public function img($lablename, $imgname, $tys='')
	{
		if(!$lablename || !$imgname) exit('图片字段名为空');

		if (empty($tys)) {
			$imgsize = v_news_cats($this->tty, 'imgsize');

			if (! $imgsize) {
				$imgsize = v_news_cats($this->ty, 'imgsize');
                if (! $imgsize) {
                    $imgsize = v_news_cats($this->pid, 'imgsize');

                }
			}
		} else {
			$imgsize = $tys;
		}

		//替换映射
		$replaceMap = [
			'%name%'      => $imgname,
			'%value%'     => $this->$imgname,
			'%src%'       => img($this->$imgname, '/img/default-img.png'),
			'%lablename%' => $lablename,
			'%imgsize%'   => $imgsize,
			'%picsize%'   => '不小于100px，JPG、PNG、GIF格式，小于300k。',
		];
			// <a href="%src%" target="_blank">查看图片</a>
		$tpl = <<<HTML
		<div class="post-message-div clearfix">
            <div style="width:11.45%" class="post-message-left fl">
                <span><b>*</b>%lablename%</span>
            </div>
			<div style="width:87.7%" class="post-message-right fr">
			    <div class="default-img-box">
			        <img id="%name%" src="%src%" />
				    <input type="hidden" name="%name%" value="%value%">
				    <input type="hidden" name="imgsize_%name%" value="%imgsize%">
			    </div>
			    <div class="company-logo-upload">
			        <div class="user-headimg-upload clearfix">
			            <div class="user-file-cover">
			                <p>选择文件</p>
			                <input onchange="previewImage(this,'%name%')" name="%name%" type="file"/>
			            </div>
			            <p class="user-file-notice">选择上传后将直接替换。</p>
			        </div>
			        <p class="headimg-upload-limit">%picsize%</p>
			    </div>
			</div>
		</div>

HTML;
		/*<label title="%name%" class="layui-form-label">%lablename%<b>*</b></label>
		<div class="site-demo-upload fl">
		<img src="%src%" height="40" />
			<input type="hidden" name="%name%" value="%value%">
			<input type="hidden" name="imgsize_%name%" value="%imgsize%">
			<div class="site-demo-upbar">
				<div class="layui-box layui-upload-button">
					<input type="file" onchange="if(this.value){this.title=this.value;document.getElementById('%name%').innerHTML=this.value}" name="%name%" class="layui-upload-file">
					<em id="%name%"></em><span class="layui-upload-icon"><i class="layui-icon"></i>上传图片</span>
				</div>
			</div>
			<b style="position: absolute; bottom: -18px;width:220px">图片大小: %picsize% K内,%imgsize%px</b>
		</div>*/
		$echoString = str_replace(array_keys($replaceMap), array_values($replaceMap), $tpl);

		# 使用ifs函数 如果条件不成立 输出空
		if($this->in_if === false) $echoString = '';
		echo $echoString;
		unset($inputname, $lablename, $imgsize);
		return $this;
	}

	// 生成文件
	public function file($lablename, $imgname, $ty='')
	{
		global $$imgname;

		if(!$lablename || !$imgname) exit('路径字段名为空');

		//替换映射
		$src = $$imgname ?  '<a href="'.src($$imgname).'" target="_blank">查看文件</a>' : '';
		$replaceMap = [
			'%name%'      => $imgname,
			'%value%'     => $$imgname,
			'%src%'       => $src,
			'%lablename%' => $lablename,
			'%filetype%'  => getConfig('filetype'),
			'%filesize%'   => getConfig('filesize'),
		];
			// <a href="%src%" target="_blank">查看图片</a>
		$tpl = <<<HTML

		<label title="%name%" class="layui-form-label" style="float:none;display:inline-block">%lablename%<b>*</b></label>
		<div class="layui-box layui-upload-button" style="margin-bottom: 15px;">
			<input class="layui-upload-file" onchange="if(this.value){this.title=this.value;document.getElementById('%name%').innerHTML=this.value}" name="%name%" type="file">
			<em id="%name%"></em>
			<input type="hidden" name="%name%" value="%value%">
			<span class="layui-upload-icon"><i class="layui-icon"></i>上传文件</span>
		</div>
		%src%
		<b>文件大小:%filesize%k内,文件类型：%filetype%</b>
HTML;

		$echoString = str_replace(array_keys($replaceMap), array_values($replaceMap), $tpl);

		# 使用ifs函数 如果条件不成立 输出空
		if($this->in_if === false) $echoString = '';

		echo $echoString;
		unset($inputname, $lablename, $filetype);
		return $this;
	}

	//编辑器调用
	private static function initEditor2($name='content',$width = '667', $height = '350'){
		global $$name;
		$val  = htmlspecialchars_decode($$name);
		$editor="<textarea id=\"{$name}\" name=\"{$name}\" style=\"width:{$width}px;height:{$height}px;\">{$val}</textarea><script type=\"text/javascript\"> var ue = UE.getEditor('{$name}'); </script>";
		return $editor;
	}
	//编辑器调用
	private function initEditor($name='content',$width = '667', $height = '350'){
		$val  = htmlspecialchars_decode($this->$name);
		$editor="<textarea class=\"editor_id\" name=\"{$name}\" style=\"width:{$width};height:{$height}px;\">{$val}</textarea>";
		return $editor;
	}

	//+-------------开关 复选框 单选框----------------------------------------------------
	private $labelName = '';
	private $inputName = '';//checkbox radio
	private $inputVal = '';
	public function choose($labelName='',$inputName=''){
		if (empty($inputName) || empty($labelName)) {
			exit('设置选择框时inputName是必须的');
		}
		$this->labelName = $labelName;
		$this->inputName = $inputName;
		$this->inputVal  = $this->$inputName;
		return $this;
	}

	public function radioSet($data){
		$data or $data=array();
		foreach ($data as $key => $value) {
			$this->radio($value,$key);
		}
		return $this;
	}
	public function radio($title,$val,$checked='',$disabled=''){
		$this->in = 'radio';
		if ($disabled) {$disabled='disabled';}
		if ($val==$this->inputVal || $checked) {$checked='checked';}
		$this->temp .= '<input '.$checked.' type="radio" '.$disabled.' name="'.$this->inputName.'" value="'.$val.'" title="'.$title.'">'.'<span>'.$title.'</span>';
		UNSET($checked,$val,$title,$disabled);
		return $this;
	}
	public function checkboxSet($data){
		$this->inputVal && $this->inputVal=explode(',',$this->inputVal);
		$data or $data=array();
		foreach ($data as $key => $value) {
			if(is_array($this->inputVal)&&in_array($key,$this->inputVal)){
				$this->checkbox($value,$key,'checked');
			}else{
				$this->checkbox($value,$key);
			}
		}
		return $this;
	}
	public function checkbox($title,$val,$checked='',$disabled=''){
		$this->in = 'checkbox';
		if ($disabled) {$disabled='disabled ';}
		$class = $checked ? 'input-checkbox-selected' : '';
		$this->temp .= '<span class="checkbox '.$class.'"><input type="checkbox" name="'.$this->inputName.'[]" lay-skin="primary" value="'.$val.'" title="'.$title.'" '.$disabled.$checked.'>'.''.$title.'</span>';;
		unset($checked,$val,$title,$disabled);
		return $this;
	}




}

?>
