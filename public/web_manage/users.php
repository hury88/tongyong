<?php
require './include/common.inc.php';
require WEB_ROOT.'./include/chkuser.inc.php';
$table = $showname = 'users';

//条件
$map = array();

###########################筛选开始
$role       =   I('get.role','2','intval');if(!empty($role))$map['role'] = $role;
$telphone    =   I('get.phone','','trim'); if(!empty($phone))$map['phone'] = $telphone;;
$email    =   I('get.email','','trim');if(!empty($email))$map['email'] =$email;
$member_nam    =   I('get.member_nam','','trim');if(!empty($member_nam))$map['email'] =$member_nam;
###########################筛选开始

########################分页配置开始
$psize   =   I('get.psize',30,'intval');
$pageConfig = array(
    /*条件*/'where' => $map,
    /*排序*/'order' => 'certified asc,id desc',
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
    <title>用户页面</title>
    <?php include('js/head'); ?>
</head>
<body>
    <div class="content clr">
        <div class="right clr">
              <form class="" id="jsSoForm">
<!--                <b>显示</b><input style="width:50px;" name="psize" type="text" class="dfinput" value="--><?//=$psize?><!--"/>条-->
<!--                <b>编号</b><input name="id" type="text" class="dfinput" value="--><?//=$id?><!--"/>-->
                <b>手机号</b><input name="phone" type="text" class="dfinput" value="<?=$telphone?>"/>
                <b>邮箱</b><input name="email" type="text" class="dfinput" value="<?=$email?>"/>
                <b>用户名搜索</b><input name="member_nam" type="text" class="dfinput" value="<?=$member_nam?>"/>
                <input name="search" type="submit" class="btn" value="搜索"/></td>
            </form>
        <?=$pagestr?>
            <div class="zhengwen">
                 <div class="zhixin clr">
                   <ul class="toolbar">
                       <li>&nbsp;<input style="display:none" type="checkbox"><i id="sall" class="alls" onclick="selectAll(this)">&nbsp;</i><label style="cursor:pointer;font-size:9px" onclick="selectAll(document.getElementById('sall'))" for="">全选</label></li></li>
                   </ul>
                   <a href="?<?=queryString()?>" class="zhixin_a2 fl"></a><!-- 刷新  -->
<!--                   <a href="--><?//=getUrl(queryString(true),$showname.'_pro')?><!--" target="righthtml" class="zhixin_a3 fl"></a>添加  -->
<!--                   <input id="del" type="button" class="zhixin_a4 fl"/>删除  -->
            </div>
            <div class="neirong clr">
                <table cellpadding="0" cellspacing="0" class="table clr">
                 <tr class="first">
                    <td onclick="selectAll(document.getElementById('sall'))" style="font-size:8px;cursor:pointer" width="24px">全选</td>
                    <td width="24px">编号</td> <td width="150px">操作</td>

                    <td>用户名</td>
                    <td>手机号</td>
                    <td>邮箱</td>
                    <td>最后登录时间</td>
                    <td>注册时间</td>

                </tr>
                <?php
                    foreach ($data as $key => $bd) : extract($bd);
                    #生成修改地址
                    $query = queryString(true);
                    $query['id'] = $id;
                    $editUrl = getUrl($query, $showname.'_pro');
                ?>
        <tbody>
            <tr>
                <td><input id="delid<?=$id?>" name="del[]" value="<?=$id?>" type="checkbox"><i class="layui-i">&nbsp;</i></td>
                <td><?=$id?></td>
                <td>
<!--                    <a href="--><?//=$editUrl?><!--" class="thick ">编辑</a>|-->
<!--                    <a href="javascript:;" data-id="--><?//=$id?><!--" data-opt="del" class="thick del">删除</a>|-->
                    <a data-class="btn-danger" class="json <?=$certified==1?'btn-danger':'' ?>" data-url="certified&id=<?=$id?>"><?=Config::get('webarr.certified')[$certified] ?></a>|
                    <a href="" data-id="<?=$id?>"  class="thick">认证信息</a>|
                    <a data-class="btn-warm" class="json <?=$isstate==1?'':'btn-warm' ?>" data-url="isstate&id=<?=$id?>"><?=Config::get('webarr.isstate')[$isstate] ?></a>|
<!--                    <a href="">会员信息</a>-->
                </td>

                <td><?=$member_nam?></td>
                <td><?=$telphone?></td>
                <td><?=$email?></td>
                <td><?=$updated_at?></td>
                <td><?=$created_at?></td>
            </tr>
        <?php endforeach?>
        <?php include('js/foot'); ?>

