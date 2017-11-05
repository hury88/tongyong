
<h3>修改密码</h3>
<div class="safety-form">
    <form onsubmit="return ck_password(this)" name="formlist">
        {{ csrf_field() }}
        <div class="safety-form-div">
            <label>原始密码</label>
            <div class="safety-pwd-dv">
                <input type="password" name="oldpass" id="oldpass"/>
                <a href="javascript:;"></a>
            </div>
        </div>
        <div class="safety-form-div">
            <label>新密码</label>
            <div class="safety-pwd-dv">
                <input type="password"  name="pass1"  id="pass1"/>
                <a href="javascript:;"></a>
            </div>
        </div>
        <div class="safety-form-div">
            <label>确认密码</label>
            <div class="safety-pwd-dv">
                <input type="password"   name="pass1_confirmation"  id="pass2"/>
                <a href="javascript:;"></a>
            </div>
        </div>
        <div class="safety-form-div clearfix">
            <label></label>
            <input class="safety-form-sub1" type="submit" value="保存"/>
            <a href="{{u("person")}}" class="safety-form-reset1">取 消</a>
        </div>
    </form>
</div>
<script type="text/javascript">
    function ck_password(formlist){
        var oldpass=$("#oldpass").val();
        var pass1=$("#pass1").val();
        var pass2=$("#pass2").val();
        if(!oldpass){
            alert("提示：请输入原密码！");
            $("#oldpass").focus();
            return false;
        }
        if(!pass1){
            alert("提示：请输入新密码！");
            $("#pass1").focus();
            return false;
        }
        if(!pass2){
            alert("提示：请输入确认密码！");
            $("#pass2").focus();
            return false;
        }
        if(pass1!=pass2){
            alert("提示：确认密码和新密码不一样！");
            $("#pass1").focus();
            return false;
        }
        var formdata=$(formlist).serialize();
        $.post("{{u("person","xgmm")}}",formdata,function(data){
            if(data==200){
                alert("提示：修改成功！");
                location.href="{{u("person")}}";
            } else{
                alert("提示：修改失败！");
            }
        })
        return false;
    }
</script>