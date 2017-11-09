<?php
require './include/common.inc.php';
define('TABLE_NEWS',1);
require WEB_ROOT.'./include/chkuser.inc.php';
$action  = I('get.action','');
$table   = 'action_types';
$showname= 'notices';


$gourl=getUrl(queryString(true),$showname);

$group_action = [
  'certification' => '企业会员实名认证',
  'certification_person' => '个人会员实名认证',
  'complaint' => '举报',
];

//条件
$map = array();

###########################筛选开始
// $action_type_id =   I('get.action_type_id',16,'intval');/*if(!empty($type))*/$map['action_type_id'] = $action_type_id;
$map['id'] = ['in','1,2,6,15'];
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
                      <a href="?<?=queryString()?>" class="zhixin_a2 fl"></a><!-- 刷新  -->
                      <form>
                        <?php
                        Style::moveback();
                         //Output::select2(['未处理', '已处理'], '处理', 'chuli') ?>
                        <!-- <input type="submit" value="搜索"> -->
                      </form>
                  </div>
                <div class="neirong clr">
                  <table cellpadding="0" cellspacing="0" class="table clr">
                    <tr class="first">
                     <td width="100px">编号</td>
                     <td>类型</td>
                    </tr>
                  <?php
                    $MNotices = M('notices');
                    $trans = config('trans');
                    foreach ($group_action as $source_type => $source_type_name) :
                   ?>
                   <tr>
                    <td><?php echo $source_type_name ?></td>
                    <td>
                  <?php
                    $data = M($table)->where("source_type='$source_type'")->order('id asc')->select();
                    foreach ($data as $key => $value):extract($value);
                    $where = ['action_type_id' => $id];
                    if ($status) {
                      $where['user_id'] = 0;
                      $where['status'] = $status;
                    } else {
                      $where['sender_id'] = 0;
                    }
                   ?>
                    <a href="notices.php?status=<?=$status?>&action_type_id=<?=$id?>"><?=$trans[$action]?></a>(<b style="color:red"><?php echo $MNotices->where($where)->count() ?></b>)&emsp;
                <?php endforeach ?>
                    </td>
                  </tr>
                <?php endforeach ?>
					<?php include('js/foot'); ?>