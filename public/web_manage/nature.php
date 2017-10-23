<?php
require './include/common.inc.php';
define('TABLE_NEWS',1);
require WEB_ROOT.'./include/chkuser.inc.php';
$action    =   I('get.action');
$typeid   =   I('get.typeid',0,'intval');
$pid   =   I('get.pid',0,'intval');

$table = 'nature';
$showname = 'nature';
$catname =   I('get.catname','','trim');
if(!empty($catname)){
    $map['catname'] = array('like',"%$catname%");
}
$map['typeid'] =$typeid;
$map['pid'] = $pid;
$cs=get_fls($pid);
$scs=get_sfls($pid);
function get_fls($pid){
    $cpid=(int)v_id($pid,"pid","nature");
    $str='';
    if($cpid>0){
        $str.=get_fls($cpid);
    }else{
        return "===".v_id($pid,"catname","nature");
    }
    return $str;
}
function get_sfls($pid){
    $cpid=(int)v_id($pid,"pid","nature");
    $ccpid=(int)v_id($cpid,"pid","nature");
    $str='';
    if($ccpid>0){
        $str.=get_sfls($cpid);
    }else{
        $cxx=v_id($cpid,"catname","nature");
        if($cxx){
            return "===".v_id($cpid,"catname","nature");
        }else{
            return '';
        }

    }
    return $str;
}
if($pid>0){
    $nature_name= v_id($typeid,"catname","news_cats")."分类".$cs;
    $snature_name= v_id($typeid,"catname","news_cats")."分类".$scs;

}else{
    $nature_name=v_id($typeid,"catname","news_cats")."分类";
    $snature_name=v_id($typeid,"catname","news_cats")."分类";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>栏目管理</title>
	<?php include('js/head'); ?>
</head>

<body>
	<div class="content clr">
    	<div class="weizhi">
            <p>位置：
                <a href="mains.php">首页</a>
                <span>></span>
                <a href="?">栏目管理</a>
            </p>
        </div>
    	<div class="right clr">
    <form class="" id="jsSoForm" style="position: relative">
        <input type="hidden" name="pid" value="<?=$pid?>" />
        <input type="hidden" name="typeid"  value="<?=$typeid?>"  />
        关键字<input name="catname" type="text" class="dfinput" value="<?=$catname?>"/>
        <input name="search" type="submit" class="btn" value="搜索"/></td>
    </form>
    <section class="fl">
        <a href="?typeid=<?php echo $typeid?>&pid=<?php echo $pid?>">刷新</a>
        <a id="" href="<?=getUrl(array("typeid"=>$typeid,"pid"=>$pid),$showname.'_pro')?>">添加</a>
        <?php if($pid>0){?>
        <a href="<?=getUrl(array("pid"=>v_id($pid,"pid","nature"),"typeid"=>$typeid),$showname)?>">返回<?=$snature_name?></a>
    <?php }?>
    </section>

            <div class="zhengwen clr">
             	<div class="zhixin clr"></div>
                 <div class="neirong clr">
                	<table cellpadding="0" cellspacing="0" class="table clr">
                        <tr class="first">
						<td width="10%">编号</th>
						<td width="20%">类别名称</th>
						<td width="20%">所属等级类别</th>
						<td width="20%">类别下级管理</th>
						<td width="10%">数据量</th>
						<td width="20%">管理操作</th>
                        </tr>
<?php

	//树型结构类
	$data =M('nature')->where($map)->order('disorder desc,id asc')->select();

    foreach ($data as $key=>$v){
        $count = HR('nature')->where(array('pid'=>$pid,'typeid'=>$typeid))->count();
 ?>
             <tr>
             	 <td><?=$key+1?></td>
                 <td><?=$v['catname']?></td>

                 <td><?=$nature_name?></td>
                 <td><a href="<?=getUrl(array("pid"=>$v['id'],"typeid"=>$typeid),$showname)?>" class="thick">类别下级管理</a></td>
                 <td><?=$count?></td>
                 <td>
                 	<a data-class="btn-warm" class="json <?=$v['isstate']==1?'':'btn-warm' ?>" data-url="isstate&id=<?=$id?>"><?=$webarr['isstate'][$v['isstate']]?></a>
                 	 <a href="<?=getUrl($v['id'],$showname.'_pro')?>" class="thick">编辑</a>
                 	<a href="javascript:;" data-id="<?=$v['id']?>" data-opt="del" class="thick del">删除</a>
                 </td>
             </tr>
<?php } $pagestr=''?>
<?php include('js/foot'); ?>