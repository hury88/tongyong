@extends('layouts.master')

@section('title') @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/common_zhiyezhengshu.css"/>
    <link rel="stylesheet" type="text/css" href="/css/zhiyezhengshu.css"/>

    <link rel="stylesheet" href="/css/styles.css" type="text/css" />
    <style type="text/css">

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
    <body style="background: #f5f5f5;">
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
                            <div class="rmzy" style="width: 1100px;margin-top: 30px;margin: 0 auto;">
                                <p style="color: #444444;font-size: 24px;padding-top: 30px;padding-bottom: 30px;">{{$GLOBALS['tty_data']->catname}}</p>
                                <ul>
                                    @foreach($pagenewslist['data'] as $val)
                                    <li>
                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'], $GLOBALS['tty_path'],$val['id'])}}">
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
    @include('partial.paginator')
@stop


