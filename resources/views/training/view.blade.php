@extends('layouts.master')

@section('title') {{$id_arr->business_name}} @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/common_zhiyezhaopin.css"/>
    <link rel="stylesheet" type="text/css" href="/css/zhiyezhaopin.css"/>
@stop
@section('bodyNextLabel')
<body>
<div class="pager-wrap personal-center">
    @stop
    @section('content')
        <div class="zyzp">
            <div class="zyzpBanner">
                <img src="/img/zyzpbanner.jpg" style="width: 100%;"/>
            </div>

            <div class="zyzpTit">
                <div class="zyzpTit1">
                    <p>
                        <a href="/"><img src="/img/zyzptop.png"/></a>
                        <span>所在位置：</span>
                        <a href="/">首页></a>
                        <a href="{{u('training','business')}}">培训机构></a>
                        <a href="javascript:void(0);">{{$id_arr->business_name}}</a>
                    </p>
                </div>
                <div class="zyzpTit2">
                    <div class="zyzpTit2Left">
                        <img src="{{img($id_arr->logo)}}"/>
                    </div>
                    <div class="zyzpTit2Right">
                        <p style="font-size: 20px;padding-bottom:10px;">{{$id_arr->business_name}}</p>
                        <p class="qyxz">
                            <span>企业性质：{{config("config.business.nature.".$id_arr->nature)}}</span>
                            <span>企业规模：{{config("config.business.size.".$id_arr->size)}}</span>
                            <span>所属行业：{{config("config.business.cate.".$id_arr->cate)}}</span>
                        </p>
                        <p>官网：<a href="{{$id_arr->siteurl}}"><i>{{$id_arr->business_name}}</i></a></p>
                        <p>地址：{{$id_arr->location}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="zyzpCon">
            <div class="zyzpConnav">
                <ul>
                    <li><a href="javascript:void(0);" class="zyzpon">公司介绍</a></li>
                    <li><a href="javascript:void(0);">招聘职位</a></li>
                    <li><a href="javascript:void(0);">职业培训 </a></li>
                    <li><a href="javascript:void(0);">职业证书 </a></li>
                </ul>
            </div>
            <div class="zyzpTxt">
                {!! htmlspecialchars_decode($id_arr->business_introduction) !!}
            </div>
            <div class="zyzpTxt" style="display: none">
                开发中
            </div>
            <div class="zyzpTxt"  style="display: none">
                开发中
            </div>
            <div class="zyzpTxt" style="display: none">
                开发中
            </div>

        </div>
        <div class="gap">

        </div>


        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript">
            $(".zyzpConnav li").click(function(){
                var i = $(this).index();

                $(".zyzpConnav li a").removeClass("zyzpon");
                $(this).find('a').addClass("zyzpon");
                $(".zyzpCon .zyzpTxt").eq(i).show().siblings(".zyzpCon .zyzpTxt").hide();
            });
        </script>
    @stop {{-- end content --}}


    @section('footer')
    @parent
    @stop

    @section('scripts')
    @parent

    @stop
