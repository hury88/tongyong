<?php
require 'include/common.inc.php';
require WEB_ROOT.'./include/chkuser.inc.php';
$table = 'news_cats';
$showname = 'ban';


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

		//树型结构类

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
$tree = new Tree(M('news_cats')->field("id,pid,catname,img1,img2")->where("pid not in (1,2,5) and id<>36 and id<>44 and id<>47")->order('id asc')->select());
//实现无限极分类
$cate = $tree->spanning();
//echo "<pre>";
//var_dump($cate);
$color = array('#0B0000','#0E8A5F','#7FD7A2');
$spancer = array('','&nbsp;├','&nbsp;&nbsp;└└');
$i=0;
while( list(,$v) = each($cate) ):
    $id  = $v['id'];
    $level = $v['level'];
    // dump($v);
    $pid = 0;
    $ty  = 0;
    $tty = 0;

    if($level==0){
        $pid = $id;
    }elseif($level==1){
        $pid = $v['pid'];
        $ty  = $id;
    }elseif($level==2){
        $pid = $v['pid'];
        $tty = $id;
    }

//foreach ($data as $key => $bd) :kw_news
//    @extract($bd);
//    {
//        $query = queryString(true);
//        $query['id'] = $id;
//        $editUrl = getUrl($query,$showname.'_pro');
//    }
?>
                     <tbody>
                        <tr>
                            <td><?=$v['id']?></td>
                            <td><?=$v['catname']?></td>
                            <td>
                                <?php if($v['id']<>5){?>banner图<img src="<?=src($v['img1'])?>" width="80" /> <?php }?>
                                <?php if($v['id']<6){?> 导航图 : <img src="<?=src($v['img2'])?>" width="80" /> <?php }?>
                                <?php if($v['id']==60||in_array($pid,array(12,15))){?> 二级栏目列表图 : <img src="<?=src($v['img2'])?>" width="80" /> <?php }?>
                            </td>
                            <td>
                                <a href="ban_pro.php?id=<?=$v['id']?>" class="thick ">编辑</a>|
<!--                                <a data-class="btn-danger" class="json --><?//=$isgood==1?'btn-danger':'' ?><!--" data-url="isgood&id=--><?//=$id?><!--">--><?//=Config::get('webarr.isgood')[$isgood] ?><!--</a>|-->
<!--                                <a data-class="btn-warm" class="json --><?//=$isstate==1?'':'btn-warm' ?><!--" data-url="isstate&id=--><?//=$id?><!--">--><?//=Config::get('webarr.isstate')[$isstate] ?><!--</a>|-->
                            </td>
                        </tr>
<?php endwhile;  $pagestr='';?></tbody></table> </div> </div> </div> </div> </body> </html> <?php include('js/foot'); ?>