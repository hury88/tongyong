<?php
require 'include/common.inc.php';
require WEB_ROOT.'./include/chkuser.inc.php';
$table = 'news_cats';
$showname = 'ban';

$id    =   I('get.id', 0,'intval');
$pid   =   I('get.pid',0,'intval');
$ty    =   I('get.ty', 0,'intval');
$tty   =   I('get.tty',0,'intval');

/*$classname='<a href="javascript:void()">'.get_catname($pid,'news_cats').'</a> <span>></span> <a href="javascript:void()">'.get_catname($ty,"news_cats").'</a>';
$zid=$ty;
if($tty){
	$zid=$tty;
	$classname .= '<span>></span> <a href="javascript:void()">'.get_catname($tty,"news_cats").'</a>';
}
if(isset($_GET['showtype'])){//主动传值优先级最大
	$showtype = (int)$_GET['showtype'];
}else{
	$showtype=get_catname($zid,"news_cats","showtype");
}*/

//条件
$map = array();
$tree = new Tree(M('news_cats')->field("id,catname")->where("pid=0 and id<6")->select());
$cate = $tree->spanning();
$dropdown =  '<select name="pid" id="" class="select1">%s</select>';
$option = '<option value="0">无（属一级栏目）</option>';
$color = array('#0B0000','#0E8A5F','#7FD7A2');
$spancer = array('','&nbsp;├','&nbsp;&nbsp;└└');
echo "<pre>";
var_dump($cate);exit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>图文合用页面</title>
	<?php include('js/head'); ?>
</head>

<body>
	<div class="content clr">
    	<div class="weizhi">
            <p>位置：
                <a href="mains.php">首页</a>
                <span>></span>
				内页banner
				<span><a href="javascript:history.back()">返回</a></span>
            </p>
        </div>
    	<div class="right clr">
            <div class="zhengwen clr">
                <div class="neirong clr">
                    <table cellpadding="0" cellspacing="0" class="table clr">
                           <tr class="first">
                            <td width="24px">编号</td>
                            <td> 名称 </td>
                            <td> BANNER </td>
                            <td width="150px">操作</td>
                         </tr>
<!-- #################################################################################################################### -->

<?php
foreach ($data as $key => $bd) :
    @extract($bd);
    {
        $query = queryString(true);
        $query['id'] = $id;
        $editUrl = getUrl($query,$showname.'_pro');
    }
?>
                     <tbody>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><?=$catname?></td>
                            <td>
                                <?php if($id<>5){?><img src="<?=src($img1)?>" width="80" /> <?php }?>
                                <?php if($id<6){?> 导航图 : <img src="<?=src($img2)?>" width="80" /> <?php }?>
                            </td>
                            <td>
                                <a href="<?=$editUrl?>" class="thick ">编辑</a>|
                                <a data-class="btn-danger" class="json <?=$isgood==1?'btn-danger':'' ?>" data-url="isgood&id=<?=$id?>"><?=Config::get('webarr.isgood')[$isgood] ?></a>|
                                <a data-class="btn-warm" class="json <?=$isstate==1?'':'btn-warm' ?>" data-url="isstate&id=<?=$id?>"><?=Config::get('webarr.isstate')[$isstate] ?></a>|
                            </td>
                        </tr>
<?php endforeach?></tbody></table> </div> </div> </div> </div> </body> </html> <?php include('js/foot'); ?>