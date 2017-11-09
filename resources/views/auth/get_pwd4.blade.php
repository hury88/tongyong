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
        {{csrf_field()}}
        <h2>密码成功找回</h2>
        <div class="findpwd-back-notice1"><img src="/img/smile.png"/>恭喜您成功找回密码</div>
        <div class="findpwd-back-notice2"><p>尊敬的用户，您已成功找回密码，<em>5</em>秒后页面将自动登录！</p></div>
        <a href="/" class="go-back">返回首页</a>
    </div>

    <script type="text/javascript">
        $(function(){
            var t=setTimeout(function(){
                jianyimiao()
            },1000);
            function jianyimiao() {
                var ss=parseInt($('.findpwd-back-notice2 p em').text())
                if(ss>0){
                    var sss=ss-1;
                    $('.findpwd-back-notice2 p em').html(sss)
                    setTimeout(function(){
                        jianyimiao()
                    },1000);
                }else{
                    location.href='/';
                }

            }
        })
    </script>
@stop
