@extends('layouts.master')

@section('title') @parent @stop
@section('css')
    <link rel='stylesheet' type='text/css' href='/css/guojijiaoyu.css'/>
    <link rel='stylesheet' type='text/css' href='/css/common_guojijiaoyu.css'/>
    <link rel="stylesheet" href="css/styles.css" type="text/css" />
    <!--<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>-->

    <script type="text/javascript" src="js/jquery.tools.min.js"></script>

    <script type="text/javascript" src="js/main.js"></script>
@stop
@section('bodyNextLabel')
    <body>
    <div class='pager-wrap personal-center'>
        @stop
        @section('breadcrumbs')
            <div class="kyxx">
                <div class="kyxxbannetr">
                    <img src="img/zsbbabber.jpg" style="width: 100%;"/>
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
                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'])}}?genre=1" style="color: #444444;">{{$sanlist[0]['catname']}}</a>
                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'])}}?genre=1" class="span2">更多<img src="/img/zsnext.png"/></a>
                                    </p>

                                    <p>专业决定你的起点高低，在选择专升本专业时，热门专业多为选择的重点对象</p>
                                </div>
                                <div class="rmzy" style="width: 1100px;margin-top: 30px;margin: 0 auto;">
                                    <ul>
                                           @foreach($zhuanyegood as $val)
                                        <li>
                                            <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'],$val['id'])}}">
                                                <img src="{{img($val['img1'])}}"/>
                                                <p>{{$val['title']}}</p>
                                            </a>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>



                        </div>

                    </div>
                    <div class="yxlb">
                        <div class="kyfdTit">
                            <p class="p1">
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'])}}?genre=1" style="color: #444444;">{{$sanlist[1]['catname']}}</a>
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'])}}?genre=1" class="span2">更多<img src="/img/zsnex2.png"/></a>

                            </p>
                            <p>院校招生 信息一览</p>
                        </div>
                        <div class="zsbxx">
                            <ul>
                                <li>
                                    <img src="img/zsbxx.jpg"/>
                                    <p class="lanzhou">兰州大学2017年高校专项计划招生简章</p>
                                    <p><a href="" style="">为贯彻落实《国务院关于深化考试招生制度改革的实施意见》和《政府工作报告》有关部署，继续深化招生考试制度...</a></p
                                </li>
                                <li>
                                    <p><a href="" class="lanzhou">2017年江苏省重点高校招收农村和贫困地区...</a></p>
                                    <p><a href="">中南财经政法大学2017年高校专项计划招生简章</a></p>
                                    <p><a href="">武汉理工大学2017年高校专项“励志计划”招</a></p>
                                    <p><a href="">江南大学2017年高校专项计划招生简章</a></p>
                                    <p><a href="">西安交通大学2017年高校专项计划招生简章</a></p>
                                    <p><a href="">湖南大学2017年高校专项计划招生简章</a></p>
                                    <p><a href="">南京农业大学2017年高校专项计划招生简章</a></p>
                                    <p><a href="" class="lanzhou">兰州大学2017年高校专项计划招生简章</a></p>
                                    <p><a href="">西南财经大学2017年高校专项计划(农村学生单</a></p>
                                    <p><a href="">天津大学2017年“筑梦计划”招生简章</a></p>
                                    <p><a href="">苏州大学2017年高校专项计划招生简章</a></p>
                                    <p><a href="">上海大学2017年高校专项计划暨“启航计划”</a></p>
                                    <p><a href="">重庆大学2017年高校专项计划招生简章</a></p>
                                    <p><a href="">广西大学2017年高校专项计划 (农村单独招生</a></p>
                                </li>
                                <li>
                                    <p><a href="" class="lanzhou">2017年江苏省重点高校招收农村和贫困地区...</a></p>
                                    <p><a href="">中南财经政法大学2017年高校专项计划招生简章</a></p>
                                    <p><a href="">武汉理工大学2017年高校专项“励志计划”招</a></p>
                                    <p><a href="">江南大学2017年高校专项计划招生简章</a></p>
                                    <p><a href="">西安交通大学2017年高校专项计划招生简章</a></p>
                                    <p><a href="">湖南大学2017年高校专项计划招生简章</a></p>
                                    <p><a href="">南京农业大学2017年高校专项计划招生简章</a></p>
                                    <p><a href="" class="lanzhou">兰州大学2017年高校专项计划招生简章</a></p>
                                    <p><a href="">西南财经大学2017年高校专项计划(农村学生单</a></p>
                                    <p><a href="">天津大学2017年“筑梦计划”招生简章</a></p>
                                    <p><a href="">苏州大学2017年高校专项计划招生简章</a></p>
                                    <p><a href="">上海大学2017年高校专项计划暨“启航计划”</a></p>
                                    <p><a href="">重庆大学2017年高校专项计划招生简章</a></p>
                                    <p><a href="">广西大学2017年高校专项计划 (农村单独招生</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="kyzxall">
                        <div class="kyzx">
                            <div class="kyfdTit">
                                <p class="p1">
                                    考研资讯
                                    <a href="" class="span2">更多<img src="img/zsnext.png"/></a>
                                </p>

                                <p>最新考研资讯共享</p>
                            </div>
                        </div>
                        <div class="kyzxall1">
                            <div class="kyzxCon">
                                <div class="kyzxConleft">
                                    <a href=""><img src="img/kyzx1.jpg"/></a>
                                </div>
                                <div class="kyzxConright">
                                    <a href="" class="a1">如何选择菲律宾游学的城市</a>
                                    <a href="" class="a2">中国学生到菲律宾游学的地方主要有4个，马尼拉、克拉克、碧瑶、宿务，这几个地方各有其特点。以下是小编整理的关于如何选择菲律宾游学的城市，希望大家...</a>
                                    <a href="" class="a3">查看详情</a>
                                </div>
                            </div>
                            <div class="kyzxCon">
                                <div class="kyzxConleft">
                                    <a href=""><img src="img/kyzx2.jpg"/></a>
                                </div>
                                <div class="kyzxConright">
                                    <a href="" class="a1">如何选择菲律宾游学的城市</a>
                                    <a href="" class="a2">中国学生到菲律宾游学的地方主要有4个，马尼拉、克拉克、碧瑶、宿务，这几个地方各有其特点。以下是小编整理的关于如何选择菲律宾游学的城市，希望大家...</a>
                                    <a href="" class="a3">查看详情</a>
                                </div>
                            </div>
                            <div class="kyzxCon">
                                <div class="kyzxConleft">
                                    <a href=""><img src="img/kyzx3.jpg"/></a>
                                </div>
                                <div class="kyzxConright">
                                    <a href="" class="a1">如何选择菲律宾游学的城市</a>
                                    <a href="" class="a2">中国学生到菲律宾游学的地方主要有4个，马尼拉、克拉克、碧瑶、宿务，这几个地方各有其特点。以下是小编整理的关于如何选择菲律宾游学的城市，希望大家...</a>
                                    <a href="" class="a3">查看详情</a>
                                </div>
                            </div>
                            <div class="kyzxCon">
                                <div class="kyzxConleft">
                                    <a href=""><img src="img/kyzx4.jpg"/></a>
                                </div>
                                <div class="kyzxConright">
                                    <a href="" class="a1">如何选择菲律宾游学的城市</a>
                                    <a href="" class="a2">中国学生到菲律宾游学的地方主要有4个，马尼拉、克拉克、碧瑶、宿务，这几个地方各有其特点。以下是小编整理的关于如何选择菲律宾游学的城市，希望大家...</a>
                                    <a href="" class="a3">查看详情</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="zswenti">
                        <div class="kyfdTit">
                            <p class="p1">
                                院校一览表
                                <a href="" class="span2">更多<img src="img/zsnex2.png"/></a>
                            </p>
                            <p>为您精心挑选出更多的考研高校</p>
                        </div>
                        <div id="content">

                            <ul id="expmenu-freebie">

                                <li>

                                    <!-- Start Freebie -->

                                    <ul class="expmenu">

                                        <li>

                                            <div class="header">

                                                <span class="label" style="background-image: url(img/pc.png);height: 25px;">注册资金过大或者过小有什么坏处，一般多少比较合适？</span>

                                                <span class="arrow up"></span>

                                            </div>

                                            <ul class="menu">

                                                <li>科学基金国际合作自成立之初就致力于开拓资助渠道，截止到目前，已与37国家(地区)的76个基金组织或学术机构签署了组织间协议(或谅解备忘录)。旨在共同资助中外方科学家开展国际(地区)合作与交流项目。</li>

                                            </ul>

                                        </li>

                                        <li>

                                            <div class="header">

                                                <span class="label" style="background-image: url(img/pc.png);height: 25px;">注册资金过大或者过小有什么坏处，一般多少比较合适？</span>

                                                <span class="arrow down"></span>

                                            </div>

                                            <ul class="menu" style="display:none">

                                                <li>科学基金国际合作自成立之初就致力于开拓资助渠道，截止到目前，已与37国家(地区)的76个基金组织或学术机构签署了组织间协议(或谅解备忘录)。旨在共同资助中外方科学家开展国际(地区)合作与交流项目。</li>

                                            </ul>

                                        </li>

                                        <li>

                                            <div class="header">

                                                <span class="label" style="background-image: url(img/pc.png);height: 25px;">注册资金过大或者过小有什么坏处，一般多少比较合适？</span>

                                                <span class="arrow down"></span>

                                            </div>

                                            <ul class="menu" style="display:none">

                                                <li>科学基金国际合作自成立之初就致力于开拓资助渠道，截止到目前，已与37国家(地区)的76个基金组织或学术机构签署了组织间协议(或谅解备忘录)。旨在共同资助中外方科学家开展国际(地区)合作与交流项目。</li>

                                            </ul>

                                        </li>
                                        <li>

                                            <div class="header">

                                                <span class="label" style="background-image: url(img/pc.png);height: 25px;">注册资金过大或者过小有什么坏处，一般多少比较合适？</span>

                                                <span class="arrow down"></span>

                                            </div>

                                            <ul class="menu" style="display:none">

                                                <li>科学基金国际合作自成立之初就致力于开拓资助渠道，截止到目前，已与37国家(地区)的76个基金组织或学术机构签署了组织间协议(或谅解备忘录)。旨在共同资助中外方科学家开展国际(地区)合作与交流项目。</li>

                                            </ul>

                                        </li>

                                        <li>

                                            <div class="header">

                                                <span class="label" style="background-image: url(img/pc.png);height: 25px;">注册资金过大或者过小有什么坏处，一般多少比较合适？</span>

                                                <span class="arrow down"></span>

                                            </div>

                                            <ul class="menu" style="display:none">

                                                <li>科学基金国际合作自成立之初就致力于开拓资助渠道，截止到目前，已与37国家(地区)的76个基金组织或学术机构签署了组织间协议(或谅解备忘录)。旨在共同资助中外方科学家开展国际(地区)合作与交流项目。</li>

                                            </ul>

                                        </li>


                                    </ul>

                                    <!-- End Freebie -->

                                </li>

                            </ul>

                        </div>



                    </div>

            </div>

@stop


