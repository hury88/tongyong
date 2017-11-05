<?php
// 支付方式
$config_pay_style = config('config.order.pay_style');
// 订单状态
$config_status = config('config.order.status');
 ?>
<h3>我的订单</h3>
<div class="nation-edu-cate clearfix">
    <div class="myorder-cate-right">
        <form>
            <div class="myorder-form">
                <input name="orderno" class="myorder-inp" type="text" placeholder="请输入订单号"/>
                <input class="myorder-sub" type="button" value="搜索"/>
            </div>
        </form>
    </div>
</div>
<div class="order-status clearfix">
    <div class="order-status-left fl">
        <span>状态：</span>
        <a class="status-now" href="javascript:;">全部</a>
        <a href="javascript:;">未付款</a>
        <a href="javascript:;">已付款</a>
        <a href="javascript:;">已退款</a>
    </div>
    <div class="order-status-right fr">
        <div class="order-sub-left">
            <span>支付遇到问题请联系</span>
            <a href="javascript:;" class="online-kf">
                <img src="/img/QQ%20(2).png"/>在线客服
            </a>
        </div>
    </div>
</div>
<div class="nation-education-table">
    <table width="100%">
        <tr class="edu-first-tr">
            <th class="order-table-firstth">商品信息</th>
            <th class="order-table-secondth">价格</th>
            <th class="order-table-thirdth">服务操作</th>
            <th class="order-table-fourth">订单状态</th>
            <th class="order-table-fiveth">操作</th>
        </tr>
        @foreach($pagenewslist['data'] as $key => $list)<?php extract($list) ?>
        <tr class="black-tr"><td colspan="5"></td></tr>
        <tr class="order-title{{$status == 3 ? ' order-especial' : ''}}">
            <td colspan="5">
                <span class="order-open-time">{{$created_at}}</span>
                <span class="order-open-number">订单编号：{{$orderno}}</span>
            </td>
        </tr>
        <tr class="order-narmal-value order-especial-value">
            <td class="edu-table-firsttd">
                <img class="order-mess-img" src="{{img($training_img)}}"/>
                <div class="order-name">
                    <p>{{$training_title}}</p>
                    <span>{{$config_pay_style[$pay_style]}}</span>
                </div>
            </td>
            <td>￥{{$price}}</td>
            <td></td>
            <td>
                <a class="color-green" href="javascript:;">{{$config_status[$status]}}</a>
                <a class="color-blue" href="/order/view/{{$id}}">订单详情</a>
            </td>
            <td>
                <a class="paymoney-now" href="javascript:;">立即付款</a>
                <a class="order-cancle" href="javascript:;">取消订单</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@include('partial.paginator')