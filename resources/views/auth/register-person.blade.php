@extends('auth.layouts/register')
@section('title') 学生@parent @stop

@section('bodyNextLabel')
<body>
    <div class="pager_wrap login_wrap">
@stop
@section('navigation')
    &nbsp;
@show
@section('content')
    @section('register_header')
    <h1 class="fl">我是学生加入中国职业培训网</h1>
    <a class="register-cate fr" href="javascript:;"><img src="/img/qiye.png"/>我是企业</a>
    @stop {{-- 注册头部体结束 --}}
    @section('form')
    <div class="register-form-div">
        <input type="text" placeholder="请输入真实姓名"/>
    </div>
    @stop {{-- 注册部分表单(手机邮箱公用) --}}
    @section('protocal')
    <div class="company-agreement">
        <label>
            <input type="radio" name="property-type" value="我已阅读并接受《中国职业培训网个人会员注册协议》"/>
            <span></span>
        </label>
        <p class="agreement-content">我已阅读并接受<b>《中国职业培训网个人会员注册协议》</b></p>
    </div>
    @stop {{-- 注册协议 --}}
@show
