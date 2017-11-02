<?php
require './include/common.inc.php';
define('TABLE_NEWS',1);
require WEB_ROOT.'./include/chkuser.inc.php';
$action  = I('get.action','');
$table   = 'action_types';
$showname= 'notices';


$gourl=getUrl(queryString(true),$showname);

//条件
$map = array();

###########################筛选开始
// $action_type_id =   I('get.action_type_id',16,'intval');/*if(!empty($type))*/$map['action_type_id'] = $action_type_id;
$map['id'] = ['in','1'];
###########################筛选开始
// $map['user_id'] = 0;
########################分页配置开始
$psize   =   I('get.psize',30,'intval');
$pageConfig = array(
    /*条件*/'where' => $map,
    /*排序*/'order' => 'source_type desc',
    /*条数*/'psize' => $psize,
    /*表  */'table' => $table,
    );
list($data, $pagestr) = Page::paging($pageConfig);
########################分页配置结束
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
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
                      <form>
                        <?php //Output::select2(['未处理', '已处理'], '处理', 'chuli') ?>
                        <input type="submit" value="搜索">
                      </form>
                  </div>
                <div class="neirong clr">
                  <table cellpadding="0" cellspacing="0" class="table clr">
                    <tr class="first">
                     <td width="5%">选择</td>
                     <td width="5%">编号</td>
                     <td>类型</td>
                   </tr>
                  <?php
                    $notices = config('notices');
                    foreach ($data as $key => $value): extract($value);
                    $MNotices = M('notices');
                   ?>
                   <tr>
                    <td><input id="delid<?=$id?>" name="del[]" value="<?=$id?>" type="checkbox"><i class="layui-i">&nbsp;</i></td>
                    <td><?=$key+1?></td>
                    <td><?=$notices["$source_type.$action"]?> <b style="color:red">未处理</b>(<?php echo $MNotices->where(['action_type_id' => $id, 'status' => 1])->count() ?>)
                      <a href="notices.php?action_type_id=<?=$id?>">去处理</a>&emsp;<b style="color:red">已处理</b>(<?php echo $MNotices->where(['action_type_id' => $id, 'status' => 3])->count() ?>)
                    </td>
                  </tr>
                <?php endforeach ?>
					<?php include('js/foot'); ?>