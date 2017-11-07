
  $(function(){
  	$('#notice-tit li').click(function(){
  		var n=$(this).index();
  		ch(n);
  	});
  });
  function ch(n){
  	$('#notice-tit li').removeClass('select').eq(n).addClass('select');
  	$('#notice-con .mod').hide().eq(n).show();
  }

  /* 注册协议弹窗*/
  var docHeight = $(document).height();
  $(".jobselect-cover").height(docHeight);
  $("#profession-chose").click(function(){
	  $(".jobselect-cover").fadeIn("fast");
	  $(".jobselect-mask").fadeIn("fast").css({
		  left: ($(window).width() - $('.jobselect-mask').outerWidth())/2,
		  top: ($(window).height() - $('.jobselect-mask').outerHeight())/2
	  });
  });
  $(".jobselect-mask .job-close").click(function(){
	  $(".jobselect-cover").fadeOut("fast");
	  $(".jobselect-mask").fadeOut("fast");
  });

  $(".job-menu li").click(function(){
	  var a = $(this).index();
     $(this).addClass("job-select-icon").siblings().removeClass("job-select-icon");
	  $(".job-lists-content").eq(a).show().siblings(".job-lists-content").hide();
  });
  $(".job-menu li").click(function(){
	  var a = $(this).index();
	  $(this).addClass("job-select-icon").siblings().removeClass("job-select-icon");
	  $(".job-lists-content").eq(a).show().siblings(".job-lists-content").hide();
  });

  $(document).ready(function() {
    //绑定元素点击事件
    $(".job-lists-content .job-lists-dv").click(function() {
      //判断对象是显示还是隐藏
      if($(this).children(".job-small-type").is(":hidden")){
        //表示隐藏
        if($(this).hasClass("job-selected-box") == false) {
          $(this).addClass("job-selected-box").siblings(".job-lists-content .job-lists-dv").removeClass("job-selected-box");
          //如果当前没有进行动画，则添加新动画
          $(this).children(".job-small-type").animate({
            height: 'show'
          },500)
            //siblings遍历div1的元素
              .end().siblings().find(".job-small-type").hide(500);
        }
      } else {
        //表示显示
        if($(this).hasClass("job-selected-box") == true) {

          $(this).children(".job-small-type").animate({
            height: 'hide'
          },500)
              .end().siblings().find(".job-small-type").hide(500);
          $(this).removeClass("job-selected-box");
        }
      }
    });
    //阻止事件冒泡，子元素不再继承父元素的点击事件
    $('.job-small-type').click(function(e){
      e.stopPropagation();
    });
  });

  $(".job-small-type li").click(function(){
      if($(this).hasClass("select-item")){

      }else{
          var txt = $(this).text();
          var linum = $(".job-result ul").children().length;
          if(linum<5){
              $(this).addClass("select-item");
              var ss=$(this).data('id');
              $(".job-result ul").append("<li>"+txt+"<i class='job-selected-icon' data-id='"+ss+"'></li>");
          }else{
              $(".jobselect-mask h2 span").show();
          }

          $(".job-result .job-selected-icon").click(function(){
              $(this).parent().remove();
              var cc=$(this).data('id');
              $(".c"+cc).removeClass('select-item')
              var nowlinum = $(".job-result ul").children().length;
              if(nowlinum<5){
                  $(".jobselect-mask h2 span").hide();
              }
          });
      }

  });
  $(".job-operate .operate-reset").click(function(){
    $(".job-result ul").empty();
      $(".job-small-type li").removeClass('select-item')
    if($(".jobselect-mask h2 span").is(":hidden")){

    }else{
      $(".jobselect-mask h2 span").hide();
    }
  })
  $('.operate-comfirm').click(function(){
      var ids='';
      var idsname='';
      $('.job-small-type .select-item').each(function () {
          var cd=$(this).data('id');
          var cdname=$(this).text()
          ids+=','+cd
          idsname+=','+cdname
      })
      ids=ids.substr(1)
      idsname=idsname.substr(1)

      $("#qualificationid").val(ids)
      $("#qualificationidname").val(idsname)
      $(".jobselect-cover").fadeOut("fast");
      $(".jobselect-mask").fadeOut("fast");
  })