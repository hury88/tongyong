@extends('layouts.master')

@section('title') {{$id_arr->title}}@parent @stop

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/zhiyezhengshu.css"/>
    <link rel="stylesheet" type="text/css" href="/css/common_zhiyezhengshu.css"/>
    <link rel="stylesheet" type="text/css" href="/plugins/report.css"/>
@stop
@section('bodyNextLabel')
    <body>
    <div class="pager-wrap personal-center">
        @stop
        @section('breadcrumbs')
        @stop
    @section('content')
        <div class="kyxx">
            <div class="kyfd">
                <div class="kyfdCon">
                    <div class="kyfdtop">
                        <img src="/img/zstop.jpg"/>
                        <span>所在位置：</span>
                        <a href="/">首页></a>

                        <a href="{{u($GLOBALS['pid_path'])}}">{{$GLOBALS['pid_data']->catname}}></a>
                        <a href="{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'])}}">{{$GLOBALS['ty_data']->catname}} ></a>
                        @if($id_arr->certificate_lid>0)
                        <a href="{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'],$GLOBALS['tty_path'])}}?genre={{$id_arr->certificate_lid}}">{{config("config.webarr.certificate")[$id_arr->certificate_lid]}} ></a>
                        @else
                            <a href="{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'],$GLOBALS['tty_path'])}}">{{$GLOBALS['tty_data']->catname}} ></a>
                        @endif
                        <a href="javascript:void(0);">{{$id_arr->title}}</a>
                    </div>
                </div>
            </div>

            <div class="zslbxqall">
                <div class="zslbxq">
                    <div class="zslbxqLeft">
                        <div class="zslbxqTit">
                            <p class="rlzy">{{$id_arr->title}}</p>

                                <p class="rlzysj form" action="{{route('certificate.create', $id_arr->id)}}">
                                    <span>更新时间：{{date("Y-m-d",$id_arr->sendtime)}}</span>
                                    <span>来源：<i>{{$id_arr->qyname}}</i></span>
                                    @if(auth()->check())
                                        @if(auth()->user()->isPerson())
                                            <span  class="report-btn"><img src="/img/jubao.png"/>举报</span>
                                        @else
                                            <span  onclick="javascript:alert('只有个人会员才能举报');" class="jinggao" ><img src="/img/jubao.png"/>举报</span>
                                        @endif
                                    @else
                                        <span onclick="javascript:if(confirm('未登录,去登陆后再来举报'))window.location.href='{{route('login'). _r_('?r=%s')}}';" class="jinggao"><img src="/img/jubao.png"/>举报</span>

                                    @endif

                                    {{csrf_field()}}
                                    @if(auth()->check() && App\Enroll::ofEncroll(auth()->id(), $id_arr->id)->first())
                                    <a href="javascript:void(0);">
                                        我已报名
                                    </a>
                                    @else
                                        <a href="javascript:void(0);" onclick="return model(this)" >
                                            我要报名
                                        </a>
                                    @endif
                                </p>
                        </div>
                        <div class="zslbxqCon">
                           {!! htmlspecialchars_decode($id_arr->content) !!}
                            <div class="bdsharebuttonbox fenxiang" style="line-height: 30px;width: 130px;margin: 0 auto">
                                <a href="#" class="bds_more" data-cmd="more" style="display: none"></a>
                                <a style="background: none">分享到：</a>
                                <a href="javascript:void(0);"class="bds_sqq qqfx" data-cmd="sqq" title="分享到QQ好友"  style="height: 25px;display: inline-block"></a>
                                <a href="javascript:void(0);"class="bds_weixin wxfx" data-cmd="weixin" title="分享到微信"  style="height: 25px;display: inline-block"></a></div>

                            <div class="xyb">
                                @if($id_arr->previd>0)
                                    <a href="{{$id_arr->prevlink}}" style="float: left;font-weight: bold;color: #666666;">【上一篇】{{$id_arr->prev}}</a>
                                @else
                                    <a href="{{$id_arr->prevlink}}" style="float: left;font-weight: bold;color: #666666;">【已经是第一篇了】</a>
                                @endif
                                @if($id_arr->nextid>0)
                                    <a href="{{$id_arr->nextlink}}" style="float: right;font-weight: bold;color: #666666;">【下一篇】{{$id_arr->next}}</a>
                                @else
                                    <a href="{{$id_arr->nextlink}}" style="float: right;font-weight: bold;color: #666666;">【已经是最后一篇了】</a>
                                @endif
                            <div style="clear: both"></div>

                            </div>

                        </div>
                    </div>
                    <div class="zslbxqRight">
                        <div class="rmzstj">
                            <h4>热门证书推荐</h4>
                            @foreach($zhengshugood as $key=>$val)
                            <p @if($key<3) class="pp" @endif>
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$GLOBALS['tty_path'],$val['id'])}}">
                                    <i>{{$key+1}}</i>
                                    {{str_limit($val['title'],40,"...")}}
                                </a>
                            </p>
                            @endforeach
                        </div>
                        <div class="rmzstj">
                            <h4>近期活动</h4>
                            @foreach($huodonggood as $key=>$val)
                                @if($key==0)
                            <p>
                                <a href="{{u('news','recent',$val['id'])}}" > <img src="{{img($val['img1'])}}" style="width: 100%;"/></a>
                            </p>
                            <p class="pay">
                                <a href="{{u('news','recent',$val['id'])}}" style="color: #323333;font-size: 16px;">
                                    {{str_limit($val['title'],28,"...")}}
                                </a>
                            </p>
                            @else
                                    <p>
                                        <a href="{{u('news','recent',$val['id'])}}">
                                            【{{date("Y.m.d"),$val['sendtime']}}】 {{str_limit($val['title'],25,"...")}}
                                        </a>
                                    </p>
                            @endif
                            @endforeach
                        </div>
                        <div class="rmzstj">
                            <h4>在线培训</h4>
                            <div class="zxpx">
                                <a href="">
                                    <img src="/img/zxpx1.jpg"/>
                                    <div class="zxpx1">
                                        专业技术培训
                                    </div>
                                </a>
                            </div>
                            <div class="zxpx">
                                <a href="">
                                    <img src="/img/zxpx2.jpg"/>
                                    <div class="zxpx1">
                                        专业技术培训
                                    </div>
                                </a>
                            </div>
                            <div class="zxpx" style="margin-bottom: 0;">
                                <a href="">
                                    <img src="/img/zxpx3.jpg"/>
                                    <div class="zxpx1">
                                        专业技术培训
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
            @if(auth()->check() && auth()->user()->isPerson())
            <!-- 举报弹窗-->
                <div class="report-layer"> </div>
                <div class="report-mask form" action="{{route('jubao')}}">
                    <div class="report-form">
                        <p class="p1">
                            <span class="sp1">举报</span>
                            <span class="sp2"><img src="/img/shnegqingsucc1.jpg"/></span>
                        </p>
                        <br>
                        <p class="p2">
                            举报<span class="color-blue">{{$id_arr->qyname}}</span>发布的<span class="color-blue">{{$id_arr->title}}</span>职业证书信息
                            <!-- <select name=""> -->
                            <!-- <option value="">请选择培训课程</option> -->
                            <!-- </select> -->
                        </p><br>
                        <p class="p3">
                            <textarea name="content" rows="" cols="" placeholder="填写举报内容"></textarea>
                            <input type="hidden" name="business_name" value="{{$id_arr->qyname}}">
                            <input type="hidden" name="business_id" value="{{$id_arr->user_id}}">
                            <input type="hidden" name="person_id" value="{{auth()->check() ? auth()->id() : 0 }}">
                            <input type="hidden" name="job_id" value="{{$id_arr->id}}">
                            <input type="hidden" name="job_title" value="{{$id_arr->title}}">
                            {{csrf_field()}}
                        </p>
                    </div>
                    <div class="report-call">
                        <div class="report-call-left">
                            <p>
                                举报投诉电话：<i>{{$boot_config['link3']}}</i>
                            </p>
                            <p>
                                投诉邮箱：<i>{{$boot_config['email']}}</i>
                            </p>
                        </div>
                        <div onclick="model(this, '', function(){$('.report-form .sp2').click();})" class="report-call-right">
                            确定
                        </div>
                    </div>
                </div>
            @endif
@stop
        @section('scripts')
            @parent <script type="text/javascript" src="/js/jquery.js"></script>
            <script type="text/javascript" src="/js/alert.min.js"></script>
            <script type="text/javascript">
                /*
                 举报弹框*/
                var payHeight = $(document).height();
                $(".report-layer").height(payHeight);
                $(".report-btn").click(function(){
                    $(".report-layer").fadeIn("fast");
                    $(".report-mask").fadeIn("fast").css({
                        left: ($(window).width() - $('.report-mask').outerWidth())/2,
                        top: ($(window).height() - $('.report-mask').outerHeight())/2
                    });
                });
                $(".report-form .sp2").click(function(){
                    $(".report-layer").fadeOut("fast");
                    $(".report-mask").fadeOut("fast");
                });
            </script>
@stop

