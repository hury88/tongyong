<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
@section('headMeta')
	<meta charset="utf-8">
@show
	{{-- SEO --}}
	<title>@section('title') {{ $boot_config['sitename'] }} @show</title>
	<meta name="keywords" content="{{ $boot_config['keywords'] }}">
	<meta name="description" content="{{ $boot_config['description'] }}">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
	{{-- CSS files --}}
	<link rel="stylesheet" type="text/css" href="css/common.css"/>
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
		<div class="row">&nbsp;</div>
	@show

	{{-- Content page --}}
	@yield('content')


</div>
	@section('footer')
		@include('partial.footer')
	@show
</body>
@section('scripts')
	<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
	<script type="text/javascript">
	    //	导航下拉
	    $('.mian_nav .list>li').hover(function() {
	        $(this).find('.dump').stop().slideDown();
	    }, function() {
	        $(this).find('.dump').stop().slideUp();
	    })

	</script>
@show
</html>
