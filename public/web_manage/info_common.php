<?php
require './include/common.inc.php';
define('TABLE_NEWS',1);
require WEB_ROOT.'./include/chkuser.inc.php';
$action  = I('get.action','');
$table   = 'notices';
$showname= 'info_common';

$gourl=getUrl(queryString(true),$showname);
if (IS_POST && $_POST['send'] == 'edit') {
  $id = I('post.nid', 0, 'intval');
  $status = I('post.status', 1, 'intval');
  $statusVal = $status == 3 ? '已改为未读' : '已改为已读';
  if ($id) {
    if (M($table)->where("id=$id")->setField(array('status'=>$status))) {
      exit($statusVal);
    }
  }
  exit('修改失败');
}
//条件
$map = array();

###########################筛选开始
// $action_type_id =   I('get.action_type_id', 0,'intval');/*if(!empty($type))*/$map['action_type_id'] = $action_type_id;
$status =   I('get.status', 0,'intval');if($status)$map['status'] = $status;
$map['action_type_id'] = ['not in', '1,2,3,6,7,8'];
$map['user_id'] = 0;
###########################筛选开始
########################分页配置开始
$psize = I('get.psize',30,'intval');
$pageConfig = array(
  /*条件*/'where' => $map,
  /*排序*/'order' => 'status desc,created_at desc',
  /*条数*/'psize' => $psize,
  /*表  */'table' => $table,
  );
list($data,$pagestr) = Page::paging($pageConfig);
########################分页配置结束
$tr = new Output;
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
      <a href="?<?=queryString()?>" class="zhixin_a2 fl"></a><!-- 刷新  -->
      <?php Style::moveback() ?>
    </div>
    <div class="neirong clr">
      <table cellpadding="0" cellspacing="0" class="table clr">
        <tr class="first">
         <td width="5%">编号</td>
         <?php

                 $th = ['类型', '标题', '内容', '操作', '创建时间'];
               foreach ($th as $value) {
                 echo '<td>'.$value.'</td>';
               }
               ?>
             </tr>
             <?php
              $group_action = [
                'order' => '订单',
                'resume' => '简历',
                'encroll' => '报名',
              ];
               $templates = config('templates');
               foreach ($data as $key => $value): extract($value);
             ?>
             <tr>
               <td><?=$key+1?></td>
              <?php
                $action = M('action_types')->where("id=$action_type_id")->field('source_type,action')->find();
                $tr
                   ->td($group_action[$action['source_type']])
                   ->td($title)
                   ->td($content)
                ;
              ?>
                <td>
                  <?php if ($status == 3): ?>
                  <a class="status" data-nid="<?=$id?>" data-status="2" href="javascript:;">未读</a>
                  <?php else: ?>
                  <a class="status" data-nid="<?=$id?>" data-status="3" href="javascript:;">已阅</a>
                  <?php endif ?>
                <td><?=$created_at?></td>
                <!-- <td><?=$updated_at?></td> -->
              </tr>
            <?php endforeach ?>
            <script>
              var layer;
              $('.status').click(function(){
                  var that = $(this)
                  send = 'edit'
                  nid = that.data('nid')
                  var status = that.data('status')
                  $.post('<?=$showname?>.php',{send:send,nid:nid,status:status},function(data){
                      that.data("status", status);
                      that.html(data);
                  })
              })
            </script>
            <?php include('js/foot') ?>
