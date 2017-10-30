@extends('layouts.master')

@section('title')个人中心 @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/common_gerenzhongxin.css"/>
    <link rel="stylesheet" type="text/css" href="/css/personalCenter.css"/>
@stop
@section('bodyNextLabel')
@parent
@stop
@section('navigation') @parent @show
</div>
@section('content')
	@include('user.partial.menu_dashboard')
	@section('user_wrap')
	<div class="pager-wrap order-detials-box">
	    <div class="wrap-box nation-edu clearfix">
	        <div class="nation-edu-left fl">
		    	<div class="headimg-img">
		    	    <img src="img/header-img.png"/>
		    	    <p>修改头像</p>
		    	</div>
		    	<div class="personal-username">欢迎回来，{{$user['member_name']}}</div>
		    	<form action="{{ route('logout')}}" method="post"><a class="quit-personal" href="javascript:;">退出</a>{!! csrf_field() !!}</form>
	        	@section('menu_left')
	        	<h2 class="personal-order">账户设置</h2>
	        	<div class="personal-order-nav">
	        	    <ul>
	        	        <li class="nav-on">
	        	            <a class="yiji-a" href="javascript:;">基本信息<i></i></a>
	        	        </li>
	        	        <li>
	        	            <a class="yiji-a" href="javascript:;">安全设置<i></i></a>
	        	        </li>
	        	        <li>
	        	            <a class="yiji-a" href="javascript:;">实名认证<i></i></a>
	        	        </li>
	        	        <li>
	        	            <a class="yiji-a" href="javascript:;">消息管理<i></i></a>
	        	        </li>
	        	    </ul>
	        	</div>
	        	@show
	        </div>
        	<div class="nation-edu-right fr">
        	    <div class="nation-edu-right-box">
        	    	@section('menu_right')
        	    		<h3>基本资料</h3>
        	    		<div class="user-base-message">
        	    		    <ul>
        	    		        <li class="clearfix">
        	    		            <div class="base-message-left fl">
        	    		                <p class="base-message-p">
        	    		                    <span>账号：</span>18654567680
        	    		                </p>
        	    		            </div>
        	    		        </li>
        	    		        <li class="clearfix">
        	    		            <div class="base-message-left fl">
        	    		                <p class="base-message-p">
        	    		                    <span>密码：</span>*******
        	    		                </p>
        	    		            </div>
        	    		            <a href="javascript:;" class="base-message-update fl">修改</a>
        	    		        </li>
        	    		        <li class="clearfix">
        	    		            <div class="base-message-left fl">
        	    		                <p class="base-message-p">
        	    		                    <span>手机号码：</span>18654567680
        	    		                </p>
        	    		            </div>
        	    		            <a href="javascript:;" class="base-message-update fl">修改</a>
        	    		        </li>
        	    		        <li class="clearfix">
        	    		        <div class="base-message-left fl">
        	    		            <p class="base-message-p">
        	    		                <span>电子邮箱：</span>865456775@qq.com
        	    		            </p>
        	    		        </div>
        	    		        <a href="javascript:;" class="base-message-update fl">修改</a>
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
        	    		                    <img src="img/base-mess.png"/>
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
        	    	@show
        		</div>
        	</div>
    	</div>
	@show
    <!-- </div> -->
@stop {{-- end content --}}
<!-- </div> -->
@section('footer')
   @parent
@stop

@section('scripts')
    @parent
@stop
