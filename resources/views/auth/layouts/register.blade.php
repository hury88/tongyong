@extends('layouts/master')
@section('title')注册 - @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/common_dengluzhuce.css"/>
    <link rel="stylesheet" type="text/css" href="/css/login.css"/>
@stop
@section('bodyNextLabel')
<body>
    <div class="pager_wrap login_wrap">
@stop
@section('content')
    @section('navigation')
    @stop
    <div class="register-box">
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
                        <a href="{{u('help')}}">使用帮助</a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="pager_wrap register-wrap">
        <div class="login-register-box register-content">
           <div class="register-header">
               @yield('register_header')
               <div class="clearfix"></div>
           </div>
            <div class="register-detials">
                <div class="register-left fl">
                    <div class="register-tab">
                        <ul>
                            <li class="select"><i></i>手机注册</li>
                            <li><i></i>邮箱注册</li>
                        </ul>
                    </div>
                    <div class="register-tab-content">
                        <div class="register-content-box" style="display:block;">
                            @yield('form')
                                <div class="register-form-div">
                                    <input name="telphone" type="text" placeholder="请输入手机号"/>
                                </div>
                                <div class="register-form-dv">
                                    <input name="yzm" class="form-code-inp" type="text" placeholder="请输入手机验证码"/>
                                    <input id="mobile" class="form-code-get" type="button" value="获取验证码"/>
                                </div>
                                <div class="register-form-psw">
                                    <input name="password" type="password" placeholder="请输入您的密码"/>
                                    <!-- <a href="javascript:;"></a> -->
                                </div>
                                <div class="register-form-psw">
                                    <input name="password2" type="password" placeholder="请确认密码"/>
                                    <!-- <a href="javascript:;" class=""></a> -->
                                </div>
                                @yield('protocal')
                                <div class="register-form-inp">
                                    <input class="submit" type="submit" value="注册"/>
                                </div>
                                <input type="hidden" name="mark" value="telphone">
                                {!! csrf_field() !!}
                            @yield('formEnd')
                        </div>
                        <div class="register-content-box" style="display:none;">
                            @yield('form')
                                @yield('form-org-email')
                                <div class="register-form-div">
                                    <input name="email" type="text" placeholder="请输入邮箱"/>
                                </div>
                                <div class="register-form-dv">
                                    <input name="yzm" class="form-code-inp" type="text" placeholder="请输入邮箱验证码"/>
                                    <input id="mail" class="form-code-get" type="button" value="获取验证码"/>
                                </div>
                                <div class="register-form-psw">
                                    <input name="password" type="password" placeholder="请输入您的密码"/>
                                    <!-- <a href="javascript:;"></a> -->
                                </div>
                                <div class="register-form-psw">
                                    <input name="password2" type="password" placeholder="请确认密码"/>
                                    <!-- <a href="javascript:;" class=""></a> -->
                                </div>
                                @yield('protocal')
                                <div class="register-form-inp">
                                    <input class="submit" type="submit" value="注册"/>
                                </div>
                                <input type="hidden" name="mark" value="email">
                                {!! csrf_field() !!}
                            @yield('formEnd')
                        </div>
                    </div>
                </div>
                <div class="register-right fr">
                    <a class="register-other-link" href="javascript:;">已有账号，去登录？ >></a>
                    <div class="third-login">
                        <h3>使用第三方登录</h3>
                        <div class="third-login-type">
                            <a class="qq-login" href="javascript:;"></a>
                            <a class="weibo-login" href="javascript:;"></a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        @include('partial.copyright')
    </div>
@stop



@section('footer')
<div class="register-cover"></div>
<div class="register-mask">
    @yield('protocal_content')
</div>
@stop

@section('scripts')
<script type="text/javascript" src="/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="/js/js_dengluzhuce.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/alert.min.js"></script>
<script>
    $(".submit").click(function(){
        model(this);
        return false;
    })

   @yield('send_yzm', '$("#mail").click(function(){
    model(this, "/yzm/mail");
    return false;
    })
    $("#mobile").click(function(){
    model(this, "/yzm/mobile");
    return false;
    })')
    // 阅读协议
    $(".company-agreement label").click(function(){
        var radio = $(this).children("input[type=radio]");
        var checkbox = radio.next("span");
        if (radio.attr("checked")) {
            radio.removeAttr("checked");
            checkbox.removeClass("on");
        } else {
            radio.attr("checked", true);
            checkbox.addClass("on");
        }
        return false;
    })
</script>
@stop