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
                        <a href="/"><img src="/img/sqzwtop.png" style="vertical-align: middle"/>所在位置：首页 </a>> <a href="{{u($GLOBALS['pid_path'])}}">{{$GLOBALS['pid_data']->catname}}</a>> <a href="{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'])}}">{{$GLOBALS['ty_data']->catname}}</a>
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
                                    <input type="text" id="qualificationidname" value="@if($qualificationidarr&&$qualificationidarr[0]>0) @foreach($qualificationidarr as $vc) @if($loop->index==0) {{v_id($vc,'catname','nature')}} @else ,{{v_id($vc,'catname','nature')}} @endif @endforeach @endif" placeholder="职业资格名称"/>
                                    <input type="hidden" name="qualificationid" id="qualificationid" value="{{$qualificationid}}"/>
                                    <a id="profession-chose" href="javascript:void(0)">+</a>
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
                            @foreach($pagenewslist['data'] as $val)
                            <li>
                                <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$val['id'])}}"><img src="{{img($val['img1'])}}"/></a>
                                <div class="qypeixinCon1">
                                    <p class="pu1">
                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$val['id'])}}">{{$val['title']}}</a>
                                    </p>
                                    <p class="pu2">
                                        <span>￥{{$val['price']}}</span>
                                        <i><em>{{$val['enroll_num']}}</em>人已报名</i>
                                    </p>
                                    <p class="pu3">
                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$val['id'])}}">{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 80, '...') !!}</a>
                                    </p>
                                    <p class="pu4">
                                        <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$val['id'])}}">我要报名</a>
                                    </p>
                                </div>
                            </li>
                            @endforeach

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
                        @if($qualificationidarr) @foreach($qualificationidarr as $vc) <li>{{v_id($vc,'catname','nature')}}<i class="job-selected-icon" data-id="{{$vc}}"></i></li> @endforeach @endif
                    </ul>
                </div>
                <div class="job-lists-box">
                    <div class="job-menu fl">
                        <ul>

                            @foreach($qiyezige[0] as $key=>$val)
                            <li class=" @if($loop->index==0) job-select-icon @endif " >{{$val}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @foreach($qiyezige[0] as $key=>$val)
                    <div class="job-lists-content fl" @if($loop->index==0) style="display:block" @else style="display:none" @endif>
                        @foreach($qiyezige[$key] as $k=>$v)
                        <div class="job-lists-dv">
                            <p class="job-big-type" title="{{$v}}"><i class="big-type-icon"></i>{{$v}}</p>
                            <ul class="job-small-type">
                                @foreach($qiyezige[$k] as $k1=>$v1)
                                <li class="c{{$k1}} @if(in_array($k1,$qualificationidarr)) select-item @endif" data-id="{{$k1}}">{{$v1}}</li>
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
