@extends('layouts.master')

@section('title') {{$id_arr->title}}@parent @stop
@section('css')
<link rel="stylesheet" type="text/css" href="/css/common_jiandanyemian.css"/>
<link rel="stylesheet" type="text/css" href="/css/jiandanyemian.css"/>
@stop
@section('bodyNextLabel')
<body>
<div class="pager-wrap personal-center">
    @stop
    @section('content')
    <div class="yijianAll" style="margin-top: 67px;">
        <div class="xwdt">
            <p class="xwdtmbx">
                <a href="/"><img src="/img/sqzwtop.png"/>所在位置：首页 </a>> <a href="{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'])}}">{{$GLOBALS['ty_data']->catname}}</a>> <a href="javascript:void(0);">{{$id_arr->title}}</a>
            </p>
            <div class="xwdtAll">
                <style type="text/css">
                    .xwdtCon{
                        background: #fff;
                        border: 1px solid #e7e7e6;
                        padding: 25px;
                    }
                    .xwdtCon h3 {
                        color: #444444;
                        font-size: 24px;
                        text-align: center;
                        padding: 10px 0;
                    }
                    .xwdtCon .pi1 {
                        text-align: center;
                        padding-bottom: 10px;
                        margin-bottom: 15px;
                        border-bottom: 1px solid #dddddd;
                    }
                    .xwdtCon p {
                        color: #666666;
                        text-indent: 2em;
                        line-height: 2;

                    }
                    .liuxuexqyema {
                        margin-top: 25px;
                        width: 100%;
                        padding: 5px;
                        background: #f9f9f9;
                        border-bottom: 1px solid #e0e0e0;
                        border-top: 1px solid #e0e0e0;
                    }

                    .liuxuexqyema a {
                        font-weight: bold;
                        color: #666666;
                    }
                    .xwdtCon .pi1 span {
                        margin-right: 20px;
                    }
                    .xwdtCon .pi1 span i {
                        color: #40657f;
                    }
                </style>
                <div class="xwdtTit">
                    <i>{{$GLOBALS['ty_data']->catname}}</i>
                    <span>
                        @foreach($left as $row)
                            <a {!! $GLOBALS['ty']==$row->id ? ' class="xwdton"' :'' !!} href="{{u('news', $row->path)}}">{{$row->catname}}</a>
                        @endforeach
                    </span>
                </div>

                <div class="xwdtCon">
                    <h3>{{$id_arr->title}}</h3>
                    <p class="pi1">
                        <span>更新时间：{{date("y-m-d",$id_arr->sendtime)}} </span>
                        <span>来源：<i>{{$id_arr->qyname}}</i></span>
                    </p>
                   {!! htmlspecialchars_decode($id_arr->content) !!}
                    <div class="liuxuexqyema">

                           @if($id_arr->previd>0)
                                <a href="{{$id_arr->prevlink}}" style="float: left">【上一篇】{{$id_arr->prev}}</a>
                            @else
                                <a href="{{$id_arr->prevlink}}" style="float: left">【已经是第一篇了】</a>
                            @endif
                           @if($id_arr->nextid>0)
                               <a href="{{$id_arr->nextlink}}" style="float: right">【下一篇】{{$id_arr->next}}</a>
                           @else
                               <a href="{{$id_arr->nextlink}}" style="float: right">【已经是最后一篇了】</a>
                           @endif
                               <div style="clear: both"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop {{-- end content --}}


    @section('footer')
    @parent
    @stop

    @section('scripts')
    @parent
    @stop
