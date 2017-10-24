<?php
require './include/common.inc.php';
define('TABLE_NEWS',1);
require WEB_ROOT.'./include/chkuser.inc.php';
$table = 'education';
$showname = 'education';

//条件
$map = array('pid'=>$pid,'ty'=>$ty,'tty'=>0);

###########################筛选开始
$id    =   I('get.id','','trim');if(!empty($id))$map['id'] = array('like',"%$id%");
$title =   I('get.title','','trim');if(!empty($title))$map['title'] = array('like',"%$title%");
$cid =   I('get.cid',0,'intval');
if(!empty($cid)){
    $map['cid'] =$cid;
    $cname=v_id($cid,"name","cmember");
}else{
    $cname='管理员';
}
if(!empty($tty)) $map['tty'] = $tty;
###########################筛选开始
########################分页配置开始
$psize   =   I('get.psize',30,'intval');
$pageConfig = array(
    /*条件*/'where' => $map,
    /*排序*/'order' => 'isgood desc,disorder desc,sendtime desc',
    /*条数*/'psize' => $psize,
    /*表  */'table' => $table,
    );
list($data,$pagestr) = Page::paging($pageConfig);
//_sql();
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
        <?php Style::weizhi() ?>
        <div class="right clr">
          <form class="" id="jsSoForm" style="position: relative">
            <input type="hidden" name="pid" value="<?=$pid?>" />
            <input type="hidden" name="ty"  value="<?=$ty?>"  />
            <input type="hidden" name="tty" value="<?=$tty?>" />
            <!-- <b>显示</b><input style="width:50px;" name="psize" type="text" class="dfinput" value="<?=$psize?>"/>条 -->
            <!-- <b>编号</b><input name="id" type="text" class="dfinput" value="<?=$id?>"/> -->

            <input type="hidden" name="cid" id="cid"  value="0">
             选择企业： <input type="text" id="cname" class="dfinput" value="<?=$cname?>">
            <div class="qyxf" style="display: none">
                <ul>
                    <li data-id="0">平台管理员</li>
                </ul>
            </div>
        关键字<input name="title" type="text" class="dfinput" value="<?=$title?>"/>
        <input name="search" type="submit" class="btn" value="搜索"/></td>
    </form>
    <div class="zhengwen clr">
      <div class="zhixin clr">
        <ul class="toolbar">
            <li>&nbsp;<input style="display:none" type="checkbox"><i id="sall" class="alls" onclick="selectAll(this)">&nbsp;</i><label style="cursor:pointer;font-size:9px" onclick="selectAll(document.getElementById('sall'))" for="">全选</label></li></li>
        </ul>
        <a href="?<?=queryString()?>" class="zhixin_a2 fl"></a><!-- 刷新  -->
        <a href="<?=getUrl(queryString(true),$showname.'_pro')?>" target="righthtml" class="zhixin_a3 fl"></a><!-- 添加  -->
        <input id="del" type="button" class="zhixin_a4 fl"/><!-- 删除  -->
    </div>
</div>
<div class="neirong clr">
    <table cellpadding="0" cellspacing="0" class="table clr">
       <tr class="first">
        <td onclick="selectAll(document.getElementById('sall'))" style="font-size:8px;cursor:pointer" width="24px">全选</td>
        <td width="24px">编号</td> <td width="200px">操作</td>

    <?php if ($tty<>22){?>
        <td> 图 </td>
    <?php }?>
           <?php if ($tty==21){?>
               <td>logo 图 </td>
           <?php }?>
        <td> 标题 <span class="fr"></td>
           <?php if (in_array($tty,array(24,25,29,30))){?>
           <td> 详情页图片 </td>
           <td> 目的地 </td>
           <?php }?>
    <?php if (in_array($tty,array(21,24,25,29,30,33,34))){?>
        <td> 报名人数 </td>
    <?php }?>

    <td width="10%">发布者</td>
    <td width="10%">发布时间</td>
</tr>
<?php
    foreach ($data as $key => $bd) : extract($bd);

                            #生成修改地址
    $query = queryString(true);
    $query['id'] = $id;
    $editUrl = getUrl($query, $showname.'_pro');
                            #时间
    $time =  date('Y-m-d H:i',$sendtime);
    $img1 =  '<img src="'.src($img1).'" width="80" />';
    $img2 =  '<img src="'.src($img2).'" width="80" />';
if($cid){
    $publisher=v_id($cid,"name","cmember");
}else{
    $publisher="平台管理员";
}

    // $title = '<a href="' . U('blog/view', ['id'=>$id]) . '" target="_blank">'.$title.'</a>';
?>
<tbody>
    <tr>
        <td><input id="delid<?=$id?>" name="del[]" value="<?=$id?>" type="checkbox"><i class="layui-i">&nbsp;</i></td>
        <td><?=$key+1?></td>
        <td>
            <a href="<?=$editUrl?>" class="thick ">编辑</a>|

            <a data-class="btn-danger" class="json <?=$isgood==1?'btn-danger':'' ?>" data-url="isgood&id=<?=$id?>"><?=Config::get('webarr.isgood')[$isgood] ?></a>|
            <a data-class="btn-warm" class="json <?=$isstate==1?'':'btn-warm' ?>" data-url="isstate&id=<?=$id?>"><?=Config::get('webarr.isstate')[$isstate] ?></a>|
            <!-- <a href="<?=$editUrl?>" class="thick edits">编辑</a>| -->
            <a href="javascript:;" data-id="<?=$id?>" data-opt="del" class="thick del">删除</a>
        </td>
        <?php if($tty<>22){?>
        <td><?=$img1?></td>
        <?php }?>
        <?php if($tty==21){?>
            <td><?=$img2?></td>
        <?php }?>
        <td><?=$title?></td>
        <?php if(in_array($tty,array(24,25,29,30))){?>

            <td><a href="pic.php?ti=<?php echo $id?>">图集(<?php echo M('pic')->where("ti=$id")->count(); ?>)</a></td>
            <td><?=$destination?></td>
        <?php }?>
        <?php if(in_array($tty,array(21,24,25,29,30,33,34))){?>
        <td><a href="enroll.php?bid=<?php echo $id?>&typeid=<?php echo $tty;?>">共有（<?php echo M('enroll')->where("bid=".$id." and typeid=".$tty)->count();?>）报名<span></span>(有<?php echo M('enroll')->where("bid={$id} and typeid={$tty} and isstate=0")->count(); ?>未审核)</a></td>
        <?php }?>

     <td><?=$publisher?></td>
     <td><?=$time?></td>
 </tr>
<?php endforeach?>
<?php include('js/foot'); ?>
<!-- <td><?=$img1?><a class="lookPic" href="javascript:;" data-id="<?=$id?>">添加更多图片(<?=M('pic')->where("ti=$id")->count()?>个)</a></td> -->




