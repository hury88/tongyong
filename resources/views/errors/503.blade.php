@extends('layouts.master')

@section('title') @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/jiandanyemian.css"/>
    <link rel="stylesheet" type="text/css" href="/css/common_jiandanyemian.css"/>
    <style>
        .zhengzai-kaifazhogn{
            text-align: center;
            padding:367px 0 316px 0;
        }
        .zhengzai-kaifazhogn img{
            display: inline-block;
            margin-bottom: 30px;
        }
        .zhengzai-kaifazhogn h1{
             font-size: 40px;
            color: #333;;
        }
    </style>
@stop
@section('bodyNextLabel')
<body>
    <div class="pager-wrap personal-center">
@stop
@section('content')
<div class="wrap-box zhengzai-kaifazhogn">
    <img src="/img/loading.gif"/>
    <h1 class="kefai-going">正在开发中！！！！</h1>
</div>
@stop {{-- end content --}}


@section('footer')
   @parent

@stop

@section('scripts')
    @parent
@stop
