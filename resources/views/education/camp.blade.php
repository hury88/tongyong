@extends('layouts.master')

@section('title') @parent @stop
@section('css')
    <link rel="stylesheet" href="/css/common1.css"/>
    <link rel="stylesheet" href="/css/css.css"/>
    <script src="/js/jquery-1.11.0.min.js"></script>
    <link rel='stylesheet' type='text/css' href='/css/common_guojijiaoyu.css'/>
    <link rel='stylesheet' type='text/css' href='/css/guojijiaoyu.css'/>
@stop
@section('bodyNextLabel')
    <body>
    <div class='pager-wrap personal-center'>
        @stop
        @section('breadcrumbs')
            <div class='gjlhBanner' style='margin-top: 67px;'>
                <img src='{{$banimgsrc}}' style='width: 100%;'/>
            </div>
        @stop

        @section('content')
            <div class='gjlhbx'>
                <p class='xwdtmbx' style='width: 1100px;margin: 0 auto;'>
                    <a href='/'><img src='/img/sqzwtop.png' style='vertical-align: middle'/>所在位置：首页 </a>> <a href='{{u($GLOBALS['pid_path'])}}'>{{$GLOBALS['pid_data']->catname}}</a>> <a href='{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'])}}'>{{$GLOBALS['ty_data']->catname}}</a>
                </p>
                <div class="huobaox youxuell">
                    <h3><a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'])}}' style='color: #444'>{{$sanlist[0]['catname']}}推荐</a></h3>
                    <p>在路上寻找更好的自己<a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'])}}">更多<img src="/img/gengduo.jpg"></a></p>
                    <ul>
                      @foreach($huobaogood as $key=>$val)
                        <li @if($key==2) class='list1' @endif>
                            <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$val['id'])}}">
                                <img src="{{img($val['img1'])}}"/>
                            </a>
                            <div class="huobaoxlBom">
                                <p class="p1"><a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$val['id'])}}">{{$val['title']}}</a></p>
                                <p class="p2"><a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$val['id'])}}">{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 80, '...') !!}</a></p>
                            </div>
                        </li>
                       @endforeach
                    </ul>
                </div>
                <div class="youxuellAll">
                    <div class="youxuell">
                        <h3><a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'])}}' style='color: #444'>{{$sanlist[1]['catname']}}</a></h3>
                        <p>拓展国际视野，丰富人生阅历，培养国际化思维！<a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'])}}">更多<img src="/img/gengduo.jpg"></a></p>
                        <ul>
                            @foreach($tesegood as $key=>$val)
                            <li style="margin-bottom: 15px;">
                                <div class="tesellTop">
                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'],$val['id'])}}"><img src="{{img($val['img1'])}}"/></a>
                                    <div class="tesellTop1">
                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'],$val['id'])}}">{{$val['title']}}</a>
                                    </div>
                                </div>
                                <div class="tesellBom">
                                    <span><i>{{$val['enroll_num']}}</i>人已报名</span>
                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'],$val['id'])}}">查看详情>></a>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <!--特效开始-->
                <div class="s_xueyuan">
                    <div class="s2_xueyuan">
                        <h3><a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[2]['path'])}}' style='color: #444'>{{$sanlist[2]['catname']}}</a></h3>
                        <p class="p1">在路上寻找更好的自己</p>
                        <div class="zoombox clr">
                            @foreach($jincaigood as $key=>$val)
                                @if($key==0)
                                <div class="zoompic fl" onclick='javascript:location.href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[2]['path'])}}"'><img src="{{img($val['img1'])}}" width="632" height="411" alt="{{$val['title']}}" /></div>
                                @endif
                            @endforeach
                            <div class="sliderbox fl">
                                <div id="btn-left" class="arrow-btn dasabled"></div>
                                <div class="slider" id="thumbnail">
                                    <ul style="height: 372px;">
                                        @foreach($jincaigood as $key=>$val)
                                        <li @if($key==0) class='current' @endif><a href="{{img($val['img1'])}}"><span class="zzc"></span><img src="{{img($val['img1'])}}" width="183" height="119" alt="{{$val['title']}}" /></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div id="btn-right" class="arrow-btn"></div>
                            </div>
                        </div>
                    </div>
                </div>
                ﻿<div style="width: 100%;clear:both;height:0px;"></div>
                <script src="/js/index.js"></script>

                <!--特效结束-->
                <div class="kyzxall" style="background: #fff;">
                    <div class="kyzx">
                        <div class="kyfdTit">
                            <p class="p1">
                                <a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[3]['path'])}}' style='color: #444'>{{$sanlist[3]['catname']}}</a>
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[3]['path'],$val['id'])}}" class="span2">更多<img src="/img/zsnext.png"/></a>
                            </p>

                            <p>最新考研资讯共享</p>
                        </div>
                    </div>
                    <div class="kyzxall1">
                        @foreach($dongtaigood as $val)
                        <div class="kyzxCon">
                            <div class="kyzxConleft">
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[3]['path'],$val['id'])}}"><img src="{{img($val['img1'])}}"/></a>
                            </div>
                            <div class="kyzxConright">
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[3]['path'],$val['id'])}}" class="a1">{{$val['title']}}</a>
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[3]['path'],$val['id'])}}" class="a2">{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 80, '...') !!}</a>
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[3]['path'],$val['id'])}}" class="a3">查看详情</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>



@stop

@section('scripts')
    <script type="text/javascript" src="/js/jquery-1.10.1.min.js"></script>
    <script type="text/javascript">
        //	导航下拉
        $('.mian_nav .list>li').hover(function() {
            $(this).find('.dump').stop().slideDown();
        }, function() {
            $(this).find('.dump').stop().slideUp();
        })

    </script>

    <script type="text/javascript">
        $(function () {
            $(".kf_online").css("position","fixed")
            $(".kf_online").css("top","50%")
            $(".kf_online").css("margin-top","-204px")
            $(".key_top").click(function(){
                var speed=200;
                $('body,html').animate({ scrollTop: 0 }, speed);
                return false;
            })
        })

    </script>
@stop



