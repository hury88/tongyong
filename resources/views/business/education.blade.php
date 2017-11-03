@extends('business.layouts.public-list-has_next')
<?php
        isset($newsCats) or $newsCats = new \App\NewsCats();


$then = $newsCats->getNavigation(['path', 'catname'], $GLOBALS['ty'])->toArray();

$tty = $GLOBALS['tty'];
function th_map($tty) {
    $th = [];
    array_push($th, '图');
    if ($tty==21) array_push($th, 'logo 图');
    array_push($th, '标题');
    if (in_array($tty, [24,25,29,30])) array_push($th, '详情页图片', '目的地');
    if (in_array($tty, [21,24,25,29,30,33,34])) array_push($th, '报名人数');
    return $th;
}
$th = th_map($GLOBALS['tty']);

$url  = route('b_'.$GLOBALS['pid_path']).u($GLOBALS['ty_path'], $GLOBALS['tty_path']);
$out_url  = u($GLOBALS['pid_path'], $GLOBALS['ty_path'], $GLOBALS['tty_path']);

?>
@section('form')
<form>
    <div class="order-search">
        <input name="title" value="{{$_GET['title']}}" class="order-manager-inp" type="text" placeholder="输入标题名称"/>
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
    @if($tty==21)
    <td><img src="{{img($img2)}}" width="80"></td>
    @endif
    <td><a target="_blank" href="{{$out_url}}/{{$id}}">{{$title}}</a></td>
    @if(in_array($tty, [24,25,29,30]))
    <!-- <td><a href="pic.php?ti=<?php echo $id?>">图集(<?php //echo M('pic')->where("ti=$id")->count(); ?>)</a></td> -->
    <td>{{$destination}}</td>
    @endif
    @if(in_array($tty, [21,24,25,29,30,33,34]))
    <td>{{$enroll_num}}人</td>
    <!-- <td><a href="enroll.php?bid=<?php //echo $id?>&typeid=<?php //echo $tty;?>">共有（<?php //echo M('enroll')->where("tid=".$id." and typeid=".$tty)->count();?>）报名<span></span>(有<?php //echo M('enroll')->where("tid={$id} and typeid={$tty} and isstate=0")->count(); ?>未审核)</a></td> -->
    @endif
    <td>{{date('Y-m-d', $sendtime)}}</td>
    <td>
        <a class="resume-remove color-trblue" href="{{$url}}/update/{{$id}}">修改</a>
        <a class="resume-delete color-trblue" href="javascript:;">删除</a>
    </td>
</tr>
@endforeach
    @stop
