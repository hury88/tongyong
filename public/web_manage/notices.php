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
$action_type_id =   I('get.action_type_id', 0,'intval');/*if(!empty($type))*/$map['action_type_id'] = $action_type_id;
$status =   I('get.status', 0,'intval');if($status)$map['status'] = $status;
###########################筛选开始
if ($status || $action_type_id ==15) {
  $map['user_id'] = 0;
  // $map['status'] = $status;
}
########################分页配置开始
$psize = I('get.psize',30,'intval');
$pageConfig = array(
  /*条件*/'where' => $map,
  /*排序*/'order' => 'status asc,created_at desc',
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

         switch ($action_type_id) {
                 case 1: //'certification.request' => '企业会员实名认证',
                 case 2: //'certification.request' => '企业会员实名认证',
                 case 3: //'certification.request' => '企业会员实名认证',
                 $th = ['企业名称', '注册号', '法人代表', '营业执照', '操作'];
                 break;
                 case 6: //'certification_person.request'
                 case 7: //'certification_person.refuse'
                 case 8: //'certification_person.ok'
                 $th = ['真实姓名', '性别', '出生年月', '身份证号', '正面照', '背面照', '操作'];
                 break;
                 case 15: //'compliant.new'
                 case 16: //'compliant.handled'
                 $th = ['举报标题', '举报者', '操作'];
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
               switch ($action_type_id) {
                 case 1: $user = M('businesses')->field('*')->where(['user_id' => $sender_id])->find();
                   break;
                 case 2: case 3: $user = M('businesses')->field('*')->where(['user_id' => $user_id])->find();
                   break;
                 case 6: $person = M('persons')->field('*')->where(['user_id' => $sender_id])->find();
                   break;
                 case 7: case 8: $person = M('persons')->field('*')->where(['user_id' => $user_id])->find();
                   break;
                 case 15: case 16: $person = M('persons')->field('*')->where(['user_id' => $sender_id])->find();
                 default:
                   break;
               }
             ?>
             <tr>
               <td><?=$key+1?>(<?=$status?>)</td>
              <?php
                switch ($action_type_id) :
                  // case 1: //'certification.request' => '企业会员实名认证',
                  case 1: case 2: case 3:
              ?>
              <?php
                if ($action_type_id == 1 && $status = 1) { //申请
                  $rcao =
                       '<a class="exes" data-typeid="3" data-send="certification" data-action="ok" data-uid="'.$user['user_id'].'" data-nid="'.$id.'">同意通过<i title="点击修改" class="layui-icon"></i></a>'
                       .'&emsp;'.
                       '<a class="exes" data-typeid="2" data-send="certification" data-action="refuse" data-uid="'.$user['user_id'].'" data-nid="'.$id.'" style="color:red"> 驳回<i title="点击修改" class="layui-icon"></i></a>&emsp;'
                       .'&emsp;<span style="color:#666">温馨提示:如果不需要附加内容,请在弹框中输入一个空格,直接提交</span>';
                } elseif($action_type_id == 2) { //拒绝
                  $rcao = '驳回:'.$content;

                } elseif($action_type_id == 3) { // 通过
                  $rcao = '通过:'.$content;

                }
                $tr->td($user['business_name'])
                   ->td($user['registerid'])
                   ->td($user['legal'])
                   ->td_img($user['img'])
                   ->td($rcao)
                ;
              ?>
              <?php break; ?>
              <?php case 6: case 7: case 8:
                  if ($action_type_id == 6 && $status = 1) { //申请
                    $rcao =
                        '<a class="exes" data-typeid="8" data-send="certification_person" data-action="ok" data-uid="'.$person['user_id'].'" data-nid="'.$id.'">同意通过<i title="点击修改" class="layui-icon"></i></a>'
                        .'&emsp;'.
                        '<a class="exes" data-typeid="7" data-send="certification_person" data-action="refuse" data-uid="'.$person['user_id'].'" data-nid="'.$id.'" style="color:red"> 驳回<i title="点击修改" class="layui-icon"></i></a>'
                        .'&emsp;<span style="color:#666">温馨提示:如果不需要附加内容,请在弹框中输入一个空格,直接提交</span>';
                  } elseif($action_type_id == 7) { //拒绝
                    $rcao = '驳回:'.$content;

                  } elseif($action_type_id == 8) { // 通过
                    $rcao = '通过:'.$content;

                  }
                  $tr->td($person['real_name'])
                     ->td($person['gendar'])
                     ->td($person['birthday'])
                     ->td($person['card'])
                     ->td_img($person['card_front'])
                     ->td_img($person['card_back'])
                     ->td($rcao)
                  ;
              ?>
              <?php break; ?>
              <?php case 15: case 16:
                  if ($action_type_id == 15) { //申请
                    $rcao = '<a class="exes" data-typeid="16" data-send="complaint" data-action="handled" data-uid="'.$person['user_id'].'" data-nid="'.$id.'">处理<i title="点击修改" class="layui-icon"></i></a>';
                  } elseif($action_type_id == 16) { //拒绝
                    $rcao = '已处理:'.$content;
                  }
                  $tr->td($title)
                     ->td($content)
                     ->td($rcao)
                  ;
              ?>
              <?php break; ?>
              <?php endswitch; ?>
                <td><?=$created_at?></td>
              </tr>
            <?php endforeach ?>
            <script>
              var layer;
              $('.exes').click(function(){
                  that = $(this)
                  nid = that.data('nid')
                  uid = that.data('uid')
                  send = that.data('send')
                  action = that.data('action')
                  typeid = that.data('typeid')
                  if (confirm('执行此操作并给该会员发送消息?')) {
                    layer.prompt(function(val, index){
                        $.post('include/notices_handle.php',{send:send,action:action,typeid:typeid,message:val,uid:uid,nid:nid},function(data){
                            that.parent("td").html(data);
                        })
                        layer.msg('发送成功');
                        layer.close(index);
                    });
                  } else {

                  }
              })
            </script>
            <?php include('js/foot') ?>
