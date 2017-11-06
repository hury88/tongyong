@extends('business.layouts.public')
@section('title') 修改手机号 - @parent @stop
<?php
    define('AT_NO', 1);
    $_title = ['修改手机号', '用户管理'];
 ?>
@section('inbox')
    <div class="safety-form">
        <form class="form" action="{{route('b_telphone')}}">
            <div class="safety-form-div">
                <label>原手机号</label>
                <div class="user-form-dv">
                    <p>{{$user['telphone']}}</p>
                </div>
            </div>
            <div class="safety-form-div">
                <label><b>*</b>新手机号</label>
                <div class="safety-pwd-dv">
                    <input name="telphone" type="tel"/>
                </div>
            </div>
            <div class="safety-form-div">
                <label><b>*</b>手机验证码</label>
                <div class="safety-pwd-dv">
                    <input name="yzm" class="email-code-inp" type="text"/>
                    <input id="mobile" class="email-code-get" type="button" value="获取手机验证码"/>
                </div>
            </div>
            <div class="safety-form-div safety-form-sub">
                <label></label>
                <input onclick="return model(this)" type="submit" value="确定并保存"/>
            </div>
            {{csrf_field()}}
        </form>
    </div>
    <script>
        $("#mobile").click(function(){
            model(this, "{{route('b_telphone_yzm')}}");
            return false;
        })
    </script>
@stop