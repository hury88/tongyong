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

    <div class="wrap-box">
        <div class="refund-step-title">
            <span>您的位置： </span>
            <a href="javascript:;">首页</a>
            <span> > </span>
            <a href="javascript:;">订单中心</a>
            <span> > </span>
            <a href="javascript:;">我的订单</a>
            <span> > </span>
            <a href="javascript:;">申请退款</a>
        </div>
    </div>
    <div class="wrap-box refund-step-box">
        <div class="refund-step">
            <div class="refund-step-header">
                <p class="refund-step-one step-now"><span>1</span>买家申请退款</p>
                <p class="refund-step-two"><span>2</span>平台处理退款申请</p>
                <p class="refund-step-three"><span>3</span>退款完毕</p>
            </div>
            <div class="refund-step-body">
                <div class="refund-step-tr clearfix">
                    <div class="refund-step-left fl">
                        <span><b>*</b>退款选择：</span>
                    </div>
                    <div class="refund-step-right fr">
                        <label><input type="radio" name="refund-reason" checked/>全部款</label>
                        <label><input type="radio" name="refund-reason"/>部分款</label>
                    </div>
                </div>
                <div class="refund-step-tr clearfix">
                    <div class="refund-step-left fl">
                        <span><b>*</b>退款原因：</span>
                    </div>
                    <div class="refund-step-right fr">
                        <select class="refund-step-selt">
                            <option value="请选择">请选择</option>
                            <option value="不想要了">不想要了</option>
                            <option value="七天无理由退货">七天无理由退货</option>
                            <option value="质量不好">质量不好</option>
                        </select>
                    </div>
                </div>
                <div class="refund-step-tr clearfix">
                    <div class="refund-step-left fl">
                        <span><b>*</b>退款金额：</span>
                    </div>
                    <div class="refund-step-right fr">
                        <input class="refund-step-inp" type="text" value=""/>
                    </div>
                </div>
                <div class="refund-step-tr clearfix">
                    <div class="refund-step-left fl">
                        <span><b>*</b>退款说明：</span>
                    </div>
                    <div class="refund-step-right fr">
                        <textarea class="refund-explain"></textarea>
                    </div>
                </div>
                <div class="refund-step-tr clearfix">
                    <div class="refund-step-right fr">
                        <input class="refund-step-sub" type="submit" value="提交"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@show
@stop
