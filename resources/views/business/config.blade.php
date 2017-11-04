@extends('business.layouts.public')
@section('title') @parent @stop
@section('css') @parent
@include('partial.editor')
<style>
    .len-1 {width:760px;}
</style>
@stop

<?php
    define('AT_CU', 1);
    $form = new App\Helpers\BusinessConfigFormHelper($user);
?>
@section('inbox')
<div class="user-manager">
    <form class="form" action="{{route('b_config')}}" enctype="multipart/from-data" method="post">
        <div class="user-contact">
        <?php
            // $form ->img('企业头像','logo',"250*150");
            $form
                ->hide('_token', csrf_token())
                ->img('企业头像', 'img', '250*150')
                ->input('企业姓名', 'business_name')
                ->input('联系人', 'contact')
                ->word('<a class="useredit-a" href="javascript:;">修改手机号</a>')->input2('手机号', 'telphone')
                ->word('<a class="useredit-a" href="javascript:;">修改邮箱</a>')->input2('邮箱', 'email')
                ->input('微信', 'weixin')
                ->input('QQ', 'qq')
                ->display('len-1')->input('所在地', 'location')
        ?>
            <div class="useredit-form-dv clearfix">
                <span class="authentication-form-left fl"><b>*</b>公司所在经纬度</span>
                <div class="authentication-form-right fr">
                   <div class="user-company-location">
                       <p class="company-location-p">
                           <input value="<?=$form->jing?>" name="jing" type="text"><span>度</span>
                       </p>
                       经度
                   </div>
                    <div class="user-company-location">
                        <p class="company-location-p">
                            <input value="<?=$form->wei?>" name="wei" type="text"><span>度</span>
                        </p>
                        纬度
                    </div>
                    <p class="location-map">
                        <span><a target="_blank" href="http://api.map.baidu.com/lbsapi/getpoint/index.html?qq-pf-to=pcqq.group">http://api.map.baidu.com/lbsapi/getpoint/index.html?qq-pf-to=pcqq.group</a></span>
                        <i>打开此链接获取所在位置经纬度</i>
                    </p>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
        <h4>企业信息</h4>
        <div class="user-contact">
            <?php
                $form
                    ->img('上传logo', 'logo')
                    ->select(config('config.business.size'), '企业规模', 'size')
                    ->select(config('config.business.cate'), '所属行业', 'cate')
                    ->select(config('config.business.nature'), '企业性质', 'nature')
                    ->input('官方网址', 'siteurl')
                    ->editor('企业介绍', 'business_introduction')
             ?>
            <div class="useredit-form-dv clearfix">
                <div class="authentication-form-right fr">
                    <input class="user-edit-sub" onclick="return model(this)" type="submit" value="确定并保存"/>
                    <a class="user-edit-cancel" href="javascript:;">取消</a>
                </div>
            </div>
        </div>
    </form>
</div>
@stop