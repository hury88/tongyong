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
@section('content')
	@include('user.partial.menu_dashboard')
	@section('user_wrap')
	<div class="pager-wrap order-detials-box">
	    <div class="wrap-box nation-edu clearfix">
	        <div class="nation-edu-left fl">
		    	<div class="headimg-img">
		    	    <img src="/img/header-img.png"/>
		    	    <p>修改头像</p>
		    	</div>
		    	<div class="personal-username">欢迎回来，{{$user['member_name']}}</div>
		    	<form action="{{ route('logout')}}" method="post"><a class="quit-personal" href="javascript:;">退出</a>{!! csrf_field() !!}</form>
	        	@section('menu_left')
					@if (empty($GLOBALS['uri'][1]))
						@include('user.left.person')
					@elseif($GLOBALS['uri'][1]=="jianli")
						@include('user.left.jianli')
					@elseif($GLOBALS['uri'][1]=="order")
						@include('user.left.order')
					@else
						@include('user.left.person')
					@endif
	        	@show
	        </div>
        	<div class="nation-edu-right fr">
        	    <div class="nation-edu-right-box">
        	    	@section('menu_right')
						@if (empty($GLOBALS['uri'][1]))
							@include('user.right.index')
						@elseif($GLOBALS['uri'][1]=="password")
							@include('user.right.password')
						@elseif($GLOBALS['uri'][1]=="telphone")
							@include('user.right.telphone')
						@elseif($GLOBALS['uri'][1]=="email")
							@include('user.right.email')
						@elseif($GLOBALS['uri'][1]=="certified")
							@if($user['certified']==1)
								@include('user.right.certified')
							@else
								@include('user.right.certified_wrz')
							@endif

						@elseif($GLOBALS['uri'][1]=="message")
							@if(empty($GLOBALS['uri'][2]))
								@include('user.right.message')
							@else
								@include('user.right.message_view')
							@endif

						@elseif($GLOBALS['uri'][1]=="jianli")
							@if(empty($GLOBALS['uri'][2]))
								@include('user.right.jianli')
							@elseif($GLOBALS['uri'][2]=="toudi")
								@include('user.right.jianlitoudi')
							@elseif($GLOBALS['uri'][2]=="jianlimsyq")
								@include('user.right.jianlimsyq')
							@elseif($GLOBALS['uri'][2]=="msyqview")
								@include('user.right.jianlimsyqview')
							@elseif($GLOBALS['uri'][2]=="down")
								@include('user.right.jianlidown')
							@elseif($GLOBALS['uri'][2]=="wdsc")
								@include('user.right.jianliwdsc')
							@elseif($GLOBALS['uri'][2]=="wdbmb")
								@include('user.right.orderbmbzyzs')
							@endif


						@elseif($GLOBALS['uri'][1]=="order")
							@if(empty($GLOBALS['uri'][2]))
								@include('user.right.order')
							@elseif($GLOBALS['uri'][2]=="orderbmbzyzs")
								@include('user.right.orderbmbzyzs')
							@endif


						@endif

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
	<script src="/js/ckform.js" type="text/javascript"></script>
@stop
