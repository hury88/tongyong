@extends('layouts.master')

@section('title') {{$id_arr->title}}@parent @stop
@section('css')

    <script src="/js/jquery-1.11.0.min.js"></script>
    <link rel='stylesheet' type='text/css' href='/css/guojijiaoyu.css'/>
    <link rel='stylesheet' type='text/css' href='/css/common_guojijiaoyu.css'/>
    <style type="text/css">

        .zoombox{width:1200px;margin:60px auto 0 auto;}
        .zoompic{width:632px;height:385px; margin-left:37px; cursor:pointer;}

        .sliderbox{height:386px; width:110px;overflow:hidden; position:relative; }
        .sliderbox .arrow-btn{width:110px;height:25px;cursor:pointer !important;position:absolute; }
        .sliderbox #btn-left{ background:url(/img/shangjiantou_x.jpg);top:0;cursor:pointer;}
        .sliderbox #btn-right{ background:url(/img/shangjiantou_xx.jpg); bottom:0;cursor:pointer;}
        .sliderbox .slider{float:left;height:336px;width:110px; margin-top:27px;position:relative;overflow:hidden;display:inline;}
        .sliderbox .slider ul{position:absolute;left:0; top:0;width:100%;}
        .sliderbox .slider li{float:left;width:110px;height:112px;text-align:center; position:relative;}
        .sliderbox .slider li img{ width: 110px; height:110px;}
        .sliderbox .slider li .zzc{ width:110px; height:112px; background-color:#000; opacity:0.5; position:absolute;top:0;}
        .sliderbox .slider li.current .zzc{ display:none;}

    </style>

@stop
@section('bodyNextLabel')

    <body>
    <div class='pager-wrap personal-center'>
        @stop
        @section('breadcrumbs')
        @stop

        @section('content')
            <div class="lianluxq" style="margin-top: 67px;">
                <p class='xwdtmbx'>
                    <a href='/'><img src='/img/sqzwtop.png' style='vertical-align: middle'/>所在位置：首页 </a>> <a href='{{u($GLOBALS['pid_path'])}}'>{{$GLOBALS['pid_data']->catname}}</a>> <a href='{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'])}}'>{{$GLOBALS['ty_data']->catname}}</a>
                </p>
                <div class="xwdtmbxBanner" style="padding-bottom: 20px;">
                    <a href=""><img src="/img/xianluXq.jpg" style="width: 100%;"/></a>
                </div>
                <div class="lianluxq1">
                    <!--<div class="lianluxq1Left">
                        aaaaaa
                    </div>-->
                    <!--特效开始-->

                    <div class="s_xueyuan" style="width: 534px;float: left;">
                        <div class="s2_xueyuan" style="width: 100%;">
                            <div class="zoombox clr" style="width: 100%;margin: 0;">
                                <div class="sliderbox fl" >
                                    <div id="btn-left" class="arrow-btn dasabled"></div>
                                    <div class="slider" id="thumbnail">
                                        <ul>
                                            @foreach(v_pic($id_arr->id) as $key=>$val)

                                            <li @if($key==0) class='current' @endif style="float: none;"><a href="{{img($val->img1)}}"><span class="zzc"></span><img src="{{img($val->img1)}}" alt="{{$val->title}}" /></a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div id="btn-right" class="arrow-btn"></div>
                                </div>

                                @foreach(v_pic($id_arr->id) as $key=>$val)
                                    @if($key==0)
                                    <div class="zoompic" onclick="javascript:void(0);" style="width: 415px;float: right;margin-left: 0;"><img src="{{img($val->img1)}}" width="386" height="386" alt="{{$val->title}}" /></div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <script src="/js/index.js"></script>

                    <!--特效结束-->
                    <div class="lianluxq1Right">
                        <h3>{{$id_arr->title}}</h3>
                        <div class="lianluxq1All">
                            <div class="lianluxq1Left" style="width: 250px;">
                                <p>出发地：{{$id_arr->from}}</p>
                                <p>目的地：{{$id_arr->destination}}</p>
                                <p>报名时间：{{date("Y-m-d",$id_arr->bstarttime)}} 至 {{date("Y-m-d",$id_arr->bendtime)}}</p>
                                <p>招生对象：{{$id_arr->ftitle}}</p>
                            </div>
                            <div class="lianluxq1Right" style="width: 240px;">
                                <p>出发时间：{{date("Y-m-d",$id_arr->starttime)}} </p>
                                <p>结束时间：{{date("Y-m-d",$id_arr->endtime)}}</p>
                                <p>剩余席位：{{$id_arr->introduce}}</p>
                            </div>
                        </div>
                        <div class="lianluxq2">
                            <p class="py1">
                                <span><img src="/img/xlsys.png"/>扫码关注我们了解更多培训信息</span>
                                <a href=""><img src="/img/xlfx.png"/><i>分享</i></a>

                            </p>
                            <div class="erweima" style="display: none; height: 140px;">
                                <div style=" width: 120px;height:120px;overflow: hidden">
                                <img src="{{img($boot_config['img1'])}}" width="120px;"/>
                                </div>
                            </div>
                            <p class="py2"><a href="javascript:void(0);">我要报名</a></p>
                            <p class="py3">
                                <span>报名人数 {{App\Enroll::get_count($GLOBALS['pid'],$id_arr->id,'')}}</span>
                                <a href="{{$boot_config['link2']}}" target="_blank"><img src="/img/xlsys1.png"/>在线咨询</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="lianluxq3">
                    <div class="lianluxq3Tit">
                        <ul>
                            <li>
                                <a href="javascript:void(0);" class="lianluxq3on">线路详情</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">行程介绍</a>
                            </li>
                        </ul>
                    </div>
                    <div class="lianluxq3Con">
                        {!! htmlspecialchars_decode($id_arr->content) !!}
                    </div>
                    <div class="lianluxq3Con" style="display: none">
                        {!! htmlspecialchars_decode($id_arr->content2) !!}
                    </div>
                </div>
            </div>


@stop
@section('scripts')
    <script type="text/javascript" src="/js/jquery-1.10.1.min.js"></script>
    <script type="text/javascript">
        //	导航下拉
        $('.mian_nav .list>li').hover(function() {
            $(this).find('.dump').stop().slideDown();
        }, function() {
            $(this).find('.dump').stop().slideUp();
        })

    </script>

    <script type="text/javascript">
        $(function () {
            $(".kf_online").css("position","fixed")
            $(".kf_online").css("top","50%")
            $(".kf_online").css("margin-top","-204px")
            $(".key_top").click(function(){
                var speed=200;
                $('body,html').animate({ scrollTop: 0 }, speed);
                return false;
            })
        })
        $('.lianluxq2 .py1 span').click(function(){
            $('.lianluxq2 .erweima').slideToggle();
        })
        $(".lianluxq3 .lianluxq3Tit li").click(function () {
            $(".lianluxq3 .lianluxq3Tit li a").removeClass("lianluxq3on")
            $(this).find("a").addClass("lianluxq3on");
            var index=$(this).index()
            $(".lianluxq3 .lianluxq3Con").hide()
            $(".lianluxq3 .lianluxq3Con").eq(index).show()
        })
    </script>
@stop