@extends('layouts/master')
@section('title') @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/common_dengluzhuce.css"/>
    <link rel="stylesheet" type="text/css" href="/css/login.css"/>
@stop
@section('bodyNextLabel')
<body>
	<div class="pager_wrap login_wrap">
@stop
@section('navigation')
	&nbsp;
@show
@section('content')
    <div class="register-box">
        <div class="login-header">
            <div class="login-header-l fl">
                <a class="login-logo" href="javascript:void(0)">
                    <img src="img/login-logo.png" alt=""/>
                    中国职业培训网
                </a>
                <a class="login-address" href="javascript:void(0)">合肥</a>
            </div>
            <div class="login-header-r fr">
                <ul class="login-nav-ul">
                    <li class="login-nav-li">
                        <a href="javascript:void(0)">首页</a>
                    </li>
                    <li class="login-nav-li">
                        <a href="javascript:void(0)">使用帮助</a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="pager_wrap register-wrap">
        <div class="login-register-box register-content">
           <div class="register-header">
               <h1 class="fl">我是学生加入中国职业培训网</h1>
               <a class="register-cate fr" href="javascript:;"><img src="img/qiye.png"/>我是企业</a>
               <div class="clearfix"></div>
           </div>
            <div class="register-detials">
                <div class="register-left fl">
                    <div class="register-tab">
                        <ul>
                            <li class="select"><i></i>手机注册</li>
                            <li><i></i>邮箱注册</li>
                        </ul>
                    </div>
                    <div class="register-tab-content">
                        <div class="register-content-box" style="display:block;">
                            <form>
                                <div class="register-form-div">
                                    <input type="text" placeholder="请输入真实姓名"/>
                                </div>
                                <div class="register-form-div">
                                    <input type="text" placeholder="请输入手机号"/>
                                </div>
                                <div class="register-form-dv">
                                    <input class="form-code-inp" type="text" placeholder="请输入手机验证码"/>
                                    <input class="form-code-get" type="button" value="获取验证码"/>
                                </div>
                                <div class="register-form-psw">
                                    <input type="password" placeholder="请输入您的密码"/>
                                    <a href="javascript:;"></a>
                                </div>
                                <div class="register-form-psw">
                                    <input type="password" placeholder="请确认密码"/>
                                    <a href="javascript:;"></a>
                                </div>
                                <div class="company-agreement">
                                    <label>
                                        <input type="radio" name="property-type" value="我已阅读并接受《中国职业培训网个人会员注册协议》"/>
                                        <span></span>
                                    </label>
                                    <p class="agreement-content">我已阅读并接受<b>《中国职业培训网个人会员注册协议》</b></p>
                                </div>
                                <div class="register-form-inp">
                                    <input type="submit" value="注册"/>
                                </div>
                            </form>
                        </div>
                        <div class="register-content-box" style="display:none;">
                            <form>
                                <div class="register-form-div">
                                    <input type="text" placeholder="请输入真实姓名"/>
                                </div>
                                <div class="register-form-div">
                                    <input type="text" placeholder="请输入邮箱"/>
                                </div>
                                <div class="register-form-dv">
                                    <input class="form-code-inp" type="text" placeholder="请输入邮箱验证码"/>
                                    <input class="form-code-get" type="button" value="获取验证码"/>
                                </div>
                                <div class="register-form-psw">
                                    <input type="password" placeholder="请输入您的密码"/>
                                    <a href="javascript:;"></a>
                                </div>
                                <div class="register-form-psw">
                                    <input type="password" placeholder="请确认密码"/>
                                    <a href="javascript:;"></a>
                                </div>
                                <div class="company-agreement">
                                    <label>
                                        <input type="radio" name="property-type" value="我已阅读并接受《中国职业培训网个人会员注册协议》"/>
                                        <span></span>
                                    </label>
                                    <p class="agreement-content">我已阅读并接受<b>《中国职业培训网个人会员注册协议》</b></p>
                                </div>
                                <div class="register-form-inp">
                                    <input type="submit" value="注册"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="register-right fr">
                    <a class="register-other-link" href="javascript:;">已有账号，去登录？ >></a>
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
        </div>
        <div class="login-register-box">
            <p class="login-footer-p">北京通用领航咨询服务有限公司 版权所有 京ICP备11031804号<span>|</span><b>技术支持：科威网络</b></p>
        </div>
    </div>
@endsection


<div class="register-cover"></div>
<div class="register-mask">
  <div class="mask-header">
      <h2 class="fl">中国职业培训网个人会员注册协议</h2>
      <a class="close-cover fr" href="javascript:;"><img src="img/cover-close.png"/></a>
      <div class="clearfix"></div>
  </div>
    <div class="mask-content">
       <h3 style="color: #666;font-weight:bold;line-height:26px;">一、服务条款的确认和接纳</h3>
        <p style="color: #666;line-height:26px;">“爱读爱看”网各项服务的所有权和运作权归北京方正阿帕比技术有限公司。“爱读爱看”网提供的服务将完全按照其发布的章程、服务条款和操作规则严格执行。会员必须完全同意所有服务条款并完成注册程序，才能成为“爱读爱看”网的正式注册会员享受“爱读爱看”网提供的更全面的服务。</p>
        <h3 style="color: #666;font-weight:bold;line-height:26px;">二、权利及义务</h3>
        <p style="color: #666;line-height:26px;margin-bottom: 20px;">“爱读爱看”网的权利、义务：</p>
        <p style="color: #666;line-height:26px;">1、尊重会员隐私制度</p>
        <p style="color: #666;line-height:26px;">尊重会员个人隐私是“爱读爱看”网的基本政策，“爱读爱看”网不会公开、编辑或透露会员的注册资料，除非符合以下情况： </p>
        <p style="color: #666;line-height:26px;">(1) 根据中华人民共和国国家安全机构、公安部门的要求及根据相应的法律程序要求。 </p>
        <p style="color: #666;line-height:26px;">(2) 维护“爱读爱看”网的商标所有权及其它权益。</p>
        <p style="color: #666;line-height:26px;">(3) 在紧急情况下竭力维护会员个人、其它社会个体和社会大众的安全。 </p>
        <p style="color: #666;line-height:26px;">(4) 符合其他相关的要求。 如果会员提供的资料包含有不正确的信息，“爱读爱看”网保留结束会员使用网络服务资格的权利。</p>
        <p style="color: #666;line-height:26px;">2、服务内容的所有权</p>
        <p style="color: #666;line-height:26px;">“爱读爱看”网定义的服务内容包括：文字、软件、声音、图片、录象、图表、广告中的全部内容；“爱读爱看”网为会员提供的其他信息。所有这些内容受版权、商标及其它财产所有权法律的保护。所以，会员只能在“爱读爱看”网和广告商授权下才能使用这些内容，而不能擅自复制、再造这些内容、或创造与内容有关的派生产品。任何人需要转载“爱读爱看”网的文章、数据，必须征得原文作者或“爱读爱看”网授权。</p>
        <p style="color: #666;line-height:26px;">3、会员管理</p>
        <p style="color: #666;line-height:26px;">“爱读爱看”网对会员的管理依据国家法律、地方法律和国际法律等标准。</p>
        <p style="color: #666;line-height:26px;">4、对会员信息的存储和限制</p>
        <p style="color: #666;line-height:26px;">“爱读爱看”网不对会员所发布信息的删除或储存失败负责。“爱读爱看”网有判定会员的行为是否符合“爱读爱看”网服务条款的要求和精神的保留权利，</p>
    </div>
</div>

@section('footer')
	&nbsp;
@stop

@section('scripts')
<script type="text/javascript" src="/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="/js/js_dengluzhuce.js"></script>
@stop