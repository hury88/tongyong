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
                    <div class="gjlx">
                        <div class="gjlxLeft">
                            <h3>{{$GLOBALS['tty_data']->catname}}</h3>
                            @foreach($newslist as $val)
                            <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'], $GLOBALS['tty_path'],$val->id)}}"><i></i>{{$val->title}}</a>
                            @endforeach
                        </div>
                        <div class="gjlxRight">
                            <h4>{{$GLOBALS['tty_data']->catname}}</h4>
                            @foreach($newslist as $val)
                            <div class="baoming">
                                <div class="baomingLeft1">
                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'], $GLOBALS['tty_path'],$val->id)}}">
                                        <i></i>
                                        {{$val->title}}
                                    </a>
                                </div>
                            </div>
                            <div class="baomingCon">

                                <div class="baomingzhongjian">
                                    <div class="baomingzhongjianLeft">
                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'], $GLOBALS['tty_path'],$val['id'])}}" style="color: #666">{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 480, '...') !!}</a>
                                    </div>
                                    <div class="baomingzhongjianRight">
                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'], $GLOBALS['tty_path'],$val['id'])}}"><img src="{{img($val['img1'])}}" style="width: 180px;"/></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>












                    </div>
                </div>
            </div>
@stop


