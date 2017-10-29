<?php
require './include/common.inc.php';
define('TABLE_NEWS',1);
require WEB_ROOT.'./include/chkuser.inc.php';
$table = 'education';
$showname = 'education';
$istop = I('get.istop',0,'intval');
if (!empty($id) ) { //显示页面 点击修改  只传了id
	$row = M($table)->find($id);
	extract($row);
}
$opt = new Output;//输出流  输出表单元素
if (isset($_GET['action']) && $_GET['action']=='delImg') {
	$id = I('get.id',0,'intval');
	$img = I('get.img');
	$path = ROOT_PATH.I('get.path');
	M($table)->where("id=".$id)->setField($img,'');
	@unlink($path);
	JsError('删除成功!');
}
?>
<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="UTF-8" />
	<title>新闻,产品,单条</title>
	<?php define('IN_PRO',1);include('js/head'); ?>
</head>

<body>


	<div class="content clr">
		<?php Style::weizhi() ?>
		<div class="right clr">
			<div class="zhengwen clr">
				<div class="xuanhuan clr">
					<a href="javascript:void()" class="zai" style="margin-left:30px;"><?=v_news_cats($zid,'catname')?></a>
				</div>

				<div class="miaoshu clr">
					<div id="tab1" class="tabson">
						<div class="formtext">Hi，<b><?=$_SESSION['Admin_UserName']?></b>，欢迎您使用信息发布功能！</div>
						<!-- 表单提交 --><form id="dataForm" class="layui-form" method="post" enctype="multipart/form-data">
						<?php Style::output();Style::submitButton() ?>
						<input type="hidden" name="pid" value="<?php echo $pid?>" />
						<input type="hidden" name="ty"  value="<?php echo $ty?>"  />
						<input type="hidden" name="tty" value="<?php echo $tty?>" />
<?php
    $opt ->img('配图','img1');

if($tty==21){
    $opt ->img('学员logo图','img2',"100*120");
}
    $opt->input('标题','title');
if(in_array($tty,array(24,25,29,30))){
    $opt
    ->input('推荐人群', 'ftitle')
    ->input('出发地','from')
    ->input('目的地','destination')
    ->input('席位情况','introduce')
    ->cache()->time('游学开始时间', 'starttime')->time('游学结束时间', 'endtime')->flur()
    ->cache()->time('报名开始时间', 'bstarttime')->time('报名结束时间', 'bendtime')->flur()
    // ->cache()->input('点赞数','dotlike')->input('分享数','share')->flur()
    // ->textarea('简介','introduce')
    ->editor('路线详情')
    ->editor('详情介绍','content2');
}else{
     $opt->editor('信息内容');
}
include('js/foot');
?>
