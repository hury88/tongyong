@extends('layouts.master')

@section('title') @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/zhiyezhengshu.css"/>
    <link rel='stylesheet' type='text/css' href='/css/common_zhiyezhengshu.css'/>
    <link rel="stylesheet" href="/css/styles.css" type="text/css" />
    <!--<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>-->


@stop
@section('bodyNextLabel')
    <body>
    <div class='pager-wrap personal-center'>
    @stop
        @section('breadcrumbs')
            <div class="kyxx">
                <div class="kyxxbannetr">
                    <img src="{{$banimgsrc}}" style="width: 100%;"/>
                </div>
        @stop

        @section('content')
                    <div class="kyfd">
                        <div class="kyfdCon">
                            <div class="kyfdtop">
                                <img src="img/zstop.jpg"/>
                                <span>所在位置：</span>
                                <a href="/">首页></a>
                                <a href="{{u($GLOBALS['pid_path'])}}">{{$GLOBALS['pid_data']->catname}}></a>
                                <a href="{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'])}}">{{$GLOBALS['ty_data']->catname}}</a>
                            </div>
                            <div class="kyfdAll">
                                <div class="kyfdTit">
                                    <p class="p1">
                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'])}}" style="color: #444444;">{{$sanlist[0]['catname']}}</a>
                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'])}}" class="span2">更多<img src="/img/zsnext.png"/></a>
                                    </p>

                                    <p>专业决定你的起点高低，在选择专升本专业时，热门专业多为选择的重点对象</p>
                                </div>
                                <div class="rmzy" style="width: 1100px;margin-top: 30px;margin: 0 auto;">
                                    <ul>
                                           @foreach($zhuanyegood as $val)
                                        <li>
                                            <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$val['id'])}}">
                                                <img src="{{img($val['img1'])}}"/>
                                                <p>{{$val['title']}}</p>
                                            </a>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>



                        </div>

                    </div>
                    <div class="yxlb">
                        <div class="kyfdTit">
                            <p class="p1">
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'])}}" style="color: #444444;">{{$sanlist[1]['catname']}}</a>
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'])}}" class="span2">更多<img src="/img/zsnex2.png"/></a>

                            </p>
                            <p>院校招生 信息一览</p>
                        </div>
                        <div class="zsbxx">
                            <ul>
                                @foreach($yuanxiaogood as $key=>$val)
                                    @if($key==0)
                                        <li>
                                            <img src="{{img($sanlist[1]['img2'])}}"/>
                                            <p class="lanzhou"><a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'],$val['id'])}}"style="font-weight: bold;font-size: 16px;">{{str_limit($val['title'],35, '...')}}</a></p>
                                            <p><a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'],$val['id'])}}">{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 100, '...') !!}</a></p>
                                        </li>
                                    @elseif($key==1||$key==15)
                                        <li>
                                            <p><a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'],$val['id'])}}" class="lanzhou">{{str_limit($val['title'],35, '...')}}</a></p>
                                    @elseif($key==8||$key==22)
                                            <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'],$val['id'])}}" class="lanzhou">{{str_limit($val['title'],35, '...')}}</a>
                                    @elseif($key==14||$key==28)
                                                <p><a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'],$val['id'])}}">{{str_limit($val['title'],35, '...')}}</a></p>
                                        </li>
                                    @else
                                        <p><a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'],$val['id'])}}">{{str_limit($val['title'],35, '...')}}</a></p>
                                    @endif
                                @endforeach


                            </ul>
                        </div>
                    </div>
                    <div class="kyzxall">
                        <div class="kyzx">
                            <div class="kyfdTit">
                                <p class="p1">
                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[2]['path'])}}" style="color: #444444;">{{$sanlist[2]['catname']}}</a>
                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[2]['path'])}}" class="span2">更多<img src="/img/zsnex2.png"/></a>
                                </p>

                                <p>最新考研资讯共享</p>
                            </div>
                        </div>

                        <div class="kyzxall1">
                            @foreach($zixungood as $key=>$val)
                            <div class="kyzxCon">
                                <div class="kyzxConleft">
                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[2]['path'],$val['id'])}}"><img src="{{img($val['img1'])}}"/></a>
                                </div>
                                <div class="kyzxConright">
                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[2]['path'],$val['id'])}}" class="a1">{{$val['title']}}</a>
                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[2]['path'],$val['id'])}}" class="a2">{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 150, '...') !!}</a>
                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[2]['path'],$val['id'])}}" class="a3">查看详情</a>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="zswenti">
                        <div class="kyfdTit">
                            <p class="p1">
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[3]['path'])}}" style="color: #444444;">{{$sanlist[3]['catname']}}</a>
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[3]['path'])}}" class="span2">更多<img src="/img/zsnex2.png"/></a>
                            </p>
                            <p>为您精心挑选出更多的考研高校</p>
                        </div>
                        <div id="content">

                            <ul id="expmenu-freebie">
                                <li>
                                    <ul class="expmenu">
                                    @foreach($wentigood as $key=>$val)
                                        <li>

                                            <div class="header">

                                                <span class="label" style="background-image: url(/img/pc.png);height: 25px;">{{$val['title']}}</span>

                                                <span class="arrow @if($key==0) up @else down @endif"></span>

                                            </div>

                                            <ul class="menu" style="display: @if($key==0) block @else none @endif" >

                                                <li>{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 240, '...') !!}<a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'], $sanlist[3]['path'],$val['id'])}}" style="color: #d71418;">详情>></a></li>

                                            </ul>

                                        </li>
                                    @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
            </div>
@stop

@section('scripts')
    @parent<script type="text/javascript" src="/js/jquery.tools.min.js"></script>
    <script type="text/javascript" src="/js/main_zhiyezhenshu.js"></script>
@stop




