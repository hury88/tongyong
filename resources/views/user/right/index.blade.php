<h3>基本资料</h3>
<div class="user-base-message">
    <ul>
        <li class="clearfix">
            <div class="base-message-left fl">
                <p class="base-message-p">
                    <span>账号：</span>{{$user['member_name']}}
                </p>
            </div>
        </li>
        <li class="clearfix">
            <div class="base-message-left fl">
                <p class="base-message-p">
                    <span>密码：</span>*******
                </p>
            </div>
            <a href="{{u("person","password")}}" class="base-message-update fl">修改</a>
        </li>
        <li class="clearfix">
            <div class="base-message-left fl">
                <p class="base-message-p">
                    <span>手机号码：</span>{{$user['telphone']}}
                </p>
            </div>
            <a href="{{u("person","telphone")}}" class="base-message-update fl">修改</a>
        </li>
        <li class="clearfix">
            <div class="base-message-left fl">
                <p class="base-message-p">
                    <span>电子邮箱：</span>{{$user['email']}}
                </p>
            </div>
            <a href="{{u("person","email")}}" class="base-message-update fl">修改</a>
        </li>
        <li class="clearfix">
            <div class="base-message-left fl">
                <p class="base-message-p">
                    <span>上传头像：</span>
                </p>
            </div>
        </li>
    </ul>
    <div class="base-message-upload">
        <form action="" enctype="multipart/from-data" method="post">
            <div class="message-upload-box clearfix">
                <p>选择您要上传的头像</p>
                <input class="upload-file-inp" type="file" name="uploadimg"/>
            </div>
            <p class="message-upload-type">仅支持JPG、GIF、PNG、JPEG、BMP格式，文件小于100k</p>
            <div class="upload-headimg clearfix">
                <div class="upload-headimg-left fl">
                    <img src="/img/base-mess.png"/>
                </div>
                <div class="upload-headimg-right fl">
                    <p>效果预览</p>
                    <span>你上传的图片会自动生成3种尺寸，请注意小尺寸的头像是否清晰</span>
                    <div class="small-img-box clearfix">
                        <div class="smallimg-box-left fl">
                            <div class="imgwrap-middle">
                                <span>无预览头像</span>
                            </div>
                            <p>大尺寸头像，139*139像素</p>
                        </div>
                        <div class="smallimg-box-right fl">
                            <div class="imgwrap-small">
                                <span>无预览头像</span>
                            </div>
                            <p>41*41像素</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="base-message-save">
                <input class="save-inp" type="submit" value="保 存"/>
                <a href="javascript:;" class="reset-a">取 消</a>
            </div>
        </form>
    </div>
</div>