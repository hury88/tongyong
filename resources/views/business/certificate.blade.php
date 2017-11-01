@extends('business.layouts.public-list')
<?php
$th = ['证书名称', '所属分类', '报名人数'];
$td = [];
?>
@section('form')
<form>
    <div class="order-search">
        <?php $d = config('config.webarr.certificate');Form::select2($d, '选择证书类型', 'certificate_lid')?>
        <input name="title" value="{{$_GET['title']}}" class="order-manager-inp" type="text" placeholder="输入证书名称"/>
        <input class="order-manager-sub" type="submit" value="搜索结果">
        <input class="certificate-but" type="button" value="发布信息">
    </div>
</form>
    @stop
@section('tbody')
@foreach($pagenewslist['data'] as $key => $list)<?php extract($list) ?>
<tr>
    <td class="manager-firstth">
        <label><input class="xuanze" value="{{$id}}" type="checkbox"/>{{$key+1}}</label>
    </td>
    <td>{{$title}}</td>
    <td>{{$d[$certificate_lid]}}</td>
    <td>{{$enroll_num}}人</td>
    <td>{{date('Y-m-d', $sendtime)}}</td>
    <td>
        <a class="resume-remove color-trblue" href="javascript:;">修改</a>
        <a class="resume-delete color-trblue" href="javascript:;">删除</a>
    </td>
</tr>
@endforeach
    @stop
