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
        <h3 class="order-detials-title">核对订单信息</h3>
        <div class="order-detials-mess">
            <div class="black24"></div>
            <table width="100%" border="0">
                <tr class="order-detials-parame">
                    <td class="parame-first-td">商品信息</td>
                    <td>课时</td>
                    <td>企业</td>
                    <td>价格</td>
                    <td>操作</td>
                </tr>
                <tr class="order-detials-value">
                    <td class="value-first-td">
                        <img class="order-mess-img" src="/img/brand-img.png"/>
                        <div class="order-name">
                            <p>2017联想集团《技能培训》<br>视频教程</p>
                            <span>在线支付</span>
                        </div>
                    </td>
                    <td>20节-10小时12分钟</td>
                    <td>联想集团</td>
                    <td>￥29.00</td>
                    <td>        </td>
                </tr>
            </table>
        </div>
        <h3 class="order-detials-title">支付方式</h3>
        <div class="pay-method">
            <form>
                <div class="pay-form-radio">
                    <label>
                        <input type="radio" name="paytype" checked/>
                        <span><img src="/img/alipay-pay.jpg"/></span>
                    </label>
                    <label>
                        <input type="radio" name="paytype"/>
                        <span><img src="/img/weixin-pay.jpg"/></span>
                    </label>
                </div>
                <div class="order-nessary-mess">
                    <h4>订单备注</h4>
                    <div class="order-remark">
                        <label>
                            <input type="text" placeholder="限50字"/>
                            <span>提示：请勿填写有关支付方面的信息</span>
                        </label>
                    </div>
                    <div class="order-submit clearfix">
                        <div class="order-sub-left fl">
                            <span>支付遇到问题请联系</span>
                            <a href="javascript:;" class="online-kf">
                                <img src="/img/QQ%20(2).png"/>在线客服
                            </a>
                        </div>
                        <div class="order-sub-right fr">
                            <p>应付总额<span>￥29.00</span></p>
                            <input type="submit" value="提交订单"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <div class="wrap-box order-recommend">
        <div class="recommend-header clearfix">
            <h3 class="order-recommend-title fl">为您推荐</h3>
            <a href="javascript:;" class="refresh-a fr"><img src="/img/refresh.png"/>换一批</a>
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
