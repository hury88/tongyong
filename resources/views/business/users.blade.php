@extends('business.layouts.master')

@section('title') 招聘 @parent @stop

@section('main')
<div class="safety-setting-content">
    <h2 class="member-pager-title">用户管理</h2>
    <div class="member-pager-location">
        <i class="icon-index1"></i>
        <span>我的位置：</span>
        <a href="javascript:;">用户管理</a>
    </div>
    <div class="safety-content-box">
        <h3>用户管理</h3>
        <div class="user-manager">
            <form action="" enctype="multipart/from-data" method="post">
                <h4>企业头像</h4>
                <div class="upload-headimg clearfix">
                       <div class="user-headimg-box">
                           <img src="/img/member-headerimg.png"/>
                       </div>
                        <div class="user-upload-box">
                            <div class="user-headimg-upload clearfix">
                                <div class="user-file-cover">
                                    <p>选择文件</p>
                                    <input type="file"/>
                                </div>
                                <p class="user-file-notice">选择上传后将直接替换。</p>
                            </div>
                            <p class="headimg-upload-limit">建议长宽1:1，不小于100px，JPG、PNG、GIF格式，小于300k。</p>
                        </div>
                    </div>
                <h4>联系方式</h4>
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
                            <input class="user-edit-sub" type="submit" value="确定并保存"/>
                            <a class="user-edit-cancel" href="javascript:;">取消</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @parent
</div>
@stop