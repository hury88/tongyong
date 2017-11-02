<?php
require './include/common.inc.php';
define('TABLE_NEWS',1);
require WEB_ROOT.'./include/chkuser.inc.php';
$action  = I('get.action','');
$table   = 'notices';
$showname= 'notices';
if(IS_POST && $_POST['send']=='notices'){
  $status = I('post.status', 0 , 'intval');
  $sendVal = I('post.editVal', '', '');
  $user_id = I('post.uid', '', 'intval');
  $source_id = I('post.id', 0, 'intval');
  /*array(4) {
    ["editVal"] => string(3) "111"
    ["uid"] => string(1) "1"
    ["id"] => string(1) "1"
    ["send"] => string(7) "notices"
  }*/
  if ($status == 1) {// 同意
    if(updateBusiness($user_id, ['certified_status' => 2])) {
      creatNotices($user_id, 3, $source_id, $sendVal);
      _update('notices', $source_id, ['status' => 3]);
      exit("通过认证");
    }
  } elseif($status == 2) {// 驳回
    if(updateBusiness($user_id, ['certified_status' => 3])) {
      _update('notices', $source_id, ['status' => 3]);
      creatNotices($user_id, 2, $source_id, $sendVal);
      exit("已驳回,理由:$sendVal");
    }
  }
  exit("操作失败");
}


$gourl=getUrl(queryString(true),$showname);

//条件
$map = array();

###########################筛选开始
$action_type_id =   I('get.action_type_id', 0,'intval');/*if(!empty($type))*/$map['action_type_id'] = $action_type_id;
###########################筛选开始
$map['user_id'] = 0;
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
         <?php
         switch ($action_type_id) {
                 case 1: //'certification.request' => '企业会员实名认证',
                 $th = ['企业名称', '注册号', '法人代表', '营业执照', '操作'];
                 break;

                 default:
                   # code...
                 break;
               }
               foreach ($th as $value) {
                 echo '<td>'.$value.'</td>';
               }
               ?>
               <td width="13%">发送时间</td>
             </tr>
             <?php foreach ($data as $key => $value): extract($value);
             // $v=M("businesses")->where("user_id=".$sender_id)->find();
//						var_dump($v)
             ?>
             <tr>
               <td><input id="delid<?=$id?>" name="del[]" value="<?=$id?>" type="checkbox"><i class="layui-i">&nbsp;</i></td>
               <td><?=$key+1?></td>
              <?php
               switch ($action_type_id) :
                  case 1: //'certification.request' => '企业会员实名认证',
                  $user = M('businesses')->field('*')->where(['user_id' => $sender_id])->find();
              ?>
                  <td><?=$user['business_name']?></td>
                  <td><?=$user['registerid']?></td>
                  <td><?=$user['legal']?></td>
                  <td><img src="<?=src($user['img'])?>" width="80" /></td>
                  <td><?php if ($status == 3): echo '<b style="color:red">已处理</b>',M('notices')->where('id='.$source_id)->getField('content') ?><?php else:?> <a class="exes" href="javascript:;" data-action="notices" data-uid="<?=$user['user_id']?>" data-id="<?=$id?>" data-status="1">同意通过<i title="点击修改" class="layui-icon"></i></a>&emsp;<a class="exes" href="javascript:;" data-action="notices" data-status="2" data-uid="<?=$user['user_id']?>" data-id="<?=$id?>" style="color:red">驳回<i title="点击修改" class="layui-icon"></i></a> <?php endif ?></td>
              <?php break; ?>
              <?php case 2: ?>
              <?php break; ?>
              <?php endswitch; ?>
                <td><?=$created_at?></td>
              </tr>
            <?php endforeach ?>
            <script>
              var layer;
              $('.exes').click(function(){
                  that = $(this)
                  id = that.data('id')
                  action = that.data('action')
                  status = that.data('status')
                  uid = that.data('uid')
                  if (confirm('执行此操作并给该会员发送消息?')) {
                    layer.prompt(function(val, index){
                        $.post('<?=$showname?>.php',{status:status,editVal:val,editVal:val,uid:uid,id:id,send:action},function(data){
                            that.parent("td").html(data);
                        })
                        layer.msg('发送成功');
                        layer.close(index);
                    });
                  } else {

                  }
              })
            </script>
            <?php include('js/foot'); ?>