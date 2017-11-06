@extends('business.layouts.public-list')
<?php
$th = ['订单编号', '用户', '培训课程', '价格', '状态'];
?>
@section('form')
<style>
    .caozuo {display: none;}
</style>
    <form>
        <div class="order-search">
            <?php Form::select2(config('config.order.orderBy'), '选择排序方式', 'orderBy')?>
            <input name="orderno" value="{{$_GET['orderno']}}" class="order-manager-inp" type="text" placeholder="输入订单编号"/>
            <input class="order-manager-sub" type="submit" value="搜索结果">
        </div>
    </form>
@stop
@section('tbody')
    @foreach($pagenewslist['data'] as $key => $list)<?php extract($list) ?>
    <tr>
        <td class="manager-firstth">
            <label><input class="xuanze" value="{{$id}}" type="checkbox"/>{{$key+1}}</label>
        </td>
        <td>{{$orderno}}</td>
        <td>{{$buyer_name}}</td>
        <td class="manager-fourtd">
            <img class="order-mess-img" src="{{img($training_img)}}"/>
            <div class="order-name">
                <p>{{$training_title}}</p>
                <span>{{$pay_style}}</span>
            </div>
        </td>
        <td class="pro-price">￥{{$price}}</td>
        <td>{{$status}}</td>
        <td>{{$created_at}}</td>
    </tr>
    @endforeach
@stop
