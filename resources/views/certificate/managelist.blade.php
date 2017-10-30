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
                    <div class="liuxue zhiyezhengshu" >
                        <h4 style="padding-bottom: 20px;">{{$GLOBALS['tty_data']->catname}}</h4>

                        <ul>
                            @foreach($pagenewslist['data'] as $key=>$val)
                                <li @if($key%3) style="margin-left: 5%;" @endif><a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$GLOBALS['tty_path'],$val['id'])}}">{{$val['title']}}</a></li>
                            @endforeach
                        </ul>
                        <div style="clear: both;height: 45px;" ></div>
                        @include('partial.paginator')
                    </div>
                </div>
            </div>
@stop


