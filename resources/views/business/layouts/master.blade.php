@extends('layouts.master')

@section('title'){{implode(' - ', $_title)}} - 企业会员 @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/common_qiyehuiyuan.css"/>
    <link rel="stylesheet" type="text/css" href="/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/css/member.css"/>
@stop
@section('bodyNextLabel')
<body>
    <div class="pager-wrap member-safety-wrap clearfix">
@stop
@section('navigation') @include('business.partial.left') @stop
@section('content')
    <div class="member-safety-right fr">
        @include('business.partial.top')
        @section('main')
            @include('partial.copyright')
            @show
    </div>
@stop {{-- end content --}}
@section('footer')
@stop
@section('scripts')
<?php /*<script type="text/javascript" src="/js/jquery.nicescroll.min.js"></script>
<script>
    var Lh = $(".member-safety-left").height();
    var WH = $(window).height();
    if(Lh>WH){
        var allLh = Lh - 69;
        $(".left-nav-lists").css("height",allLh+"px");
        $(".member-safety-right").css({"height":allLh+"px","overflow-y":"auto"});
    }else{
        var allWH = WH - 69;
        $(".left-nav-lists").css("height",allWH+"px");
        $(".member-safety-right").css({"height":allWH+"px","overflow-y":"auto"});
    }
    $(function(){
        //FF下用JS实现自定义滚动条
        $(".member-safety-right").niceScroll({cursorborder:"",cursorcolor:"rgba(0,0,0,0)",boxzoom:true});
    })
</script>*/ ?>
@stop
