@extends('layouts.master')

@section('title')- 企业会员 @parent @stop
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
@stop
