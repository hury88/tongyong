




<?php
require './include/common.inc.php';
define('TABLE_NEWS',1);
require WEB_ROOT.'./include/chkuser.inc.php';
$action  = I('get.action','');
$table   = 'jianli';
$showname= 'resume';


$gourl=getUrl(queryString(true),$showname);

//条件
$map = array();

###########################筛选开始

###########################筛选开始

########################分页配置开始
$psize   =   I('get.psize',30,'intval');
$pageConfig = array(
    /*条件*/'where' => $map,
    /*排序*/'order' => 'addtime desc',
    /*条数*/'psize' => $psize,
    /*表  */'table' => $table,
    );
list($data,$pagestr) = Page::paging($pageConfig);
########################分页配置结束
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>在线留言管理页面</title>
<?php include('js/head'); ?>
</head>

<body>
	<div class="content clr">
    	<div class="right clr">
            <?=$pagestr?>
                <div class="zhixin clr">
                      <ul class="toolbar">
                          <li>&nbsp;<input style="display:none" type="checkbox"><i id="sall" class="alls" onclick="selectAll(this)">&nbsp;</i><label style="cursor:pointer;font-size:9px" onclick="selectAll(document.getElementById('sall'))" for="">全选</label></li></li>
                      </ul>
                      <a href="?<?=queryString()?>" class="zhixin_a2 fl"></a><!-- 刷新  -->
<!--                      <a id="adda" href="javascript:;" target="righthtml" class="zhixin_a3 fl"></a>添加  -->
                      <input id="del" type="button" class="zhixin_a4 fl"/><!-- 删除  -->
                  </div>
                <div class="neirong clr">
                    <table cellpadding="0" cellspacing="0" class="table clr">
                        <tr class="first">
							<td width="5%">选择</td>
							<td width="5%">编号</td>
                            <td>姓名</td>
                            <td>性别</td>
                            <td>地址</td>
                            <td>手机号</td>
                            <td>申请职位</td>
                            <td>出生年月</td>
                             <td>查看详情</td>
							<td width="13%">发布时间</td>
						</tr>
						<?php foreach ($data as $key => $value): extract($value);
						?>
						    <tr>
	                            <td><input id="delid<?=$id?>" name="del[]" value="<?=$id?>" type="checkbox"><i class="layui-i">&nbsp;</i></td>
	                            <td><?=$key+1?></td>
	                            <td><?=$name?></td>
	                            <td><?=$sex?></td>
	                            <td><?=$address?></td>
	                            <td><?=$tel?></td>
	                            <td><?=$cszy?></td>
	                            <td><?php echo $year.'-'.$month?></td>
							    <td><a href="javascript:;"> 查看详情</a></td>
	                            <td><?=date('Y-m-d H:i:s',$addtime)?></td>
	                        </tr>
						<?php endforeach ?>
					<?php include('js/foot'); ?>