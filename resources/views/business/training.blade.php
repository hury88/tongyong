@extends('business.layouts.public-list')
<?php
    // define('AT_NO', 1);
$th = ['图', '标题', '培训方式', '报名人数'];
$trainingid_s = config('config.webarr.trainingid');
$ty = $GLOBALS['ty'];
$url  = route('b_'.$GLOBALS['pid_path']).u($GLOBALS['ty_path']);
 ?>

@section('inbox')
@include('partial.editor')
@section('form')
<form id="jsSoForm">
    <div class="order-search">
        <?php
            if($ty==28){
                $d = get_arr(75);
                Form::select2($d, '行业', 'industryid');
            }elseif($ty==65){
                $d = get_arr(73);
                Form::select2($d, '内训分类', 'neixunid');
                $d = get_arr(74);
                Form::select2($d, '公开课分类', 'publicid');
            }
                $d = get_arr(76);
                Form::select2($d, '职业资格类', 'qualificationid1');
                if($_GET['qualificationid1']){
                    $d = get_arr(76,$_GET['qualificationid1']);
                    Form::select2s($d, '职业资格种类', 'qualificationid2');

                    $d = get_arr(76,$_GET['qualificationid2']);
                    Form::select2s($d, '职业资格', 'qualificationid');
                }
                Form::select2($trainingid_s, '培训方式', 'trainingid');
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
        <label><input class="xuanze" value="{{$id}}" type="checkbox"/>{{$key+1}}</label>
    </td>
    <td><img src="{{img($img1)}}" width="80"></td>
    <td>{{$title}}</td>
    <td>{{$trainingid_s[$trainingid]}}</td>
    <td>{{$enroll_num}}</td>
    <td>{{date('Y-m-d', $sendtime)}}</td>
    <td>
        <a class="resume-remove color-trblue" href="{{$url}}/update/{{$id}}">修改</a>
        <a class="resume-delete color-trblue" href="javascript:;">删除</a>
    </td>
</tr>
@endforeach
    @stop