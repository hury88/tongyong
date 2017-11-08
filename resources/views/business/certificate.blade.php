@extends('business.layouts.public-list-has_next')
<?php
        isset($newsCats) or $newsCats = new \App\NewsCats();


$then = $newsCats->getNavigation(['path', 'catname'], $GLOBALS['ty'])->toArray();
$tty = $GLOBALS['tty'];
function th_map($tty) {

    $th = [];

    if ($tty==54)  array_push($th, '证书名称', '所属分类');
    elseif($tty==59||$tty==63) array_push($th, '问题');
    else array_push($th, '标题');

    if(in_array($tty, [56,61]) ) array_push($th, '图片', '报名人数');
    if ($tty==61)  array_push($th, 'logo 图');
    if(in_array($tty, [60,54,57]) ) array_push($th, '报名人数');
    if(in_array($tty, [55,58,62]) ) array_push($th, '图片');

    return $th;
}
$th = th_map($GLOBALS['tty']);

$url  = route('b_'.$GLOBALS['pid_path']).u($GLOBALS['ty_path'], $GLOBALS['tty_path']);
$out_url  = u($GLOBALS['pid_path'], $GLOBALS['ty_path'], $GLOBALS['tty_path']);

?>
@section('form')
<form>
    <div class="order-search">
        @if($tty==54)
        <?php $d = config('config.webarr.certificate');Form::select2($d, '选择证书类型', 'certificate_lid')?>
        <input name="title" value="{{$_GET['title']}}" class="order-manager-inp" type="text" placeholder="输入证书名称"/>
        @else
        <input name="title" value="{{$_GET['title']}}" class="order-manager-inp" type="text" placeholder="输入标题"/>
        @endif
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
    <td><a target="_blank" href="{{$out_url}}/{{$id}}">{{$title}}</a></td>
    @if($tty==54)
        <td> <?=config('config.webarr.certificate')[$certificate_lid]?> </td>
    @endif
    @if (in_array($tty,array(56,61)))
        <td><img src="{{img($img1)}}" width="80"></td>
        <td>{{$enroll_num}}人</td>
    @endif
    @if($tty==61)
        <td><img src="{{img($img2)}}" width="80"></td>
    @endif
    @if (in_array($tty,array(60,54,57)))
        <td>{{$enroll_num}}人</td>
    @endif
    @if (in_array($tty,array(55,58,62)))
        <td><img src="{{img($img1)}}" width="80"></td>
    @endif

    <td>{{date('Y-m-d', $sendtime)}}</td>
    <td>
        <a class="resume-remove color-trblue" href="{{$url}}/update/{{$id}}">修改</a>
        <a class="resume-delete color-trblue" href="javascript:;">删除</a>
    </td>
</tr>
@endforeach
    @stop
