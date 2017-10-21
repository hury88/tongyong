/**
 * Created by Administrator on 2017/10/1.
 */
$(function(){
   /* 注册方式切换*/
    $(".register-tab li").click(function(){
        var i = $(this).index();
        $(this).addClass("select").siblings(".register-tab li").removeClass("select");
        $(".register-tab-content .register-content-box").eq(i).show().siblings().hide();
    });
   /* 注册协议弹窗*/
    var docHeight = $(document).height();
    $(".register-cover").height(docHeight);
    $(".agreement-content").click(function(){
        $(".register-cover").fadeIn("fast");
        $(".register-mask").fadeIn("fast").css({
            left: ($(window).width() - $('.register-mask').outerWidth())/2,
            top: ($(window).height() - $('.register-mask').outerHeight())/2
        });
    });

    $(".close-cover").click(function(){
        $(".register-cover").fadeOut("fast");
        $(".register-mask").fadeOut("fast");
    });

   /* 第三方绑定切换*/
    $(".bind-account-title li").click(function(){
        var x = $(this).index();
        $(this).addClass("bind-active").siblings(".bind-account-title li").removeClass("bind-active");
        $(".bind-account-content .bind-account-box").eq(x).show().siblings().hide();
    });
})