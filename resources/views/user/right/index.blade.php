<h3>基本资料</h3><?php define('NEED_ALERT', 1) ?>
<style>
    .upload-headimg-left img{
        width: 370px;
        height: 370px;
    }
    .imgwrap-middle img{
        width:160px;
        height: 160px;
    }
    .imgwrap-small img{
        width:90px;
        height:90px;
    }
</style>
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
        <form class="form" action="{{route('uploadheadimg')}}" enctype="multipart/from-data" method="post">
            {{csrf_field()}}
            <div class="message-upload-box clearfix">
                <p>选择您要上传的头像</p>
                <input onchange="previewImage(this)" class="upload-file-inp" type="file" name="headimg"/>
            </div>
            <p class="message-upload-type">仅支持JPG、GIF、PNG、JPEG、BMP格式，文件小于100k</p>
            <div class="upload-headimg clearfix">
                <div class="upload-headimg-left fl">
                    <!-- <img id="img1-box" width="370" src="/img/base-mess.png"/> -->
                    <img id="img1-box" src="/img/base-mateil-bigimg_01.jpg"/>
                </div>
                <div class="upload-headimg-right fl">
                    <p>效果预览</p>
                    <span>你上传的图片会自动生成3种尺寸，请注意小尺寸的头像是否清晰</span>
                    <div class="small-img-box clearfix">
                        <div class="smallimg-box-left fl">
                            <div class="imgwrap-middle">
                                <img id="img2-box" src="img/base-mateil-small_01.jpg"/>
                            </div>
                            <p>大尺寸头像，139*139像素</p>
                        </div>
                        <div class="smallimg-box-right fl">
                            <div class="imgwrap-small">
                                <img id="img3-box" src="img/base-mateil-small_01.jpg"/>
                            </div>
                            <p>41*41像素</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="base-message-save">
                <input onclick="return model(this)" class="save-inp" type="button" value="保 存"/>
                <a href="javascript:window.history.back();" class="reset-a">取 消</a>
            </div>
        </form>
    </div>
</div>
<script>
//图片上传预览    IE是用了滤镜。
function previewImage(file,id)
{
    var img1 = document.getElementById("img1-box");
    var img2 = document.getElementById("img2-box");
    var img3 = document.getElementById("img3-box");
    if (file.files && file.files[0])
    {
        var exts ="jpg,jpeg,gif,png,bmp,JPG,JPEG,GIF,PNG,BMP";
        if (exts.indexOf(lastname(file.value)) < 0) {
            // alert("请上传JPG、BMP、PNG、GIF格式");
            dialog(3,["请上传JPG、BMP、PNG、GIF格式", "上传格式不正确"],{cancel:"取消"});
            return;
        };

        var reader = new FileReader();
        reader.onload = function(evt){
            src = evt.target.result
            img1.src = src;
            img2.src = src;
            img3.src = src;
        }
        reader.readAsDataURL(file.files[0]);
    }
}
function lastname(filename) {
    var index = filename.lastIndexOf(".");
    var ext = filename.substr(index+1);
    return ext;
}
</script>