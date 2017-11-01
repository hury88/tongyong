@extends('business.layouts.public')
@section('title') @parent @stop
@section('inbox')
    <div class="safety-form">
        <form>
            <div class="safety-form-div">
                <label><b>*</b>旧密码</label>
                <div class="safety-pwd-dv">
                    <input type="password"/>
                    <a href="javascript:;"></a>
                </div>
            </div>
            <div class="safety-form-div">
                <label><b>*</b>新密码</label>
                <div class="safety-pwd-dv">
                    <input type="password"/>
                    <a href="javascript:;"></a>
                </div>
            </div>
            <div class="safety-form-div">
                <label><b>*</b>确认密码</label>
                <div class="safety-pwd-dv">
                    <input type="password"/>
                    <a href="javascript:;"></a>
                </div>
            </div>
            <div class="safety-form-div safety-form-sub">
                <label></label>
                <input class="form" type="submit" value="确定并保存"/>
            </div>
        </form>
    </div>
@stop

