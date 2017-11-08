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
                    <div class="gjlx">
                        <div class="gjlxLeft">
                            <h3>{{$GLOBALS['tty_data']->catname}}</h3>
                            @foreach($newslist as $val)
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'], $GLOBALS['tty_path'],$val->id)}}" @if($val->id==$id_arr->id) class="gjlxon" @endif><i></i>{{$val->title}}</a>
                            @endforeach
                        </div>
                        <div class="gjlxRight">
                            <h4>{{$id_arr->title}}</h4>
                            <div class="baoming">
                                <div class="baomingLeft">
                                    <a href="">
                                        <i></i>
                                        详情介绍
                                    </a>
                                </div>
                                @if(auth()->check() && App\Enroll::ofEncroll(auth()->id(), $id_arr->id)->first())
                                <div class="baomingright form">
                                    <a href="javascript:;">
                                        已报名
                                    </a>
                                </div>
                                @else
                                <div class="baomingright form" action="{{route('education.create', $id_arr->id)}}">
                                        {{csrf_field()}}
                                    <a href="javascript:;" onclick="return model(this)">
                                        我要报名
                                    </a>
                                </div>
                                @endif


                            </div>
                            <div class="baomingCon">
                                {!! htmlspecialchars_decode($id_arr->content) !!}
                            </div>


                        </div>
                    </div>
                </div>
            </div>
@stop

@section('scripts')
@parent <script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/alert.min.js"></script>
@stop






