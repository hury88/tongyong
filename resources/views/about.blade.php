@extends('layouts.master')

@section('title') @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/jiandanyemian.css"/>
    <link rel="stylesheet" type="text/css" href="/css/common_jiandanyemian.css"/>
@stop
@section('bodyNextLabel')
<body>
    <div class="container">
@stop
@section('content')
<div class="yijianAll">
    <div class="yijian" style="margin-top: 67px;">
        <div class="yijianLeft">
            <ul>
                @foreach($left as $row)
                <li {!! $GLOBALS['ty']==$row->id ? ' class="yijianon"' :'' !!}> <a href="{{u('about', $row->path)}}">{{$row->catname}}<i>></i></a> </li>
                @endforeach
            </ul>
        </div>
        <div class="yijianRight">
            <div class="sousuoMb">
                <span class="sousuoMb2" style="color: #444344;">{{$GLOBALS['ty_data']->catname}}</span>
                <span class="sousuoMb1">
                    <a href="javascript:void(0);"><img src="/img/sqzwtop.png"/>所在位置：</a>
                    <a href="/">首页></a>
                    <a href="{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'])}}">{{$GLOBALS['ty_data']->catname}}</a>
                </span>
            </div>
           @section('about_content')
            <div class="qiyewenhua">
               {!! isset($content) ? $content : '' !!}
           </div>
           @show
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
