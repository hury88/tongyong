$(document).scroll(function(){
    $('.head').stop();
    if(document.body.scrollTop>=200){
        $('.head').css('display','block').
            animate({
                opacity:'1'
            },300);
    }
    else {
        $('.head').animate({
            opacity:'0'
        },300,function(){
            $(this).css('display','none');
        });
    }
});
$('.scrollTOP').click(function(){
    $('body').animate({
        scrollTop:'0'
    },300);
})
$('.guanbi').click(function(e){
    e.preventDefault();
    $('.zhejiang').css('display','none');
})

$(".sizhang").eq(0).show();
$(".yc-hanshou a").eq(0).addClass("on");
$(".yc-hanshou a").click(function(){
	$(this).addClass("on").siblings().removeClass("on");
})
$(".hanshou").click(function(){
	$(".sizhang1").show();
	$(".sizhang2").hide();
})
$(".yuancjy").click(function(){
	$(".sizhang2").show();
	$(".sizhang1").hide();
})
var crgk_num=0;
function crgk_xh(){
    if(crgk_num==0)crgk_num=1;
    else if(crgk_num==1)crgk_num=0;
    $(".sizhang").eq(crgk_num).show().siblings(".sizhang").hide();
    $(".yc-hanshou a").eq(crgk_num).addClass('on').siblings("a").removeClass('on');
    setTimeout(crgk_xh,5000);
}
crgk_xh();
/*$('.lv').on('click','li a',function(e){
    e.preventDefault()
        $(this)
        .css('color','#7cbb48')
        .next('i')
        .addClass('lvsanjiao')
        .parent()
        .siblings()
        .children('a')
        .css('color','#000')
        .siblings('i')
        .removeClass('lvsanjiao');
})*/
$('.modal-guan').click(function (e) {
    e.preventDefault()
    $(this)
        .parents('.modal-s2')
        .css('display','none')
        .siblings('.modal-s3')
        .css('display','none');
});
$('.zizhi').on('click','li a', function (e) {
    e.preventDefault()
    $(this).parents().siblings('.modal-s2').css('display','block').siblings('.modal-s3')
        .css('display','block');
});
$('.guanbi-b').click(function (e) {
    e.preventDefault()
    $(this)
        .parent('.guanbi-s')
        .css('display','none')
        .siblings('.modal')
        .css('display','none');
});
$('.shang').on('click','a', function (e) {
    e.preventDefault()
    $('.shangxia').animate({
        top:'-400px'
    },500)
});
$('.xia').on('click','a', function (e) {
    e.preventDefault()
    $('.shangxia').animate({
        top:0
    },500)
});

$('.dzz-ls').on('click','a', function (e) {
    e.preventDefault()
    var src=$(e.target).attr("src");
    var i=src.lastIndexOf(".");
    console.log(src.slice(0,i)+"-m"+src.slice(i))
    $(".ti").attr(
        "src",src.slice(0,i)+"-m"+src.slice(i));
});

var s = 0;
$('.shang-modal').click(function (e) {
    e.preventDefault();
    var src=$('.ti').attr("src");
    var i=src.lastIndexOf(".");
    s++;
    if(s>8){
        s=1
    }
    $(".ti").attr(
        "src","images/zizhi"+s+"-m"+src.slice(i));
    console.log(s , src);
})
var f = 8;
$('.xia-modal').click(function (e) {
    e.preventDefault();
    var src=$('.ti').attr("src");
    var i=src.lastIndexOf(".");
    f--;
    if(f<1){
        f=8
    }
    $(".ti").attr(
        "src","images/zizhi"+f+"-m"+src.slice(i));
    console.log(f , src);
})


var hProduct = {
    LIWIDTH:0,
    DURATION:500,
    WAIT:5000,
    timer:null,
    canAuto:true,
    init:function(){
        this.LIWIDTH = parseFloat($('.jingxuan').css('width'));
        $('.jingxuan').hover(//鼠标移入轮播停止
            function(){
                this.canAuto = false;
            }.bind(this),
            function(){
                this.canAuto = true;
            }.bind(this));
        this.autoMove()
    },
    move:function(){
        if($('.zuoyou .active').html()==1){
            var left = '-882px';
            $('.jingxuan').animate({
                left:left
            },this.DURATION);
        }
        else if($('.zuoyou .active').html()==2){
            $('.jingxuan').animate({
                left:'0'
            },this.DURATION);
        }
    },
    autoMove:function(){//启动自动轮播
        //启动一次性定时器
        this.timer = setInterval(
            function(){
                if(this.canAuto){
                    $('.zuoyou').children('.active').removeClass('active').siblings().addClass('active');
                    this.move();
                }
                else {
                    clearInterval(this.timer);
                    this.autoMove();
                }
            }.bind(this),this.WAIT
        );
    }
}
hProduct.init();

$('.zuoyou').on('click','a',function(e){
    e.preventDefault();
    if($(e.target).html()==1){
        $('.js-1').animate({
            left:'-882px'
        })
    }
    else if($(e.target).html()==2){
        $('.js-1').animate({
            left:0
        })
    }
    else if($(e.target).html()==3){
        $('.js-2').animate({
            left:'-882px'
        })
    }
    else if($(e.target).html()==4){
        $('.js-2').animate({
            left:0
        })
    }
    else if($(e.target).html()==5){
        $('.js-3').animate({
            left:'-882px'
        })
    }
    else if($(e.target).html()==6){
        $('.js-3').animate({
            left:0
        })
    }
    else if($(e.target).html()==7){
        $('.js-4').animate({
            left:'-882px'
        })
    }
    else if($(e.target).html()==8){
        $('.js-4').animate({
            left:0
        })
    }
    else if($(e.target).html()==9){
        $('.js-5').animate({
            left:'-882px'
        })
    }
    else if($(e.target).html()==10){
        $('.js-5').animate({
            left:0
        })
    }
    else if($(e.target).html()==11){
        $('.js-6').animate({
            left:'-882px'
        })
    }
    else if($(e.target).html()==12){
        $('.js-6').animate({
            left:0
        })
    }
})

$('.zixun').on('click','li a',function (e) {
    e.preventDefault();
    $(this).addClass('ac').parent().siblings().children("a").removeClass('ac');
});
$('#ck').click(function () {
    $('.fu-s1').css('display','block');
    $('.fu-s2').css('display','none');
    $('.fu-s3').css('display','none');
    $('.fu-s4').css('display','none');
});
$('#yc').click(function () {
    $('.fu-s1').css('display','none');
    $('.fu-s2').css('display','block');
    $('.fu-s3').css('display','none');
    $('.fu-s4').css('display','none');
});
$('#dx').click(function () {
    $('.fu-s1').css('display','none');
    $('.fu-s2').css('display','none');
    $('.fu-s3').css('display','block');
    $('.fu-s4').css('display','none');
});
//$('#ym').click(function () {
//    $('.fu-s1').css('display','none');
//    $('.fu-s2').css('display','none');
//    $('.fu-s3').css('display','none');
//    $('.fu-s4').css('display','block');
//    $('.fu-s5').css('display','none');
//});
$('#zh').click(function () {
    $('.fu-s1').css('display','none');
    $('.fu-s2').css('display','none');
    $('.fu-s3').css('display','none');
    $('.fu-s4').css('display','block');
});
var news_num=0;
function news_zd(){
    if(news_num>4)news_num=0;
    $(".youshi .xiangxi").eq(news_num).show().siblings(".xiangxi").hide();
    $(".zixun li").eq(news_num).find("a").addClass("ac").parent().siblings().children().removeClass("ac");
    news_num++;
    setTimeout(news_zd,5000);
}
news_zd();
//$('.hanshou').click(function (e) {
//    e.preventDefault();
//    $('.sizhang').css('display','block');
//    $('.fu').css('display','none')
//});
//$('.yuancjy').click(function (e) {
//    e.preventDefault();
//    $('.sizhang').css('display','none');
//    $('.fu').css('display','block')
//});


$(document).ready(function (){
	
	//点击小图切换大图
	$("#thumbnail li a").hover(function(){
		$(".zoompic img").hide().attr({ "src": $(this).attr("href"), "title": $("> img", this).attr("title") });
		$("#thumbnail li.current").removeClass("current");
		$(this).parents("li").addClass("current");
		return false;
	});
	$("#thumbnail li a").click(function(){
		$(".zoompic img").hide().attr({ "src": $(this).attr("href"), "title": $("> img", this).attr("title") });
		$("#thumbnail li.current").removeClass("current");
		$(this).parents("li").addClass("current");
		return false;
	});
    var i=0;
	$(".zoompic>img").load(function(){
		$(".zoompic>img:hidden").show();
	});
	
	//小图片左右滚动
	var $slider = $('.slider ul');
	var $slider_child_l = $('.slider ul li').length;
	var $slider_height = $('.slider ul li').height();
	$slider.height($slider_child_l * $slider_height/2);
	
	var slider_count = 0;
	
	if ($slider_child_l < 9) {
		$('#btn-right').css({cursor: 'auto'});
		$('#btn-right').removeClass("dasabled");
	}
	
	$('#btn-right').click(function() {
		if ($slider_child_l < 9 || slider_count >= $slider_child_l - 9) {
			return false;
		}
		
		slider_count++;
		$slider.animate({top: '-=' + $slider_height + 'px'}, 'fast');
		slider_pic();
	});
	
	$('#btn-left').click(function() {
		if (slider_count <= 0) {
			return false;
		}
		slider_count--;
		$slider.animate({top: '+=' + $slider_height + 'px'}, 'fast');
		slider_pic();
	});
	
	function slider_pic() {
		if (slider_count >= $slider_child_l - 9) {
			$('#btn-right').css({cursor: 'auto'});
			$('#btn-right').addClass("dasabled");
		}
		else if (slider_count > 0 && slider_count <= $slider_child_l - 9) {
			$('#btn-left').css({cursor: 'pointer'});
			$('#btn-left').removeClass("dasabled");
			$('#btn-right').css({cursor: 'pointer'});
			$('#btn-right').removeClass("dasabled");
		}
		else if (slider_count <= 0) {
			$('#btn-left').css({cursor: 'auto'});
			$('#btn-left').addClass("dasabled");
		}
	}
	
});



$(".lt_yi_a").click(function(){
    $(this).siblings().children(".erji").hide();
    $(this).parent().next(".erji").slideToggle();
})

$(".lt_erji_a").click(function(){
    $(this).addClass('cur').siblings().removeClass('cur');
    /*        $(this).siblings(".lt_sanji").slideToggle();
     */
})
$(function(){
    $(".center_zx").hover(function(){
        var erji=$(this).find(".erji");
        erji.stop().slideDown()
    },function(){
        var erji=$(this).find(".erji");
        erji.stop().slideUp()
    })
})