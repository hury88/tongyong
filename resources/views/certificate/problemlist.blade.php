@extends('layouts.master')

@section('title') @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/common_zhiyezhengshu.css"/>
    <link rel="stylesheet" type="text/css" href="/css/zhiyezhengshu.css"/>
    <link rel="stylesheet" href="/css/styles.css" type="text/css" />
    <style>

        .web-pager{
            height: 35px;
            text-align: center;
            padding-bottom: 30px;
        }
        .web-pager a{
            width: 33px;
            height: 33px;
            line-height: 33px;
            text-align: center;
            border-radius: 3px;
            border:1px solid #c8c8c8;
            margin-right: 3px;
            color: #333333;
        }
        .web-pager .pager-now{
            background: #d71718;
            color: #fff;
            border:1px solid  #d71718;
        }
        .web-pager .scrip-a{
            margin-right:36px;
        }
        .web-pager form{
            display: inline-block;
        }
        .web-pager .script-span{
            color: #999999;
        }
        .web-pager .pager-form-inp{
            width: 41px;
            height: 33px;
            border:1px solid #c8c8c8;
            border-radius: 3px;
            margin-right:4px;
        }
        .web-pager .pager-form-sub{
            width: 41px;
            height: 33px;
            border:1px solid #c8c8c8;
            border-radius: 3px;
            margin-right:4px;
            background: #fff;
            color: #333333;
        }
    </style>
@stop
@section('bodyNextLabel')
    <body>
    <div class="pager-wrap personal-center">
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
                                <img src="/img/zstop.jpg"/>
                                <span>所在位置：</span>
                                <a href="/">首页></a>
                                <a href="{{u($GLOBALS['pid_path'])}}">{{$GLOBALS['pid_data']->catname}}</a>
                                <a href="{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'])}}">{{$GLOBALS['ty_data']->catname}}</a>
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'], $GLOBALS['tty_path'])}}">{{$GLOBALS['tty_data']->catname}}</a>
                            </div>
                            <div class="zswenti" style="background: #fff;border: 1px solid #e7e7e6;width: 1170px;margin-top: 30px;">
                                <p style="color: #444444;font-size: 24px;padding-left: 30px;padding-top: 30px;">{{$GLOBALS['tty_data']->catname}}</p>
                                <div id="content">

                                    <ul id="expmenu-freebie">

                                        <li>
                                            <ul class="expmenu">
                                                @foreach($pagenewslist['data'] as $key=>$val)
                                                <li>

                                                    <div class="header">

                                                        <span class="label" style="background-image: url(/img/pc.png);height: 25px;">{{$val['title']}}</span>

                                                        <span class="arrow @if($key==0) up @else down @endif"></span>

                                                    </div>

                                                    <ul class="menu"  style="display: @if($key==0) block @else none @endif" >

                                                        <li>{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 240, '...') !!}<a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'], $GLOBALS['tty_path'],$val['id'])}}" style="color: #d71418;">详情>></a></li>

                                                    </ul>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>

                                    </ul>
                                    @include('partial.paginator')
                                </div>
                            </div>

                        </div>

                    </div>
            </div>
@stop


@section('scripts')
    @parent<script type="text/javascript" src="/js/jquery.tools.min.js"></script>
    <script type="text/javascript" src="/js/main_zhiyezhenshu.js"></script>
@stop
