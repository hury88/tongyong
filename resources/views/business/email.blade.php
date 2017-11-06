@extends('business.layouts.public')
@section('title') 修改邮箱 - @parent @stop
<?php
    define('AT_NO', 1);
    $_title = ['修改邮箱', '用户管理'];
 ?>
@section('inbox')
<div class="safety-form">
    <form class="form" action="{{route('b_email')}}">
        <div class="safety-form-div">
            <label>原邮箱号</label>
            <div class="user-form-dv">
                <p>{{$user['email']}}</p>
            </div>
        </div>
        <div class="safety-form-div">
            <label><b>*</b>新邮箱号</label>
            <div class="safety-pwd-dv">
                <input name="email" type="email"/>
            </div>
        </div>
        <div class="safety-form-div">
            <label><b>*</b>邮箱验证码</label>
            <div class="safety-pwd-dv">
                <input name="yzm" class="email-code-inp" type="text"/>
                <input id="mail" class="email-code-get" type="button" value="获取邮箱验证码"/>
            </div>
        </div>
        <div class="safety-form-div safety-form-sub">
            <label></label>
            <input onclick="return model(this)" type="submit" value="确定并保存"/>
        </div>
        {{csrf_field()}}
        <input type="hidden" name="name" value="{{$user['business_name']}}">
    </form>
    <script>
        $("#mail").click(function(){
            model(this, "{{route('b_mail_yzm')}}");
            return false;
        })
    </script>
</div>
@stop