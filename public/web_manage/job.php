<?php
require './include/common.inc.php';
define('TABLE_NEWS',1);
require WEB_ROOT.'./include/chkuser.inc.php';
$table = 'job';
$showname = 'job';

//条件
$map = array('pid'=>$pid,'ty'=>$ty,'tty'=>0);

###########################筛选开始
$id    =   I('get.id','','trim');if(!empty($id))$map['id'] = array('like',"%$id%");
$title =   I('get.title','','trim');if(!empty($title))$map['title'] = array('like',"%$title%");

$industryid =   I('get.industryid',0,'intval');
$industryid1 =   I('get.industryid1',0,'intval');
if($industryid){
    $industryid=$industryid;
}else{
    if($industryid1){
        $industryid=get_first(79,$industryid1);
    }else{
        $industryid=0;
    }
}
$user_id =   I('get.user_id',0,'intval');
$work_nature=   I('get.work_nature',0,'intval');
if($user_id){
    $map['user_id'] =$user_id;
    $cname=v_id($user_id,"business_name","businesses",'user_id');
}else{
    $cname='管理员';
}
if(!empty($tty)) $map['tty'] = $tty;
if(!empty($work_nature)) $map['work_nature'] = $work_nature;
if(!empty($industryid)) $map['industryid'] = $industryid;
$psize   =   I('get.psize',30,'intval');
$pageConfig = array(
    /*条件*/'where' => $map,
    /*排序*/'order' => 'isgood desc,disorder desc,issued desc,sendtime desc',
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

            <input type="hidden" name="user_id" id="user_id"  value="0">
            选择企业： <input type="text" id="cname" class="dfinput" value="<?=$cname?>">
            <div class="qyxf" style="display: none">
                <ul>
                    <li data-id="0">平台管理员</li>
                </ul>
            </div>
<?php
            $d1=get_arr(79);
            Output::select2($d1, '行业类型', 'industryid1');
            if($industryid1){
                $d2=get_arr(79,$industryid1);
                Output::select2s($d2, '行业种类', 'industryid');
            }
              $d = config('business.work_nature');
              Output::select2($d, '工作性质', 'work_nature');
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
        <?php if (false && 5 == $showtype): // || 3 == $pid ?>
        <a style="background:none;border:1px solid;line-height:28px;text-align:center" href="content.php?<?=queryString()?>" class="fl">编辑详情</a>
    <?php endif ?>
</div>
</div>
<div class="neirong clr">
    <table cellpadding="0" cellspacing="0" class="table clr">
       <tr class="first">
        <td onclick="selectAll(document.getElementById('sall'))" style="font-size:8px;cursor:pointer" width="24px">全选</td>
        <td width="24px">编号</td> <td width="200px">操作</td>
        <td> 职位名称 </td>
        <td>职位性质</td>
        <td>招收人数</td>
        <td> 申请人数 </td>
        <td> 信息状态 </td>
        <td> 结束时间 </td>

           <td width="10%">发布者</td>
    <td width="10%">发布时间</td>
</tr>
<?php
    foreach ($data as $key => $bd) : extract($bd);
    $query = queryString(true);
    $query['id'] = $id;
    $editUrl = getUrl($query, $showname.'_pro');
                            #时间
    $time =  date('Y-m-d H:i',$sendtime);
    $endtime =  date('Y-m-d H:i',$endtime);
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
            <a data-class="btn-danger" class="json <?=$isgood==1?'btn-danger':'' ?>" data-url="isgood&id=<?=$id?>"><?=Config::get('webarr.isgood')[$isgood] ?></a>|
            <a data-class="btn-warm" class="json <?=$isstate==1?'':'btn-warm' ?>" data-url="isstate&id=<?=$id?>"><?=Config::get('webarr.isstate')[$isstate] ?></a>|
            <a href="javascript:;" data-id="<?=$id?>" data-opt="del" class="thick del">删除</a>
        </td>

        <td><?=$title?></td>
        <td> <?=Config::get('business.work_nature')[$work_nature]?> </td>
            <td><?=$recruit_num?></td>
            <td><?=Config::get('webarr.issued')[$issued] ?></td>
        <td><a href="baoming.php?bid=<?php echo $id?>&typeid=<?php echo $tty?>">共有（<?php echo M('enroll')->where("tid=".$id)->count();?>）报名<span></span>(有<?php echo M('enroll')->where("tid=".$id." and isstate=0")->count(); ?>未审核)</a></td>


     <td><?=$endtime?></td>
     <td><?=$publisher?></td>
     <td><?=$time?></td>
 </tr>
<?php endforeach?>
<?php include('js/foot'); ?>
<!-- <td><?=$img1?><a class="lookPic" href="javascript:;" data-id="<?=$id?>">添加更多图片(<?=M('pic')->where("ti=$id")->count()?>个)</a></td> -->