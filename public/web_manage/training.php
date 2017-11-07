<?php
require './include/common.inc.php';
define('TABLE_NEWS',1);
require WEB_ROOT.'./include/chkuser.inc.php';
$table = 'training';
$showname = 'training';

//条件
$map = array('pid'=>$pid,'ty'=>$ty,'tty'=>0);

###########################筛选开始
$id    =   I('get.id','','trim');if(!empty($id))$map['id'] = array('like',"%$id%");
$title =   I('get.title','','trim');if(!empty($title))$map['title'] = array('like',"%$title%");
$user_id =   I('get.user_id',0,'intval');

$industryid =   I('get.industryid',0,'intval');
$neixunid =   I('get.neixunid',0,'intval');
$publicid =   I('get.publicid',0,'intval');
$onlineid =   I('get.onlineid',0,'intval');
$qualificationid1 =   I('get.qualificationid1',0,'intval');
$qualificationid2 =   I('get.qualificationid2',0,'intval');
$qualificationid =   I('get.qualificationid',0,'intval');
$trainingid =   I('get.trainingid',0,'intval');


if($qualificationid){
    $qualificationid=$qualificationid;
}else{
    if($qualificationid1){
        if($qualificationid2){
            $qualificationid2=$qualificationid2;
        }else{
            $qualificationid2=get_first(76,$qualificationid1);
        }
        $qualificationid=get_first(76,$qualificationid2);
    }else{
        $qualificationid=0;
    }
}
if($user_id){
    $map['user_id'] =$user_id;
    $cname=v_id($user_id,"business_name","businesses",'user_id');
}else{
    $cname='管理员';
}
if(!empty($trainingid)) $map['trainingid'] = $trainingid;
if(!empty($industryid)) $map['industryid'] = $industryid;
if(!empty($neixunid)) $map['neixunid'] = $neixunid;
if(!empty($publicid)) $map['publicid'] = $publicid;
if(!empty($onlineid)) $map['onlineid'] = $onlineid;
if(!empty($qualificationid)) $map['qualificationid'] = $qualificationid;

if(!empty($tty)) $map['tty'] = $tty;
###########################筛选开始
########################分页配置开始
$psize   =   I('get.psize',30,'intval');
$pageConfig = array(
    /*条件*/'where' => $map,
    /*排序*/'order' => 'isgood desc,disorder desc,id desc',
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
        <?php if ($pid<5): ?>
            <input type="hidden" name="user_id" id="user_id"  value="0">
             选择企业： <input type="text" id="cname" class="dfinput" value="<?=$cname?>">
            <div class="qyxf" style="display: none">
                <ul>
                    <li data-id="0">平台管理员</li>
                </ul>
            </div>
        <?php endif ?>
              <?php if($ty==28){
                  $d=get_arr(75);
                  Output::select2($d, '行业', 'industryid');
              }elseif($ty==65){
                  $d=get_arr(73);
                  Output::select2($d, '内训分类', 'neixunid');
                  $d=get_arr(74);
                  Output::select2($d, '公开课分类', 'publicid');
              }elseif($ty==66){
                  $d = config('webarr.onlineid');
                  Output::select2($d, '在线学习分类', 'onlineid');
              }
                  $d=get_arr(76);
                  Output::select2($d, '职业资格类', 'qualificationid1');
                  if($qualificationid1){
                      $d=get_arr(76,$qualificationid1);
                      Output::select2s($d, '职业资格种类', 'qualificationid2');

                      $d=get_arr(76,$qualificationid2);
                      Output::select2s($d, '职业资格', 'qualificationid');
                  }
                  $d = config('webarr.trainingid');
                  Output::select2($d, '培训方式', 'trainingid');
              ?>
        关键字<input name="title" type="text" class="dfinput" value="<?=$title?>"/>
        <input name="search" type="submit" class="btn" value="搜索"/></td>
    </form>
            <script type="text/javascript">
                $(function(){

                    $(".qyxf ul").on("click","li",function(){

                        var user_id=$(this).data("id");
                        var cname=$(this).html();
                        $("#user_id").val(user_id)
                        $("#cname").val(cname)
                        $(".qyxf").hide()
                    })
                })

                $("#cname").click(function(){
                    $("#cname").val('')
                    var key=$(this).val()
                    $.get("include/json.php?action=xzqy&key="+key, function (data) {
                      //  alert(data)
                        $(".qyxf ul").html(data)
                    })
                    $(".qyxf").show()
                })
                $("#cname").keyup(function(){
                    var key=$(this).val()
                    $.get("include/json.php?action=xzqy&key="+key, function (data) {
                      //  alert(data)
                        $(".qyxf ul").html(data)
                    })
                    $(".qyxf").show()
                })
            </script>
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

        <td> 图 </td>
        <td> 标题</td>
        <td> 培训方式 </td>
        <td> 报名人数 </td>
        <td width="10%">发布者</td>
        <td width="10%">发布时间</td>
       </tr>
<?php
    foreach ($data as $key => $bd) : extract($bd);

    $query = queryString(true);
    $query['id'] = $id;
    $editUrl = getUrl($query, $showname.'_pro');#时间
    $time =  date('Y-m-d H:i',$sendtime);
    $img1 =  '<img src="'.src($img1).'" width="80" />';
if($user_id){
    $publisher=v_id($user_id,"business_name","businesses",'user_id');
}else{
    $publisher='管理员';
}

    // $title = '<a href="' . U('blog/view', ['id'=>$id]) . '" target="_blank">'.$title.'</a>';
?>
<tbody>
    <tr>
        <td><input id="delid<?=$id?>" name="del[]" value="<?=$id?>" type="checkbox"><i class="layui-i">&nbsp;</i></td>
        <td><?=$key+1?></td>
        <td>
            <a href="<?=$editUrl?>" class="thick ">编辑</a>|
            <?php if ($ty==10 || $showtype==1): //团队?>
                <a data-class="btn-warm" class="json <?=$istop==1?'btn-warm':'' ?>" data-url="isindex&id=<?=$id?>"><?=config('webarr.isindex')[$istop] ?></a>|
            <?php endif ?>
            <a data-class="btn-danger" class="json <?=$isgood==1?'btn-danger':'' ?>" data-url="isgood&id=<?=$id?>"><?=Config::get('webarr.isgood')[$isgood] ?></a>|
            <a data-class="btn-warm" class="json <?=$isstate==1?'':'btn-warm' ?>" data-url="isstate&id=<?=$id?>"><?=Config::get('webarr.isstate')[$isstate] ?></a>|
            <!-- <a href="<?=$editUrl?>" class="thick edits">编辑</a>| -->
            <a href="javascript:;" data-id="<?=$id?>" data-opt="del" class="thick del">删除</a>
        </td>

        <td><?=$img1?></td>
        <td><?=$title?></td>

        <td> <?=Config::get('webarr.trainingid')[$trainingid]?> </td>
        <td><a href="baoming.php?bid=<?php echo $id?>">共有（<?php echo M('enroll')->where("tid=".$id." and typeid=".$ty)->count();?>）报名<span></span>(有<?php echo M('enroll')->where("tid=".$id." and isstate=0")->count(); ?>未审核)</a></td>

     <td><?=$publisher?></td>
     <td><?=$time?></td>
 </tr>
<?php endforeach?>
<?php include('js/foot'); ?>
<!-- <td><?=$img1?><a class="lookPic" href="javascript:;" data-id="<?=$id?>">添加更多图片(<?=M('pic')->where("ti=$id")->count()?>个)</a></td> -->






