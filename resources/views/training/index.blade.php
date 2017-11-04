@extends('layouts.master')

@section('title') @parent @stop

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/common_zhiyepeixun.css"/>
    <link rel="stylesheet" type="text/css" href="/css/zhiyepeixun.css"/>
@stop
@section('bodyNextLabel')
    <body>
    <div class="pager-wrap personal-center">
        @stop
        @section('breadcrumbs')

        @stop

        @section('content')
            <div class="qypeixinAll">
                <div class="">
                    <a href=""><img src="/img/aqypx.jpg" style="width: 100%;"/></a>
                </div>
                <div class="qypeixin">
                    <p class="xwdtmbx">
                        <a href="/"><img src="/img/sqzwtop.png" style="vertical-align: middle"/>所在位置：首页 </a>> <a href="javascript:void(0);">{{$GLOBALS['pid_data']->catname}}</a>
                    </p>

                    <div class="zhiyepx1">
                        <ul>
                            <li class="liat1">
                                <a href="{{u($GLOBALS['pid_path'],$sanlist[0]['path'])}}">
                                    <img src="/img/jineng1.png"/>{{$sanlist[0]['catname']}}
                                </a>
                            </li>
                            <li class="liat2">
                                <a href="{{u($GLOBALS['pid_path'],$sanlist[1]['path'])}}">
                                    <img src="/img/jineng2.png"/>{{$sanlist[1]['catname']}}
                                </a>
                            </li>
                            <li class="liat3">
                                <a href="{{u('training','business')}}">
                                    <img src="/img/jineng3.png"/>培训机构
                                </a>
                            </li>
                            <li class="liat4">
                                <a href="{{u($GLOBALS['pid_path'],$sanlist[2]['path'])}}">
                                    <img src="/img/jineng4.png"/>{{$sanlist[2]['catname']}}
                                </a>
                            </li>
                            <li class="liat">
                                <a href="{{$boot_config['link2']}}" target="_blank">
                                    <img src="/img/jineng5.png" style="width:15%;" />在线咨询
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="zhiyepx2">
                        <div class="zhiyepx2Tit">
                            <div class="zhiyepx2Titl">
                                <img src="/img/jingping1.png"/>
                            </div>
                            <div class="zhiyepx2Titr">
                                <p class="jingp1">精品直播</p>
                                <p class="jingp2">
                                    <span>High - quality direct seeding</span>
                                    <span class="jingp2_2">
            					<a href="javascript:void(0);" class="jingp2_2on">最新直播 </a>
            					<a href="javascript:void(0);">特价推荐</a>
            				</span>
                                </p>
                            </div>
                        </div>
                        <div class="zhiyepx2Con">
                            <?php
                            function get_url($ty,$id){
                                if($ty==28){
                                return u('training','skill',$id);
                                }elseif($ty==65){
                                    return u('training','enterprise',$id);
                                }elseif($ty==66){
                                    return u('training','online',$id);
                                }
                            }?>
                            <ul>
                                @foreach($zuixingood as $key=>$val)
                                    @if($key==2||$key==5)
                                        <li class="list2">
                                            <div class="zhiyepx2Contop">
                                                <a href="{{get_url($val['ty'],$val['id'])}}"><img src="{{img($val['img1'])}}" style="width: 324px;height: 221px"/></a>
                                                <div class="zhibosj">
                                                    {{$val['introduce']}}
                                                </div>
                                                <div class="layerpx" style="display: none;">
                                                    <a href="{{get_url($val['ty'],$val['id'])}}">我要报名</a>
                                                    <p>{{$val['title']}}</p>
                                                </div>
                                            </div>
                                            <div class="zhiyepx2Conbom">
                                                <p class="p1"><a href="{{get_url($val['ty'],$val['id'])}}">职业技能培训直播课程</a></p>
                                                <p class="p2">
                                                    <span class="sp1">￥{{$val['price']}} </span>
                                                    <span class="sp2">{{$val['period']}}</span>
                                                </p>
                                                <p class="p3">
                                                    <span class="sp1">{{$val['name']}}（主讲人）</span>
                                                    <span class="sp2"><i>{{$val['enroll_num']}}</i>人已报名</span>
                                                </p>
                                            </div>
                                        </li>
                                        <div class="" style="clear: both;">

                                        </div>
                                    @else
                                <li>
                                    <div class="zhiyepx2Contop">
                                        <a href="{{get_url($val['ty'],$val['id'])}}"><img src="{{img($val['img1'])}}" style="width: 324px;height: 221px"/></a>
                                        <div class="zhibosj">
                                            {{$val['introduce']}}
                                        </div>
                                        <div class="layerpx" style="display: none;">
                                            <a href="{{get_url($val['ty'],$val['id'])}}">我要报名</a>
                                            <p>{{$val['title']}}</p>
                                        </div>
                                    </div>
                                    <div class="zhiyepx2Conbom">
                                        <p class="p1"><a href="{{get_url($val['ty'],$val['id'])}}">职业技能培训直播课程</a></p>
                                        <p class="p2">
                                            <span class="sp1">￥{{$val['price']}} </span>
                                            <span class="sp2">{{$val['period']}}</span>
                                        </p>
                                        <p class="p3">
                                            <span class="sp1">{{$val['name']}}（主讲人）</span>
                                            <span class="sp2"><i>{{$val['enroll_num']}}</i>人已报名</span>
                                        </p>
                                    </div>
                                </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="zhiyepx2Con" style="display: none">
                            <ul>
                                @foreach($tuijiangood as $key=>$val)
                                    @if($key==2||$key==5)
                                        <li class="list2">
                                            <div class="zhiyepx2Contop">
                                                <a href="{{get_url($val['ty'],$val['id'])}}"><img src="{{img($val['img1'])}}" style="width: 324px;height: 221px"/></a>
                                                <div class="zhibosj">
                                                    {{$val['introduce']}}
                                                </div>
                                                <div class="layerpx" style="display: none;">
                                                    <a href="{{get_url($val['ty'],$val['id'])}}">我要报名</a>
                                                    <p>{{$val['title']}}</p>
                                                </div>
                                            </div>
                                            <div class="zhiyepx2Conbom">
                                                <p class="p1"><a href="{{get_url($val['ty'],$val['id'])}}">职业技能培训直播课程</a></p>
                                                <p class="p2">
                                                    <span class="sp1">￥{{$val['price']}} </span>
                                                    <span class="sp2">{{$val['period']}}</span>
                                                </p>
                                                <p class="p3">
                                                    <span class="sp1">{{$val['name']}}（主讲人）</span>
                                                    <span class="sp2"><i>{{$val['enroll_num']}}</i>人已报名</span>
                                                </p>
                                            </div>
                                        </li>
                                        <div class="" style="clear: both;">

                                        </div>
                                    @else
                                        <li>
                                            <div class="zhiyepx2Contop">
                                                <a href="{{get_url($val['ty'],$val['id'])}}"><img src="{{img($val['img1'])}}" style="width: 324px;height: 221px"/></a>
                                                <div class="zhibosj">
                                                    {{$val['introduce']}}
                                                </div>
                                                <div class="layerpx" style="display: none;">
                                                    <a href="{{get_url($val['ty'],$val['id'])}}">我要报名</a>
                                                    <p>{{$val['title']}}</p>
                                                </div>
                                            </div>
                                            <div class="zhiyepx2Conbom">
                                                <p class="p1"><a href="{{get_url($val['ty'],$val['id'])}}">职业技能培训直播课程</a></p>
                                                <p class="p2">
                                                    <span class="sp1">￥{{$val['price']}} </span>
                                                    <span class="sp2">{{$val['period']}}</span>
                                                </p>
                                                <p class="p3">
                                                    <span class="sp1">{{$val['name']}}（主讲人）</span>
                                                    <span class="sp2"><i>{{$val['enroll_num']}}</i>人已报名</span>
                                                </p>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>



                <div class="zhiyepx3" style="margin-top: 50px;">
                    <div class="zhiyepx3All">
                        <div class="zhiyepx2Tit" style="border: none;padding-top: 40px;margin-bottom: 25px;">
                            <div class="zhiyepx2Titl">
                                <img src="/img/list1.png"/>
                            </div>
                            <div class="zhiyepx2Titr" style="width: 85%;">
                                <p class="jingp1">{{$sanlist[0]['catname']}}</p>
                                <p class="jingp2">
                                    <span>Skills training</span>
                                </p>
                            </div>
                            <div class="zhiyepx2Titc" style="width: 9%;float: left;">
                                <a href="{{u("training","skill")}}" style="color: #666666;margin-top: 20px;">更多<img src="/img/qydown1.png"></a>
                            </div>
                        </div>
                        <div class="qypeixinCon">
                            <ul>
                                <?php $colorarr=[0=>"#e94a4c",1=>'#39beea',2=>'#96bb1e',3=>'#60ba76'];?>
                                @foreach($jinenggood as $key=>$val)
                                <li style="border-bottom: 2px solid {{$colorarr[$key]}};">
                                    <a href="{{u("training","skill",$val['id'])}}"><img src="{{img($val['img1'])}}"/></a>
                                    <div class="qypeixinCon1">
                                        <p class="pu1">
                                            <a href="{{u("training","skill",$val['id'])}}" style="color: #e94a4c;">{{$val['title']}}</a>
                                        </p>
                                        <p class="pu2">
                                            <span>￥{{$val['price']}} </span>
                                            <i><em>{{$val['enroll_num']}}</em>人已报名</i>
                                        </p>
                                        <p class="pu3">
                                            <a href="{{u("training","skill",$val['id'])}}">{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 75, '...') !!}</a>
                                        </p>
                                        <p class="pu4">
                                            <a href="{{u("training","skill",$val['id'])}}" style="border-color:#e94a4c">我要报名</a>
                                        </p>
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="zhiyepx3" style="margin-top: 50px;">
                    <div class="zhiyepx3All">
                        <div class="zhiyepx2Tit" style="border: none;padding-top: 40px;margin-bottom: 25px;">
                            <div class="zhiyepx2Titl">
                                <img src="/img/enterprise-icon.png"/>
                            </div>
                            <div class="zhiyepx2Titr" style="width: 85%;">
                                <p class="jingp1">{{$sanlist[1]['catname']}}</p>
                                <p class="jingp2">
                                    <span>Enterprise training</span>
                                </p>
                            </div>
                            <div class="zhiyepx2Titc" style="width: 9%;float: left;">
                                <a href="{{u("training","enterprise")}}" style="color: #666666;margin-top: 20px;">更多<img src="/img/qydown1.png"></a>
                            </div>
                        </div>
                        <div class="qypeixinCon">
                            <ul>
                                @foreach($qiyegood as $key=>$val)
                                    <li style="border-bottom: 2px solid {{$colorarr[$key]}};">
                                        <a href="{{u("training","enterprise",$val['id'])}}"><img src="{{img($val['img1'])}}"/></a>
                                        <div class="qypeixinCon1">
                                            <p class="pu1">
                                                <a href="{{u("training","enterprise",$val['id'])}}" style="color: #e94a4c;">{{$val['title']}}</a>
                                            </p>
                                            <p class="pu2">
                                                <span>￥{{$val['price']}} </span>
                                                <i><em>{{$val['enroll_num']}}</em>人已报名</i>
                                            </p>
                                            <p class="pu3">
                                                <a href="{{u("training","enterprise",$val['id'])}}">{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 75, '...') !!}</a>
                                            </p>
                                            <p class="pu4">
                                                <a href="{{u("training","enterprise",$val['id'])}}" style="border-color:#e94a4c">我要报名</a>
                                            </p>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="zhiyepx3">
                    <div class="zhiyepx3All">
                        <div class="zhiyepx2Tit" style="border: none;padding-top: 40px;margin-bottom: 25px;">
                            <div class="zhiyepx2Titl">
                                <img src="img/list2.png"/>
                            </div>
                            <div class="zhiyepx2Titr" style="width: 85%;">

                                <p class="jingp1">培训机构</p>
                                <p class="jingp2">
                                    <span>Training institution</span>
                                </p>
                            </div>
                            <div class="zhiyepx2Titc" style="width: 9%;float: left;">
                                <a href="{{u('training','business')}}" style="color: #666666;margin-top: 20px;">更多<img src="/img/qydown1.png"></a>
                            </div>
                        </div>
                        <div class="zhiyepx4Con">
                            <ul>
                                @foreach($jigougood as $val)
                                <li>
                                    <a href="{{u('training','business',$val['user_id'])}}"><img src="{{img($val['img'])}}"/></a>
                                    <p><a href="{{u('training','business',$val['user_id'])}}">{{$val['business_name']}}</a></p>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="zhiyepx3" style="margin-bottom: 50px;">
                    <div class="zhiyepx3All">
                        <div class="zhiyepx2Tit" style="border: none;padding-top: 40px;margin-bottom: 25px;">
                            <div class="zhiyepx2Titl">
                                <img src="/img/list9.png"/>
                            </div>
                            <div class="zhiyepx2Titr" style="width: 85%;">
                                <p class="jingp1">{{$sanlist[2]['catname']}}</p>
                                <p class="jingp2">
                                    <span>On - line learning</span>
                                </p>
                            </div>
                            <div class="zhiyepx2Titc" style="width: 9%;float: left;">
                                <a href="{{u("training","online")}}" style="color: #666666;margin-top: 20px;">更多<img src="/img/qydown1.png"></a>
                            </div>
                        </div>
                        <div class="zhiyepx5Con">
                            <div id="notice-tit" class="notice-tit">
                                <ul>
                                    <li class="select">
                                        <a href="javascript:void(0);">{{config("config.webarr.onlineid.1")}}</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">{{config("config.webarr.onlineid.2")}}</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">{{config("config.webarr.onlineid.3")}}</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">{{config("config.webarr.onlineid.4")}}</a>
                                    </li>
                                </ul>
                            </div>
                            <div id="notice-con" class="notice-con">

                                <div class="mod" style="display:block">
                                    <ul>
                                        @foreach($zaixiangood[0] as $val)
                                        <li>
                                            <div class="modTop">
                                                <a href="{{u("training","online",$val['id'])}}"> <img src="{{img($val['img1'])}}"/></a>
                                                <div class="minute">
                                                   <img src="/img/xlsys3.png"/>{{$val['introduce']}}
                                                </div>
                                            </div>
                                            <div class="modBom">
                                                <p class="p1"><a href="{{u("training","online",$val['id'])}}">{{$val['title']}}</a></p>
                                                <p class="p2">
                                                    <span class="sp1">￥{{$val['price']}}</span>
                                                    <span class="sp2"><i>{{$val['enroll_num']}}</i>人已报名</span>
                                                </p>
                                                <p class="p3">
                                                    <a href="{{u("training","online",$val['id'])}}">{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 100, '...') !!}</a>
                                                </p>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="mod" style="display:none">
                                    <ul>
                                    @foreach($zaixiangood[1] as $val)
                                        <li>
                                            <div class="modTop">
                                                <a href="{{u("training","online",$val['id'])}}"> <img src="{{img($val['img1'])}}"/></a>
                                                <div class="minute">
                                                    <img src="/img/xlsys3.png"/>{{$val['introduce']}}
                                                </div>
                                            </div>
                                            <div class="modBom">
                                                <p class="p1"><a href="{{u("training","online",$val['id'])}}">{{$val['title']}}</a></p>
                                                <p class="p2">
                                                    <span class="sp1">￥{{$val['price']}}</span>
                                                    <span class="sp2"><i>{{$val['enroll_num']}}</i>人已报名</span>
                                                </p>
                                                <p class="p3">
                                                    <a href="{{u("training","online",$val['id'])}}">{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 100, '...') !!}</a>
                                                </p>
                                            </div>
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                                <div class="mod" style="display:none">
                                    <ul>
                                    @foreach($zaixiangood[2] as $val)
                                        <li>
                                            <div class="modTop">
                                                <a href="{{u("training","online",$val['id'])}}"> <img src="{{img($val['img1'])}}"/></a>
                                                <div class="minute">
                                                    <img src="/img/xlsys3.png"/>{{$val['introduce']}}
                                                </div>
                                            </div>
                                            <div class="modBom">
                                                <p class="p1"><a href="{{u("training","online",$val['id'])}}">{{$val['title']}}</a></p>
                                                <p class="p2">
                                                    <span class="sp1">￥{{$val['price']}}</span>
                                                    <span class="sp2"><i>{{$val['enroll_num']}}</i>人已报名</span>
                                                </p>
                                                <p class="p3">
                                                    <a href="{{u("training","online",$val['id'])}}">{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 100, '...') !!}</a>
                                                </p>
                                            </div>
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                                <div class="mod" style="display:none">
                                    <ul>
                                    @foreach($zaixiangood[3] as $val)
                                        <li>
                                            <div class="modTop">
                                                <a href="{{u("training","online",$val['id'])}}"> <img src="{{img($val['img1'])}}"/></a>
                                                <div class="minute">
                                                    <img src="/img/xlsys3.png"/>{{$val['introduce']}}
                                                </div>
                                            </div>
                                            <div class="modBom">
                                                <p class="p1"><a href="{{u("training","online",$val['id'])}}">{{$val['title']}}</a></p>
                                                <p class="p2">
                                                    <span class="sp1">￥{{$val['price']}}</span>
                                                    <span class="sp2"><i>{{$val['enroll_num']}}</i>人已报名</span>
                                                </p>
                                                <p class="p3">
                                                    <a href="{{u("training","online",$val['id'])}}">{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 100, '...') !!}</a>
                                                </p>
                                            </div>
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>

            </div>
@stop

@section('scripts')
    @parent
            <script type="text/javascript" src="/js/jquery-1.10.1.min.js"></script>
            <script src="/js/2.js"></script>
            <script type="text/javascript">
     
                $('.qypeixinTit2Right div a').click(function(){
                    $(this).css('background','#445263');
                    $(this).css('color','#fff');
                })
                $('.aa1').click(function(){
                    $('.bb1').slideToggle();
                })
                $('.zhiyepx2Contop').mouseover(function(){
                    $(this).children('.layerpx').show();
                })
                $('.zhiyepx2Contop').mouseout(function(){
                    $(this).children('.layerpx').hide();
                })
                $(function () {
                   $(".jingp2_2 a").click(function () {
                     var index=$(this).index()
                       $(".jingp2_2 a").removeClass("jingp2_2on")
                       $(this).addClass("jingp2_2on")
                       $(".zhiyepx2 .zhiyepx2Con").hide()
                       $(".zhiyepx2 .zhiyepx2Con").eq(index).show()
                   })
                })
            </script>
@stop
