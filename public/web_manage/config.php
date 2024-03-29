<?php
require './include/common.inc.php';
require WEB_ROOT.'./include/chkuser.inc.php';

$table = 'config';
$showname = 'config';

$id = 1;

extract(M('config')->find($id));
$statech = $isstate?'checked':'';

$opt = new Output;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>系统参数设置</title>
	<?php define('IN_PRO',1);include('js/head'); ?>
</head>

<body>

	<div class="content clr">
		<div class="weizhi">
			<p>位置：
				<a href="mains.php">首页</a>
				<span>></span>
				<a href="javascript:void()">基本信息</a>
				<span>></span>
				<a href="javascript:void()">管理页面</a>
			</p>
		</div>
		<div class="right clr">


			<div class="zhengwen clr">
				<div class="xuanhuan clr">
					<a href="javascript:void()" class="zai" style="margin-left:30px;">基本信息</a>
					<a href="#">上传参数</a>
					<a href="#">SEO设置</a>
				</div>
				<div class="miaoshu clr">
					<div id="tab1" class="tabson">
						<div class="formtext">Hi，<b><?=$_SESSION['Admin_UserName']?></b>，欢迎您使用信息发布功能！</div>
						<!-- 表单提交 --><form id="dataForm" class="layui-form" method="post" enctype="multipart/form-data">
						<?php Style::output() ?>
					<?php $opt
						  	 ->img('logo','logo1','91X34')
						  	 ->img('APP下载二维码','logo2','156X193')
						  	 ->img('官方微信','img1','156X193')
						  	// ->file('需求表单','file')
						    // ->input('公司网址','siteurl')
						    ->input('网站名称','sitename')
						    ->input('地址','address')
							// ->input('邮箱','email')
							// ->input('传真','fax')
						    // ->display('inline')->input('邮政编码','fax')
						    ->cache()
//								->input('客服电话','phone')
//								->input('在线客服','webqq')
								->input('E-mail','email')
							->flur()
							 ->word('多个用“|”隔开;姓名与qq用“：”隔开！例：“尹艳阳：2355794817|彭华：2355612692”')->input("悬浮在线咨询", 'webqq')
//							 ->word('Enter your Skype Name')->input('skype', 'link1')
							 ->word('外链')->input('关注微博', 'link1')
							 ->word('外链')->input('咨询链接', 'link2')

							->input('举报电话','link3')
                        ->word('多个用“|”隔开！例：“客服及技术支持|人力资源”')->input('求职者平台关键字','link4')
                        ->word('多个用“|”隔开！例：“客服及技术支持|人力资源”')->input('院校信息发布关键字','link5')
                        ->word('多个用“|”隔开！例：“客服及技术支持|人力资源”')->input('招聘列表关键字+','link6')
						    ->textarea('版权信息','copyright')
//						    ->textarea('置放统计代码','header')
						  //$opt->input('网站头部标题','indexabout')
						  //$opt->cache()->input('自动传真','fax')->input('企业邮箱','email')->flur()
						  //$opt->textarea('分享','header')
						  //$opt->cache()->input('备案序号','link1')->input('邮政编码','link2')->flur()
					?>
					<!-- <li class="fade"><label>&nbsp;</label><input name="update" type="submit" class="btn" value="提  交"/></li> -->
				</ul>
			</div>
		</div>
		<?php define('DEL_TIME_SORT',1) ?>

		<div class="miaoshu hide clr">
			<ul class="forminfo" style="padding-top:10px;">
				<?php $opt
					->word('以|分隔后缀名,切记勿允许上传asp/exe文件')->input('文件类型','filetype')
					->word('')->input('文件大小','filesize')
					->word('以|分隔后缀名,切记勿允许上传asp/exe文件')->input('图片类型','pictype')
					->word('')->input('图片大小','picsize')
				?>
			</ul>
		</div>
		<div class="miaoshu hide clr">
			<ul class="forminfo" style="padding-top:10px;">
				<?php $opt
					->verify('')->input('页面标题','seotitle')
				    ->verify('')->input('页面关键字','keywords')
				    ->verify('')->textarea('页面描述','description')
				?>
				<!-- <li class="fade"><label>&nbsp;</label><input name="seo" type="submit" class="btn" value="提  交"/></li> -->
			</ul>
		</div>
		<?php include('js/foot'); ?>