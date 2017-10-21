

	$(function() {
//   调用首页轮播
         $("#slider").chopSlider({
        /* slide element */
        slide : ".slide",
        /* controlers */
        hideTriggers : true,
        sliderPagination : ".slider-pagination",
  
        useCaptions : true,
        everyCaptionIn : ".sl-descr",
        showCaptionIn : ".caption",
        captionTransform : "scale(0) translate(-600px,0px) rotate(45deg)",
        /* autoplay */
        autoplay : true,
        autoplayDelay : 2000,
        /* for Browsers that support 3D transforms */
        t3D : csTransitions['3DFlips']['random'], /* all will be picked up randomly */
        t2D : [ csTransitions['multi']['random'], csTransitions['vertical']['random'] ],
        noCSS3 : csTransitions['noCSS3']['random'],
        mobile : csTransitions['mobile']['random'],
        onStart: function(){},
        onEnd: function(){}
    })

		//	导航下拉
		$('.mian_nav .list>li').hover(function() {
			$(this).find('.dump').stop().slideDown();
		}, function() {
			$(this).find('.dump').stop().slideUp();
		})

		//发布会tab

		$('.list_con').eq(0).show().siblings('.list_con').hide();
		$('.oul li').click(function() {
			var index = $(this).index();
			$(this).addClass('active').siblings('li').removeClass('active');
			$('.list_con').eq(index).stop().show().siblings('.list_con').hide();
		})

		// 培训透明度问题
		$('.women').hover(function() {
			$(this).find('.flot').stop(true, true).animate({
				'opacity': 1
			}, 400)
		}, function() {
			$(this).find('.flot').stop(true, true).animate({
				'opacity': 0
			}, 400)
		})

		//list表

		function lunbo(id, height) {
			var ul = $(id);
			var liFirst = ul.find('tr:first');
			$(id).animate({ top: height }).animate({ "top": 0 }, 0, function() {
				var clone = liFirst.clone();
				$(id).append(clone);
				liFirst.remove();
			})
		}
		var timer = setInterval(function() {
			lunbo('table', '-50px')
		}, 3000);
		$('table tr').hover(function() {
			clearInterval(timer)
		})
    
		//3d轮播

		var arr = ['张三', '李四', '王五', '赵六', '薛八', '赵九']
		var imgL = $(".hovertree img").size();
		var deg = 360 / imgL;
		var roY = 0,
			roX = -10;
		var xN = 0,
			yN = 0;
		var num = 0;
		var play = null,
			time = null;
		$('.id_title span').text(arr[0])
		$(".hovertree img").each(function(i) {
			$(this).css({
				"transform": "rotateY(" + i * deg + "deg) translateZ(300px)"
			});
			$(this).attr('ondragstart', 'return false');
		});
		run();

		function run() {
			time = setInterval(function() {
				num++;
				if(num == $(".hovertree img").length) {
					num = 0;
				}
				css()

			}, 5000)
		}
		$('.y_btn span').hover(function() {
			num = $(this).index();
			css();
			clearInterval(time);
		}, function() {
			run();
		});

		function css() {

			$('.hovertree').css({
				"transform": "perspective(800px) rotateY(" + num * deg + "deg)"
			});
			$('.y_btn span').eq(num).addClass('active').siblings().removeClass('active');
			$('.id_title span').text(arr[num])
		};

		$(".hovertree img").hover(function() {
			clearInterval(time)
		}, function() {
			run()
		})

		//悬浮top点击
		$(".key_top").click(function() {
			var speed = 100;
			$('body,html').animate({ scrollTop: 0 }, speed);
			return false;
		})
  
//        左边悬浮栏
	$(window).on('scroll',function(){
		var t = $(this).scrollTop();
	
		var s = $('.kf_online');
		
		var h = $(this).height() / 2 - s.height() / 4 + t;
		
		s.css({
			'-webkit-transition' : '.1s',
			'-moz-transition' : '.1s',
			'-ms-transition' : '.1s',
			'transition' : '.1s'
		});
		s.css('top',h);
	});
	
  
//      悬浮hover

//        $('.kf_online ul li').hover(function(){
//        	 $(this).find('div').stop().fadeIn();
//        },function(){
//        	 $(this).find('div').stop().fadeOut();
//        })


		var width = $(".st_content").width();
		var ulNum = $(".st_content ul").length;
		var contentWidth = width * ulNum;

		$(".st_box").width(contentWidth);

		$(".st_nav a").click(function() {
			$(this).addClass('active').siblings().removeClass('active');
			var clickNum = $(this).index();
			var moveLeft = clickNum * width * -1;
			$(".st_box").animate({ 'left': moveLeft }, 600);
		})

	})


