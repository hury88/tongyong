<?php define('NEED_ALERT', 1) ?>
<h3 class="nation-edu-right-titel">
    <a href="javascript:;">基本资料</a>
    <span>  >  </span>
    <a href="javascript:;">修改手机号</a>
</h3>
<div class="safety-form">
    <form class="form" action="{{route('p_telphone')}}">
        <div class="safety-form-div">
            <label>新手机号码</label>
            <div class="safety-pwd-dv">
                <input type="tel" name="telphone"/>
            </div>
        </div>
        <div class="safety-form-div">
            <label>手机验证码</label>
            <div class="safety-pwd-dv">
                <input class="write-phone-code" type="text" name="yzm"/>
                <input onclick="return model(this, '{{route('p_telphone_yzm')}}')" class="get-phone-code" type="button"  value="获取验证码"/>
            </div>
        </div>
        <div class="safety-form-div clearfix">
            <label></label>
            <input onclick="return model(this)" class="safety-form-sub1" type="submit" value="提交"/>
        </div>
        {{ csrf_field() }}
    </form>
</div>