@extends('business.layouts.public-list')
<?php
$th = ['订单编号', '用户', '培训课程', '价格', '状态'];
// 支付方式
$config_pay_style = config('config.order.pay_style');
// 订单状态
$config_status = config('config.order.status');
?>
@section('form')
<style>
    .caozuo {display: none;}
</style>
    <form>
        <div class="order-search">
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
            <?php Form::select2(config('config.order.orderBy'), '选择排序方式', 'order_style')?>
        <td>{{$buyer_name}}</td>
        <td class="manager-fourtd">
            <img class="order-mess-img" src="{{img($training_img)}}"/>
            <div class="order-name">
                <p>{{$training_title}}</p>
                <span>{{$config_pay_style[$pay_style]}}</span>
            </div>
        </td>
        <td class="pro-price">￥{{$price}}</td>
        <td>{{$config_status[$status]}}</td>
        <td>{{$created_at}}</td>
    </tr>
    @endforeach
@stop
