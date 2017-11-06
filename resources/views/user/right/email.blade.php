<?php define('NEED_ALERT', 1) ?>
<h3 class="nation-edu-right-titel">
    <a href="javascript:;">基本资料</a>
    <span>  >  </span>
    <a href="javascript:;">修改邮箱号码</a>
</h3>
<div class="safety-form">
    <form class="form" action="{{route('p_email')}}">
        <div class="safety-form-div">
            <label>新邮箱号码</label>
            <div class="safety-pwd-dv">
                <input type="email" name="email"/>
            </div>
        </div>
        <div class="safety-form-div">
            <label>邮箱验证码</label>
            <div class="safety-pwd-dv">
                <input class="write-phone-code" type="text" name="yzm"/>
                <input onclick="return model(this, '{{route('p_email_yzm')}}')" class="get-phone-code" type="button"  value="获取验证码"/>
            </div>
        </div>
        <div class="safety-form-div clearfix">
            <label></label>
            <input onclick="return model(this)" class="safety-form-sub1" type="submit" value="提交"/>
        </div>
        {{ csrf_field() }}
    </form>
</div>