@extends('layouts.master')

@section('title')个人中心 @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/common_gerenzhongxin.css"/>
    <link rel="stylesheet" type="text/css" href="/css/personalCenter.css"/>
@stop
@section('bodyNextLabel')
    @parent
@stop
@section('navigation') @parent @show
@section('content')
    @include('user.partial.menu_dashboard')
@section('user_wrap')

    <div class="wrap-box order-detials-content">
        <h3 class="order-detials-title">订单详情</h3>
        <div class="order-detials-mess">
            <table width="100%" border="0">
                <tr class="order-mess-trfirst">
                    <td><TABLE width="100%"><TD width="22%">订单编号：291798983</TD><TD width="78%">创建时间：2017-04-19 13:26:12</TD></TABLE></td>
                </tr>
                <tr class="order-mess-second">
                    <td><TABLE width="100%">
                            <TD class="order-mess-firsttd" width="32%">商品信息</TD>
                            <TD width="14%">课时</TD>
                            <TD width="10.8%">企业</TD>
                            <TD width="10.8%">服务</TD>
                            <TD width="10.8%">价格</TD>
                            <TD width="10.8%">状态</TD>
                            <TD width="10.8%">操作</TD>
                        </TABLE></td>
                </tr>
                <tr class="order-mess-third">
                    <td><TABLE width="100%">
                            <TD width="33%">
                                <img class="order-mess-img" src="/img/brand-img.png"/>
                                <div class="order-name">
                                    <p>2017联想集团《技能培训》视频教程</p>
                                    <span>在线支付</span>
                                </div>
                            </TD>
                            <TD width="14%">20节-10小时12分钟</TD>
                            <TD width="10.8%">联想集团</TD>
                            <TD width="10.8%"></TD>
                            <TD width="10.8%">￥29.00</TD>
                            <TD width="10.8%">已付款</TD>
                            <TD width="10.8%" class="praise">评价</TD>
                        </TABLE></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="wrap-box order-recommend">
        <div class="recommend-header clearfix">
            <h3 class="order-recommend-title fl">为您推荐</h3>
        </div>
        <ul class="order-recommend-ul">
            <li class="order-recommend-li">
                <a class="order-recommend-img" href="javascript:;">
                    <img src="/img/personal-img.jpg"/>
                    <p class="order-recommend-time">直播时间:08月23日 07:00</p>
                </a>
                <div class="recommend-mess">
                    <a href="javascript:;" class="order-recommend-name">工具钳工 技师高级技师...</a>
                    <p class="recommend-lesson-price clearfix"><span class="fl">￥29.9</span><i class="fr">20课时</i></p>
                    <p class="recommend-lesson-teacher clearfix"><span class="fl">罗莎（主讲人）</span><i class="fr"><b>45456</b>人已报名</i></p>
                    <a href="javascript:;" class="lesson-join">我要报名</a>
                </div>

            </li>
            <li class="order-recommend-li">
                <a class="order-recommend-img" href="javascript:;">
                    <img src="/img/personal-img.jpg"/>
                    <p class="order-recommend-time">直播时间:08月23日 07:00</p>
                </a>
                <div class="recommend-mess">
                    <a href="javascript:;" class="order-recommend-name">工具钳工 技师高级技师...</a>
                    <p class="recommend-lesson-price clearfix"><span class="fl">￥29.9</span><i class="fr">20课时</i></p>
                    <p class="recommend-lesson-teacher clearfix"><span class="fl">罗莎（主讲人）</span><i class="fr"><b>45456</b>人已报名</i></p>
                    <a href="javascript:;" class="lesson-join">我要报名</a>
                </div>
            </li>
            <li class="order-recommend-li">
                <a class="order-recommend-img" href="javascript:;">
                    <img src="/img/personal-img.jpg"/>
                    <p class="order-recommend-time">直播时间:08月23日 07:00</p>
                </a>
                <div class="recommend-mess">
                    <a href="javascript:;" class="order-recommend-name">工具钳工 技师高级技师...</a>
                    <p class="recommend-lesson-price clearfix"><span class="fl">￥29.9</span><i class="fr">20课时</i></p>
                    <p class="recommend-lesson-teacher clearfix"><span class="fl">罗莎（主讲人）</span><i class="fr"><b>45456</b>人已报名</i></p>
                    <a href="javascript:;" class="lesson-join">我要报名</a>
                </div>
            </li>
            <li class="order-recommend-li">
                <a class="order-recommend-img" href="javascript:;">
                    <img src="/img/personal-img.jpg"/>
                    <p class="order-recommend-time">直播时间:08月23日 07:00</p>
                </a>
                <div class="recommend-mess">
                    <a href="javascript:;" class="order-recommend-name">工具钳工 技师高级技师...</a>
                    <p class="recommend-lesson-price clearfix"><span class="fl">￥29.9</span><i class="fr">20课时</i></p>
                    <p class="recommend-lesson-teacher clearfix"><span class="fl">罗莎（主讲人）</span><i class="fr"><b>45456</b>人已报名</i></p>
                    <a href="javascript:;" class="lesson-join">我要报名</a>
                </div>
            </li>
        </ul>
    </div>
@show
@stop
