@extends('auth.layouts/public')

@section('title') 帮助手册@parent @stop

@section('bodyNextLabel')
<body>
    <div class="pager_wrap help-pager-wrap">
@stop
        @section('tophelp')
            <div class="help-box">
                <div class="login-header">
                    <div class="login-header-l fl">
                        <a class="login-logo" href="javascript:void(0)">
                            <img src="/img/login-logo.png" alt=""/>
                            中国职业培训网
                        </a>
                        <a class="login-address" href="javascript:void(0)">合肥</a>
                    </div>
                    <div class="login-header-r fr">
                        <ul class="login-nav-ul">
                            <li class="login-nav-li">
                                <a href="/">首页</a>
                            </li>
                            <li class="login-nav-li">
                                <a href="javascript:void(0)">使用帮助</a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <h2>使用帮助</h2>
            </div>
        @stop
        @section('pager_wrap_class') help-wrap @stop
        @section('login-register-box_class') help-content @stop

        @section('pager_wrap_content')
            <h3>常见问题解答</h3>
            <div class="help-content-lists">
                <ul class="help-content-ul">
                    @foreach($helplist as $key=>$val)
                    <li class="help-content-li">
                        <a href="javascript:void(0);">{{$key+1}}、{{$val->title}}<i></i></a>
                        <div class="pull-down-content">
                            {!! htmlspecialchars_decode($val->content) !!}
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        @stop

@section('scripts')
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
    /*  $(".help-content-li a i").click(function(){
         $(this).parent().parent(".help-content-li").toggleClass("help-open-li");
      });*/

    $(".help-content-li a").click(function() {
        //判断对象是显示还是隐藏
        if($(this).parent(".help-content-li").hasClass("help-open-li") == false){
            //表示隐藏
            $(this).parent(".help-content-li").addClass("help-open-li");
            //如果当前没有进行动画，则添加新动画
            $(this).next(".pull-down-content").animate({
                height: 'show'
            },500);
            //siblings遍历div1的元素

        } else {
            //表示显示
            if($(this).parent(".help-content-li").hasClass("help-open-li") == true) {
                $(this).parent(".help-content-li").removeClass("help-open-li");
                $(this).next(".pull-down-content").animate({
                    height: 'hide'
                },500);
            }
        }
    })
</script>
@stop
