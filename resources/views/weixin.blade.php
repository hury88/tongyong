<!DOCTYPE html>
<html>
<head>
    <title>微信关注｜ {{$boot_config['sitename']}}</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://res.wx.qq.com/connect/zh_CN/htmledition/style/impowerApp3696b4.css">
    <script src="https://res.wx.qq.com/connect/zh_CN/htmledition/js/jquery.min3696b4.js"></script>
</head>
<body>
<div class="main impowerBox">
    <div class="loginPanel normalPanel">
        <div class="title">微信登录</div>
        <div class="waiting panelContent">
            <div class="wrp_code"><img class="qrcode lightBorder" src="{{img($boot_config['img1'])}}" /></div>
            <div class="info">
                <div class="status status_browser js_status" id="wx_default_tip">
                    <p>请使用微信扫描二维码关注</p>
                    <p>“{{$boot_config['sitename']}}”</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    !function(){function a(d){jQuery.ajax({type:"GET",url:""+(d?"&last="+d:""),dataType:"script",cache:!1,timeout:6e4,success:function(d,e,f){var g=window.wx_errcode;switch(g){case 405:var h="";h=h.replace(/&amp;/g,"&"),h+=(h.indexOf("?")>-1?"&":"?")+"code="+wx_code+"&state=sCxAJopVeW";var i=b("self_redirect");if(c)if("true"!==i&&"false"!==i)try{document.domain="qq.com";var j=window.top.location.host.toLowerCase();j&&(window.location=h)}catch(k){window.top.location=h}else if("true"===i)try{window.location=h}catch(k){window.top.location=h}else window.top.location=h;else window.location=h;break;case 404:jQuery(".js_status").hide(),jQuery("#wx_after_scan").show(),setTimeout(a,100,g);break;case 403:jQuery(".js_status").hide(),jQuery("#wx_after_cancel").show(),setTimeout(a,2e3,g);break;case 402:case 500:window.location.reload();break;case 408:setTimeout(a,2e3)}},error:function(b,c,d){var e=window.wx_errcode;408==e?setTimeout(a,5e3):setTimeout(a,5e3,e)}})}function b(a,b){b||(b=window.location.href),a=a.replace(/[\[\]]/g,"\\$&");var c=new RegExp("[?&]"+a+"(=([^&#]*)|&|#|$)"),d=c.exec(b);return d?d[2]?decodeURIComponent(d[2].replace(/\+/g," ")):"":null}var c=window.top!=window;if(c){var d="";"white"!=d&&(document.body.style.color="#373737")}else{document.getElementsByClassName||(document.getElementsByClassName=function(a){for(var b=[],c=new RegExp("(^| )"+a+"( |$)"),d=document.getElementsByTagName("*"),e=0,f=d.length;f>e;e++)c.test(d[e].className)&&b.push(d[e]);return b}),document.body.style.backgroundColor="#333333",document.body.style.padding="50px";for(var e=document.getElementsByClassName("status"),f=0,g=e.length;g>f;++f){var h=e[f];h.className=h.className+" normal"}}var i="";if(i){var j=document.createElement("link");j.rel="stylesheet",j.href=i.replace(new RegExp("javascript:","gi"),""),document.getElementsByTagName("head")[0].appendChild(j)}setTimeout(a,100)}();
</script>
</body>
</html>
