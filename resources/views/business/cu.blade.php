@extends('business.layouts.public')
<?php
    $tty = $GLOBALS['tty'];
    $ty = $GLOBALS['ty'];
    $form = new Form($row);
    extract($row);
    define('AT_CU', 1);
?>

@section('inbox')
@include('partial.editor')
<div class="job-posted">
    <form class="form" action="{{route('b_'.$GLOBALS['pid_path']).u($GLOBALS['ty_path'], $GLOBALS['tty_path'], 'cu', $form->id)}}" onsubmit="return model($('.save'));">
@if($table == 'certificate')
        <?php
            if ($tty==54){
                $d = config('config.webarr.certificate');
                $form->select($d, '选择证书类型', 'certificate_lid')
                ->input('证书名称','title')
                ->editor('详情');
            }else{
                if($tty==61){
                    $form ->img('学院logo图','img2',"120*120");
                }
                if(in_array($tty,array(59,63))){
                    $form->input('问题','title');
                }else{
                    $form->input('标题','title');
                }
                if (in_array($tty,array(56,61,55,58,62))) {
                    $form->img('配图', 'img1');
                }

                if(in_array($tty,array(59,63))){
                    $form->editor('  答案');
                }else{
                    $form->editor('信息内容');
                }
            }
         ?>
@elseif($table == 'education')
            <?php
                $form->img('配图','img1');

                if($tty==21){
                    $form->img('学院logo图','img2',"100*120");
                }
                $form->input('标题','title');
                if(in_array($tty, [24,25,29,30])){
                    $form
                        ->input('推荐人群', 'ftitle')
                        ->input('出发地','from')
                        ->input('目的地','destination')
                        ->input('席位情况','introduce')
                        ->time('游学开始时间', 'starttime')->time('游学结束时间', 'endtime')
                        ->time('报名开始时间', 'bstarttime')->time('报名结束时间', 'bendtime')
                        ->editor('路线详情')
                        ->editor('详情介绍','content2');
                }elseif($tty<>27){
                    $form->editor('信息内容');
                }
            ?>
    @elseif($table == 'training')
            <?php
            if(isset($qualificationid)) {
                $qualificationid2 = v_id($qualificationid,"pid","nature");
                $qualificationid1 = v_id($qualificationid2,"pid","nature");
            }else{
                $qualificationid=0;
                $qualificationid1=get_first(76);
                $qualificationid2=get_first(76,$qualificationid1);
            }

            $d3=get_arr(76);
            $d4=get_arr(76,$qualificationid1);
            $d5=get_arr(76,$qualificationid2);
            ?>
                <div class="job-posted-dv">
                    <span title="职业资格类" class="job-posted-property"><b>*</b>职业资格类</span>
                    <div class="job-posted-values">
                        <select id="qualificationid1">
                            <?php foreach ($d3 as $k => $v): $sl=$k==$qualificationid1?'selected':'' ?>
                            <option <?php echo $sl?> value="<?php echo $k?>"><?php echo $v?></option>
                            <?php endforeach ?>
                        </select>
                        <select  id="qualificationid2">
                            <?php foreach ($d4 as $k => $v): $sl=$k==$qualificationid2?'selected':'' ?>
                            <option <?php echo $sl?> value="<?php echo $k?>"><?php echo $v?></option>
                            <?php endforeach ?>
                        </select>
                        <select name="qualificationid" id="qualificationid">
                            <?php foreach ($d5 as $k => $v): $sl=$k==$qualificationid?'selected':'' ?>
                            <option <?php echo $sl?> value="<?php echo $k?>"><?php echo $v?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
        <?php

            if($ty==28){
                $d=get_arr(75);
                $form ->select($d, '行业', 'industryid');
            }elseif($ty==65){
                $d1=get_arr(73);
                $d2=get_arr(74);
                $form ->select($d1, '内训分类', 'neixunid');
                $form ->select($d2, '公开课分类', 'publicid');
            }elseif($ty==66){
                $do = config('config.webarr.onlineid');
                $form->select($do,'分类','onlineid');
            }
            $dp = config('config.webarr.trainingid');
            $form->select($dp, '培训方式', 'trainingid');
            $form
                ->img('列表图','img1','250*150')
                ->img('详情页图片','img2',"550X375")
                ->input('课程名称', 'title')
                ->input('讲师姓名', 'name')->input('课时','period')->flur()
                ->input('价格', 'price')
                ->input('开播时间', 'introduce')
                ->editor('课程介绍')
                ->editor('课程大纲','content2')
                ->editor('讲师介绍','content3')
                ->editor('学习资料','content4')
            ;




        ?>
<script type="text/javascript">
    $(function () {

    })
    $("#qualificationid1").change(function () {
        var qualificationid1=$(this).val();
        console.log(qualificationid1)
        $.get("/business/json/qualificationid1/"+qualificationid1, function (data) {

            $("#qualificationid2").html(data);
            var qualificationid2=$("#qualificationid2").val();
            $.get("/business/json/qualificationid2/"+qualificationid2, function (data) {
                $("#qualificationid").html(data)
            })
        })
    })
    $("#qualificationid2").change(function () {
        var qualificationid2=$(this).val();
        $.get("/business/json/qualificationid2/"+qualificationid2, function (data) {
            $("#qualificationid").html(data)
        })
    })
</script>
@elseif($table == 'job')
        <?php
            if(isset($industryid)){
                $industryid1 = v_id($industryid,"pid","nature");
            }else{
                $industryid = 0;
                $industryid1 = get_first(79);
            }
            $d3=get_arr(79);
            $d4=get_arr(79, $industryid1);



            if(isset($positionid)&&$positionid>0) {
                $positionid2 = v_id($positionid,"pid","nature");
                $positionid1 = v_id($positionid2,"pid","nature");
            }else{
                $positionid = 0;
                $positionid1=get_first(80);
                $positionid2=get_first(80,$positionid1);
            }

            $d31=get_arr(80);
            $d42=get_arr(80,$positionid1);
            $d53=get_arr(80,$positionid2);
        ?>
            <div class="job-posted-dv">
                <span title="行业类型" class="job-posted-property"><b>*</b>行业类型</span>
                <div class="job-posted-values">
                   <select id="industryid1">
                       <?php foreach ($d3 as $k => $v): $sl=$k==$industryid1?'selected':'' ?>
                           <option <?php echo $sl?> value="<?php echo $k?>"><?php echo $v?></option>
                       <?php endforeach ?>
                   </select>
                   <select name="industryid" id="industryid">
                       <?php foreach ($d4 as $k => $v): $sl=$k==$industryid?'selected':'' ?>
                           <option <?php echo $sl?> value="<?php echo $k?>"><?php echo $v?></option>
                       <?php endforeach ?>
                   </select>
                </div>
                <span title="职位类型" class="job-posted-property"><b>*</b>职位类型</span>
                <div class="job-posted-values">
                   <select name="positionid1" id="positionid1">
                       <?php foreach ($d31 as $k => $v): $sl=$k==$positionid1?'selected':'' ?>
                           <option <?php echo $sl?> value="<?php echo $k?>"><?php echo $v?></option>
                       <?php endforeach ?>
                   </select>

                   <select name="positionid2" id="positionid2">
                       <?php foreach ($d42 as $k => $v): $sl=$k==$positionid2?'selected':'' ?>
                           <option <?php echo $sl?> value="<?php echo $k?>"><?php echo $v?></option>
                       <?php endforeach ?>
                   </select>

                   <select name="positionid" id="positionid">
                       <?php foreach ($d53 as $k => $v): $sl=$k==$positionid?'selected':'' ?>
                           <option <?php echo $sl?> value="<?php echo $k?>"><?php echo $v?></option>
                       <?php endforeach ?>
                   </select>
                </div>
            </div>
    <?php

        $form
            ->input('职位名称', 'title')
            ->input('职位发布地址', 'address')
            ->choose('职位性质','work_nature')->radioSet(config('config.business.work_nature'))->flur()
            ->choose('职位月薪','salary')->radioSet(config('config.business.salary'))->flur()
            ->choose('亮点标签标签','relative')->checkboxSet(config('config.business.relative'))->flur()
            ->input('招收人数', 'recruit_num')
            ->time('招聘结束时间', 'endtime')
            ->choose('学历要求','education')->radioSet(config('config.business.education'))->flur()
            ->choose('经验要求','experience')->radioSet(config('config.business.experience'))->flur()

            ->editor('其他要求', 'content2')
            ->editor('职位描述')
        ;
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
@endif
        <div class="post-message-div clearfix">
            <div class="post-message-right fr">
                <input class="post-message-inp save" type="submit" value="发布"/>
                <a href="javascript:window.history.back();"  class="post-message-sub">取消</a>
            </div>
        </div>
        <div class="black77"></div>
        {{csrf_field()}}
    </form>
</div>
@stop