/**
 * Created by Administrator on 2017/10/1.
 */
$(function(){
   /* ע�᷽ʽ�л�*/
    $(".register-tab li").click(function(){
        var i = $(this).index();
        $(this).addClass("select").siblings(".register-tab li").removeClass("select");
        $(".register-tab-content .register-content-box").eq(i).show().siblings().hide();
    });
   /* ע��Э�鵯��*/
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

   /* ���������л�*/
    $(".bind-account-title li").click(function(){
        var x = $(this).index();
        $(this).addClass("bind-active").siblings(".bind-account-title li").removeClass("bind-active");
        $(".bind-account-content .bind-account-box").eq(x).show().siblings().hide();
    });

  /*  ����ɹ�����*/
    var payHeight = $(document).height();
    $(".pay-successful-cover").height(payHeight);
    $(".pay-status").click(function(){
        $(".pay-successful-cover").fadeIn("fast");
        $(".pay-successful-mask").fadeIn("fast").css({
            left: ($(window).width() - $('.pay-successful-mask').outerWidth())/2,
            top: ($(window).height() - $('.pay-successful-mask').outerHeight())/2
        });
    });
    $(".pay-success-close").click(function(){
        $(".pay-successful-cover").fadeOut("fast");
        $(".pay-successful-mask").fadeOut("fast");
    });

    /*��������--��Ҫ���ֵ���*/
    $(".order-manager-cover").height(payHeight);
    $(".go-withdraw").click(function(){
        $(".order-manager-cover").fadeIn("fast");
        $(".order-manager-mask").fadeIn("fast").css({
            left: ($(window).width() - $('.order-manager-mask').outerWidth())/2,
            top: ($(window).height() - $('.order-manager-mask').outerHeight())/2
        });
    });
    $(".manager-mask-header .icon-close").click(function(){
        $(".order-manager-cover").fadeOut("fast");
        $(".order-manager-mask").fadeOut("fast");
    });

    /*��������--��Ҫ���ֳɹ�����*/
    $(".withdraw-successful-mask").css({
        left: ($(window).width() - $('.withdraw-successful-mask').outerWidth())/2,
        top: ($(window).height() - $('.withdraw-successful-mask').outerHeight())/2
    });
    $(".withdraw-successful-bottom a").click(function(){
        $(".order-manager-cover").fadeOut("fast");
        $(".withdraw-successful-mask").fadeOut("fast");
    });

   /* 面试邀请弹框*/
    $(".interview-invitation-cover").height(payHeight);
    $(".interview-invite").click(function(){
        $(".interview-invitation-cover").fadeIn("fast");
        $(".interview-invitation-mask").fadeIn("fast").css({
            left: ($(window).width() - $('.interview-invitation-mask').outerWidth())/2,
            top: ($(window).height() - $('.interview-invitation-mask').outerHeight())/2
        });
    });
    $(".manager-mask-header .icon-close").click(function(){
        $(".interview-invitation-cover").fadeOut("fast");
        $(".interview-invitation-mask").fadeOut("fast");
    });
   /* 委婉拒绝面试邀请*/

    $(".interview-invitation-cover").height(payHeight);
    $(".interview-refuse").click(function(){
        $(".interview-invitation-cover").fadeIn("fast");
        $(".decline-mask").fadeIn("fast").css({
            left: ($(window).width() - $('.decline-mask').outerWidth())/2,
            top: ($(window).height() - $('.decline-mask').outerHeight())/2
        });
    });
    $(".manager-mask-header .icon-close").click(function(){
        $(".interview-invitation-cover").fadeOut("fast");
        $(".decline-mask").fadeOut("fast");
    });

   /* 发送邀请中*/
    $(".interview-invitation-cover").height(payHeight);
    $(".safety-content-box h3").click(function(){
        $(".interview-invitation-cover").fadeIn("fast");
        $(".interview-going-mask").fadeIn("fast").css({
            left: ($(window).width() - $('.interview-going-mask').outerWidth())/2,
            top: ($(window).height() - $('.interview-going-mask').outerHeight())/2
        });
    });
    $(".manager-mask-header .icon-close").click(function(){
        $(".interview-invitation-cover").fadeOut("fast");
        $(".interview-going-mask").fadeOut("fast");
    });

  /*是否确定下载弹出框*/
    $(function(){
        $('.evals>li').each(function(index){
            $(this).on('click',function(){
                $('.text').val($('.evals>li').eq(index).html());
            })
        })
    })



    $(".interview-invitation-cover").height(payHeight);
    console.log("hello wordl");
    $(".resume-download").each(function(index){
        $(this).on('click',function(){
            $(".interview-invitation-cover").fadeIn("fast");
            $(".resume-download-mask").fadeIn("fast").css({
                left: ($(window).width() - $('.resume-download-mask').outerWidth())/2,
                top: ($(window).height() - $('.resume-download-mask').outerHeight())/2
            });
        });
    });
    $(".resume-download-mask .icon-close").click(function(){
        $(".interview-invitation-cover").fadeOut("fast");
        $(".resume-download-mask").fadeOut("fast");
    });


   /* 资格证书tab切换*/
    $(".certificate-ul .certificate-li").click(function(){
        var i = $(this).index();
        $(this).addClass("certificate-on").siblings(".certificate-ul .certificate-li").removeClass("certificate-on");
        $(".certificate-content .certificate-content-tab").eq(i).show().siblings().hide();
    });
});


