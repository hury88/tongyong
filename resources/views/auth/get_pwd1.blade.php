@extends('auth.layouts/reset')
@section('title')确认账号 @parent @stop
@section('daohang')
    <img src="/img/circle.png"/>
    <span class="active-line"><i>确认账号</i></span>
    <span class="normal-line"></span>
    <img src="/img/on-circle.png"/>
    <span class="normal-line"><i>安全验证</i></span>
    <span class="normal-line"></span>
    <img src="/img/on-circle.png"/>
    <span class="normal-line"><i>重置密码</i></span>
    <span class="normal-line"><i class="last-step-line">密码成功找回</i></span>
    <img src="/img/on-circle.png"/>
@stop
@section('neirong')
    <div class="findpwd-step1">
        <h2>确认账号</h2>
        <div class="findpwd-step1-form">
            <form method="post" action="{{route('password.request2')}}">
                <div class="findpwd-step1-div">
                    <input type="text" name="tel" placeholder="请输入邮箱/手机号"/>
                </div>
                <div class="findpwd-step1-code">
                    <input type="text" name="yzm" placeholder="请输入验证码"/>
                    <a href="javascript:;" class="findpwd-getcode"><img src="/img/code-img.png"/></a>
                </div>
                <div class="findpwd-step1-sub">
                    <input type="submit" value="下一步"/>
                </div>
            </form>
        </div>
    </div>
@stop
