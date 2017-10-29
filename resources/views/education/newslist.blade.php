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
                <img src="{{$banimgsrc}}" style="width: 100%;"/>
            </div>
        @stop

        @section('content')

            <div class="gjlhbx">
                <div class="gjlhbxAll">
                    <p class="xwdtmbx">
                        <a href="/"><img src="/img/sqzwtop.png" style="vertical-align: middle"/>所在位置：首页 </a>> <a href="{{u($GLOBALS['pid_path'])}}">{{$GLOBALS['pid_data']->catname}}</a>> <a href="{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'])}}">{{$GLOBALS['ty_data']->catname}}</a>> <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'], $GLOBALS['tty_path'])}}">{{$GLOBALS['tty_data']->catname}}</a>
                    </p>
                    <div class="liuxue">
                        <h4>{{$GLOBALS['tty_data']->catname}}</h4>
                        <ul>
                            @foreach($pagenewslist['data'] as $val)
                            <li>
                                <div class="liuxueLeft">
                                    <p class="pz1">{{date("d",$val['sendtime'])}}</p>
                                    <p class="pz2">{{date("M",$val['sendtime'])}}</p>
                                    <p>{{date("Y",$val['sendtime'])}}</p>
                                </div>
                                <div class="liuxueCenter">
                                    <p class="pz1"><a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'], $GLOBALS['tty_path'],$val['id'])}}">{{$val['title']}}</a></p>
                                    <p class="pz2"><a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'], $GLOBALS['tty_path'],$val['id'])}}">{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 120, '...') !!}</a></p>
                                    <p class="pz3"><a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'], $GLOBALS['tty_path'],$val['id'])}}">查看具体详情>></a></p>
                                </div>
                                <div class="liuxueRight">
                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'], $GLOBALS['tty_path'],$val['id'])}}"><img src="{{img($val['img1'])}}"/></a>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                        @include('partial.paginator')
                    </div>
                </div>
            </div>
@stop


