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
                @include('auth.partial.auth_head')
            </div>
        @show
            <div class="pager_wrap register-wrap">
                <div class="login-register-box register-content">
                    <div class="findpwd-header">
                        <h1 class="fl">找回密码</h1>
                        <div class="find-step fr">
                            @yield("daohang")
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    @yield("neirong")
                </div>
                @include('partial.copyright')
            </div>
@stop


@section('scripts')
    @include('partial.dialog')
@stop