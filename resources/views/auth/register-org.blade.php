  @extends('auth.layouts/register')
@section('title') 企业@parent @stop
@section('css')@parent    <link rel="stylesheet" type="text/css" href="/plugins/business-location/css/city-picker.css"/>@stop
@section('bodyNextLabel')
<body>
    <div class="pager_wrap login_wrap">
    @stop
@section('register_header')
    <h1 class="fl">我是<font style="color:red">企业</font>加入中国职业培训网</h1>
    <a style="color:red" class="register-cate fr" href="{{u('register', 'org')}}"><img src="/img/qiye.png"/>我是企业</a>
    <a class="register-cate fr" href="{{u('register', 'person')}}"><img src="/img/student.png"/>我是学生</a>
    @stop {{-- end register_header --}}
@section('form')
<form class="form" action="{{url('register/org')}}">
    <div class="register-form-div">
        <input name="org" type="text" placeholder="请输入企业名称"/>
    </div>
    <div class="register-form-div list1" style="position:relative">
        <input name="location" class="form-control" readonly type="text" value="" data-toggle="city-picker">
    </div>
    <!-- <div class="register-form-div list1">
       <div class="dd">
           <div class="store-selector">
               <input type="hidden" name="location" value="安徽合肥高新区"/>
               <div class="text"><div>请选择所在地</div><b></b></div>
               <div onclick="$('.store-selector').removeClass('hover')" class="close"></div>
           </div>
           <div class="store-prompt"><strong></strong></div>
       </div>
       </div> -->
    <div class="register-form-div">
       <input name="contact" type="text" placeholder="请输入联系人姓名"/>
   </div>
   @stop
@section('formEnd')
</form>
   @stop {{-- end form (public) --}}
@section('protocal')
    <div class="company-agreement">
        <label>
            <input type="radio" name="protocal" value="我已阅读并接受《中国职业培训网企业会员注册协议》"/>
            <span></span>
        </label>
        <p class="agreement-content">我已阅读并接受<b>《中国职业培训网企业会员注册协议》</b></p>
    </div>
    @stop {{-- end protocal --}}
@section('protocal_content')
    <div class="mask-header">
        <h2 class="fl">中国职业培训网企业会员注册协议</h2>
        <a class="close-cover fr" href="javascript:;"><img src="/img/cover-close.png"/></a>
        <div class="clearfix"></div>
    </div>
      <div class="mask-content">
        {!! htmlspecialchars_decode(v_id(94,'content')) !!}
      </div>
    @stop {{-- end protocal content --}}
@section('scripts')
@parent<script type="text/javascript" src="/js/plugins/business-location/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/plugins/business-location/js/city-picker.data.js"></script>
<script type="text/javascript" src="/plugins/business-location/js/city-picker.js"></script>
@section('send_yzm')
    $("#mail").click(function(){
    model(this, "{{u('org/yzm/mail')}}");
    return false;
    })
    $("#mobile").click(function(){
    model(this, "{{u('org/yzm/mobile')}}");
    return false;
    })
@stop {{-- end 发送验证码js --}}
@stop

