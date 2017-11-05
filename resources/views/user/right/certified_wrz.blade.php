<a class="approved" href="javascript:;">未实名认证</a>
<div class="nation-edu-right-box">
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
<div class="nation-edu-right-box">
    <div class="user-authentication">

        <div class="user-authentication-mess">
            <form onsubmit="return ck_wrz(this)" method="post" action="{{u("person","smrz")}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="user-authentication-dv clearfix">
                    <div class="user-authentication-left fl">
                        真实姓名
                    </div>
                    <div class="user-authentication-right fr">
                        <input class="true-name" type="text" name="realname" value=""/>
                    </div>
                </div>
                <div class="user-authentication-dv clearfix">
                    <div class="user-authentication-left fl">
                        性别
                    </div>
                    <div class="user-authentication-right fr">
                        <label class="user-authentication-chose">
                            <input type="radio" name="sex" value="男"/>
                            男
                        </label>
                        <label class="user-authentication-chose">
                            <input type="radio" name="sex" value="女"/>
                            女
                        </label>
                    </div>
                </div>
                <div class="user-authentication-dv clearfix">
                    <div class="user-authentication-left fl">
                        出生日期
                    </div>
                    <div class="user-authentication-right fr">
                        <select class="user-authentication-time" name="year">
                            <option value="---年---">---年---</option>
                        </select>
                        <select class="user-authentication-time"  name="month">
                            <option value="---月---">---月---</option>
                        </select>
                        <select class="user-authentication-time"  name="day">
                            <option value="---日---">---日---</option>
                        </select>
                    </div>
                </div>
                <div class="user-authentication-dv clearfix">
                    <div class="user-authentication-left fl">
                        身份证号
                    </div>
                    <div class="user-authentication-right fr">
                        <input class="true-name" type="text" name="card"/>
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
                                <input class="upload-file-inp" type="file" name="img1"/>
                            </div>
                            <p class="card-limit">
                                请上传的图片支持jpg/png格式，<br>
                                单张图片不超过1M
                            </p>
                            <div class="card-img-box">
                                <img src="/img/zhengmian.png"/>
                            </div>
                        </div>
                        <div class="authentication-left-upload fr">
                            <div class="upload-card-zhen">
                                <p>选择您要上传的身份证反面</p>
                                <input class="upload-file-inp" type="file" name="img2"/>
                            </div>
                            <p class="card-limit">
                                请上传的图片支持jpg/png格式，<br>
                                单张图片不超过1M
                            </p>
                            <div class="card-img-box">
                                <img src="/img/fanmian.png"/>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="black4"></div>
                </div>
                <input type="submit" value="立即提交">

            </form>
        </div>
    </div>
</div>