@extends('business.layouts.public-list')
<?php
$th = ['证书名称', '所属分类', '报名人数'];
$td = [];
?>
{{dd($GLOBALS)}}
@section('form')
<form>
    <div class="order-search">
        <?php $d = config('config.webarr.certificate');Form::select2($d, '选择类型', 'certificate_lid')?>
        <input name="title" value="{{$_GET['title']}}" class="order-manager-inp" type="text" placeholder="输入证书名称"/>
        <input class="order-manager-sub" type="submit" value="搜索结果">
        <a class="certificate-but" href="{{$table}}/create">发布信息</a>
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
        <a class="resume-remove color-trblue" href="{{$table}}/update/{{$id}}">修改</a>
        <a class="resume-delete color-trblue" href="{{$table}}/delete/{{$id}}">删除</a>
    </td>
</tr>
@endforeach
    @stop
