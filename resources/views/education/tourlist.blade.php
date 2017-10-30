@extends('layouts.master')

@section('title') @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/guojijiaoyu.css"/>
    <link rel="stylesheet" type="text/css" href="/css/common_guojijiaoyu.css"/>
@stop
@section('bodyNextLabel')
    <body>
    <div class="pager-wrap personal-center">
@stop
        @section('breadcrumbs')
            <div class="gjlhBanner" style="margin-top: 67px;">

            </div>
        @stop

        @section('content')

            <div class="gjlhbx">
                <div class="gjlhbxAll">
                    <p class="xwdtmbx">
                        <a href="/"><img src="/img/sqzwtop.png" style="vertical-align: middle"/>所在位置：首页 </a>> <a href="{{u($GLOBALS['pid_path'])}}">{{$GLOBALS['pid_data']->catname}}</a>> <a href="{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'])}}">{{$GLOBALS['ty_data']->catname}}</a>> <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'], $GLOBALS['tty_path'])}}">{{$GLOBALS['tty_data']->catname}}</a>
                    </p>
                    <div class="xwdtmbxBanner" style="padding-bottom: 20px;">
                        <a href=""><img src="/img/xianluXq.jpg" style="width: 100%;"/></a>
                    </div>
                    <div class="tesell">
                        <ul>
                            @foreach($pagenewslist['data'] as $val)
                            <li style="margin-bottom: 15px;">
                                <div class="tesellTop">
                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'], $GLOBALS['tty_path'],$val['id'])}}"><img src="{{img($val['img1'])}}"/></a>
                                    <div class="tesellTop1">
                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'], $GLOBALS['tty_path'],$val['id'])}}">{{$val['title']}}</a>
                                    </div>
                                </div>
                                <div class="tesellBom">
                                    <span><i>{{$val['enroll_num']}}</i>人已报名</span>
                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'], $GLOBALS['tty_path'],$val['id'])}}">查看详情>></a>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                    @include('partial.paginator')
                </div>
            </div>
@stop


