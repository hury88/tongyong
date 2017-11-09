@extends('layouts.master')

@section('title') @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/zhiyezhengshu.css"/>
    <link rel='stylesheet' type='text/css' href='/css/common_zhiyezhengshu.css'/>
    <link rel="stylesheet" href="/css/styles.css" type="text/css" />
    <!--<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>-->


@stop
@section('bodyNextLabel')
    <body>
    <div class='pager-wrap personal-center'>
        @stop
        @section('breadcrumbs')
            <div class="kyxx">
                <div class="kyxxbannetr">
                    <img src="{{$banimgsrc}}" style="width: 100%;"/>
                </div>
                @stop

                @section('content')
                    <div class="kyfd">
                        <div class="kyfdCon">
                            <div class="kyfdtop">
                                <img src="img/zstop.jpg"/>
                                <span>所在位置：</span>
                                <a href="/">首页></a>
                                <a href="{{u($GLOBALS['pid_path'])}}">{{$GLOBALS['pid_data']->catname}}></a>
                                <a href="{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'])}}">{{$GLOBALS['ty_data']->catname}}</a>
                            </div>
                            <div class="kyfdAll">
                                <div class="kyfdTit">
                                    <p class="p1">
                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'])}}" style="color: #444444;">{{$sanlist[0]['catname']}}</a>
                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'])}}" class="span2">更多<img src="/img/zsnext.png"/></a>
                                    </p>

                                    <p>拥抱我 成就你</p>
                                </div>
                                <div class="kyfdAll1">
                                    <div class="kyfdAllleft">
                                        @foreach($fudaogood as $key=>$val)
                                            @if($key==0||$key==5||$key==10)
                                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$val['id'])}}"><h4>{{str_limit($val['title'],50, '...')}}</h4></a><ul>
                                                    @elseif($key==4||$key==9||$key==14)
                                                        <li>
                                                            <i></i>
                                                            <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$val['id'])}}">{{str_limit($val['title'],50, '...')}}</a>
                                                        </li>
                                                </ul>
                                            @else
                                                <li>
                                                    <i></i>
                                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$val['id'])}}">{{str_limit($val['title'],50, '...')}}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="kyfdAllright">
                                        <img src="{{img($sanlist[0]['img2'])}}" width="100%"/>
                                        <ul>
                                            <li>

                                                <a href="{{$boot_config['link2']}}" target="_blank" class="qq">
                                                    <img src="/img/zsqq.png"/>
                                                    <p>在线咨询</p>
                                                    <p>考研疑难咨询</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{$boot_config['link1']}}" class="weibo">
                                                    <img src="/img/zsweibo.png"/>
                                                    <p>关注微博</p>
                                                    <p>更多考研信息</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:openWin('/weixin','',500,500);" class="weixin">
                                                    <img src="/img/zsweixin.png"/>
                                                    <p>关注微信</p>
                                                    <p>更多考研信息</p>
                                                </a>
                                            </li>
                                        </ul>
                                        <p class="kyfdAllrightp">
                                            <img src="/img/zskaoyan1.png" width="100%"/>
                                        </p>
                                    </div>
                                </div>

                            </div>



                        </div>

                    </div>
                    <div class="yxlb">
                        <div class="kyfdTit">
                            <p class="p1">
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'])}}" style="color: #444444;">{{$sanlist[1]['catname']}}</a>
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'])}}" class="span2">更多<img src="/img/zsnex2.png"/></a>
                            </p>
                            <p>为您精心挑选出更多的考研高校</p>
                        </div>
                        <div class="yxlbCon">
                            <ul>
                                  @foreach($yuanxiaogood as $key=>$val)
                                <li class=" @if($key%2==0) list1 @endif">
                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'],$val['id'])}}">
                                            <img src="{{img($val['img2'])}}"/>
                                        <p>{{$val['title']}}</p>
                                    </a>
                                </li>
                                  @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="kyzxall">
                        <div class="kyzx">
                            <div class="kyfdTit">
                                <p class="p1">
                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[2]['path'])}}" style="color: #444444;">{{$sanlist[2]['catname']}}</a>
                                    <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[2]['path'])}}" class="span2">更多<img src="/img/zsnex2.png"/></a>
                                </p>

                                <p>最新考研资讯共享</p>
                            </div>
                        </div>
                        <div class="kyzxall1">
                             <div class="certical-lists-warp">
                            @foreach($kaoyangood as $key=>$val)
                                <div class="kyzxCon">
                                    <div class="kyzxConleft">
                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[2]['path'],$val['id'])}}"><img src="{{img($val['img1'])}}"/></a>
                                    </div>
                                    <div class="kyzxConright">
                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[2]['path'],$val['id'])}}" class="a1">{{$val['title']}}</a>
                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[2]['path'],$val['id'])}}" class="a2">{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 150, '...') !!}</a>
                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[2]['path'],$val['id'])}}" class="a3">查看详情</a>
                                    </div>
                                </div>
                            @endforeach
                             </div>
                        </div>
                    </div>
                    <div class="zswenti">
                        <div class="kyfdTit">
                            <p class="p1">
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[3]['path'])}}" style="color: #444444;">{{$sanlist[3]['catname']}}</a>
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[3]['path'])}}" class="span2">更多<img src="/img/zsnex2.png"/></a>
                            </p>
                            <p>为您精心挑选出更多的考研高校</p>
                        </div>
                        <div id="content">
                            <ul id="expmenu-freebie">
                                <li>
                                    <ul class="expmenu">
                                         <div class="certical-lists-warp">
                                        @foreach($wentigood as $key=>$val)
                                            <li>
                                                <div class="header">

                                                    <span class="label" style="background-image: url(/img/pc.png);height: 25px;">{{$val['title']}}</span>

                                                    <span class="arrow @if($key==0) up @else down @endif"></span>
                                                </div>
                                                <ul class="menu" style="display: @if($key==0) block @else none @endif" >
                                                    <li>{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 240, '...') !!}<a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'], $sanlist[3]['path'],$val['id'])}}" style="color: #d71418;">详情>></a></li>
                                                </ul>
                                            </li>
                                        @endforeach
                                         </div>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
            </div>
        @stop

        @section('scripts')
            @parent<script type="text/javascript" src="/js/jquery.tools.min.js"></script>
            <script type="text/javascript" src="/js/main_zhiyezhenshu.js"></script>
            <script type="text/javascript">
                function openWin(url,name,iWidth,iHeight) {
                    //获得窗口的垂直位置
                    var iTop = (window.screen.availHeight - 30 - iHeight) / 2;
                    //获得窗口的水平位置
                    var iLeft = (window.screen.availWidth - 10 - iWidth) / 2;
                    window.open(url, name, 'height=' + iHeight + ',innerHeight=' + iHeight + ',width=' + iWidth + ',innerWidth=' + iWidth + ',top=' + iTop + ',left=' + iLeft + ',status=no,toolbar=no,menubar=no,location=no,resizable=no,scrollbars=0,titlebar=no');
                }
            </script>
@stop




