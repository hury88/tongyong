@extends('layouts.master')

@section('title') {{$id_arr->title}}@parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/common_zhiyepeixun.css"/>
    <link rel="stylesheet" type="text/css" href="/css/zhiyepeixun.css"/>
@stop
@section('bodyNextLabel')
<body>
<div class="pager-wrap personal-center">
    @stop
    @section('content')
    <div class="qypeixinAll">
        <div class="qypeixin">
            <p class="xwdtmbx">
                <a href="/"><img src="/img/sqzwtop.png" style="vertical-align: middle"/>所在位置：首页 </a>> <a href="{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'])}}">{{$GLOBALS['ty_data']->catname}}</a>> <a href="javascript:void(0);">{{$id_arr->title}}</a>
            </p>

            <div class="" style="padding-bottom: 20px;">
                <img src="/img/xuexudagang.jpg" width="100%"/>
            </div>
            <div class="dagang1">
                <div class="dagang1Left">
                    <img src="{{img($id_arr->img2)}}"/>
                </div>
                <div class="dagang1Right">
                    <h2>{{$id_arr->title}}</h2>
                    <div class="dagang1Right1">
                        <p class="p1">
                            来源：<i>{{$id_arr->qyname}}</i>
                        </p>
                        <div class="dagang1Right1_1">
                            <p class="pg"><img src="/img/dagang1.jpg"/>{{$id_arr->period}}</p>
                            <p><img src="/img/dagang2.jpg"/>{{$id_arr->introduce}}</p>
                        </div>
                        <div class="dagang1Right1_3">
                            <span class="price">价格:<i>￥{{$id_arr->price}}</i></span>
                            <span class="erweima"><img src="/img/xlsys.png"/>扫码关注我们了解更多培训信息</span>
                            <a href="javasript:void(0);" class="jbd"><img src="/img/jbd.jpg"/>举报</a>
                        </div>
                        <div class="dagang1Right1_2">
                            <a href="javasript:void(0);" class="aaa1">免费试看</a>
                            <a href="javasript:void(0);" class="aaa2">我要报名</a>
                        </div>
                        <p class="dagang1Right1_4">
                            <span>报名人数{{$id_arr->enroll_num}}</span>
                            <a href="{{$boot_config['link2']}}"><img src="/img/xlsys1.png"/>在线咨询</a>
                        </p>
                    </div>
                </div>
            </div>


        </div>
        <div class="dagang2">
            <div class="dagang2Tit">
                <ul>
                    <li>
                        <a href="javascript:void(0);">课程介绍</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" >课程大纲</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">讲师介绍</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">学习资料</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">评价</a>
                    </li>
                </ul>
            </div>
            <div class="dagang2Con">
                <div class="dagang2ConLeft">
                    {!! htmlspecialchars_decode($id_arr->content) !!}
                </div>
                <div class="dagang2ConLeft" style="display: none">
                    {!! htmlspecialchars_decode($id_arr->content2) !!}
                </div>
                <div class="dagang2ConLeft" style="display: none">
                    {!! htmlspecialchars_decode($id_arr->content3) !!}
                </div>
                <div class="dagang2ConLeft" style="display: none">
                    {!! htmlspecialchars_decode($id_arr->content4) !!}
                </div>
                <div class="dagang2ConLeft" style="display: none">

                </div>
                <div class="dagang2ConRight">
                    <div class="dagang2ConRight1">
                        <p class="pp1">
                            <img src="img/dagang3.jpg"/>
                        </p>
                        <p class="pp2">联想集团</p>
                        <p class="pp3">联想集团成立于1984年，由于客源所投资20万人民币和11位科技人员创办，现已发展为一家信息多元化发展的大型企业，富有长新华科技有限公司...</p>
                    </div>
                    <div class="interst">
                        <div class="interstTit">
                            <h3>你可能还感兴趣的课程</h3>
                            <ul>
                                <li>
                                    <div class="interstImg">
                                        <img src="/img/qypx1.jpg" width="100%"/>
                                        <div class="interstImg1">
                                            <a href=""><img src="/img/xlsys2.png"/></a>
                                        </div>
                                        <div class="interstTxt">
                                            直播时间：08月23日&nbsp;07:00
                                        </div>
                                    </div>
                                    <p class="jiangong"><a href="">工具建工技师高级技师...</a></p>
                                    <p class="jiangong1">
                                        <span>￥29.90</span>
                                        <a href="">
                                            <i>45456</i>
                                            人已报名
                                        </a>
                                    </p>
                                </li>
                                <li>
                                    <div class="interstImg">
                                        <img src="/img/qypx1.jpg" width="100%"/>
                                        <div class="interstImg1">
                                            <a href=""><img src="/img/xlsys2.png"/></a>
                                        </div>
                                        <div class="interstTxt">
                                            直播时间：08月23日&nbsp;07:00
                                        </div>
                                    </div>
                                    <p class="jiangong"><a href="">工具建工技师高级技师...</a></p>
                                    <p class="jiangong1">
                                        <span>￥29.90</span>
                                        <a href="">
                                            <i>45456</i>
                                            人已报名
                                        </a>
                                    </p>
                                </li>
                                <li>
                                    <div class="interstImg">
                                        <img src="/img/qypx1.jpg" width="100%"/>
                                        <div class="interstImg1">
                                            <a href=""><img src="/img/xlsys2.png"/></a>
                                        </div>
                                        <div class="interstTxt">
                                            直播时间：08月23日&nbsp;07:00
                                        </div>
                                    </div>
                                    <p class="jiangong"><a href="">工具建工技师高级技师...</a></p>
                                    <p class="jiangong1">
                                        <span>￥29.90</span>
                                        <a href="">
                                            <i>45456</i>
                                            人已报名
                                        </a>
                                    </p>
                                </li>
                                <li>
                                    <div class="interstImg">
                                        <img src="/img/qypx1.jpg" width="100%"/>
                                        <div class="interstImg1">
                                            <a href=""><img src="/img/xlsys2.png"/></a>
                                        </div>
                                        <div class="interstTxt">
                                            直播时间：08月23日&nbsp;07:00
                                        </div>
                                    </div>
                                    <p class="jiangong"><a href="">工具建工技师高级技师...</a></p>
                                    <p class="jiangong1">
                                        <span>￥29.90</span>
                                        <a href="">
                                            <i>45456</i>
                                            人已报名
                                        </a>
                                    </p>
                                </li>

                            </ul>
                            <p class="hyh">
                                <a href="">
                                    <img src="/img/hyh.png"/><i>换一换</i>
                                </a>
                            </p>
                        </div>


                    </div>
                </div>
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
