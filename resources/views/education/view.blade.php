@extends('layouts.master')

@section('title') {{$id_arr->title}}@parent @stop
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
                        <a href="/"><img src="/img/sqzwtop.png" style="vertical-align: middle"/>所在位置：首页 </a>> <a href="{{u($GLOBALS['pid_path'])}}">{{$GLOBALS['pid_data']->catname}}</a>> <a href="{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'])}}">{{$GLOBALS['ty_data']->catname}}</a>> <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'], $GLOBALS['tty_path'])}}">{{$GLOBALS['tty_data']->catname}}</a>><a href="javascript:void(0);">{{$id_arr->title}}</a>
                    </p>
                    <div class="liuxuexq">
                        <h3>{{$id_arr->title}}</h3>
                        <p class="pi1">
                            <span>更新时间：{{date("y-m-d",$id_arr->sendtime)}} </span>
                            <span>来源：<i>{{$id_arr->qyname}}</i></span>
                        </p>
                        {!! htmlspecialchars_decode($id_arr->content) !!}
                        <div class="liuxuexqyema">

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
            </div>
@stop






