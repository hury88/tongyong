@extends('business.layouts.public')
@section('title') @parent @stop
<?php define('AT_NO', 1) ?>
@section('inbox')
    <div class="safety-form">
        <form class="form" action="{{route('b_safe')}}">
            <div class="safety-form-div">
                <label><b>*</b>旧密码</label>
                <div class="safety-pwd-dv">
                    <input name="origin" type="password"/>
                    <!-- <a href="javascript:;"></a> -->
                </div>
            </div>
            <div class="safety-form-div">
                <label><b>*</b>新密码</label>
                <div class="safety-pwd-dv">
                    <input name="new" type="password"/>
                    <!-- <a href="javascript:;"></a> -->
                </div>
            </div>
            <div class="safety-form-div">
                <label><b>*</b>确认密码</label>
                <div class="safety-pwd-dv">
                    <input name="password2" type="password"/>
                    <!-- <a href="javascript:;"></a> -->
                </div>
            </div>
            <div class="safety-form-div safety-form-sub">
                <label></label>
                <input onclick="return model(this)" type="submit" value="确定并保存"/>
            </div>
            {{csrf_field()}}
        </form>
    </div>
@stop

