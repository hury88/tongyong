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
                                    <div style="width: 780px; float: left">
                                        <a href="" class="qypeixinTiton">全部  </a>
                                        <a href="javascript:;">管理技能内训课程  </a>
                                        <a href="javascript:;">职业素养内训课程  </a>
                                        <a href="javascript:;">人力资源内训课程  </a>
                                        <a href="javascript:;">生产管理内训课程 </a>
                                        <a href="javascript:;">销售管理内训课程 </a>
                                        <a href="javascript:;">市场营销内训课程 </a>
                                        <a href="javascript:;"> 战略管理内训课程  </a>
                                        <a href="javascript:;">客户服务内训课程  </a>
                                        <a href="javascript:;"> 财务管理内训课程</a>
                                        <a href="javascript:;">采购物流内训课程</a>
                                        <a href="javascript:;">国学智慧内训课程</a>
                                        <a href="javascript:;">项目管理内训课程 </a>
                                        <a href="javascript:;">政府·农林牧渔</a>
                                    </div>
                                    <div class="bb1" style="float: right;width: 220px;">
                                        <span href="javascript:void(0);" class="aa1">收起<img src="/img/sqzwtop1.png"></span>
                                    </div>

                                </div>
                            </div>
                            <div class="qypeixinTit2">
                                <div class="qypeixinTit2Left">
                                   公开课分类
                                </div>
                                <div class="qypeixinTit2Right publicid">
                                    <div style="width: 780px; float: left">
                                        <a href="" class="qypeixinTiton">全部  </a>
                                        <a href="javascript:;">管理技能内训课程  </a>
                                        <a href="javascript:;">职业素养内训课程  </a>
                                        <a href="javascript:;">人力资源内训课程  </a>
                                        <a href="javascript:;">生产管理内训课程 </a>
                                        <a href="javascript:;">销售管理内训课程 </a>

                                        <a href="javascript:;">市场营销内训课程 </a>
                                        <a href="javascript:;"> 战略管理内训课程  </a>
                                        <a href="javascript:;">客户服务内训课程  </a>
                                        <a href="javascript:;"> 财务管理内训课程</a>
                                        <a href="javascript:;">采购物流内训课程</a>
                                        <a href="javascript:;">国学智慧内训课程</a>

                                        <a href="javascript:;">项目管理内训课程 </a>
                                        <a href="javascript:;">政府·农林牧渔</a>
                                    </div>

                                    <div class="bb1">
                                        <span href="javascript:;" class="aa1">收起<img src="img/sqzwtop1.png"></span>
                                    </div>
                                </div>
                            </div>
                            @elseif($GLOBALS['ty']==28)
                            <div class="qypeixinTit2">
                                <div class="qypeixinTit2Left">
                                    行业
                                </div>
                                <div class="qypeixinTit2Right industryid">
                                    <div style="width: 820px; float: left">
                                        <a href="javascript:void(0);" class="qypeixinTiton">全部  </a>
                                        <a href="javascript:void(0);">互联网·游戏·软件  </a>
                                        <a href="javascript:void(0);">电子·通信·硬件  </a>
                                        <a href="javascript:void(0);">房地产·建筑·物业  </a>
                                        <a href="javascript:void(0);">金融 消费品 </a>
                                        <a href="javascript:void(0);">汽车·机械·制造  </a>
                                        <a href="javascript:void(0);">制药·医疗  </a>

                                        <a href="javascript:void(0);">能源·化工·环保</a>
                                        <a href="javascript:void(0);">服务·外包·中介 </a>
                                        <a href="javascript:void(0);"> 广告·传媒·教育·文化  </a>
                                        <a href="javascript:void(0);">交通·贸易·物流   </a>
                                        <a href="javascript:void(0);"> 政府·农林牧渔</a>
                                    </div>
                                    <div class="bb1" style="float: right;width: 65px;">
                                        <span href="javascript:void(0);" class="aa1">收起<img src="/img/sqzwtop1.png"></span>
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
                                        <a data-id="0" href="javascript:void(0);" @if(!$trainingid) class="qypeixinTiton" @endif>全部</a>
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
                                    <input type="hidden" name="qualificationid" id="qualificationid" value="{{$qualificationid}}" placeholder="职业资格名称"/>
                                    <a href="javascript:void(0)">+</a>
                                  </span>

                                <input type="text" name="title" id="title" value="{{$title}}" placeholder="清输入关键词" class="inp"/>

                                <input type="hidden" name="neixunid" id="neixunid" value="{{$neixunid}}"/>
                                <input type="hidden" name="publicid" id="publicid" value="{{$publicid}}"/>
                                <input type="hidden" name="trainingid" id="trainingid" value="{{$trainingid}}"/>
                                <input type="hidden" name="industryid" id="industryid" value="{{$industryid}}"/>
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
@stop

@section('scripts')
  @parent
            <script type="text/javascript" src="/js/jquery-1.10.1.min.js"></script>
            <script type="text/javascript">
                $('.industryid div a').click(function(){
                    $('.industryid div a').removeClass("qypeixinTiton")
                    $(this).addClass("qypeixinTiton")
                    ss=$(this).data('id')
                    $('#industryid').val(ss)
                })

            </script>
@stop
