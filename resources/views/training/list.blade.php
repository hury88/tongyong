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
    @section('content')
            <div class="qypeixinAll">
                <div class="qypeixin">
                    <p class="xwdtmbx">
                        <a href="/"><img src="/img/sqzwtop.png" style="vertical-align: middle"/>所在位置：首页 </a>> <a href="{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'])}}">{{$GLOBALS['ty_data']->catname}}</a>
                    </p>
                    <div class="" style="padding-bottom: 20px;">
                        <img src="/img/zplb1.jpg" width="100%"/>
                    </div>
                    <div class="qypeixinTit">
                        <div class="qypeixinTit1">
                            <span>您已选择：</span><img src="/img/dingwei.png"/><a href="">合肥</a><img src="/img/qydown.png">
                        </div>
                        <div class="qypeixinTit2All">
                            @if($GLOBALS['ty']==65)
                            <div class="qypeixinTit2">
                                <div class="qypeixinTit2Left">
                                    内训分类
                                </div>
                                <div class="qypeixinTit2Right neixunid">
                                    <div style="width: 820px; float: left" class="touda">
                                        <a data-id='0' href="javascript:void(0);" @if($neixunid==0) class="qypeixinTiton" @endif>全部  </a>
                                        @foreach($neixunids as $key=>$val)
                                            <a href="javascript:void(0);" data-id='{{$key}}' @if($key==$neixunid) class="qypeixinTiton"  @endif>{{$val}}</a>
                                        @endforeach
                                    </div>
                                    <div class="bb1" style="float: right;width: 70px;">
                                        <span href="javascript:void(0);" class="aa1" >收起<img src="/img/sqzwtop1.png"></span>
                                        <span href="javascript:void(0);" class="aa2"style="display: none">展开<img src="/img/qydown.png"></span>
                                    </div>

                                </div>
                            </div>
                            <div class="qypeixinTit2">
                                <div class="qypeixinTit2Left">
                                   公开课分类
                                </div>
                                <div class="qypeixinTit2Right publicid">
                                    <div style="width: 820px; float: left" class="touda">
                                        <a data-id='0' href="javascript:void(0);" @if($publicid==0) class="qypeixinTiton" @endif>全部  </a>
                                        @foreach($publicids as $key=>$val)
                                            <a href="javascript:void(0);" data-id='{{$key}}' @if($key==$publicid) class="qypeixinTiton"  @endif>{{$val}}</a>
                                        @endforeach
                                    </div>
                                    <div class="bb1" style="float: right;width: 70px;">
                                        <span href="javascript:void(0);" class="aa1" >收起<img src="/img/sqzwtop1.png"></span>
                                        <span href="javascript:void(0);" class="aa2"style="display: none">展开<img src="/img/qydown.png"></span>
                                    </div>
                                </div>
                            </div>
                            @elseif($GLOBALS['ty']==28)
                            <div class="qypeixinTit2">
                                <div class="qypeixinTit2Left">
                                    行业
                                </div>
                                <div class="qypeixinTit2Right industryid">
                                    <div style="width: 820px; float: left" class="touda">
                                        <a data-id='0' href="javascript:void(0);" @if($industryid==0) class="qypeixinTiton" @endif>全部  </a>
                                        @foreach($industryids as $key=>$val)
                                        <a href="javascript:void(0);" data-id='{{$key}}' @if($key==$industryid) class="qypeixinTiton"  @endif>{{$val}}</a>
                                        @endforeach
                                    </div>
                                    <div class="bb1" style="float: right;width: 70px;">
                                        <span href="javascript:void(0);" class="aa1" >收起<img src="/img/sqzwtop1.png"></span>
                                        <span href="javascript:void(0);" class="aa2"style="display: none">展开<img src="/img/qydown.png"></span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="qypeixinTit2">
                                <div class="qypeixinTit2Left" style="height: 37px;">
                                    类  别
                                </div>
                                <div class="qypeixinTit2Right trainingid">
                                    <div class="">
                                        <a data-id="0" href="javascript:void(0);" @if($trainingid==0) class="qypeixinTiton" @endif>全部</a>
                                        @foreach(config("config.webarr.trainingid") as $key=>$val)
                                        <a data-id="{{$key}}" href="javascript:void(0);" @if($trainingid==$key) class="qypeixinTiton" @endif>{{$val}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="qypeixinTit3">
                            <form action="" method="get">
                                  <span class="span1">
                                    <input type="text" name="" id="qualificationid" value="@if($qualificationid) {{v_id($qualificationid,'catname','nature')}} @endif" placeholder="职业资格名称"/>
                                    <input type="hidden" name="qualificationid" id="qualificationid" value="{{$qualificationid}}"/>
                                    <a href="javascript:void(0)">+</a>
                                  </span>

                                <input type="text" name="title" id="title" value="{{$title}}" placeholder="清输入关键词" class="inp"/>
                                @if($GLOBALS['ty']==65)
                                <input type="hidden" name="neixunid" id="neixunid" value="{{$neixunid}}"/>
                                <input type="hidden" name="publicid" id="publicid" value="{{$publicid}}"/>
                                @elseif($GLOBALS['ty']==28)
                                <input type="hidden" name="industryid" id="industryid" value="{{$industryid}}"/>
                                @endif
                                <input type="hidden" name="trainingid" id="trainingid" value="{{$trainingid}}"/>
                                <span class="span3">
                                <img src="/img/fdj1.jpg"/>
                                <input type="submit"  value="搜索" />
                              </span>

                            </form>
                        </div>
                    </div>
                    <div class="qypeixinCon">
                        <ul>
                            <li>
                                <a href=""><img src="img/qypx1.jpg"/></a>
                                <div class="qypeixinCon1">
                                    <p class="pu1">
                                        <a href="">工具钳工 技师高级技师...</a>
                                    </p>
                                    <p class="pu2">
                                        <span>￥29.90 </span>
                                        <i><em>45456</em>人已报名</i>
                                    </p>
                                    <p class="pu3">
                                        <a href="">网络规划设计师，作为网络专业最高级别的考试，考察深度、难度达到了前所未有...</a>
                                    </p>
                                    <p class="pu4">
                                        <a href="">我要报名</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <a href=""><img src="img/qypx2.jpg"/></a>
                                <div class="qypeixinCon1">
                                    <p class="pu1">
                                        <a href="">工具钳工 技师高级技师...</a>
                                    </p>
                                    <p class="pu2">
                                        <span>￥29.90 </span>
                                        <i><em>45456</em>人已报名</i>
                                    </p>
                                    <p class="pu3">
                                        <a href="">网络规划设计师，作为网络专业最高级别的考试，考察深度、难度达到了前所未有...</a>
                                    </p>
                                    <p class="pu4">
                                        <a href="">我要报名</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <a href=""><img src="img/qypx3.jpg"/></a>
                                <div class="qypeixinCon1">
                                    <p class="pu1">
                                        <a href="">工具钳工 技师高级技师...</a>
                                    </p>
                                    <p class="pu2">
                                        <span>￥29.90 </span>
                                        <i><em>45456</em>人已报名</i>
                                    </p>
                                    <p class="pu3">
                                        <a href="">网络规划设计师，作为网络专业最高级别的考试，考察深度、难度达到了前所未有...</a>
                                    </p>
                                    <p class="pu4">
                                        <a href="">我要报名</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <a href=""><img src="img/qypx4.jpg"/></a>
                                <div class="qypeixinCon1">
                                    <p class="pu1">
                                        <a href="">工具钳工 技师高级技师...</a>
                                    </p>
                                    <p class="pu2">
                                        <span>￥29.90 </span>
                                        <i><em>45456</em>人已报名</i>
                                    </p>
                                    <p class="pu3">
                                        <a href="">网络规划设计师，作为网络专业最高级别的考试，考察深度、难度达到了前所未有...</a>
                                    </p>
                                    <p class="pu4">
                                        <a href="">我要报名</a>
                                    </p>
                                </div>
                            </li>
                            <div class="" style="clear: both;">

                            </div>
                            <li>
                                <a href=""><img src="img/qypx5.jpg"/></a>
                                <div class="qypeixinCon1">
                                    <p class="pu1">
                                        <a href="">工具钳工 技师高级技师...</a>
                                    </p>
                                    <p class="pu2">
                                        <span>￥29.90 </span>
                                        <i><em>45456</em>人已报名</i>
                                    </p>
                                    <p class="pu3">
                                        <a href="">网络规划设计师，作为网络专业最高级别的考试，考察深度、难度达到了前所未有...</a>
                                    </p>
                                    <p class="pu4">
                                        <a href="">我要报名</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <a href=""><img src="img/qypx6.jpg"/></a>
                                <div class="qypeixinCon1">
                                    <p class="pu1">
                                        <a href="">工具钳工 技师高级技师...</a>
                                    </p>
                                    <p class="pu2">
                                        <span>￥29.90 </span>
                                        <i><em>45456</em>人已报名</i>
                                    </p>
                                    <p class="pu3">
                                        <a href="">网络规划设计师，作为网络专业最高级别的考试，考察深度、难度达到了前所未有...</a>
                                    </p>
                                    <p class="pu4">
                                        <a href="">我要报名</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <a href=""><img src="img/qypx7.jpg"/></a>
                                <div class="qypeixinCon1">
                                    <p class="pu1">
                                        <a href="">工具钳工 技师高级技师...</a>
                                    </p>
                                    <p class="pu2">
                                        <span>￥29.90 </span>
                                        <i><em>45456</em>人已报名</i>
                                    </p>
                                    <p class="pu3">
                                        <a href="">网络规划设计师，作为网络专业最高级别的考试，考察深度、难度达到了前所未有...</a>
                                    </p>
                                    <p class="pu4">
                                        <a href="">我要报名</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <a href=""><img src="img/qypx8.jpg"/></a>
                                <div class="qypeixinCon1">
                                    <p class="pu1">
                                        <a href="">工具钳工 技师高级技师...</a>
                                    </p>
                                    <p class="pu2">
                                        <span>￥29.90 </span>
                                        <i><em>45456</em>人已报名</i>
                                    </p>
                                    <p class="pu3">
                                        <a href="">网络规划设计师，作为网络专业最高级别的考试，考察深度、难度达到了前所未有...</a>
                                    </p>
                                    <p class="pu4">
                                        <a href="">我要报名</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <a href=""><img src="img/qypx5.jpg"/></a>
                                <div class="qypeixinCon1">
                                    <p class="pu1">
                                        <a href="">工具钳工 技师高级技师...</a>
                                    </p>
                                    <p class="pu2">
                                        <span>￥29.90 </span>
                                        <i><em>45456</em>人已报名</i>
                                    </p>
                                    <p class="pu3">
                                        <a href="">网络规划设计师，作为网络专业最高级别的考试，考察深度、难度达到了前所未有...</a>
                                    </p>
                                    <p class="pu4">
                                        <a href="">我要报名</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <a href=""><img src="img/qypx6.jpg"/></a>
                                <div class="qypeixinCon1">
                                    <p class="pu1">
                                        <a href="">工具钳工 技师高级技师...</a>
                                    </p>
                                    <p class="pu2">
                                        <span>￥29.90 </span>
                                        <i><em>45456</em>人已报名</i>
                                    </p>
                                    <p class="pu3">
                                        <a href="">网络规划设计师，作为网络专业最高级别的考试，考察深度、难度达到了前所未有...</a>
                                    </p>
                                    <p class="pu4">
                                        <a href="">我要报名</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <a href=""><img src="img/qypx7.jpg"/></a>
                                <div class="qypeixinCon1">
                                    <p class="pu1">
                                        <a href="">工具钳工 技师高级技师...</a>
                                    </p>
                                    <p class="pu2">
                                        <span>￥29.90 </span>
                                        <i><em>45456</em>人已报名</i>
                                    </p>
                                    <p class="pu3">
                                        <a href="">网络规划设计师，作为网络专业最高级别的考试，考察深度、难度达到了前所未有...</a>
                                    </p>
                                    <p class="pu4">
                                        <a href="">我要报名</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <a href=""><img src="img/qypx8.jpg"/></a>
                                <div class="qypeixinCon1">
                                    <p class="pu1">
                                        <a href="">工具钳工 技师高级技师...</a>
                                    </p>
                                    <p class="pu2">
                                        <span>￥29.90 </span>
                                        <i><em>45456</em>人已报名</i>
                                    </p>
                                    <p class="pu3">
                                        <a href="">网络规划设计师，作为网络专业最高级别的考试，考察深度、难度达到了前所未有...</a>
                                    </p>
                                    <p class="pu4">
                                        <a href="">我要报名</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <a href=""><img src="img/qypx5.jpg"/></a>
                                <div class="qypeixinCon1">
                                    <p class="pu1">
                                        <a href="">工具钳工 技师高级技师...</a>
                                    </p>
                                    <p class="pu2">
                                        <span>￥29.90 </span>
                                        <i><em>45456</em>人已报名</i>
                                    </p>
                                    <p class="pu3">
                                        <a href="">网络规划设计师，作为网络专业最高级别的考试，考察深度、难度达到了前所未有...</a>
                                    </p>
                                    <p class="pu4">
                                        <a href="">我要报名</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <a href=""><img src="img/qypx6.jpg"/></a>
                                <div class="qypeixinCon1">
                                    <p class="pu1">
                                        <a href="">工具钳工 技师高级技师...</a>
                                    </p>
                                    <p class="pu2">
                                        <span>￥29.90 </span>
                                        <i><em>45456</em>人已报名</i>
                                    </p>
                                    <p class="pu3">
                                        <a href="">网络规划设计师，作为网络专业最高级别的考试，考察深度、难度达到了前所未有...</a>
                                    </p>
                                    <p class="pu4">
                                        <a href="">我要报名</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <a href=""><img src="img/qypx7.jpg"/></a>
                                <div class="qypeixinCon1">
                                    <p class="pu1">
                                        <a href="">工具钳工 技师高级技师...</a>
                                    </p>
                                    <p class="pu2">
                                        <span>￥29.90 </span>
                                        <i><em>45456</em>人已报名</i>
                                    </p>
                                    <p class="pu3">
                                        <a href="">网络规划设计师，作为网络专业最高级别的考试，考察深度、难度达到了前所未有...</a>
                                    </p>
                                    <p class="pu4">
                                        <a href="">我要报名</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <a href=""><img src="img/qypx8.jpg"/></a>
                                <div class="qypeixinCon1">
                                    <p class="pu1">
                                        <a href="">工具钳工 技师高级技师...</a>
                                    </p>
                                    <p class="pu2">
                                        <span>￥29.90 </span>
                                        <i><em>45456</em>人已报名</i>
                                    </p>
                                    <p class="pu3">
                                        <a href="">网络规划设计师，作为网络专业最高级别的考试，考察深度、难度达到了前所未有...</a>
                                    </p>
                                    <p class="pu4">
                                        <a href="">我要报名</a>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @include('partial.paginator')
                    <div style="clear: both;height: 25px;"></div>

                </div>
            </div>



@stop {{-- end content --}}


@section('footer')
  @parent


            <div class="jobselect-cover"></div>
            <div class="jobselect-mask">
                <h2>选择职业规格<span>最多只能选择五个 ！</span><a href="javascript:;" class="job-close"></a></h2>
                <div class="job-result clearfix">
                    <p class="job-notice fl">您的选择结果：</p>
                    <ul class="fl">
                    </ul>
                </div>
                <div class="job-lists-box">
                    <div class="job-menu fl">
                        <ul>
                            <li class="job-select-icon">准入类</li>
                            <li>水平 评价类</li>
                        </ul>
                    </div>
                    <div class="job-lists-content fl" style="display:block">
                        <div class="job-lists-dv">
                            <p class="job-big-type"><i class="big-type-icon"></i>消防设施操作员</p>
                            <ul class="job-small-type">
                                <li>消防设施操作A</li>
                                <li>消防设施操作B</li>
                                <li>消防设施操作C</li>
                                <li>消防设施操作D</li>
                                <li>消防设施操作E</li>
                                <li>消防设施操作F</li>
                            </ul>
                        </div>
                        <div class="job-lists-dv">
                            <p class="job-big-type">焊工</p>
                            <ul class="job-small-type">
                                <li>焊工A</li>
                                <li>焊工B</li>
                                <li>焊工C</li>
                                <li>焊工D</li>
                                <li>焊工E</li>
                                <li>焊工F</li>
                            </ul>
                        </div>
                        <div class="job-lists-dv">
                            <p class="job-big-type">家畜繁殖员</p>
                            <ul class="job-small-type">
                                <li>焊工A</li>
                                <li>焊工B</li>
                                <li>焊工C</li>
                                <li>焊工D</li>
                                <li>焊工E</li>
                                <li>焊工F</li>
                            </ul>
                        </div>
                        <div class="job-lists-dv">
                            <p class="job-big-type">关于健身和娱乐场所服务人员</p>
                            <ul class="job-small-type">
                                <li>焊工A</li>
                                <li>焊工B</li>
                                <li>焊工C</li>
                                <li>焊工D</li>
                                <li>焊工E</li>
                                <li>焊工F</li>
                            </ul>
                        </div>
                        <div class="job-lists-dv">
                            <p class="job-big-type">家畜繁殖员</p>
                            <ul class="job-small-type">
                                <li>焊工A</li>
                                <li>焊工B</li>
                                <li>焊工C</li>
                                <li>焊工D</li>
                                <li>焊工E</li>
                                <li>焊工F</li>
                            </ul>
                        </div>
                        <div class="job-lists-dv">
                            <p class="job-big-type">关于航空运输服务人员会籍顾问</p>
                            <ul class="job-small-type">
                                <li>焊工A</li>
                                <li>焊工B</li>
                                <li>焊工C</li>
                                <li>焊工D</li>
                                <li>焊工E</li>
                                <li>焊工F</li>
                            </ul>
                        </div>
                        <div class="job-lists-dv">
                            <p class="job-big-type">关于道路运输服务人员 </p>
                            <ul class="job-small-type">
                                <li>焊工A</li>
                                <li>焊工B</li>
                                <li>焊工C</li>
                                <li>焊工D</li>
                                <li>焊工E</li>
                                <li>焊工F</li>
                            </ul>
                        </div>
                        <div class="job-lists-dv">
                            <p class="job-big-type">关于轨道交通运输服务人员</p>
                            <ul class="job-small-type">
                                <li>焊工A</li>
                                <li>焊工B</li>
                                <li>焊工C</li>
                                <li>焊工D</li>
                                <li>焊工E</li>
                                <li>焊工F</li>
                            </ul>
                        </div>
                        <div class="job-lists-dv">
                            <p class="job-big-type">关于消防和应急救援人员</p>
                            <ul class="job-small-type">
                                <li>焊工A</li>
                                <li>焊工B</li>
                                <li>焊工C</li>
                                <li>焊工D</li>
                                <li>焊工E</li>
                                <li>焊工F</li>
                            </ul>
                        </div>
                    </div>
                    <div class="job-lists-content fl" style="display:none">
                        <div class="job-lists-dv">
                            <p class="job-big-type"><i class="big-type-icon"></i>消防设施操作员</p>
                            <ul class="job-small-type">
                                <li>消防设施操作A</li>
                                <li>消防设施操作B</li>
                                <li>消防设施操作C</li>
                                <li>消防设施操作D</li>
                                <li>消防设施操作E</li>
                                <li>消防设施操作F</li>
                            </ul>
                        </div>
                        <div class="job-lists-dv">
                            <p class="job-big-type">焊工</p>
                            <ul class="job-small-type">
                                <li>焊工A</li>
                                <li>焊工B</li>
                                <li>焊工C</li>
                                <li>焊工D</li>
                                <li>焊工E</li>
                                <li>焊工F</li>
                            </ul>
                        </div>
                        <div class="job-lists-dv">
                            <p class="job-big-type">家畜繁殖员</p>
                            <ul class="job-small-type">
                                <li>焊工A</li>
                                <li>焊工B</li>
                                <li>焊工C</li>
                                <li>焊工D</li>
                                <li>焊工E</li>
                                <li>焊工F</li>
                            </ul>
                        </div>
                        <div class="job-lists-dv">
                            <p class="job-big-type">关于健身和娱乐场所服务人员</p>
                            <ul class="job-small-type">
                                <li>焊工A</li>
                                <li>焊工B</li>
                                <li>焊工C</li>
                                <li>焊工D</li>
                                <li>焊工E</li>
                                <li>焊工F</li>
                            </ul>
                        </div>
                        <div class="job-lists-dv">
                            <p class="job-big-type">家畜繁殖员</p>
                            <ul class="job-small-type">
                                <li>焊工A</li>
                                <li>焊工B</li>
                                <li>焊工C</li>
                                <li>焊工D</li>
                                <li>焊工E</li>
                                <li>焊工F</li>
                            </ul>
                        </div>
                        <div class="job-lists-dv">
                            <p class="job-big-type">关于航空运输服务人员会籍顾问</p>
                            <ul class="job-small-type">
                                <li>焊工A</li>
                                <li>焊工B</li>
                                <li>焊工C</li>
                                <li>焊工D</li>
                                <li>焊工E</li>
                                <li>焊工F</li>
                            </ul>
                        </div>
                        <div class="job-lists-dv">
                            <p class="job-big-type">关于道路运输服务人员 </p>
                            <ul class="job-small-type">
                                <li>焊工A</li>
                                <li>焊工B</li>
                                <li>焊工C</li>
                                <li>焊工D</li>
                                <li>焊工E</li>
                                <li>焊工F</li>
                            </ul>
                        </div>
                        <div class="job-lists-dv">
                            <p class="job-big-type">关于轨道交通运输服务人员</p>
                            <ul class="job-small-type">
                                <li>焊工A</li>
                                <li>焊工B</li>
                                <li>焊工C</li>
                                <li>焊工D</li>
                                <li>焊工E</li>
                                <li>焊工F</li>
                            </ul>
                        </div>
                        <div class="job-lists-dv">
                            <p class="job-big-type">关于消防和应急救援人员</p>
                            <ul class="job-small-type">
                                <li>焊工A</li>
                                <li>焊工B</li>
                                <li>焊工C</li>
                                <li>焊工D</li>
                                <li>焊工E</li>
                                <li>焊工F</li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="job-operate">
                    <a class="operate-comfirm" href="javascript:;">确定</a>
                    <a class="operate-reset" href="javascript:;">取消</a>
                </div>
            </div>
@stop

@section('scripts')
  @parent
            <script type="text/javascript" src="/js/2.js"></script>
            <script type="text/javascript" src="/js/jquery-1.10.1.min.js"></script>
            <script type="text/javascript">
                $('.industryid div a').click(function(){
                    $('.industryid div a').removeClass("qypeixinTiton")
                    $(this).addClass("qypeixinTiton")
                    ss=$(this).data('id')
                    $('#industryid').val(ss)
                })

                $('.neixunid div a').click(function(){
                    $('.neixunid div a').removeClass("qypeixinTiton")
                    $(this).addClass("qypeixinTiton")
                    ss=$(this).data('id')
                    $('#neixunid').val(ss)
                })

                $('.publicid div a').click(function(){
                    $('.publicid div a').removeClass("qypeixinTiton")
                    $(this).addClass("qypeixinTiton")
                    ss=$(this).data('id')
                    $('#publicid').val(ss)
                })
                $('.trainingid div a').click(function(){
                    $('.trainingid div a').removeClass("qypeixinTiton")
                    $(this).addClass("qypeixinTiton")
                    ss=$(this).data('id')
                    $('#trainingid').val(ss)
                })

                $(".bb1 .aa2").click(function () {
                    $(this).hide()
                    $(this).siblings(".aa1").show()
                    $(this).parent().parent().children(".touda").removeClass("sqdown")
                })
                $(".bb1 .aa1").click(function () {
                    $(this).hide()
                    $(this).siblings(".aa2").show()
                    $(this).parent().parent().children(".touda").addClass("sqdown")
                })
            </script>
@stop
