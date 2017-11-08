@extends('auth.layouts/reset')
@section('title')确认账号 @parent @stop
@section('daohang')
    <img src="/img/circle.png"/>
    <span class="active-line"><i>确认账号</i></span>
    <span class="active-line"></span>
    <img src="/img/circle.png"/>
    <span class="active-line"><i>安全验证</i></span>
    <span class="active-line"></span>
    <img src="/img/circle.png"/>
    <span class="active-line"><i>重置密码</i></span>
    <span class="active-line"><i class="last-step-line">密码成功找回</i></span>
    <img src="/img/circle.png"/>
@stop
@section('neirong')
    <div class="findpwd-step1 findpwd-step4">
        <h2>密码成功找回</h2>
        <div class="findpwd-back-notice1"><img src="/img/smile.png"/>恭喜您成功找回密码</div>
        <div class="findpwd-back-notice2"><p>尊敬的用户，您已成功找回密码，5秒后页面将自动登录！</p></div>
        <a href="javascript:;" class="go-back">返回首页</a>
    </div>
@stop
