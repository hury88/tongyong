@extends('business.layouts.public-list')
@section('inbox')
@section('form')
<?php
    // define('AT_NO', 1);
$th = ['职位名称', '职位性质', '招收人数', '申请人数', '信息状态', '结束时间', '浏览数'];
$ty = $GLOBALS['ty'];
$url  = route('b_'.$GLOBALS['pid_path']).u($GLOBALS['ty_path']);
$out_url  = u($GLOBALS['pid_path'], $GLOBALS['ty_path']);
 ?>
<form id="jsSoForm">
    <div class="order-search">
        <?php
            $d1 = get_arr(79);
            Form::select2($d1, '行业类型', 'industryid1');
            if($_GET['industryid1']){
                $d2 = get_arr(79, $_GET['industryid1']);
                Form::select2s($d2, '行业种类', 'industryid');
            }
            $business_work_nature = config('business.work_nature');
            Form::select2($business_work_nature, '工作性质', 'work_nature');
        ?>
        <input class="order-manager-sub" type="submit" value="搜索结果">
        <a class="certificate-but" href="{{$url}}/create">发布信息</a>
    </div>
</form>
@stop

@section('tbody')
@foreach($pagenewslist['data'] as $key => $list)<?php extract($list) ?>
<tr>
    <td class="manager-firstth">
        <label><input id="delid{{$id}}" class="xuanze" value="{{$id}}" type="checkbox"/>{{$key+1}}</label>
    </td>
    <td><a class="color-blue" target="_blank" href="{{$out_url}}/{{$id}}">{{$title}}</a></td>
    <td>{{$business_work_nature[$work_nature]}}</td>
    <td>{{$recruit_num}}</td>
    <td>{{$isstate}}</td>
    <td>{{$enroll_num}}</td>
    <td>{{date('Y-m-d', $endtime)}}</td>
    <td>{{$hits}}</td>
    <td>{{date('Y-m-d', $sendtime)}}</td>
    <td>
        <a class="resume-remove color-trblue" href="{{$url}}/update/{{$id}}">修改</a>
        <a class="resume-delete color-trblue" href="javascript:;">删除</a>
    </td>
</tr>
@endforeach
    @stop