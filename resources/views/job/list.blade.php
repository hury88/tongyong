@extends('layouts.master')

@section('title') @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/common_zhiyezhaopin.css"/>
    <link rel="stylesheet" type="text/css" href="/css/zhiyezhaopin.css"/>
    <link rel="stylesheet" type="text/css" href="/plugins/pop-up.css"/>
@stop
@section('bodyNextLabel')
    <body>
    <div class="pager-wrap personal-center" style="background: #f4f4f4;">
@stop
    @section('content')
        @section('breadcrumbs')
            <div class="sqzw">
                <!--banner-->
                <div class="recruitment-box">
                    <img src="{{$banimgsrc}}" style="width: 100%;"/>
                    <div class="recruitment-mess-box">
                        <h2><img src="/img/ziti-icon.png"/></h2>
                        <div class="recruitment-operate">
                            <ul>
                                <li><a href="{{u('register')}}"><b>1.学生/企业注册</b><span>……</span></a></li>
                                <li><a href="{{u('login')}}"><b>2.学生/企业登录</b><span>……</span></a></li>
                                @if(auth()->check())
                                    @if(auth()->user()->isPerson())
                                        <li><a href="{{u('person','jianli')}}"><b>3.学生发布简历/企业发布招聘</b></a></li>
                                    @else
                                        <li><a href="{{u('business','job','enterprise')}}"><b>3.学生发布简历/企业发布招聘</b></a></li>
                                    @endif
                                @else
                                    <li><a href="javascript:if(confirm('未登录,去登陆'))window.location.href='{{route('login'). _r_('?r=%s')}}'"><b>3.学生发布简历/企业发布招聘</b></a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="recruitment-linka">
                            @if(auth()->check())
                                @if(auth()->user()->isPerson())
                                    <a href="javascript:alert('只有个人会员才能发布招聘');">我要招聘</a>
                                @else
                                    <a href="{{u('business','resume')}}">我要招聘</a>
                                @endif
                            @else
                                <a href="javascript:if(confirm('未登录,去登陆'))window.location.href='{{route('login'). _r_('?r=%s')}}'">我要招聘</a>
                            @endif
                            @if(auth()->check())
                                @if(auth()->user()->isPerson())
                                    <a href="{{u('person','jianli')}}">发布简历</a>
                                @else
                                    <a href="javascript:alert('只有个人会员才能发布简历');">发布简历</a>
                                @endif
                            @else
                                <a href="javascript:if(confirm('未登录,去登陆'))window.location.href='{{route('login'). _r_('?r=%s')}}'">发布简历</a>
                            @endif
                        </div>
                    </div>

        @stop

                <!--搜素-->
                <div class="sqzwNav">
                    <div class="recruit-chose-box">
                        <form action="" method="get" id="seach">
                        <div class="search-person">
                            <div class="recruit-pull">
                                <p class="recruit-alltxt"> <i>关键字</i></p>
                            </div>

                            <input class="recruit-inp" placeholder="职位名称" name="title" value="{{$title}}" type="text" id="title" />
                            <a href="javascript:;" class="recruit-city">
                                <span id="citySpan">合肥</span>
                                <i id = "changeCity">+</i>
                            </a>
                        </div>
                        <div class="search-hagnye">
                            <input type="text" id="industryidname" placeholder="选择行业" value="@if($industryidarr&&$industryidarr[0]>0) @foreach($industryidarr as $vc) @if($loop->index==0) {{v_id($vc,'catname','nature')}} @else ,{{v_id($vc,'catname','nature')}} @endif @endforeach @endif" readonly/>
                            <a class="hangye-pull" id="hangye-pull1" href="javascript:void(0);">+</a>
                        </div>
                        <div class="search-hagnye">
                            <input type="text" id="positionidname" placeholder="选择职位" value="@if($positionidarr&&$positionidarr[0]>0) @foreach($positionidarr as $vc) @if($loop->index==0) {{v_id($vc,'catname','nature')}} @else ,{{v_id($vc,'catname','nature')}} @endif @endforeach @endif" readonly/>
                            <a class="hangye-pull" id="hangye-pull2" href="javascript:void(0);">+</a>
                        </div>
                        <div class="recruit-search-inp">
                            <input type="submit" value="搜索"/>
                        </div>
                        <div class="clearfix"></div>
                            <input type="hidden" name="salary" id="salary" value="{{$salary}}">
                            <input type="hidden" name="industryid" id="industryid" value="{{$industryid}}"/>
                            <input type="hidden" name="positionid" id="positionid" value="{{$positionid}}">
                            <input type="hidden" name="work_nature" id="work_nature" value="{{$work_nature}}">
                            <input type="hidden" name="nature" id="nature" value="{{$nature}}">
                            <input type="hidden" name="stime" id="stime" value="{{$stime}}">
                            <input type="hidden" name="experience" id="experience" value="{{$experience}}">
                            <input type="hidden" name="education" id="education" value="{{$education}}">
                            <input type="hidden" name="order" id="order" value="{{$order}}">
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
                <div class="zplbCon">
                    <div class="zplbTop">
                        <ul>
                            <?php $ccs=['18','15','16','18','20']?>
                            @foreach($sanlist as $key=>$val)
                            <li @if($key==4) class="last1" @endif>
                                <a href="{{u($GLOBALS['pid_path'],$val['path'])}}"  @if($GLOBALS['ty']==$val['id']) class="zplbon" @endif  style="padding: {{$ccs[$key]}}px 0;">
                                    <div class="zplbimg">
                                        <img src="/img/zplb{{$key+1}}.png"/>
                                    </div>
                                    <p>{{$val['catname']}}</p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="zplbban">
                        <img src="/img/zplb1.jpg" style="width: 100%;"/>
                    </div>
                    <!--开始-->
                    <div class="zplbxzwz">
                        <div class="zplbxzwz1">
                            您已选择：<img src="/img/sqzwwz.jpg"><i>合肥</i><img src="/img/zplbxx5.jpg">
                        </div>
                        <div class="zplbxzwz2">
                            <div class="zplbxzwz2a">
                                <div class="zplbxzwz2al">
                                    工作类型
                                </div>
                                <div class="zplbxzwz2ar work_nature">
                                    <span @if($work_nature<1) class="on" @endif>全部</span>
                                    @foreach($work_naturearr as $key=>$val)
                                    <span @if($key==$work_nature) class="on" @endif>{{$val}}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="zplbxzwz2a">
                                <div class="zplbxzwz2al">
                                    更  多
                                </div>
                                <div class="zplbxzwz2ar">
                                    <select class="nature">
                                        <option value="0">企业性质</option>
                                        @foreach($naturearr as $key=>$val)
                                            <option value="{{$key}}" @if($key==$nature) selected @endif>{{$val}}</option>
                                        @endforeach
                                    </select>
                                    <select class="salary">
                                        <option value="0">薪资</option>
                                        @foreach($salaryarr as $key=>$val)
                                            <option value="{{$key}}" @if($key==$salary) selected @endif>{{$val}}</option>
                                        @endforeach
                                    </select>
                                    <select class="experience">
                                        <option value="0">工作经验</option>
                                        @foreach($experiencearr as $key=>$val)
                                            <option value="{{$key}}" @if($key==$experience) selected @endif>{{$val}}</option>
                                        @endforeach
                                    </select>
                                    <select class="education">
                                        <option value="0">学历</option>
                                        @foreach($educationarr as $key=>$val)
                                            <option value="{{$key}}" @if($key==$education) selected @endif>{{$val}}</option>
                                        @endforeach
                                    </select>

                                    <select class="stime">
                                        <option value="0">发布时间</option>
                                        @foreach($stimearr as $key=>$val)
                                            <option value="{{$key}}" @if($key==$stime) selected @endif>{{$val}}</option>
                                        @endforeach
                                    </select>
                                    {{--<b>--}}
                                        {{--<a href=""><input type="checkbox" name="" id="" value="" />&nbsp;&nbsp;高学历</a>--}}
                                        {{--<a href=""><input type="checkbox" name="" id="" value="" />&nbsp;&nbsp;高工资</a>--}}
                                        {{--<a href=""><input type="checkbox" name="" id="" value="" />&nbsp;&nbsp;高技能</a>--}}

                                    {{--</b>--}}
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="zplbmr">
                        <a href="javascript:void(0);" data-id="0" @if($order<1) class="zplbmron" @endif>默认</a>
                        <a href="javascript:void(0);" data-id="1" @if($order==1) class="zplbmron" @endif>最新发布职位 </a>
                        <a href="javascript:void(0);" data-id="2" @if($order==2) class="zplbmron" @endif>高薪推荐职位 </a>
                        <a href="javascript:void(0);" data-id="3" @if($order==3) class="zplbmron" @endif>热门招聘职位</a>
                    </div>
                    <!--结束-->
                    <p style="color: #999999;padding: 20px 0;">共123456家高端招聘信息</p>
                    <div class="zplbxx">
                        <ul>
                            @foreach($pagenewslist['data'] as $val)
                            <li>
                                <div class="zplbxxl">
                                    @if($val['user_id']>0)
                                        <a href="{{u('training','business',$val['user_id'])}}"><img src="{{img($val['logo'])}}"/></a>
                                    @else
                                        <a href="{{u('training','business',0)}}"><img src="{{img($boot_config['logo1'])}} "/></a>
                                    @endif
                                </div>
                                <div class="zplbxxc">
                                    <a href="{{u('job',$GLOBALS['ty_path'],$val['id'])}}"><p class="p1">{{$val['title']}}</p></a>
                                    <p class="p2"><i>{{config('config.business.salary.'.$val['salary'])}}</i>  |   合肥   |  {{config('config.business.work_nature.'.$val['work_nature'])}}   |  {{config('config.business.education.'.$val['education'])}}  |    {{config('config.business.experience.'.$val['experience'])}}</p>
                                    @if($val['user_id']==0)
                                    <?php $val['business_name'] = '平台发布' ?>
                                    @endif
                                    <p class="p3">{{$val['business_name']}} ---{{v_id(v_id($val['industryid'],'pid','nature'),'catname','nature')}}</p>

                                    <p class="p4">
                                        @foreach(explode(',',$val['relative']) as $v)
                                        <span>{{config('config.business.relative.'.$v)}}</span>
                                        @endforeach
                                    </p>
                                </div>
                                <div class="zplbxxr">
                                    <?php
                                    $cs=time()-$val['sendtime'];
                                    if($cs<3600){
                                        $as='一小时内发布';
                                    }elseif($cs<3600*24){
                                        $as='今天发布';
                                    }else{
                                        $as=date('Y-m-d',$val['sendtime']).'发布';
                                    }
                                    ?>
                                    <p>{{$as}}</p>
                                    @if(auth()->check())
                                        @if(auth()->user()->isPerson())
                                        <a class="shenqingzhiwei17" recruit_id="{{$val['id']}}" business_name="{{$val['business_name']}}" href="javascript:;">申请职位</a>
                                        @else
                                        <a href="javascript:alert('只有个人会员才能申请职位');">申请职位</a>
                                        @endif
                                    @else
                                    <a href="javascript:if(confirm('未登录,去登陆'))window.location.href='{{route('login'). _r_('?r=%s')}}'">申请职位</a>
                                    @endif
                                </div>
                            </li>
                              @endforeach
                        </ul>
                        @include('partial.paginator')
                        <div class="zhuyi">
                            <i>注意：</i>提示凡在中国职业培训网发布信息的企业不会以任何形式向求职者收取报名费、抵押金、保证金等费用。举报投诉电话：400-000-0000
                        </div>
                    </div>
                </div>
            </div>
            <div class="gap" style="height: 40px;"></div>


            <div class="jobselect-cover"></div>
            <div class="jobselect-mask" id="xzhy">

                <h2>选择行业<span>最多只能选择五个 ！</span><a href="javascript:;" class="job-close"></a></h2>
                <div class="job-result clearfix">
                    <p class="job-notice fl">您的选择结果：</p>
                    <ul class="fl">
                        @if(is_array($industryidarr)) @foreach($industryidarr as $vc) <li>{{v_id($vc,'catname','nature')}}<i class="job-selected-icon" data-id="{{$vc}}"></i></li> @endforeach @endif
                    </ul>
                </div>
                <div class="job-lists-box">
                    <div class="job-lists-content fl" style="display:block;width: 100%">
                        @foreach($industryids[0] as $k=>$v)
                            <div class="job-lists-dv" style="width: 525px;margin: auto 5px;">
                                <p class="job-big-type" title="{{$v}}"><i class="big-type-icon"></i>{{$v}}</p>
                                <ul class="job-small-type" style="width: 97%;">
                                    @foreach($industryids[$k] as $k1=>$v1)
                                        <li class="c{{$k1}} @if(in_array($k1,$industryidarr)) select-item @endif" data-id="{{$k1}}" style="width: 45%;float: left">{{$v1}}</li>
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
                        @if($positionidarr&&$positionidarr[0]>0)  @foreach($positionidarr as $vc) <li>{{v_id($vc,'catname','nature')}}<i class="job-selected-icon" data-id="{{$vc}}"></i></li> @endforeach @endif
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
                                    <ul class="job-small-type" style="max-height: 195px;overflow-y: auto">
                                        @foreach($positionids[$k] as $k1=>$v1)
                                            <li class="c{{$k1}} @if(in_array($k1,$positionidarr)) select-item @endif" data-id="{{$k1}}">{{$v1}}</li>
                                        @endforeach
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
@stop {{-- end content --}}


@section('footer')
  @parent

            <script type="text/javascript" src="/js/jquery-1.10.1.min.js"></script>
            <script type="text/javascript" src="/js/3.js"></script>
            <script type="text/javascript">

                $(".gkey").click(function () {
                    var ss=$(this).text()
                    $('#title').val(ss)
                    $("#seach").submit()
                })
                $('.work_nature span').click(function(){
                    $('.work_nature span').removeClass("on")
                    $(this).addClass("on")
                    ss=$(this).data('id')
                    $('#work_nature').val(ss)
                    $("#seach").submit()
                })
                $(".nature").change(function () {
                    var ss=$(this).val()
                    $("#nature").val(ss)
                    $("#seach").submit()
                })
                $(".salary").change(function () {
                    var ss=$(this).val()
                    $("#salary").val(ss)
                    $("#seach").submit()
                })
                $(".experience").change(function () {
                    var ss=$(this).val()
                    $("#experience").val(ss)
                    $("#seach").submit()
                })
                $(".education").change(function () {
                    var ss=$(this).val()
                    $("#education").val(ss)
                    $("#seach").submit()
                })
                $(".stime").change(function () {
                    var ss=$(this).val()
                    $("#stime").val(ss)
                    $("#seach").submit()
                })
            </script>

@stop

@section('scripts')
  @parent
@include('partial.dialog')
<script>
    //*申请职位弹框*/
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
