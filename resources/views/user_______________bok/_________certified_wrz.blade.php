@if($user['certified_status'] == 2)
<?php define('NEED_ALERT', 1) ?><a class="approved" href="javascript:;">未实名认证</a>
    <h3>实名认证</h3>
</div>
<div class="authentication-guide">
    <img src="/img/close-icon.png"/>
    <div class="guide-div">
        <p class="guide-title">
            未通过实名认证
        </p>
        <p class="guide-content">您还未实名认证，请实名认证让我们认识您，让您可以享受更多的优惠及保障</p>
    </div>
</div>
<script src="/plugins/YMDClass.js"></script>
<div class="nation-edu-right-box">
    <div class="user-authentication">

        <div class="user-authentication-mess">
            <form class="form" method="post" action="{{u("person","smrz")}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="user-authentication-dv clearfix">
                    <div class="user-authentication-left fl">
                        真实姓名
                    </div>
                    <div class="user-authentication-right fr">
                        <input class="true-name" type="text" name="real_name" value=""/>
                    </div>
                </div>
                <div class="user-authentication-dv clearfix">
                    <div class="user-authentication-left fl">
                        性别
                    </div>
                    <div class="user-authentication-right fr">
                        <label class="user-authentication-chose">
                            <input type="radio" name="gendar" value="男"/>
                            男
                        </label>
                        <label class="user-authentication-chose">
                            <input type="radio" name="gendar" value="女"/>
                            女
                        </label>
                    </div>
                </div>
                <div class="user-authentication-dv clearfix">
                    <div class="user-authentication-left fl">
                        出生日期
                    </div>
                    <div class="user-authentication-right fr">
                        <select class="user-authentication-time" name="year"> </select>
                        <select class="user-authentication-time" name="month"> </select>
                        <select class="user-authentication-time" name="day"> </select>
                    </div>
                </div>
                <div class="user-authentication-dv clearfix">
                    <div class="user-authentication-left fl">
                        身份证号
                    </div>
                    <div class="user-authentication-right fr">
                        <input class="true-name" type="number" name="card"/>
                    </div>
                </div>
                <div class="user-authentication-dv clearfix">
                    <div class="user-authentication-right fr">
                        <div class="user-authentication-txt">
                            <img src="/img/gan-tan.png"/>
                            <p>
                                根据《中华人民共和国网络安全法》，使用中国职业培训网平台进行互联网求职或培训，须提交人个人的认证材料。身份证仅用于审核,不会向第三方透露,请放心上传！”
                            </p>
                        </div>
                    </div>
                </div>
                <div class="black4"></div>
                <div class="user-authentication-dv clearfix">
                    <div class="user-authentication-left fl">
                        <div class="black24"></div>
                        上传身份证
                    </div>
                    <div class="user-authentication-right fr">
                        <div class="authentication-right-upload fl">
                            <div class="upload-card-zhen">
                                <p>选择您要上传的身份证正面</p>
                                <input onchange="previewImage(this,'front-box')" class="upload-file-inp" type="file" name="front"/>
                            </div>
                            <p class="card-limit">
                                请上传的图片支持jpg/png格式，<br>
                                单张图片不超过1M
                            </p>
                            <div class="card-img-box">
                                <img width="225" id="front-box" src="/img/zhengmian.png"/>
                            </div>
                        </div>
                        <div class="authentication-left-upload fr">
                            <div class="upload-card-zhen">
                                <p>选择您要上传的身份证反面</p>
                                <input onchange="previewImage(this,'back-box')" class="upload-file-inp" type="file" name="back"/>
                            </div>
                            <p class="card-limit">
                                请上传的图片支持jpg/png格式，<br>
                                单张图片不超过1M
                            </p>
                            <div class="card-img-box">
                                <img width="225" id="back-box" src="/img/fanmian.png"/>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="black4"></div>
                </div>
                <input onclick="return model(this)" class="safety-form-sub1" type="submit" value="立即提交">
            </form>
        </div>
    </div>
</div>
<script>
    //图片上传预览    IE是用了滤镜。
    function previewImage(file,id)
    {
        var img = document.getElementById(id);
        if (file.files && file.files[0])
        {
            var exts ="jpg,jpeg,gif,png,bmp,JPG,JPEG,GIF,PNG,BMP";
            if (exts.indexOf(lastname(file.value)) < 0) {
                dialog(3,["请上传JPG、BMP、PNG、GIF格式", "上传格式不正确"],{cancel:"取消"});
                return;
            };

            var reader = new FileReader();
            reader.onload = function(evt){
                src = evt.target.result
                img.src = src;
            }
            reader.readAsDataURL(file.files[0]);
        }
    }
    function lastname(filename) {
        var index = filename.lastIndexOf(".");
        var ext = filename.substr(index+1);
        return ext;
    }
    /*日期插件引入*/
    new YMDselect('year','month','day');
</script>
@else