<?php
require './include/common.inc.php';
require WEB_ROOT.'./include/chkuser.inc.php';


$id       = I('get.id',0,'intval');
$table = 'nature';
$showname = 'nature';
$pid = I('get.pid',0,'intval');

$typeid = I('get.typeid',0,'intval');
$classname = '类别管理';
if($id){
	$row = M($table)->find($id);
	extract($row);
    $pid = $pid;
    $typeid = $typeid;
	// if($row['ty'])$parentid = $row['ty'];
}
$tree = new Tree(M($table)->field('id,pid,catname,typeid')->where("typeid=".$typeid)->order('disorder desc,id asc')->select());
//下拉实例
// $spaces = array();
$cate = $tree->spanning();
$dropdown =  '<select name="pid" id="" class="select1">%s</select>';
if($pid>0){
    $option = '<option value="0">无（属一级类别）</option>';
}else{
    $option = '<option value="0" select>无（属一级类别）</option>';
}

while( list(,$v) = each($cate) ){

        if ($pid>0 && $pid == $v['id']) {

            $pre = str_repeat('&emsp;∞||&emsp;', $v['level']);
            $option .= "<option selected value=\"{$v['id']}\">$pre{$v['catname']}</option>";

        }else{
            $pre = str_repeat('&emsp;∞||&emsp;', $v['level']);
            $option .= "<option  value=\"{$v['id']}\">$pre{$v['catname']}</option>";
        }



}
$dropdown = sprintf($dropdown,$option);
unset($pre,$status,$option,$v,$cat);
$opt = new Output;


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>栏目管理</title>
	<?php define('IN_PRO',1);include('js/head'); ?>
</head>

<body>


	<div class="content clr">
		<div class="right clr">

			<div class="zhengwen clr">
				<div class="xuanhuan clr">
					<a href="javascript:void()" class="zai" style="margin-left:30px;min-width:260px"><?=$classname?></a>

				</div>

				<div class="miaoshu clr">
					<div id="tab1" class="tabson">
						<div class="formtext">Hi，<b><?=$_SESSION['Admin_UserName']?></b>，欢迎您使用信息发布功能！</div>
						<!-- 表单提交 --><form id="dataForm" class="layui-form" method="post" enctype="multipart/form-data">

						<input type="hidden" name="typeid" value="<?=$typeid?>" />
                        <label title="" class="layui-form-label">所属分类<b>*</b></label>
                        <div class="layui-input-block">
                            <?=$dropdown?>
                        </div>

						<?php

                            $opt->input('类别名称','catname');
							 include('js/foot'); ?>