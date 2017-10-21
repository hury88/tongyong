
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

    
    