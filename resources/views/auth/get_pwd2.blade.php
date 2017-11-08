@extends('auth.layouts/reset')
@section('title')确认账号 @parent @stop
@section('daohang')
    <img src="/img/circle.png"/>
    <span class="active-line"><i>确认账号</i></span>
    <span class="active-line"></span>
    <img src="/img/circle.png"/>
    <span class="active-line"><i>安全验证</i></span>
    <span class="normal-line"></span>
    <img src="/img/on-circle.png"/>
    <span class="normal-line"><i>重置密码</i></span>
    <span class="normal-line"><i class="last-step-line">密码成功找回</i></span>
    <img src="/img/on-circle.png"/>
@stop
@section('neirong')
    <div class="findpwd-step1">
        <h2>安全验证</h2>
        <div class="findpwd-step1-form">
            <form method="post" action="{{route('password.request2')}}">
                <div class="findpwd-step1-code">
                    <input class="findpwd-step2" name="sjyzm" type="text" placeholder="请输入邮箱验证码"/>
                    <input class="form-code-get" type="button" value="获取验证码"/>
                </div>
                <div class="findpwd-step1-sub">
                    <input type="submit" value="下一步"/>
                </div>
            </form>
        </div>
    </div>
@stop
