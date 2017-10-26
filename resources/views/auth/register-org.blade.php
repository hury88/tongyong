@extends('layouts/register')
@section('title') 企业@parent @stop

@section('bodyNextLabel')
<body>
	<div class="pager_wrap login_wrap">
@stop
@section('content')
@section('navigation')
	&nbsp;
@show
    @section('register_header')
    <h1 class="fl">我是企业加入中国职业培训网</h1>
    <a class="register-cate fr" href="javascript:;"><img src="/img/student.png"/>我是学生</a>
    @stop {{-- 注册头部体结束 --}}
    @section('form')
    <div class="register-form-div">
        <input type="text" placeholder="请输入企业名称"/>
    </div>
    <div class="register-form-div">
        <input type="text" placeholder="请输入联系人姓名"/>
    </div>
    @stop {{-- 注册部分表单(手机邮箱公用) --}}
@show
