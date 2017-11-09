@extends('layouts.master')

@section('title') {{$id_arr->title}} - @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/common_zhiyepeixun.css"/>
    <link rel="stylesheet" type="text/css" href="/css/zhiyepeixun.css"/>
    <link rel="stylesheet" type="text/css" href="/plugins/report.css"/>
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
                    @if($id_arr->img2)
                    <img src="{{img($id_arr->img2)}}"/>
                    @else
                        <img src="/uploadfile/upload/2017110121384026.jpg"/>
                    @endif
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
                            @if(auth()->check())
                                @if(auth()->user()->isPerson())
                                <!-- <a class="jinggao report-btn" style="color: #666666;">举报</a> -->
                                <a href="javasript:javascript:;" class="jbd report-btn"><img src="/img/jbd.jpg"/>举报</a>
                                @else
                                <!-- <a href="javascript:alert('只有个人会员才能举报');" class="jinggao" style="color: #666666;">举报</a> -->
                                <a href="javascript:alert('只有个人会员才能举报');" class="jbd"><img src="/img/jbd.jpg"/>举报</a>
                                @endif
                            @else
                            <!-- <a href="javascript:if(confirm('未登录,去登陆后再来举报'))window.location.href='{{route('login'). _r_('?r=%s')}}';" class="jinggao" style="color: #666666;">举报</a> -->
                            <a href="javascript:if(confirm('未登录,去登陆后再来举报'))window.location.href='{{route('login'). _r_('?r=%s')}}'" class="jbd"><img src="/img/jbd.jpg"/>举报</a>
                            @endif
                        </div>
                        @if(auth()->check() && App\Order::ofEncroll(auth()->id(), $id_arr->id)->first())
                        <div class="dagang1Right1_2">
                            <a href="javascript:void(0);" class="aaa2">已报名</a>
                        </div>
                        @else
                        <div class="dagang1Right1_2 form" action="{{route('orders.create', $id_arr->id)}}">
                            <a href="javascript:void(0);" class="aaa1">免费试看</a>
                            {{csrf_field()}}
                            <a href="javascript:;" onclick="return model(this)" class="aaa2">我要报名</a>
                        </div>
                        @endif
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
                    <li class="dagang2Tit-li-on">
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
                    @if($id_arr->user_id>0)
                    <div class="dagang2ConRight1">
                        <p class="pp1">
                            <img src="{{img($userinfo[0]['logo'])}}"/>
                        </p>
                        <p class="pp2">{{$userinfo[0]['business_name']}}</p>
                        <p class="pp3">{!! $userinfo[0]['business_introduction']!!}</p>
                    </div>
                    @elseif(env('APP_DEBUG'))
                        <div class="dagang2ConRight1">
                            <p class="pp1">
                                <img src="/img/dagang3.jpg"/>
                            </p>
                            <p class="pp2">领航平台</p>
                            <p class="pp3">领航平台，由于客源所投资20万人民币和11位科技人员创办，现已发展为一家信息多元化发展的大型企业，富有长新华科技有限公司...</p>
                        </div>
                    @endif
                    <div class="interst">
                        <div class="interstTit">
                            <?php function get_turl($ty,$id){
                                if($ty==28){
                                    return u("training",'skill',$id);
                                }elseif($ty==65){
                                    return u("training",'enterprise',$id);
                                }elseif($ty==66){
                                    return u("training",'online',$id);
                                }
                            }
                            ?>
                            <h3>你可能还感兴趣的课程</h3>
                            <ul>

                                @foreach($qiyegood as $val)
                                <li>

                                    <div class="interstImg">
                                        <a href="{{get_turl($val['ty'],$val['id'])}}"><img src="{{img($val['img1'])}}" width="100%"/></a>
                                        <div class="interstImg1">
                                            <a href="{{get_turl($val['ty'],$val['id'])}}"><img src="/img/xlsys2.png"/></a>
                                        </div>
                                        <div class="interstTxt">
                                            {{$val['introduce']}}
                                        </div>
                                    </div>
                                    <p class="jiangong"><a href="{{get_turl($val['ty'],$val['id'])}}">工具建工技师高级技师...</a></p>
                                    <p class="jiangong1">
                                        <span>￥{{$val['price']}}</span>
                                        <a href="{{get_turl($val['ty'],$val['id'])}}">
                                            <i>{{$val['enroll_num']}}</i>
                                            人已报名
                                        </a>
                                    </p>
                                </li>
                                @endforeach

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
        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript">
            $(".dagang2Tit li").click(function(){
                var i = $(this).index();
                $(this).addClass("dagang2Tit-li-on").siblings(".dagang2Tit li").removeClass("dagang2Tit-li-on");
                $(".dagang2Con .dagang2ConLeft").eq(i).show().siblings(".dagang2Con .dagang2ConLeft").hide();
            });
        </script>
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
            <p class="p2">
                举报<span class="color-blue">{{$id_arr->qyname}}</span>发布的<span class="color-blue">{{$id_arr->title}}</span>培训
                <!-- <select name=""> -->
                    <!-- <option value="">请选择培训课程</option> -->
                <!-- </select> -->
            </p>
            <p class="p3">
                <textarea name="content" rows="" cols="" placeholder="填写举报内容"></textarea>
                <input type="hidden" name="business_name" value="{{$id_arr->qyname}}">
                <input type="hidden" name="business_id" value="{{$id_arr->user_id}}">
                <input type="hidden" name="person_id" value="{{auth()->check() ? auth()->id() : 0 }}">
                <input type="hidden" name="job_id" value="{{$id_arr->id}}">
                <input type="hidden" name="ext" value="培训">
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

    @stop {{-- end content --}}


    @section('footer')
    @parent
    @stop

    @section('scripts')
    @parent <script type="text/javascript" src="/js/alert.min.js"></script>
    <script>
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
