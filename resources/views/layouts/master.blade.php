<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
@section('headMeta')
	<meta charset="utf-8">
@show
	{{-- SEO --}}
	<title>@section('title') {{ implode(' - ', $boot_title) }} @show</title>
	<meta name="keywords" content="{{ $boot_config['keywords'] }}">
	<meta name="description" content="{{ $boot_config['description'] }}">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
@yield('css')
</head>
@yield('bodyNextLabel', '
<body>
	<div class="pager-wrap personal-center">
')

	{{-- Navigation bar section --}}
	@section('navigation')
		@include('partial.navigation')
	@show

	{{-- Breadcrumbs section --}}
	@section('breadcrumbs')
	@show

	{{-- Content page --}}
	@yield('content')


</div>
	@section('footer')
		@include('partial.footer')
	@show
</body>
@section('scripts')
	<script type="text/javascript" src="/js/jquery-1.10.1.min.js"></script>
	<script type="text/javascript">
	    //	导航下拉
	    $('.mian_nav .list>li').hover(function() {
	        $(this).find('.dump').stop().slideDown();
	    }, function() {
	        $(this).find('.dump').stop().slideUp();
	    })

	</script>
	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript">
        $(function () {
            $(".kf_online").css("position","fixed")
            $(".kf_online").css("top","50%")
            $(".kf_online").css("margin-top","-204px")
            $(".key_top").click(function(){
                var speed=200;
                $('body,html').animate({ scrollTop: 0 }, speed);
                return false;
            })
        })

	</script>
@show
</html>
