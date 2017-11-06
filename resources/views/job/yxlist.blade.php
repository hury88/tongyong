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
    <div class="">
        <img src="{{$banimgsrc}}" style="width: 100%;"/>
    </div>
@stop
    @section('content')
        <div class="sqzwNav">
            <div class="sqzwNavsech">
                <form action="" method="get" id="seach">
                    <input type="hidden" name="academyid" id="academyid" value="{{$academyid}}">
                    <input type="hidden" name="infotypeid" id="infotypeid"  value="{{$infotypeid}}">
                    <input type="hidden" name="order" id="order" value="{{$order}}">
                    <select name="">
                        <option value="">合肥</option>
                        <option value="">合肥</option>
                        <option value="">合肥</option>
                    </select>
                    <input type="text" name="title" id="title" value="{{$title}}" placeholder="输入标题关键词" class="txt"/>
                    <input type="submit" value="搜索" class="btn"/>
                </form>
            </div>
            <div class="sqzwNavlist title">
                <p>
                    @foreach(explode("|",$boot_config['link5']) as $val)
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
                <img src="/img/zplb1.jpg" style="width: 100%;"/>
            </div>
            <!--开始-->
            <div class="zplbxzwz">
                <div class="zplbxzwz1">
                    您已选择：<img src="/img/sqzwwz.jpg"><i>合肥</i><img src="img/zplbxx5.jpg">
                </div>
                <div class="zplbxzwz2">
                    <div class="zplbxzwz2a">
                        <div class="yxxxfbl">
                            院校
                        </div>
                        <div class="yxxxfbr academyid">

                            <span class="yx @if($academyid==0) on @endif">全部</span>
                            @foreach($yxarr as $key=>$val)
                                    <span class="yx @if($key==$academyid) on @endif " data-id="{{$key}}">{{$val}}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="zplbxzwz2a">
                        <div class="zplbxzwz2al">
                            分类
                        </div>
                        <div class="yxxxfbr infotypeid">
                            <span class="xxlb @if($academyid==0) on @endif">全部</span>
                            @foreach($xxarr as $key=>$val)
                                <span class="xxlb @if($key==$infotypeid) on @endif " data-id="{{$key}}">{{$val}}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="zplbxzwz2a">
                        <div class="zplbxzwz2al">
                            更  多
                        </div>
                        <div class="zplbxzwz2ar">
                            <select name="" class="order">
                                <option value="0" @if($order==0) selected @endif>更新日期</option>
                                <option value="1" @if($order==1) selected @endif>热门信息</option>
                                <option value="2" @if($order==2) selected @endif>推荐信息</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!--结束-->
            <div class="yxxxfbCon">
                <ul>
                    @foreach($pagenewslist['data'] as $val)
                    <li>
                        <div class="yxxxfbConl">
                            <p class="pb1"><a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$val['id'])}}" style="color:#323333">{{$val['title']}}</a></p>
                            <p  class="pb2">{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 300, '...') !!}</p>
                            <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$val['id'])}}">阅读全文>></a>
                        </div>
                        <div class="yxxxfbConr">
                            <a href="{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$val['id'])}}"> <img src="{{img($val['img1'])}}"/></a>
                        </div>
                    </li>
                     @endforeach
                </ul>
                @include('partial.paginator')

            </div>



        </div>
        <div class="gap" style="height: 40px;">

        </div>
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

                    $('.academyid .yx').click(function () {
                        var ss=$(this).data('id');
                        $('.academyid .yx').removeClass('on');
                        $(this).addClass('on')
                        $("#academyid").val(ss);
                        $("#seach").submit()
                    })

                $('.infotypeid .xxlb').click(function () {
                    var ss=$(this).data('id');
                    $('.infotypeid .xxlb').removeClass('on');
                    $(this).addClass('on')
                    $("#infotypeid").val(ss);
                    $("#seach").submit()
                })
                $('.zplbxzwz2ar .order').change(function () {
                    var ss=$(this).val();
                    $("#order").val(ss);
                    $("#seach").submit()
                })
                $(".title .gkey").click(function () {
                    var ss=$(this).text()
                    $('#title').val(ss)
                    $("#seach").submit()
                })
            </script>
@stop
