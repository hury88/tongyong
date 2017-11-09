@extends('layouts.master')

@section('title') @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/common_zhiyezhengshu.css"/>
    <link rel="stylesheet" type="text/css" href="/css/zhiyezhengshu.css"/>
    <link rel="stylesheet" href="/css/styles.css" type="text/css" />
@stop
@section('bodyNextLabel')
<body>
    <div class="pager-wrap personal-center">
@stop
@section('breadcrumbs')
    <div class="gjlhBanner" style="margin-top: 67px;">
        <img src="{{$banimgsrc}}" style="width: 100%;"/>
    </div>
@stop

@section('content')
                <div class="kyfd">
                    <div class="kyfdCon">
                        <div class="kyfdtop">
                            <img src="/img/zstop.jpg"/>
                            <span>所在位置：</span>
                            <a href="/">首页></a>
                            <a href="{{u($GLOBALS['pid_path'])}}">{{$GLOBALS['pid_data']->catname}}></a>
                            <a href="{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'])}}">{{$GLOBALS['ty_data']->catname}}</a>
                        </div>
                    </div>
                </div>
                <div class="zslball">
                    <div class="zslb" style="width: 1100px;margin: 0 auto;">
                        <div class="kyfdTit">
                            <p class="p1">
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'])}}?genre=1" style="color: #444444;">证书分类</a>
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'])}}?genre=1" class="span2">更多<img src="/img/zsnext.png"/></a>
                            </p>

                            <p>全面了解证书类别</p>
                        </div>
                        <ul>
                            <li>
                                <div class="zslbTit">
                                    <img src="/img/zslb1.jpg"/>
                                    {{config('config.webarr.certificate.1')}}
                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'])}}?genre=1">></a>
                                </div>
                                @foreach($zhengshugood1 as $key=>$val)
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$val['id'])}}" @if($key==0) class="p1 p2" @elseif($key<3) class="p2" @else '' @endif>
                                    <i>{{$key+1}}</i>
                                   {{$val['title']}}
                                </a>
                                @endforeach

                            </li>
                            <li class="list2">
                                <div class="zslbTit">
                                    <img src="/img/zslb1.jpg"/>
                                    {{config('config.webarr.certificate.2')}}
                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'])}}?genre=2">></a>
                                </div>
                                @foreach($zhengshugood2 as $key=>$val)
                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$val['id'])}}" @if($key==0) class="p1 p2" @elseif($key<3) class="p2" @else '' @endif>
                                    <i>{{$key+1}}</i>
                                    {{$val['title']}}
                                    </a>
                                @endforeach

                            </li>
                            <li>
                                <div class="zslbTit">
                                    <img src="/img/zslb3.jpg"/>
                                    {{config('config.webarr.certificate.3')}}
                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'])}}?genre=3">></a>
                                </div>
                                @foreach($zhengshugood3 as $key=>$val)
                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$val['id'])}}" @if($key==0) class="p1 p2" @elseif($key<3) class="p2" @else '' @endif>
                                    <i>{{$key+1}}</i>
                                    {{$val['title']}}
                                    </a>
                                @endforeach

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kyzxall" style="background: #fff;">
                    <div class="kyzx">
                        <div class="kyfdTit">
                            <p class="p1">
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'])}}" style="color: #444444;">{{$sanlist[1]['catname']}}</a>
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'])}}" class="span2">更多<img src="/img/zsnext.png"/></a>
                            </p>

                            <p>点击智慧 连接未来</p>
                        </div>
                    </div>
                    <div class="kyzxall1">
                        <div class="certical-lists-warp">
                        @foreach($gonggaogood as $val)
                        <div class="kyzxCon">
                            <div class="kyzxConleft">
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'],$val['id'])}}">  <img src="{{img($val['img1'])}}"/></a>
                            </div>
                            <div class="kyzxConright">
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'],$val['id'])}}" class="a1">{{$val['title']}}</a>
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'],$val['id'])}}" class="a2">{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 100, '...') !!}</a>
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'],$val['id'])}}" class="a3">查看详情</a>
                            </div>
                        </div>
                         @endforeach
                        </div>
                    </div>
                </div>
@stop

@section('scripts')
    @parent<script type="text/javascript" src="/js/jquery.tools.min.js"></script>
    <script type="text/javascript" src="/js/main_zhiyezhenshu.js"></script>
@stop
