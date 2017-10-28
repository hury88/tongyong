@extends('layouts.master')

@section('title') @parent @stop
@section('css')
  <link rel="stylesheet" type="text/css" href="/css/common_jiandanyemian.css"/>
  <link rel="stylesheet" type="text/css" href="/css/jiandanyemian.css"/>
@stop
@section('bodyNextLabel')
    <body>
    <div class="pager-wrap personal-center">
@stop
    @section('content')
            <div class="yijianAll" style="margin-top: 67px;">
                <div class="xwdt">
                    <p class="xwdtmbx">
                        <a href="/"><img src="/img/sqzwtop.png"/>所在位置：首页 </a>> <a href="{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'])}}">{{$GLOBALS['ty_data']->catname}}</a>
                    </p>
                    <div class="xwdtAll">
                        <div class="xwdtTit">

                            <i>{{$GLOBALS['ty_data']->catname}}</i>
                            <span>
                                @foreach($left as $row)
                                    <a {!! $GLOBALS['ty']==$row->id ? ' class="xwdton"' :'' !!} href="{{u('news', $row->path)}}">{{$row->catname}}</a>
                                @endforeach

              	  	        </span>
                        </div>
                        <div class="xwdtCon">
                            <div class="xwdtConall">
                                <div class="xwdtConleft">
                                    <ul>
                                        @foreach($page['data'] as $val)
                                            <li>
                                                <div class="xwdtConleftleft">
                                                    <img src="{{img($val['img1'])}}"/>
                                                </div>
                                                <div class="xwdtConleftright">
                                                    <p class="po1"><a href="{{route($GLOBALS['ty_path'],$val['id'])}}">{{$val['title']}} <i>{{date("Y-m-d",$val['sendtime'])}}</i></a></p>
                                                    <p class="po2"><a href="{{route($GLOBALS['ty_path'],$val['id'])}}">{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 240, '...') !!}</a></p>
                                                </div>
                                            </li>
                                          @endforeach
                                    </ul>
                                </div>
                                <div class="xwdtConright">
                                    <ul>
                                        <li>
                                            <div class="xwdtTop">
                                                <div class="xwdtTopleft">
                                                    <img src="img/xwdt4.jpg"/>
                                                </div>
                                                <div class="xwdtTopright">
                                                    <p class="ps1">热门资讯</p>
                                                    <p class="ps2">Popular information</p>
                                                </div>
                                            </div>
                                            <div class="xwdtBom">
                                                 @foreach($list['hot_info'] as $v1)
                                                <p>
                                                    <a href="{{route($GLOBALS['ty_path'],$v1->id)}}">{{str_limit($v1->title,25,"...")}}</a>
                                                    <i>{{date("m-d",$v1->sendtime)}}</i>
                                                </p>
                                                 @endforeach
                                            </div>
                                        </li>

                                        <li>
                                            <div class="xwdtTop">
                                                <div class="xwdtTopleft">
                                                    <img src="img/xwdt5.jpg"/>
                                                </div>
                                                <div class="xwdtTopright">
                                                    <p class="ps1">最新招聘职位</p>
                                                    <p class="ps2">New Job</p>
                                                </div>
                                            </div>
                                            <div class="xwdtBom xwdtBom1">
                                                <div class="">
                                                    <p><a href="" class="aa1">财务会计助理</a></p>
                                                    <p><a href="">安徽橙意信息科技有限公司</a></p>
                                                </div>
                                                <div class="">
                                                    <p><a href="" class="aa1">财务会计助理</a></p>
                                                    <p><a href="">安徽橙意信息科技有限公司</a></p>
                                                </div>
                                                <div class="">
                                                    <p><a href="" class="aa1">财务会计助理</a></p>
                                                    <p><a href="">安徽橙意信息科技有限公司</a></p>
                                                </div>
                                                <div class="">
                                                    <p><a href="" class="aa1">财务会计助理</a></p>
                                                    <p><a href="">安徽橙意信息科技有限公司</a></p>
                                                </div>
                                                <div class="">
                                                    <p><a href="" class="aa1">财务会计助理</a></p>
                                                    <p><a href="">安徽橙意信息科技有限公司</a></p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="xwdtTop">
                                                <div class="xwdtTopleft">
                                                    <img src="img/xwdt5.jpg"/>
                                                </div>
                                                <div class="xwdtTopright">
                                                    <p class="ps1">热门培训</p>
                                                    <p class="ps2">Popular Training</p>
                                                </div>
                                            </div>
                                            <div class="xwdtBom">
                                                <div class="rmpx">
                                                    <img src="img/xwdt6.jpg" style="width: 100%;"/>
                                                    <div class="rmpx0">
                                                        <img src="img/xwdttime.png"/>
                                                        <span>共110节 -- 20小时8分钟</span>>
                                                    </div>
                                                </div>
                                                <div class="rmpx1">
                                                    <p class="pb1">职业技能培训直播课程</p>
                                                    <p class="pb2">
                                                        <span>￥29.90 </span>
                                                        <i><b>45456</b>人已报名</i>
                                                    </p>
                                                    <p><a href="">【技能培训】本科统考英语、计算机...	</a></p>
                                                    <p><a href="">【企业培训】本科统考英语、计算机...</a></p>
                                                    <p><a href="">【在线学习】学历与学位的区别</a></p>
                                                    <p><a href="">【企业培训】7月成考报名指南</a></p>
                                                    <p><a href="">【技能培训】北京理工大学现代远等...</a></p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @include('partial.paginator')
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

            </script>
@stop
