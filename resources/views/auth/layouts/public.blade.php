@extends('layouts/master')
@section('title')@yield('m_title') - @parent @stop
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
        <div class="login-register-box @yield('pager_wrap_class', 'register-content')">
           @yield('pager_wrap_class');
        </div>
        <div class="login-register-box">
            <p class="login-footer-p">北京通用领航咨询服务有限公司 版权所有 京ICP备11031804号<span>|</span><b>技术支持：科威网络</b></p>
        </div>
    </div>
@stop



@section('footer')
@stop

@yield('scripts');
