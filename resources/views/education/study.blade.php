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

                    <div class="dxinwenw">
                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(20,"path","news_cats"))}}"><h3 style="color: #444444; font-size: 24px;padding: 30px;padding-bottom: 0;">{{$sanlist[0]['catname']}}</h3></a>
                        <div class="dxinwenwAll">
                            <div class="dxinwenwLeft">
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(20,"path","news_cats"))}}"><img src="{{img($sanlist[0]['img2'])}}"/></a>
                            </div>
                            <div class="dxinwenwRight">
                                <ul>
                                    @foreach($liuxuegood as $val)

                                    <li>
                                        <div class="dxinwenw1All">
                                            <div class="dxinwenw1Left">
                                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(20,"path","news_cats"),$val['id'])}}"><img src="{{img($val['img1'])}}"/></a>
                                            </div>
                                            <div class="dxinwenw1Right">
                                                <p class="jiazhou"><a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(20,"path","news_cats"),$val['id'])}}">{{str_limit($val['title'],45,"...")}}</a></p>
                                                <p>
                                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(20,"path","news_cats"),$val['id'])}}">{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 150, '...') !!}.</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="pall">
                                            <p><a href="">刚发布一周！联想Moto Z2F居然官降530元：价格标错了</a></p>
                                            <p><a href="">还珠格格的空气刘海小青的素颜妆，你们暑假看完就忘了</a></p>
                                            <p><a href="">刚发布一周！联想Moto Z2F居然官降530元：价格标错</a></p>
                                            <p><a href="">官方预热海报发布 OPPO R11巴萨定制版将至</a></p>
                                        </div>

                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="gjlhbxCon">
                        <ul>
                            <li>
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(21,"path","news_cats"))}}"> <p class="inter1">{{$sanlist[1]['catname']}}</p></a>
                                <div class="gjlhbxCon1">
                                    <div class="gjlhbxConleft">
                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(21,"path","news_cats"))}}"><img src="{{img($sanlist[1]['img2'])}}"/></a>
                                    </div>
                                    <div class="gjlhbxConright">
                                        <ul class="gjlhbxConright1">
                                              @foreach($xueyuangood as $val)
                                            <li style="width: 33.3%;float: left;margin-right: 0;">
                                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(21,"path","news_cats")),$val['id']}}">
                                                    <p class="pf2" style="text-align: center"><img src="{{img($val['img2'])}}"/></p>
                                                    <p class="pf1">{{$val['title']}}</p>
                                                    <p>{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 300, '...') !!}</p>
                                                </a>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(22,"path","news_cats"))}}"><p class="inter1">{{$sanlist[2]['catname']}}</p></a>
                                <div class="gjlhbxCon1">
                                    <div class="gjlhbxConleft">
                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(22,"path","news_cats"))}}"><img src="{{img($sanlist[2]['img2'])}}"/></a>
                                    </div>
                                    <div class="gjlhbxConright dguojiliux">
                                        @foreach($zhinangood as $val)
                                        <p>
                                            <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(22,"path","news_cats")),$val['id']}}"><i></i>{{$val['title']}}</a>
                                        </p>
                                          @endforeach

                                    </div>
                                </div>
                            </li>


                            <li>
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(23,"path","news_cats"))}}"><p class="inter1">{{$sanlist[3]['catname']}}</p></a>
                                <div class="gjlhbxCon1">
                                    <div class="gjlhbxConleft">
                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(23,"path","news_cats"))}}"><img src="{{img($sanlist[3]['img2'])}}"/></a>
                                    </div>
                                    <div class="gjlhbxConright">
                                        <ul class="gjlhbxConright9">
                                             @foreach($gonggaogood as $val)
                                            <li>
                                                <div class="gjlhbxConright9left">
                                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(23,"path","news_cats")),$val['id']}}">  <img src="{{img($val['img1'])}}"/></a>

                                                </div>
                                                <div class="gjlhbxConright9right">
                                                    <p class="ph1">
                                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(23,"path","news_cats")),$val['id']}}">{{str_limit($val['title'],45,"...")}}</a>
                                                    </p>
                                                    <p>
                                                         <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],v_id(23,"path","news_cats"),$val['id'])}}">{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 100, '...') !!}.</a>
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


