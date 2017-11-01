@extends('auth.layouts/public')
@section('title')会员登陆 @parent @stop
@section('headMeta')
@parent    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stop {{--  end meta  --}}
@section('bodyNextLabel')
<body class="in_body">
    <div class="pager_wrap login_wrap">
@stop
@section('content')
    <div class="login-box">
      @include('auth.partial.auth_head')
       <div class="login-content">
           <div class="login-content-l fl">
               <h2>高端职业</h2>
               <h2>培训首选平台</h2>
               <p>为近万名学生轻松解决就业烦恼、成功塑造就业未来</p>
           </div>
           <div class="login-contetn-r fr">
              <form class="form" method="post" action="{{route('login')}}">
                 <div class="form-title">
                     <ul class="form-title-ul">
                         <li class="form-title-li {{request()->has('org') ? '' : 'active'}}">
                             <a href="/login?person=true">学生登录</a>
                         </li>
                         <li class="form-title-li {{request()->has('org') ? 'active' : ''}}">
                             <a href="/login?org=true">企业登录</a>
                         </li>
                     </ul>
                 </div>
                 <div class="form-div">
                     <input name="username" value="{{ old('username') }}" type="text" placeholder="请输入邮箱/手机号"/>
                 </div>
                  <div class="form-div">
                      <input name="password" value="" type="password" placeholder="请输入密码"/>
                      <a href="javascript:;"></a>
                  </div>
                  <div class="form-inp">
                  	<!-- return model(this) -->
                      <input onclick="" type="submit" value="登录"/>
                  </div>
                  {{ csrf_field() }}
              </form>
              <div class="other-link">
                  <a href="javascript:;">忘记密码?</a><span>|</span><a href="{{u('register', request()->has('org')?'org':'person')}}">用户注册</a>
              </div>
               <div class="third-login">
                   <h3>使用第三方登录</h3>
                   <div class="third-login-type">
                       <a class="qq-login" href="javascript:;"></a>
                       <a class="weibo-login" href="javascript:;"></a>
                   </div>
               </div>
           </div>
           <div class="clearfix"></div>
       </div>
        <div class="login-footer">
           <p class="login-footer-p">{{$boot_config['copyright']}} <span>|</span> <a href="http://www.semfw.cn" target="_blank" class="active"><b>技术支持：科威网络</b></a></p>
        </div>
    </div>
@stop

@section('scripts')
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/alert.min.js"></script>
<script>
	$(".form-title-li").click(function(){
		$(this).addClass('active').siblings().removeClass("active");
		$(".form-div:eq(1) input").val("");
	})
@if (count($errors) > 0)
	model_notice(412, "登陆失败", "@foreach ($errors->all() as $error) {{ $error }}</br> @endforeach");
@endif
</script>
@stop
