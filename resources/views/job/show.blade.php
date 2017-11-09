@extends('layouts.master')

@section('title') {{$id_arr->title}} - @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/common_zhiyezhaopin.css"/>
    <link rel="stylesheet" type="text/css" href="/css/zhiyezhaopin.css"/>
    <link rel="stylesheet" type="text/css" href="/plugins/pop-up.css"/>
    <link rel="stylesheet" type="text/css" href="/plugins/report.css"/>
    <style>
        .color-blue {color:#3481bc !important}
    </style>
@stop
@section('bodyNextLabel')
    <body>
    <div class="pager-wrap personal-center" style="background: #f4f4f4;">
    @stop
    @section('content')
            <div class="sqzw">
                <!--搜素-->
                <div class="sqzwNav">
                    <div class="recruit-chose-box">
                        <form action="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'])}}" method="get" id="seach">
                            <div class="search-person">
                                <div class="recruit-pull">
                                    <p class="recruit-alltxt"> <i>关键字</i></p>
                                </div>

                                <input class="recruit-inp" placeholder="职位名称" name="title" value="" type="text" id="title" />
                                <a href="javascript:;" class="recruit-city">
                                    <span id="citySpan">合肥</span>
                                    <i id = "changeCity">+</i>
                                </a>
                            </div>
                            <div class="search-hagnye">
                                <input type="text" id="industryidname" placeholder="选择行业" value="" readonly/>
                                <a class="hangye-pull" id="hangye-pull1" href="javascript:void(0);">+</a>
                            </div>
                            <div class="search-hagnye">
                                <input type="text" id="positionidname" placeholder="选择职位" value="" readonly/>
                                <a class="hangye-pull" id="hangye-pull2" href="javascript:void(0);">+</a>
                            </div>
                            <div class="recruit-search-inp">
                                <input type="submit" value="搜索"/>
                            </div>
                            <div class="clearfix"></div>
                            <input type="hidden" name="industryid" id="industryid" value="0"/>
                            <input type="hidden" name="positionid" id="positionid" value="0">
                        </form>
                    </div>
                    <div class="sqzwNavlist">
                        <p>
                            @foreach(explode("|",$boot_config['link4']) as $val)
                                @if($loop->index<15)
                                    <a href="javascript:void(0);" class="gkey">{{$val}}</a>
                                @endif
                            @endforeach
                        </p>
                    </div>
                </div>
                <!-- 内容-->

                <div class="sqzwCon">
                    <div class="kyfdtop">
                        <img src="/img/zstop.jpg"/>
                        <span>所在位置：</span>
                        <a href="/">首页></a>>
                        <a href="{{u($GLOBALS['pid_path'])}}">{{$GLOBALS['pid_data']->catname}}</a>>
                        <a href="{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'])}}">{{$GLOBALS['ty_data']->catname}}</a>>
                        <a href="javascript:void(0);">{{$id_arr->title}}</a>
                    </div>
                    <div class="sqzwAll">
                   @if($userinfo)
                            <div class="sqzwleft">
                                <img src="{{img($userinfo[0]['logo'])}}"/>
                                <div class="lxgs">
                                    <h3>{{$userinfo[0]['business_name']}}</h3>
                                    <p>规模：{{config('config.business.size.'.$userinfo[0]['size'])}}</p>
                                    <p>行业：{{v_id($userinfo[0]['cate'],'catname','nature')}}</p>
                                    <p>性质：{{config('config.business.nature.'.$userinfo[0]['nature'])}}</p>
                                    <p>官网：<a href="{{$userinfo[0]['siteurl']}}" target="_blank">点击进入官网</a></p>
                                    <p>地址：{{$userinfo[0]['location']}}</p>
                                    <p class="map"><img src="/img/sqzwmap.jpg"/></p>
                                </div>
                                <div class="gszw">
                                    <h3>该企业的其他职位</h3>
                                    <?php $relative = config('config.business.relativ'); ?>
                                    @foreach($joblist as $val)
                                        <p>
                                            <?php $ds=explode(',',$val['relative']);$i=0?>
                                            <i></i>
                                            <a href="{{u('job',$GLOBALS['ty_path'],$val['id'])}}">&nbsp;{{$val['title']}}</a>
                                            <span>(@foreach($ds as $tab)
                                                     <?php
                                                        if(!isset($relative[$tab])){
                                                            continue;
                                                        }
                                                        echo $relative[$tab];
                                                        ++$i;
                                                        if($i==5)break;
                                                    ?>
                                                     {{$relative}}
                                                @endforeach)</span>
                                        </p>
                                        @endforeach
                                </div>
                                <div class="sqzwsys">
                                    <div class="sqzwsysleft">
                                        <img src="{{img($boot_config['img1'])}}"/>
                                    </div>
                                    <div class="sqzwsysright">
                                        <p>扫一扫</p>
                                        <p>立即分享该职位</p>
                                    </div>
                                </div>
                            </div>
                    @else
                        <div class="sqzwleft">
                            <a href="{{u('about','contact')}}" style="width: 100%"><img src="{{img($boot_config['logo1'])}}"/></a>
                            <div class="lxgs">
                                <h3></h3>
                            </div>
                            <div class="gszw">
                                <h3>其他职位</h3>

                                @foreach($joblist as $val)
                                <p>
                                    <?php $ds=explode(',',$val['relative']);?>
                                    <i></i>
                                    <a href="{{u('job',$GLOBALS['ty_path'],$val['id'])}}">&nbsp;{{$val['title']}}</a>
                                <span>(@foreach($ds as $tab)
                                    <?php
                                    if(!isset($relative[$tab])){
                                        continue;
                                    }
                                    echo $relative[$tab];
                                    ++$i;
                                    if($i==5)break;
                                    ?>
                                    {{$relative}}
                                 @endforeach)</span>
                                </p>
                                @endforeach
                            </div>
                            <div class="sqzwsys">
                                <div class="sqzwsysleft">
                                    <img src="{{img($boot_config['img1'])}}"/>
                                </div>
                                <div class="sqzwsysright">
                                    <p>扫一扫</p>
                                    <p>关注我们</p>
                                </div>
                            </div>
                        </div>
                    @endif
                        <div class="sqzwright">
                            <div class="sqzwright1">
                                <div class="wangye">
                                    <span>{{$id_arr->title}}</span>
                                    @if(auth()->check())
                                        @if(auth()->user()->isPerson())
                                        <a class="shenqingzhiwei17" recruit_id="{{$id_arr->id}}" business_name="{{$userinfo[0]['business_name']}}" href="javascript:;">申请职位</a>
                                        @else
                                        <a href="javascript:alert('只有个人会员才能申请职位');">申请职位</a>
                                        @endif
                                    @else
                                    <a href="javascript:if(confirm('未登录,去登陆'))window.location.href='{{route('login'). _r_('?r=%s')}}'">申请职位</a>
                                    @endif

                                    <!-- <a href="javascript:;" class="shenqingzhiwei17">申请职位</a> -->
                                </div>
                                <div class="sqzwwz">
                                    <img src="/img/sqzwwz.jpg"/>
                                    <a href="">合肥</a>
                                    <i>1小时前发布</i>
                                    <span>
            	 				<img src="/img/sqzwsc.jpg"/>
            	 				<a href="">收藏</a>
            	 				<img src="/img/sqzwfx.jpg"/>
            	 				<a href="">分享</a>
            	 			</span>
                                </div>

                            </div>
                            <div class="sqwzgap"></div>
                            <div class="sqzwright2">
                                <div class="sqzwright2a">
                                    <div class="sqzwright2l">
                                        职位亮点
                                    </div>
                                    <div class="sqzwright2r">
                                        <span>10k-15k/月</span>
                                        <span>五险一金</span>
                                        <span>带薪年假</span>
                                        <span>优秀团队</span>
                                        <span>办公环境好</span>
                                        <span>周末双休</span></br>
                                        <span>免费体检</span>
                                        <span>试用期全新</span>
                                    </div>
                                </div>
                                <div class="sqzwright2a">
                                    <div class="sqzwright2l">
                                        职位要求
                                    </div>
                                    <div class="sqzwright2r">
                                        <span>3年以上工作经验</span>
                                        <span>接受应届生</span>
                                        <span>本科及以上</span>
                                        <span>行业：互联网&nbsp;游戏&nbsp;软件</span>
                                        <span>全职</span>
                                    </div>
                                </div>
                                <div class="sqzwright2a1">
                                    <div class="sqzwright2l1">
                                        <img src="/img/sqzwhr.jpg"/>
                                    </div>
                                    <div class="sqzwright2c1">
                                        <p class="p1"><i>HR</i>&nbsp;45623153</p>
                                        <p>联想集团有限公司&nbsp;&nbsp;|&nbsp;&nbsp;在招职位</p>
                                    </div>
                                    <div class="sqzwright2r1">
                                        <img src="/img/zxgt.jpg"/>
                                        <a href="">在线沟通</a>
                                    </div>
                                </div>
                                <div class="zwjs">
                                    <h4>职位介绍</h4>
                                    {!!$id_arr->content!!}
                                    <div class="jubao">
                                        <div class="jubaoleft">
                                            注意：提供凡在中国职业培训王提供凡在中国职业培训王提供凡在中国职业培训王
                                        </div>
                                        <div class="jubaoright">
                                            <img src="/img/sqzwjb.jpg"/>
                                            @if(auth()->check())
                                                @if(auth()->user()->isPerson())
                                                <a class="jinggao report-btn" style="color: #666666;">举报</a>
                                                @else
                                                <a href="javascript:alert('只有个人会员才能举报');" class="jinggao" style="color: #666666;">举报</a>
                                                @endif
                                            @else
                                            <a href="javascript:if(confirm('未登录,去登陆后再来举报'))window.location.href='{{route('login'). _r_('?r=%s')}}';" class="jinggao" style="color: #666666;">举报</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sqwzgap"></div>
                            <div class="likezw">
                                <p class="likezw1"><img src="/img/like1.jpg"/><span>您感兴趣的职位</span></p>
                                <p class="likezw2">
                                    <input type="checkbox" name="" id="" value="" />全选
                                    <a href="">申请职位</a>
                                </p>
                            </div>
                            <ul class="zhiwei">
                                <li>
                                    <div class="zhiwei1">
                                        <input type="checkbox" name="" id="" value="" />
                                    </div>
                                    <div class="zhiwei2">
                                        <p class="pa1">财务会计助理</p>
                                        <p><i>3000-4000元&nbsp;&nbsp;|&nbsp;&nbsp;合肥&nbsp;&nbsp;|&nbsp;&nbsp;全职&nbsp;&nbsp;|&nbsp;&nbsp;本科&nbsp;&nbsp;|&nbsp;&nbsp;3年及以上工作经验</i></p>
                                        <p>安徽信息科技有限公司</p>
                                    </div>
                                    <div class="zhiwei3">
                                        <a href="">申请职位</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="zhiwei1">
                                        <input type="checkbox" name="" id="" value="" />
                                    </div>
                                    <div class="zhiwei2">
                                        <p class="pa1">财务会计助理</p>
                                        <p><i>3000-4000元&nbsp;&nbsp;|&nbsp;&nbsp;合肥&nbsp;&nbsp;|&nbsp;&nbsp;全职&nbsp;&nbsp;|&nbsp;&nbsp;本科&nbsp;&nbsp;|&nbsp;&nbsp;3年及以上工作经验</i></p>
                                        <p>安徽信息科技有限公司</p>
                                    </div>
                                    <div class="zhiwei3">
                                        <a href="">申请职位</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="zhiwei1">
                                        <input type="checkbox" name="" id="" value="" />
                                    </div>
                                    <div class="zhiwei2">
                                        <p class="pa1">财务会计助理</p>
                                        <p><i>3000-4000元&nbsp;&nbsp;|&nbsp;&nbsp;合肥&nbsp;&nbsp;|&nbsp;&nbsp;全职&nbsp;&nbsp;|&nbsp;&nbsp;本科&nbsp;&nbsp;|&nbsp;&nbsp;3年及以上工作经验</i></p>
                                        <p>安徽信息科技有限公司</p>
                                    </div>
                                    <div class="zhiwei3">
                                        <a href="">申请职位</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="zhiwei1">
                                        <input type="checkbox" name="" id="" value="" />
                                    </div>
                                    <div class="zhiwei2">
                                        <p class="pa1">财务会计助理</p>
                                        <p><i>3000-4000元&nbsp;&nbsp;|&nbsp;&nbsp;合肥&nbsp;&nbsp;|&nbsp;&nbsp;全职&nbsp;&nbsp;|&nbsp;&nbsp;本科&nbsp;&nbsp;|&nbsp;&nbsp;3年及以上工作经验</i></p>
                                        <p>安徽信息科技有限公司</p>
                                    </div>
                                    <div class="zhiwei3">
                                        <a href="">申请职位</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="zhiwei1">
                                        <input type="checkbox" name="" id="" value="" />
                                    </div>
                                    <div class="zhiwei2">
                                        <p class="pa1">财务会计助理</p>
                                        <p><i>3000-4000元&nbsp;&nbsp;|&nbsp;&nbsp;合肥&nbsp;&nbsp;|&nbsp;&nbsp;全职&nbsp;&nbsp;|&nbsp;&nbsp;本科&nbsp;&nbsp;|&nbsp;&nbsp;3年及以上工作经验</i></p>
                                        <p>安徽信息科技有限公司</p>
                                    </div>
                                    <div class="zhiwei3">
                                        <a href="">申请职位</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="zhiwei1">
                                        <input type="checkbox" name="" id="" value="" />
                                    </div>
                                    <div class="zhiwei2">
                                        <p class="pa1">财务会计助理</p>
                                        <p><i>3000-4000元&nbsp;&nbsp;|&nbsp;&nbsp;合肥&nbsp;&nbsp;|&nbsp;&nbsp;全职&nbsp;&nbsp;|&nbsp;&nbsp;本科&nbsp;&nbsp;|&nbsp;&nbsp;3年及以上工作经验</i></p>
                                        <p>安徽信息科技有限公司</p>
                                    </div>
                                    <div class="zhiwei3">
                                        <a href="">申请职位</a>
                                    </div>
                                </li>
                            </ul>

                        </div>



                    </div>
                </div>









            </div>

    @stop {{-- end content --}}


    @section('footer')
            <div class="jobselect-cover"></div>
            <div class="jobselect-mask" id="xzhy">
                <h2>选择行业<span>最多只能选择五个 ！</span><a href="javascript:;" class="job-close"></a></h2>
                <div class="job-result clearfix">
                    <p class="job-notice fl">您的选择结果：</p>
                    <ul class="fl">

                    </ul>
                </div>
                <div class="job-lists-box">

                    <div class="job-lists-content fl" style="display:block">

                        @foreach($industryids[0] as $k=>$v)
                            <div class="job-lists-dv">
                                <p class="job-big-type" title="{{$v}}"><i class="big-type-icon"></i>{{$v}}</p>
                                <ul class="job-small-type">
                                    @foreach($industryids[$k] as $k1=>$v1)
                                        <li class="c{{$k1}}" data-id="{{$k1}}">{{$v1}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="job-operate">
                    <a class="operate-comfirm" href="javascript:;">确定</a>
                    <a class="operate-reset" href="javascript:;">取消</a>
                </div>
            </div>
            <div class="jobselect-mask" id="xzzw">
                <h2>选择职位<span>最多只能选择五个 ！</span><a href="javascript:;" class="job-close"></a></h2>
                <div class="job-result clearfix">
                    <p class="job-notice fl">您的选择结果：</p>
                    <ul class="fl">
                    </ul>
                </div>

                <div class="job-lists-box">
                    <div class="job-menu fl" style="overflow: auto">
                        <ul>
                            @foreach($positionids[0] as $key=>$val)
                                <li class=" @if($loop->index==0) job-select-icon @endif " >{{$val}}</li>
                            @endforeach
                        </ul>
                    </div>

                    @foreach($positionids[0] as $key=>$val)

                        <div class="job-lists-content fl" @if($loop->index==0) style="display:block" @else style="display:none" @endif>

                            @foreach($positionids[$key] as $k=>$v)
                                <div class="job-lists-dv">
                                    <p class="job-big-type" title="{{$v}}"><i class="big-type-icon"></i>{{$v}}</p>
                                    <ul class="job-small-type">
                                        @if($k<390)
                                            @foreach($positionids[$k] as $k1=>$v1)
                                                <li class="c{{$k1}}" data-id="{{$k1}}">{{$v1}}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
                <div class="job-operate">
                    <a class="operate-comfirm" href="javascript:;">确定</a>
                    <a class="operate-reset" href="javascript:;">取消</a>
                </div>
            </div>
            @if(auth()->check() && auth()->user()->isPerson())
            <div class="layer-popup"> </div>
            <div class="tip-popup">
                <div class="shengqingtiptop-pop">
                    <span>申请职位</span>
                    <a class="close"></a>
                </div>
                <div class="shengqingtipbom-pop form" action="{{route('job.request')}}">
                    <div class="shengqingtipbom1-pop">
                        <input type="hidden" name="business_name" id="business_name">
                        <input type="hidden" name="recruit_id" id="recruit_id">
                        {{csrf_field()}}
                        <span class="applyjob-intro"><b>*</b>选择简历</span>
                        <select class="apply-jobselect" name="cvs_id">
                            @foreach(auth::user()->hasManyCVS()->get(['id','nid'])->toArray() as $v)
                            <option value="{{$v['id']}}">{{$v['nid']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- <div class="shengqingtipbom2-pop">
                        <span class="applyjob-intro"><b>*</b>验证码</span>
                        <div class="apply-job-inp">
                            <input type="text" name="" id="" value="" placeholder="请填写验证码"/>
                            <img src="/img/apply-img_01.jpg"/>
                        </div>
                    </div>-->
                    <div class="apply-submit"><input onclick="return job(this)" type="submit" value="投递简历"/></div>
                </div>
            </div>

            @endif

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
                        举报<span class="color-blue">{{$userinfo[0]['business_name']}}</span>发布的<span class="color-blue">{{$id_arr->title}}</span>职位
                        <!-- <select name=""> -->
                            <!-- <option value="">请选择培训课程</option> -->
                        <!-- </select> -->
                    </p>
                    <p class="p3">
                        <textarea name="content" rows="" cols="" placeholder="填写举报内容"></textarea>
                        <input type="hidden" name="business_name" value="{{$userinfo[0]['business_name']}}">
                        <input type="hidden" name="business_id" value="{{$userinfo[0]['user_id']}}">
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
                            投诉邮箱：<i>65432789@qq.com</i>
                        </p>
                    </div>
                    <div onclick="model(this, '', function(){$('.report-form .sp2').click();})" class="report-call-right">
                        确定
                    </div>
                </div>
            </div>
    @parent
    @stop

    @section('scripts')
    @parent <script type="text/javascript" src="/js/jquery.js"></script>
            <script type="text/javascript" src="/js/3.js"></script>
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

                /*
                 申请职位弹框*/
                var payHeight = $(document).height();
                $(".layer-popup").height(payHeight);
                $(".shenqingzhiwei17").click(function(){
                    $("#business_name").val($(this).attr("business_name"))
                    $("#recruit_id").val($(this).attr("recruit_id"))
                    $(".layer-popup").fadeIn("fast");
                    $(".tip-popup").fadeIn("fast").css({
                        left: ($(window).width() - $('.tip-popup').outerWidth())/2,
                        top: ($(window).height() - $('.tip-popup').outerHeight())/2
                    });
                });

                $(".shengqingtiptop-pop .close").click(function(){
                    $(".layer-popup").fadeOut("fast");
                    $(".tip-popup").fadeOut("fast");
                });
                function job(obj)
                {
                    $(".layer-popup").fadeOut("fast");
                    $(".tip-popup").fadeOut("fast");
                    return model(obj);
                }
            </script>
    @stop
