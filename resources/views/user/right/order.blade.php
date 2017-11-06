<h3>我的订单</h3>
<div class="nation-edu-cate clearfix">
    <div class="myorder-cate-right">
        <form>
            <div class="myorder-form">
                <input name="orderno" value="{{$_GET['orderno']}}" class="myorder-inp" type="text" placeholder="请输入订单号"/>
                <input class="myorder-sub" type="submit" value="搜索"/>
            </div>
        </form>
    </div>
</div>
<div class="order-status clearfix">
    <div class="order-status-left fl">
        <span>状态：</span>
        <a id="status-" href="?">全部</a>
        <a id="status-new" href="?{{$ckey_no_status}}&status=new">未付款({{$order_count_new}})</a>
        <a id="status-paid" href="?{{$ckey_no_status}}&status=paid">已付款({{$order_count_paid}})</a>
        <a id="status-refund" href="?{{$ckey_no_status}}&status=refund">已退款({{$order_count_refund}})</a>
        <a id="status-cancelled" href="?{{$ckey_no_status}}&status=cancelled">已取消({{$order_count_cancelled}})</a>
        <script>document.getElementById('status-'+"{{$_GET['status']}}").className="status-now"</script>
    </div>
    <div class="order-status-right fr">
        <div class="order-sub-left">
            <span>支付遇到问题请联系</span>
            <a target="_blank" href="javascript:window.open('{{$boot_config['link1']}}', '', 'width=500,height=300')" class="online-kf">
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
            <!-- <th class="order-table-thirdth">服务操作</th> -->
            <th class="order-table-fourth">订单状态</th>
            <th class="order-table-fiveth">服务操作</th>
        </tr>
        @foreach($pagenewslist['data'] as $key => $list)<?php extract($list) ?>
        <tr class="black-tr"><td colspan="5"></td></tr>
        <tr class="order-title{{$status == '未付款' ? ' order-especial' : ''}}">
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
                    <span>{{$pay_style}}</span>
                </div>
            </td>
            <td>￥{{$price}}</td>
            <!-- <td></td> -->
            <td>
                <a class="color-green" href="javascript:;">{{$status}}</a>
                <a class="color-blue" href="{{route('p_o_v', $id)}}">订单详情</a>
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