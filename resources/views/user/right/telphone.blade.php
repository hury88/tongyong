<h3 class="nation-edu-right-titel">
    <a href="javascript:;">基本资料</a>
    <span>  >  </span>
    <a href="javascript:;">修改手机号</a>
</h3>
<div class="safety-form">
    <form onsubmit="return ck_tel(this)" name="formlist">
        <input type="hidden" name="type" value="tel">
        {{ csrf_field() }}
        <div class="safety-form-div">
            <label>新手机号码</label>
            <div class="safety-pwd-dv">
                <input type="tel" name="tel" id="tel"/>
            </div>
        </div>
        <div class="safety-form-div">
            <label>手机验证码</label>
            <div class="safety-pwd-dv">
                <input class="write-phone-code" type="text" name="yzm" id="yzm"/>
                <input class="get-phone-code" type="button"  value="获取验证码" id="get_yzm"/>
            </div>
        </div>
        <div class="safety-form-div clearfix">
            <label></label>
            <input class="safety-form-sub1" type="submit" value="提交"/>
        </div>
    </form>
</div>


<script type="text/javascript">
    function ck_tel(formlist){
        var tel=$("#tel").val();
        var yzm=$("#yzm").val();
        if(!tel){
            alert("提示：请输入新手机号码！");
            $("#tel").focus();
            return false;
        }
        if(!yzm){
            alert("提示：请输入验证码！");
            $("#yzm").focus();
            return false;
        }
        var formdata=$(formlist).serialize();
        $.post("/person/xgtel",formdata,function(data){
            if(data==200){
                alert("提示：修改成功！");
                location.href="/person";
            } else{
                alert("提示：修改失败！");
            }
        })
        return false;
    }


</script>