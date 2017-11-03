@extends('business.layouts.public')
@section('title') @parent @stop
@section('css') @parent
<style>
    .len-1 {width:760px;}
</style>
@stop

<?php
    define('AT_NO', 1);
    $form = new App\Helpers\BusinessConfigFormHelper($user);
?>
@section('inbox')
<div class="user-manager">
    <form action="" enctype="multipart/from-data" method="post">
        <?php
            // $form ->img('企业头像','logo',"250*150");
            $form
                ->input('企业姓名', 'business_name')
                ->input('联系人', 'contact')
                ->input('手机号', 'telphone')
                ->input('邮箱', 'email')
                ->input('微信', 'weixin')
                ->input('QQ', 'qq')
                ->display('len-1')->input('所在地', 'location')
                ->input('公司所在经纬度', 'business_name')

        ?>
        <div class="user-contact">
            <div class="useredit-form-dv clearfix">
                <span class="authentication-form-left fl"><b>*</b>企业姓名</span>
                <div class="authentication-form-right fr">
                    <input class="user-form-inp" type="text" />
                </div>
            </div>
            <div class="useredit-form-dv clearfix">
                <span class="authentication-form-left fl"><b>*</b>联系人</span>
                <div class="authentication-form-right fr">
                    <input class="user-form-inp" type="text" />
                </div>
            </div>
            <div class="useredit-form-dv clearfix">
                <span class="authentication-form-left fl"><b>*</b>手机号</span>
                <div class="authentication-form-right fr">
                    <p class="useredit-p">18255822512</p>
                    <a class="useredit-a" href="javascript:;">修改手机号</a>
                </div>
            </div>
            <div class="useredit-form-dv clearfix">
                <span class="authentication-form-left fl"><b>*</b>Email</span>
                <div class="authentication-form-right fr">
                    <p class="useredit-p">182558@qq.com</p>
                    <a class="useredit-a" href="javascript:;">修改邮箱</a>
                </div>
            </div>
            <div class="useredit-form-dv clearfix">
                <span class="authentication-form-left fl"><b>*</b>微信</span>
                <div class="authentication-form-right fr">
                    <input class="user-form-inp" type="text" />
                </div>
            </div>
            <div class="useredit-form-dv clearfix">
                <span class="authentication-form-left fl"><b>*</b>QQ</span>
                <div class="authentication-form-right fr">
                    <input class="user-form-inp" type="text" />
                    <a class="job-add" href="javascript:;"><img src="/img/tianjia.png"/>添加</a>
                </div>
            </div>
            <div class="useredit-form-dv clearfix">
                <span class="authentication-form-left fl"><b>*</b>所在地</span>
                <div class="authentication-form-right fr">
                    <input class="user-form-address" type="text" />
                </div>
            </div>
            <div class="useredit-form-dv clearfix">
                <span class="authentication-form-left fl"><b>*</b>公司所在经纬度</span>
                <div class="authentication-form-right fr">
                   <div class="user-company-location">
                       <p class="company-location-p">
                           <input type="text"><span>度</span>
                       </p>
                       经度
                   </div>
                    <div class="user-company-location">
                        <p class="company-location-p">
                            <input type="text"><span>度</span>
                        </p>
                        纬度
                    </div>
                    <p class="location-map">
                        <span>http://api.map.baidu.com/lbsapi/getpoint/index.html?qq-pf-to=pcqq.group</span>
                        <i>打开此链接获取所在位置经纬度</i>
                    </p>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
        <h4>企业信息</h4>
        <div class="user-contact">
            <div class="useredit-form-dv clearfix">
                <span class="authentication-form-left fl">上传Logo</span>
                <div class="authentication-form-right fr">
                   <div class="company-logo">
                       <img src="/img/com-logo.jpg"/>
                   </div>
                    <div class="company-logo-upload">
                        <div class="user-headimg-upload clearfix">
                            <div class="user-file-cover">
                                <p>选择文件</p>
                                <input type="file"/>
                            </div>
                            <p class="user-file-notice">选择上传后将直接替换。</p>
                        </div>
                        <p class="headimg-upload-limit">不小于100px，JPG、PNG、GIF格式，小于300k。</p>
                    </div>
                </div>
            </div>
            <div class="useredit-form-dv clearfix">
                <span class="authentication-form-left fl"><b>*</b>企业规模</span>
                <div class="authentication-form-right fr">
                   <select class="user-edit-select">
                       <option value="10-20人">10-10人</option>
                       <option value="20-50人">20-50人</option>
                       <option value="50-100人">50-100人</option>
                       <option value="100-500人">100-500人</option>
                       <option value="500人以上">500人以上</option>
                   </select>
                </div>
            </div>
            <div class="useredit-form-dv clearfix">
                <span class="authentication-form-left fl"><b>*</b>所属行业</span>
                <div class="authentication-form-right fr">
                    <select class="user-edit-select">
                        <option value="IT行业">IT行业</option>
                        <option value="销售行业">销售行业</option>
                        <option value="服务行业">服务行业</option>
                        <option value="实业">实业</option>
                    </select>
                </div>
            </div>
            <div class="useredit-form-dv clearfix">
                <span class="authentication-form-left fl"><b>*</b>企业性质</span>
                <div class="authentication-form-right fr">
                    <select class="user-edit-select">
                        <option value="民营企业">民营企业</option>
                        <option value="私人企业">私人企业</option>
                        <option value="国营企业">国营企业</option>
                    </select>
                </div>
            </div>
            <div class="useredit-form-dv clearfix">
                <span class="authentication-form-left fl"><b>*</b>官方网址</span>
                <div class="authentication-form-right fr">
                    <input class="user-form-inp" type="text" />
                </div>
            </div>
            <div class="useredit-form-dv clearfix">
                <span class="authentication-form-left fl"><b>*</b>企业介绍</span>
                <div class="authentication-form-right fr">
                  <img src="/img/edit.jpg"/>
                </div>
            </div>
            <div class="useredit-form-dv clearfix">
                <div class="authentication-form-right fr">
                    <input onclick="return model(this)" type="submit" value="确定并保存"/>
                    <a class="user-edit-cancel" href="javascript:;">取消</a>
                </div>
            </div>
        </div>
        {{csrf_field()}}
    </form>
</div>
@stop