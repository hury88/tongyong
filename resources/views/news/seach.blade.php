@extends('layouts.master')

@section('title')@parent @stop
@section('css')
<link rel="stylesheet" type="text/css" href="/css/common_jiandanyemian.css"/>
<link rel="stylesheet" type="text/css" href="/css/jiandanyemian.css"/>
@stop
@section('bodyNextLabel')
<body>
<div class="pager-wrap personal-center">
    @stop
    @section('content')
        <div class="sousuo" style="margin-top: 67px;">
            <div class="sousuoMb">
                <span class="sousuoMb2">搜索结果页</span>
                <span class="sousuoMb1">
                    <a href="/"><img src="/img/sqzwtop.png"/>所在位置：</a>
                    <a href="/">首页></a>
                    <a href="javascript:void(0);">搜索结果页</a>
    		    </span>
            </div>
            <div class="sousuok">
                <form id="form">
                    <label>关键词：</label>
                    <input type="text" name="key" id="keywork" value="{{$key}}" placeholder="搜索新闻关键词" class="zp1"/>
                    <span  id="seach" style="cursor: pointer;">
                        <img src="/img/sfdj.png"/>
                        <input type="text" style="text-align: center;cursor: pointer;" value="搜索" class="zp2"/>
    		        </span>
                </form>
            </div>
        </div>

        <div class="sousuoAll">
            <div class="sousuoCon">
                <ul style="padding-bottom: 30px;">
                    @foreach($page['data'] as $val)
                    <li>
                        <a href="{{route(v_id($val['ty'],"path","news_cats"),$val['id'])}}" class="a1">{{$val['title']}}</a>
                        <span>发布时间：{{date("Y-m-d",$val['sendtime'])}}   来源：@if($val['cid']) {{v_id($id_arr->cid,"name","cmember")}} @else 平台管理员 @endif </span>
                        <a href="{{route(v_id($val['ty'],"path","news_cats"),$val['id'])}}" class="a2"> {!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 240, '...') !!}</a>
                    </li>
                    @endforeach

                </ul>
                @include('partial.paginator')
            </div>
        </div>
    @stop {{-- end content --}}


    @section('footer')
    @parent
    @stop

    @section('scripts')
    @parent
        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript">
            $(function () {
                $(".kf_online").css("position","fixed")
                $(".key_top").click(function(){
                    var speed=200;
                    $('body,html').animate({ scrollTop: 0 }, speed);
                    return false;
                })
            })
                $("#seach").click(function () {
                    var ss=$("#keywork").val();
                     if(!ss){
                        alert("请输入关键词")
                    }else{
                       $("#form").submit();
                     }
                })
        </script>
    @stop
