@extends('layouts.master')

@section('title') @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/common_zhiyezhaopin.css"/>
    <link rel="stylesheet" type="text/css" href="/css/zhiyezhaopin.css"/>
@stop
@section('bodyNextLabel')
    <body>
    <div class="pager-wrap personal-center" style="background: #f4f4f4;">
@stop
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
    @section('content')

                <!--搜素-->
                <div class="sqzwNav">
                    <div class="recruit-chose-box">
                        <div class="search-person">
                            <div class="recruit-pull">
                                <p class="recruit-alltxt"> <i>关键字</i></p>
                            </div>
                            <input class="recruit-inp" placeholder="职位名称" type="text" />
                            <a href="javascript:;" class="recruit-city">
                                <span id="citySpan">合肥</span>
                                <i id = "changeCity">+</i>
                            </a>
                        </div>
                        <div class="search-hagnye">
                            <input type="text" placeholder="选择行业" readonly/>
                            <a class="hangye-pull" id="hangye-pull1" href="javascript:;">+</a>
                        </div>
                        <div class="search-hagnye">
                            <input type="text" placeholder="选择职位" readonly/>
                            <a class="hangye-pull" id="hangye-pull2" href="javascript:;">+</a>
                        </div>
                        <div class="recruit-search-inp">
                            <input type="submit" value="搜索"/>
                        </div>
                        <div class="clearfix"></div>
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
                        <img src="img/zplb1.jpg" style="width: 100%;"/>
                    </div>
                    <!--开始-->
                    <div class="zplbxzwz">
                        <div class="zplbxzwz1">
                            您已选择：<img src="img/sqzwwz.jpg"><i>合肥</i><img src="img/zplbxx5.jpg">
                        </div>
                        <div class="zplbxzwz2">
                            <div class="zplbxzwz2a">
                                <div class="zplbxzwz2al">
                                    更  多
                                </div>
                                <div class="zplbxzwz2ar">
                                    <select name="">
                                        <option value="">工作年限</option>
                                        <option value="">工作年限</option>
                                        <option value="">工作年限</option>
                                        <option value="">工作年限</option>
                                    </select>
                                    <select name="">
                                        <option value="">学历</option>
                                        <option value="">学历</option>
                                        <option value="">学历</option>
                                        <option value="">学历</option>
                                    </select>
                                    <select name="">
                                        <option value="">更新日期</option>
                                        <option value="">更新日期</option>
                                        <option value="">更新日期</option>
                                        <option value="">更新日期</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--结束-->
                    <p style="color: #999999;padding: 20px 0;">共123456家高端招聘信息</p>
                    <div class="qzzptAll">
                        <div class="qzzpt">
                            <ul>
                                <li>求职者</li>
                                <li>职位名称</li>
                                <li>学历</li>
                                <li>性别</li>
                                <li>职位类型</li>
                                <li>现居住地</li>
                                <li>更新时间</li>
                            </ul>
                        </div>
                        <div class="qzzptCon">
                            <ul class="qzzptTit">
                                <li>张**</li>
                                <li class="kefu">客服<i></i></li>
                                <li>大专</li>
                                <li>女</li>
                                <li>全职</li>
                                <li>辽宁-大连</li>
                                <li>17-07-05</li>
                            </ul>
                            <div class="qzzptTxt" style="display: none;">
                                <div class="qzzptTxtl">
                                    <p><img src="img/zqzpt3.jpg"/></p>
                                    <a href="">更多详情</a>
                                </div>
                                <div class="qzzptTxtr">
                                    <p>居住地：辽宁-大连      期望月薪：2001-4000元/月     婚姻状况：未婚</p>
                                    <p>当前状态：我目前处于离职状态，可立即上岗</p>
                                    <p class="gongzuo">工作经验</p>
                                    <p>1、2014-01 ～ 2017-06大连亿达物业管理有限公司（3年5个月）-  |   客服  |  2001-4000元/月</p>
                                    <p>2、2014-01 ～ 2017-06大连亿达物业管理有限公司（3年5个月）-  |   客服  |  2001-4000元/月</p>
                                    <p class="gongzuo">工作描述</p>
                                    <p>通过接到业主的一些电话报修、来为业主解决问题、以及后续的一些跟踪回访、知道业主达到满意为主、通过这份工作、充分的锻炼了个人的</p>
                                    <p>意志、和对客户的沟通能力以及服务的意识。</p>
                                    <p class="gongzuo">最高学历</p>
                                    <p>2011-09 ～ 2014-07    大连职业技术学院    艺术设计    大专</p>
                                </div>
                            </div>
                        </div>
                        <div class="qzzptCon">
                            <ul class="qzzptTit">
                                <li>张**</li>
                                <li class="kefu">客服<i></i></li>
                                <li>大专</li>
                                <li>女</li>
                                <li>全职</li>
                                <li>辽宁-大连</li>
                                <li>17-07-05</li>
                            </ul>
                            <div class="qzzptTxt" style="display: none;">
                                <div class="qzzptTxtl">
                                    <p><img src="img/zqzpt3.jpg"/></p>
                                    <a href="">更多详情</a>
                                </div>
                                <div class="qzzptTxtr">
                                    <p>居住地：辽宁-大连      期望月薪：2001-4000元/月     婚姻状况：未婚</p>
                                    <p>当前状态：我目前处于离职状态，可立即上岗</p>
                                    <p class="gongzuo">工作经验</p>
                                    <p>1、2014-01 ～ 2017-06大连亿达物业管理有限公司（3年5个月）-  |   客服  |  2001-4000元/月</p>
                                    <p>2、2014-01 ～ 2017-06大连亿达物业管理有限公司（3年5个月）-  |   客服  |  2001-4000元/月</p>
                                    <p class="gongzuo">工作描述</p>
                                    <p>通过接到业主的一些电话报修、来为业主解决问题、以及后续的一些跟踪回访、知道业主达到满意为主、通过这份工作、充分的锻炼了个人的</p>
                                    <p>意志、和对客户的沟通能力以及服务的意识。</p>
                                    <p class="gongzuo">最高学历</p>
                                    <p>2011-09 ～ 2014-07    大连职业技术学院    艺术设计    大专</p>
                                </div>
                            </div>
                        </div>
                        <div class="qzzptCon">
                            <ul class="qzzptTit">
                                <li>张**</li>
                                <li class="kefu">客服<i></i></li>
                                <li>大专</li>
                                <li>女</li>
                                <li>全职</li>
                                <li>辽宁-大连</li>
                                <li>17-07-05</li>
                            </ul>
                            <div class="qzzptTxt" style="display: none;">
                                <div class="qzzptTxtl">
                                    <p><img src="img/zqzpt3.jpg"/></p>
                                    <a href="">更多详情</a>
                                </div>
                                <div class="qzzptTxtr">
                                    <p>居住地：辽宁-大连      期望月薪：2001-4000元/月     婚姻状况：未婚</p>
                                    <p>当前状态：我目前处于离职状态，可立即上岗</p>
                                    <p class="gongzuo">工作经验</p>
                                    <p>1、2014-01 ～ 2017-06大连亿达物业管理有限公司（3年5个月）-  |   客服  |  2001-4000元/月</p>
                                    <p>2、2014-01 ～ 2017-06大连亿达物业管理有限公司（3年5个月）-  |   客服  |  2001-4000元/月</p>
                                    <p class="gongzuo">工作描述</p>
                                    <p>通过接到业主的一些电话报修、来为业主解决问题、以及后续的一些跟踪回访、知道业主达到满意为主、通过这份工作、充分的锻炼了个人的</p>
                                    <p>意志、和对客户的沟通能力以及服务的意识。</p>
                                    <p class="gongzuo">最高学历</p>
                                    <p>2011-09 ～ 2014-07    大连职业技术学院    艺术设计    大专</p>
                                </div>
                            </div>
                        </div>
                        <div class="qzzptCon">
                            <ul class="qzzptTit">
                                <li>张**</li>
                                <li class="kefu">客服<i></i></li>
                                <li>大专</li>
                                <li>女</li>
                                <li>全职</li>
                                <li>辽宁-大连</li>
                                <li>17-07-05</li>
                            </ul>
                            <div class="qzzptTxt" style="display: none;">
                                <div class="qzzptTxtl">
                                    <p><img src="img/zqzpt3.jpg"/></p>
                                    <a href="">更多详情</a>
                                </div>
                                <div class="qzzptTxtr">
                                    <p>居住地：辽宁-大连      期望月薪：2001-4000元/月     婚姻状况：未婚</p>
                                    <p>当前状态：我目前处于离职状态，可立即上岗</p>
                                    <p class="gongzuo">工作经验</p>
                                    <p>1、2014-01 ～ 2017-06大连亿达物业管理有限公司（3年5个月）-  |   客服  |  2001-4000元/月</p>
                                    <p>2、2014-01 ～ 2017-06大连亿达物业管理有限公司（3年5个月）-  |   客服  |  2001-4000元/月</p>
                                    <p class="gongzuo">工作描述</p>
                                    <p>通过接到业主的一些电话报修、来为业主解决问题、以及后续的一些跟踪回访、知道业主达到满意为主、通过这份工作、充分的锻炼了个人的</p>
                                    <p>意志、和对客户的沟通能力以及服务的意识。</p>
                                    <p class="gongzuo">最高学历</p>
                                    <p>2011-09 ～ 2014-07    大连职业技术学院    艺术设计    大专</p>
                                </div>
                            </div>
                        </div>
                        <div class="qzzptCon">
                            <ul class="qzzptTit">
                                <li>张**</li>
                                <li class="kefu">客服<i></i></li>
                                <li>大专</li>
                                <li>女</li>
                                <li>全职</li>
                                <li>辽宁-大连</li>
                                <li>17-07-05</li>
                            </ul>
                            <div class="qzzptTxt" style="display: none;">
                                <div class="qzzptTxtl">
                                    <p><img src="img/zqzpt3.jpg"/></p>
                                    <a href="">更多详情</a>
                                </div>
                                <div class="qzzptTxtr">
                                    <p>居住地：辽宁-大连      期望月薪：2001-4000元/月     婚姻状况：未婚</p>
                                    <p>当前状态：我目前处于离职状态，可立即上岗</p>
                                    <p class="gongzuo">工作经验</p>
                                    <p>1、2014-01 ～ 2017-06大连亿达物业管理有限公司（3年5个月）-  |   客服  |  2001-4000元/月</p>
                                    <p>2、2014-01 ～ 2017-06大连亿达物业管理有限公司（3年5个月）-  |   客服  |  2001-4000元/月</p>
                                    <p class="gongzuo">工作描述</p>
                                    <p>通过接到业主的一些电话报修、来为业主解决问题、以及后续的一些跟踪回访、知道业主达到满意为主、通过这份工作、充分的锻炼了个人的</p>
                                    <p>意志、和对客户的沟通能力以及服务的意识。</p>
                                    <p class="gongzuo">最高学历</p>
                                    <p>2011-09 ～ 2014-07    大连职业技术学院    艺术设计    大专</p>
                                </div>
                            </div>
                        </div>
                        <div class="qzzptCon">
                            <ul class="qzzptTit">
                                <li>张**</li>
                                <li class="kefu">客服<i></i></li>
                                <li>大专</li>
                                <li>女</li>
                                <li>全职</li>
                                <li>辽宁-大连</li>
                                <li>17-07-05</li>
                            </ul>
                            <div class="qzzptTxt" style="display: none;">
                                <div class="qzzptTxtl">
                                    <p><img src="img/zqzpt3.jpg"/></p>
                                    <a href="">更多详情</a>
                                </div>
                                <div class="qzzptTxtr">
                                    <p>居住地：辽宁-大连      期望月薪：2001-4000元/月     婚姻状况：未婚</p>
                                    <p>当前状态：我目前处于离职状态，可立即上岗</p>
                                    <p class="gongzuo">工作经验</p>
                                    <p>1、2014-01 ～ 2017-06大连亿达物业管理有限公司（3年5个月）-  |   客服  |  2001-4000元/月</p>
                                    <p>2、2014-01 ～ 2017-06大连亿达物业管理有限公司（3年5个月）-  |   客服  |  2001-4000元/月</p>
                                    <p class="gongzuo">工作描述</p>
                                    <p>通过接到业主的一些电话报修、来为业主解决问题、以及后续的一些跟踪回访、知道业主达到满意为主、通过这份工作、充分的锻炼了个人的</p>
                                    <p>意志、和对客户的沟通能力以及服务的意识。</p>
                                    <p class="gongzuo">最高学历</p>
                                    <p>2011-09 ～ 2014-07    大连职业技术学院    艺术设计    大专</p>
                                </div>
                            </div>
                        </div>


                        <div style="height: 30px;clear: both"></div>
                        {{--@include('partial.paginator')--}}
                        <div class="zhuyi">
                            <i>注意：</i>提示凡在中国职业培训网发布信息的企业不会以任何形式向求职者收取报名费、抵押金、保证金等费用。举报投诉电话：{{$boot_config['link3']}}
                        </div>
                    </div>

                    <!--开始-->

                    <!--结束-->


                </div>
            </div>
            <div class="gap" style="height: 40px;">

            </div>
@stop {{-- end content --}}


@section('footer')
  @parent
@stop

@section('scripts')
  @parent
            <script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
            <script type="text/javascript">
                //	导航下拉

                $('.qzzptTit .kefu').click(function(){
                    $(this).parents('.qzzptTit').next('.qzzptTxt').slideToggle();
                    $(this).children().css("background-image","url('img/zqzpt2.jpg')")
                })
            </script>
@stop
