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
                        <a href="/"><img src="/img/sqzwtop.png" style="vertical-align: middle"/>所在位置：首页 </a>> <a href="{{u($GLOBALS['pid_path'])}}">{{$GLOBALS['pid_data']->catname}}</a>> <a href="{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'])}}">{{$GLOBALS['ty_data']->catname}}</a>
                    </p>
                    <div class="gjlhbxCon">
                        <ul>
                            <li>
                                <p class="inter1"><a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(33,"path","news_cats"))}}" style="color: #444">{{$sanlist[0]['catname']}}</a></p>
                                <div class="gjlhbxCon1">
                                    <div class="gjlhbxConleft">
                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(33,"path","news_cats"))}}"><img src="{{img($sanlist[0]['img2'])}}"/></a>
                                        {{--<div class="gjlhbxConleftbom">--}}
                                            {{--<div class="gjlhbxConleftbom1">--}}
                                                {{--<div class="gjlhbxConleftbom2">--}}
                                                    {{--<p class="pc1">优质国际院校</p>--}}
                                                    {{--<p>高端教育</p>--}}
                                                    {{--<p>优质选择</p>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    </div>
                                    <div class="gjlhbxConright">
                                        <ul class="gjlhbxConright1">
                                             @foreach($guojigood as $val)
                                            <li>
                                                <div class="gjlhbxConright2">
                                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(33,"path","news_cats"),$val['id'])}}"><img src="{{img($val['img1'])}}"/></a>
                                                    <div class="gjlhbxConright21">
                                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(33,"path","news_cats"),$val['id'])}}" style="color: #fff;">{{str_limit($val['title'],30,"...")}}</a>
                                                    </div>
                                                </div>
                                                <p> <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(33,"path","news_cats"),$val['id'])}}"  style="color: #666">{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 90, '...') !!}</a></p>
                                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(33,"path","news_cats"),$val['id'])}}" class="more">详情>></a>
                                            </li>
                                             @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>

                            <li>
                               <p class="inter1"><a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(34,"path","news_cats"))}}" style="color: #444">{{$sanlist[1]['catname']}}</a></p>
                                <div class="gjlhbxCon1">
                                    <div class="gjlhbxConleft">
                                          <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(34,"path","news_cats"))}}"><img src="{{img($sanlist[1]['img2'])}}"/></a>
                                        {{--<div class="gjlhbxConleftbom">--}}
                                            {{--<div class="gjlhbxConleftbom1">--}}
                                                {{--<div class="gjlhbxConleftbom2">--}}
                                                    {{--<p class="pc1">优质国际院校</p>--}}
                                                    {{--<p>高端教育</p>--}}
                                                    {{--<p>优质选择</p>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    </div>
                                    <div class="gjlhbxConright">
                                        <ul class="gjlhbxConright1">
                                            @foreach($guoneigood as $val)
                                                <li>
                                                    <div class="gjlhbxConright2">
                                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(34,"path","news_cats"),$val['id'])}}"><img src="{{img($val['img1'])}}"/></a>
                                                        <div class="gjlhbxConright21">
                                                            <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(34,"path","news_cats"),$val['id'])}}" style="color: #fff;">{{str_limit($val['title'],30,"...")}}</a>
                                                        </div>
                                                    </div>
                                                    <p> <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(34,"path","news_cats"),$val['id'])}}"  style="color: #666">{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 90, '...') !!}</a></p>
                                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(34,"path","news_cats"),$val['id'])}}" class="more">详情>></a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </li>


                            <li>
                                <p class="inter1"><a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(35,"path","news_cats"))}}" style="color: #444">{{$sanlist[2]['catname']}}</a></p>
                                <div class="gjlhbxCon1">
                                    <div class="gjlhbxConleft">
                                     <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(35,"path","news_cats"))}}"><img src="{{img($sanlist[2]['img2'])}}"/></a>
                                        {{--<div class="gjlhbxConleftbom">--}}
                                            {{--<div class="gjlhbxConleftbom1">--}}
                                                {{--<div class="gjlhbxConleftbom2">--}}
                                                    {{--<p class="pc1">优质国际院校</p>--}}
                                                    {{--<p>高端教育</p>--}}
                                                    {{--<p>优质选择</p>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    </div>
                                    <div class="gjlhbxConright">
                                        <ul class="gjlhbxConright9">
                                             @foreach($huodonggood as $val)
                                            <li>
                                                <div class="gjlhbxConright9left">
                                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(34,"path","news_cats"),$val['id'])}}"><img src="{{img($val['img1'])}}"/></a>
                                                </div>
                                                <div class="gjlhbxConright9right">
                                                    <p class="ph1">
                                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(34,"path","news_cats"),$val['id'])}}">{{$val['title']}}</a>
                                                    </p>
                                                    <p>
                                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(34,"path","news_cats"),$val['id'])}}">{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 120, '...') !!}</a>
                                                    </p>
                                                </div>
                                            </li>
                                             @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>



@stop


