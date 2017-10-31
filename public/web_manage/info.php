<?php
require './include/common.inc.php';
define('TABLE_NEWS',1);
require WEB_ROOT.'./include/chkuser.inc.php';
$action  = I('get.action','');
$table   = 'notices';
$showname= 'notices';


$gourl=getUrl(queryString(true),$showname);

//条件
$map = array();

###########################筛选开始
$action_type_id =   I('get.action_type_id',0,'intval');/*if(!empty($type))*/$map['action_type_id'] = $action_type_id;
###########################筛选开始
$map['uid'] = 0;
########################分页配置开始
$psize   =   I('get.psize',30,'intval');
$pageConfig = array(
    /*条件*/'where' => $map,
    /*排序*/'order' => 'status asc,created_at desc',
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

                      <input id="del" type="button" class="zhixin_a4 fl"/><!-- 删除  -->
                  </div>
                <div class="neirong clr">
                    <table cellpadding="0" cellspacing="0" class="table clr">
                        <tr class="first">
							<td width="5%">选择</td>
							<td width="5%">编号</td>
                             <td>发送人</td>
                             <td>信息标题</td>
                             <td>状态</td>
							<td width="13%">发布时间</td>
						</tr>
						<?php foreach ($data as $key => $value): extract($value);
						?>
						    <tr>
	                            <td><input id="delid<?=$id?>" name="del[]" value="<?=$id?>" type="checkbox"><i class="layui-i">&nbsp;</i></td>
	                            <td><?=$key+1?></td>
									<td> <a href="infoshow.php?id=<?=$id?>" target="righthtml">阅读：<?=$title?></a></td>
                                <td>信息标题</td>
	                            <td>
                            	    <a data-class="btn-warm" class="json <?=$status?'':'btn-warm' ?>" data-url="status&id=<?=$id?>"><?=$webarr['status'][$status] ?></a>
	                            </td>
	                            <td><?=date('Y-m-d H:i:s',$created_at)?></td>
	                        </tr>
						<?php endforeach ?>
					<?php include('js/foot'); ?>