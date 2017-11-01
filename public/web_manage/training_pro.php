<?php
require './include/common.inc.php';
define('TABLE_NEWS',1);
require WEB_ROOT.'./include/chkuser.inc.php';
$table = 'training';
$showname = 'training';
$istop = I('get.istop',0,'intval');
if (!empty($id) ) { //显示页面 点击修改  只传了id
	$row = M($table)->find($id);
	extract($row);
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
                      <?php
                        if(isset($qualificationid)) {
                        $qualificationid2 = v_id($qualificationid,"pid","nature");
                        $qualificationid1 = v_id($qualificationid2,"pid","nature");
                        }else{
                        $qualificationid1=get_first(76,0);
                        $qualificationid2=get_first(76,$qualificationid1);
                        }

                        $d3=get_arr(76);
                        $d4=get_arr(76,$qualificationid1);
                        $d5=get_arr(76,$qualificationid2);
                        ?>

                        <!-- 表单提交 --><form id="dataForm" method="post" enctype="multipart/form-data">
						<?php Style::output();Style::submitButton() ?>
                            <label title="职业资格类" class="layui-form-label" style="width: 100px;">职业资格类<b>*</b></label>
                            <select name="qualificationid1" style="width:400px;height:35px;font-size:15px;"  id="qualificationid1">
                                <?php foreach ($d3 as $k => $v): $sl=$k==$qualificationid1?'selected':'' ?>
                                    <option <?php echo $sl?> value="<?php echo $k?>"><?php echo $v?></option>
                                <?php endforeach ?>
                            </select>

                            <select name="qualificationid2" style="width:400px;height:35px;font-size:15px;"  id="qualificationid2">
                                <?php foreach ($d4 as $k => $v): $sl=$k==$qualificationid2?'selected':'' ?>
                                    <option <?php echo $sl?> value="<?php echo $k?>"><?php echo $v?></option>
                                <?php endforeach ?>
                            </select>

                            <select name="qualificationid" style="width:400px;height:35px;font-size:15px;"  id="qualificationid">
                                <?php foreach ($d5 as $k => $v): $sl=$k==$qualificationid?'selected':'' ?>
                                    <option <?php echo $sl?> value="<?php echo $k?>"><?php echo $v?></option>
                                <?php endforeach ?>
                            </select>
                            <div  class="layui-form">
						<input type="hidden" name="pid" value="<?php echo $pid?>" />
						<input type="hidden" name="ty"  value="<?php echo $ty?>"  />
						<input type="hidden" name="tty" value="<?php echo $tty?>" />
<?php
if($ty==28){
    $d=get_arr(75);
    $opt ->edselect($d, '行业', 'industryid');
}elseif($ty==65){
    $d1=get_arr(73);
    $d2=get_arr(74);
    $opt ->edselect($d1, '内训分类', 'neixunid');
    $opt ->edselect($d2, '公开课分类', 'publicid');
}
			(!isset($name) || ! $name ) && $name = '';
			$opt

				//复选框
				// ->choose('标签','relative')->checkboxSet($d)->flur()
				// ->img('列表图','img1',$ty)
				->img('列表图','img1')
				// ->ifs($ty<>14)->img('二维码','img1')->endifs()
				// ->ifs($ty==14)->img('二维码','img2','165*165')->endifs()
				// ->cache()->input('标题','title')->input('副标题','ftitle')->verify('')->input('浏览次数','hits')->flur()
				->input('标题', 'title')
				->input('讲师姓名', 'ftitle')
				->choose('培训方式','trainingid')->radioSet(Config::get('webarr.trainingid'))->flur()
				->input('购买链接', 'source')
				->display('inline')->input('价格', 'price')
				->textarea('课程介绍', 'description')
				->editor('课程介绍')
				->editor('讲师介绍','content2')
			;

echo '</div>';
include('js/foot');

?>
<script type="text/javascript">
    $("#qualificationid1").change(function () {
        var qualificationid1=$(this).val();
        $.get("include/json.php?action=hqfl1&qualificationid1="+qualificationid1, function (data) {
            $("#qualificationid2").html(data);
            var qualificationid2=$("#qualificationid2").val();
            $.get("include/json.php?action=hqfl2&qualificationid2="+qualificationid2, function (data) {

                $("#qualificationid").html(data)
            })
        })

    })
    $("#qualificationid2").change(function () {
        var qualificationid2=$(this).val();

        $.get("include/json.php?action=hqfl2&qualificationid2="+qualificationid2, function (data) {

            $("#qualificationid").html(data)
        })
    })
</script>
