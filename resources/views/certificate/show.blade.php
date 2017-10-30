@extends('layouts.master')

@section('title') @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/zhiyezhengshu.css"/>
    <link rel="stylesheet" type="text/css" href="/css/common_zhiyezhengshu.css"/>
@stop
@section('bodyNextLabel')
    <body>
    <div class="pager-wrap personal-center">
        @stop
        @section('breadcrumbs')
        @stop
    @section('content')
        <div class="kyxx">
            <div class="kyfd">
                <div class="kyfdCon">
                    <div class="kyfdtop">
                        <img src="/img/zstop.jpg"/>
                        <span>所在位置：</span>
                        <a href="/">首页></a>

                        <a href="{{u($GLOBALS['pid_path'])}}">{{$GLOBALS['pid_data']->catname}}></a>
                        <a href="{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'])}}">{{$GLOBALS['ty_data']->catname}} ></a>
                        <a href="{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'],$GLOBALS['tty_path'])}}?genre={{$id_arr->certificate_lid}}">{{config("config.webarr.certificate")[$id_arr->certificate_lid]}} ></a>
                        <a href="javascript:void(0);">{{$id_arr->title}}</a>
                    </div>
                </div>
            </div>

            <div class="zslbxqall">
                <div class="zslbxq">
                    <div class="zslbxqLeft">
                        <div class="zslbxqTit">
                            <p class="rlzy">{{$id_arr->title}}</p>
                            <p class="rlzysj">
                                <span>更新时间：{{date("Y-m-d",$id_arr->sendtime)}}</span>
                                <span>来源：<i>{{$id_arr->qyname}}</i></span>
                                <span><img src="/img/jubao.png"/>举报</span>
                                <a href="javascript:void(0)">我要报名</a>
                            </p>
                        </div>
                        <div class="zslbxqCon">
                           {!! htmlspecialchars_decode($id_arr->content) !!}
                            <p class="fenxiang" style="line-height: 30px;">
                                分享到：
                                <a href="javascript:void(0);" class="qqfx" style="height: 25px;display: inline-block">
                                    <img src="/img/qq1.png" style="margin-top: 5px;"/>
                                </a>
                                <a href="javascript:void(0);" class="wxfx" style="height: 25px;display: inline-block">
                                    <img src="/img/weixin.png"  style="margin-top: 5px;"/>
                                </a>
                            </p>
                            <div class="xyb">
                                @if($id_arr->previd>0)
                                    <a href="{{$id_arr->prevlink}}" style="float: left;font-weight: bold;color: #666666;">【上一篇】{{$id_arr->prev}}</a>
                                @else
                                    <a href="{{$id_arr->prevlink}}" style="float: left;font-weight: bold;color: #666666;">【已经是第一篇了】</a>
                                @endif
                                @if($id_arr->nextid>0)
                                    <a href="{{$id_arr->nextlink}}" style="float: right;font-weight: bold;color: #666666;">【下一篇】{{$id_arr->next}}</a>
                                @else
                                    <a href="{{$id_arr->nextlink}}" style="float: right;font-weight: bold;color: #666666;">【已经是最后一篇了】</a>
                                @endif
                            <div style="clear: both"></div>

                            </div>

                        </div>
                    </div>
                    <div class="zslbxqRight">
                        <div class="rmzstj">
                            <h4>热门证书推荐</h4>
                            @foreach($zhengshugood as $key=>$val)
                            <p @if($key<3) class="pp" @endif>
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$GLOBALS['tty_path'],$val['id'])}}">
                                    <i>{{$key+1}}</i>
                                    {{str_limit($val['title'],40,"...")}}
                                </a>
                            </p>
                            @endforeach
                        </div>
                        <div class="rmzstj">
                            <h4>近期活动</h4>
                            @foreach($huodonggood as $key=>$val)
                                @if($key==0)
                            <p>
                                <a href="{{u('news','recent',$val['id'])}}" > <img src="{{img($val['img1'])}}" style="width: 100%;"/></a>
                            </p>
                            <p class="pay">
                                <a href="{{u('news','recent',$val['id'])}}" style="color: #323333;font-size: 16px;">
                                    {{str_limit($val['title'],28,"...")}}
                                </a>
                            </p>
                            @else
                                    <p>
                                        <a href="{{u('news','recent',$val['id'])}}">
                                            【{{date("Y.m.d"),$val['sendtime']}}】 {{str_limit($val['title'],25,"...")}}
                                        </a>
                                    </p>
                            @endif
                            @endforeach
                        </div>
                        <div class="rmzstj">
                            <h4>在线培训</h4>
                            <div class="zxpx">
                                <a href="">
                                    <img src="/img/zxpx1.jpg"/>
                                    <div class="zxpx1">
                                        专业技术培训
                                    </div>
                                </a>
                            </div>
                            <div class="zxpx">
                                <a href="">
                                    <img src="/img/zxpx2.jpg"/>
                                    <div class="zxpx1">
                                        专业技术培训
                                    </div>
                                </a>
                            </div>
                            <div class="zxpx" style="margin-bottom: 0;">
                                <a href="">
                                    <img src="/img/zxpx3.jpg"/>
                                    <div class="zxpx1">
                                        专业技术培训
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
























        </div>
    @stop


