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
                        <a href="/"><img src="/img/sqzwtop.png" style="vertical-align: middle"/>所在位置：首页 </a>> <a href="{{u($GLOBALS['pid_path'])}}">{{$GLOBALS['pid_data']->catname}}</a>>培训机构
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

                    <div class="qypeixinTit" style="    overflow: hidden;padding: 20px 30px;">
                        <div class="qypeixinTit1" style="width: 15%;float: left;padding-top: 10px;">
                            <span>您已选择：</span><img src="img/dingwei.png"/><a href="">合肥</a><img src="/img/qydown.png">
                        </div>

                        <div class="qypeixinTit3" style="width: 37%;float: right;padding: 0;">
                            <form action="" method="get">
                                <input type="text" name="business_name" id="" value="{{$key}}" placeholder="清输入关键词" class="inp"/>
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
                                <a href="{{u('training','business',$val['user_id'])}}"><img src="img/qypx9.jpg"/></a>
                                <div class="qypeixinCon1">
                                    <p class="pu1">
                                        <a href="{{u('training','business',$val['user_id'])}}">{{$val['business_name']}}</a>
                                    </p>
                                    <p class="pu2" style="height: 26px;overflow: hidden;">
                                        <a href="{{u('training','business',$val['user_id'])}}" style="color: #666666;">{!! str_limit(strip_tags(htmlspecialchars_decode($val['business_introduction'])), 75, '...') !!}</a>
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
@stop

@section('scripts')
  @parent
            <script type="text/javascript" src="/js/jquery-1.10.1.min.js"></script>
            <script type="text/javascript">
                $('.qypeixinTit2Right div a').click(function(){
                    $(this).css('background','#445263');
                    $(this).css('color','#fff');
                })
                $('.aa1').click(function(){
                    $('.bb1').slideToggle();
                })
            </script>
@stop
