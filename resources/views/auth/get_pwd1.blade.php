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
            <form class="form" method="post" action="{{route('password.request2')}}">
                {{csrf_field()}}
                <div class="findpwd-step1-div">
                    <input type="text" name="username" placeholder="请输入邮箱/手机号"/>
                </div>
                <div class="findpwd-step1-code">
                    <input type="text" name="yzm" id="yzm" placeholder="请输入验证码"/>

                    <a href="javascript:void(0);"  class="findpwd-getcode"><img onClick="this.src='/yzm/reset1?'+(new Date()).getTime()" src="/yzm/reset1" /></a>
                </div>
                <div class="findpwd-step1-sub">
                    <input class="model" type="submit" value="下一步" id="submit"/>
                </div>
            </form>
        </div>
    </div>
@stop

@section('scripts')
@parent
<script type="text/javascript">
    $('#submit').click(function () {
        var telemail=$('#telemail').val()
        var yzm=$('#yzm').val()
        if(!telemail){
            alert('请输入你注册时邮箱/手机');
            $('#telemail').focus()
            return false
        }
        if(!yzm){
            alert('请输入验证码');
            $('#telemail').focus()
            return false
        }
    })
</script>
@stop
