<?php
require './include/common.inc.php';
define('TABLE_NEWS',1);
require WEB_ROOT.'./include/chkuser.inc.php';
$table = 'job';
$showname = 'job';
$istop = I('get.istop',0,'intval');
$industryidname='';
if (!empty($id) ) { //显示页面 点击修改  只传了id
	$row = M($table)->find($id);
	extract($row);
    $industryidname=v_id($industryid,'catname','nature');
}
$opt = new Output;//输出流  输出表单元素
if (isset($_GET['action']) && $_GET['action']=='delImg') {
	$id = I('get.id',0,'intval');
	$img = I('get.img');
	$path = ROOT_PATH.I('get.path');
	M($table)->where("id=".$id)->setField($img,'');
	@unlink($path);
	JsError('删除成功!');
}
?>
<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="UTF-8" />
	<title>新闻,产品,单条</title>
	<?php define('IN_PRO',1);include('js/head'); ?>
</head>

<body>
	<div class="content clr">
		<?php Style::weizhi() ?>
		<div class="right clr">
			<div class="zhengwen clr">
				<div class="xuanhuan clr">
					<a href="javascript:void()" class="zai" style="margin-left:30px;"><?=v_news_cats($zid,'catname')?></a>
				</div>

				<div class="miaoshu clr">
					<div id="tab1" class="tabson">
						<div class="formtext">Hi，<b><?=$_SESSION['Admin_UserName']?></b>，欢迎您使用信息发布功能！</div>
						<!-- 表单提交 --><form id="dataForm" method="post" enctype="multipart/form-data">
						<?php Style::output();Style::submitButton() ?>
                            <?php
                            if(isset($industryid)){
                                $industryid1 = v_id($industryid,"pid","nature");
                            }else{
                                $industryid1=get_first(79);
                            }
                            $d3=get_arr(79);
                            $d4=get_arr(79,$industryid1);



                            if(isset($positionid)&&$positionid>0) {
                                $positionid2 = v_id($positionid,"pid","nature");
                                $positionid1 = v_id($positionid2,"pid","nature");
                            }else{
                                $positionid1=get_first(80);
                                $positionid2=get_first(80,$positionid1);
                            }

                            $d31=get_arr(80);
                            $d42=get_arr(80,$positionid1);
                            $d53=get_arr(80,$positionid2);
                            ?>
                            <input type="hidden" name="pid" value="<?php echo $pid?>" />
                            <input type="hidden" name="ty"  value="<?php echo $ty?>"  />
                            <input type="hidden" name="tty" value="<?php echo $tty?>" />
                                <label title="行业类型" class="layui-form-label">行业类型<b>*</b></label>
                                <select name="industryid1" style="width:400px;height:35px;font-size:15px;"  id="industryid1">
                                    <?php foreach ($d3 as $k => $v): $sl=$k==$industryid1?'selected':'' ?>
                                        <option <?php echo $sl?> value="<?php echo $k?>"><?php echo $v?></option>
                                    <?php endforeach ?>
                                </select>
                                <select name="industryid" style="width:400px;height:35px;font-size:15px;"  id="industryid">
                                    <?php foreach ($d4 as $k => $v): $sl=$k==$industryid?'selected':'' ?>
                                        <option <?php echo $sl?> value="<?php echo $k?>"><?php echo $v?></option>
                                    <?php endforeach ?>
                                </select>


                                <div style="clear: both">
                                <label title="职位类型" class="layui-form-label">职位类型<b>*</b></label>
                                <select name="positionid1" style="width:400px;height:35px;font-size:15px;"  id="positionid1">
                                    <?php foreach ($d31 as $k => $v): $sl=$k==$positionid1?'selected':'' ?>
                                        <option <?php echo $sl?> value="<?php echo $k?>"><?php echo $v?></option>
                                    <?php endforeach ?>
                                </select>

                                <select name="positionid2" style="width:400px;height:35px;font-size:15px;"  id="positionid2">
                                    <?php foreach ($d42 as $k => $v): $sl=$k==$positionid2?'selected':'' ?>
                                        <option <?php echo $sl?> value="<?php echo $k?>"><?php echo $v?></option>
                                    <?php endforeach ?>
                                </select>

                                <select name="positionid" style="width:400px;height:35px;font-size:15px;"  id="positionid">
                                    <?php foreach ($d53 as $k => $v): $sl=$k==$positionid?'selected':'' ?>
                                        <option <?php echo $sl?> value="<?php echo $k?>"><?php echo $v?></option>
                                    <?php endforeach ?>
                                </select>
                            <div class="layui-form">

<?php

			(!isset($name) || ! $name ) && $name = '';
			$opt
                ->input('职位名称', 'title')
                ->input('职位发布地址', 'address')
                ->choose('职位性质','work_nature')->radioSet(Config::get('business.work_nature'))->flur()
                ->choose('职位月薪','salary')->radioSet(Config::get('business.salary'))->flur()
                ->choose('亮点标签标签','relative')->checkboxSet(Config::get('business.relative'))->flur()
                ->input('招收人数', 'recruit_num')
                ->time('招聘结束时间', 'endtime')
                ->choose('学历要求','education')->radioSet(Config::get('business.education'))->flur()
                ->choose('经验要求','experience')->radioSet(Config::get('business.experience'))->flur()

				->editor('其他要求', 'content2')
				->editor('职位描述');
?>
                            </div>


<?php
include('js/foot');

?>
            <script type="text/javascript">
                $("#industryid1").change(function () {
                    //alert(1)
                var industryid1=$(this).val();

                $.get("include/json.php?action=hyfl1&industryid1="+industryid1, function (data) {
                    $("#industryid").html(data)
                    })
                })


                $("#positionid1").change(function () {
                    var positionid1=$(this).val();
                    $.get("include/json.php?action=zwfl1&positionid1="+positionid1, function (data) {
                        $("#positionid2").html(data);
                        var positionid2=$("#positionid2").val();
                        $.get("include/json.php?action=zwfl2&positionid2="+positionid2, function (data) {

                            $("#positionid").html(data)
                        })
                    })

                })
                $("#positionid2").change(function () {
                    var positionid2=$(this).val();

                    $.get("include/json.php?action=zwfl2&positionid2="+positionid2, function (data) {

                        $("#positionid").html(data)
                    })
                })
            </script>
