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
    @section('tophelp')
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
    @show
    <div class="pager_wrap @yield('pager_wrap_class', 'register-wrap')">
        <div class="login-register-box @yield('login-register-box_class', 'register-content')">
           @yield('pager_wrap_content')
        </div>
        <div class="login-register-box">
            <p class="login-footer-p">{{$boot_config['copyright']}} <span>|</span> <a href="http://www.semfw.cn" target="_blank" class="active"><b>技术支持：科威网络</b></a></p>
        </div>
    </div>

@stop



@section('footer')
    @yield('helpscripts')
@stop


@section('scripts')
@stop