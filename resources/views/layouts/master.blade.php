<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
	@section('head_meta')
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<base href="/">
	@show

	{{-- SEO --}}
	<title>@section('title'){{ $boot_config['sitename'] }} @show</title>
	<meta name="keywords" content="{{ $boot_config['keywords'] }}">
	<meta name="description" content="{{ $boot_config['description'] }}">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>

	{{-- CSS files --}}
	<link rel="stylesheet" type="text/css" href="css/common.css"/>
	@section('css')
		<link rel="stylesheet" type="text/css" href="index/css/common.css"/>
		<link rel="stylesheet" type="text/css" href="index/css/index.css"/>
		<link rel="stylesheet" type="text/css" href="index/css/jquery.hiSlider.min.css"/>
		<link rel="stylesheet" type="text/css" href="index/css/chopslider.css"/>
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('/index/css/chopslider.css') }}"/>
	@show

</head>
<body>
@yield('body_next_label', '<div class="pager-wrap personal-center">')

	{{-- Navigation bar section --}}
	@section('navigation')
		@include('partial.navigation')
	@show

	{{-- Breadcrumbs section --}}
	<div class="container">
		@section('breadcrumbs')
			<div class="row">&nbsp;</div>
		@show
	</div>

	{{-- Content page --}}
	@section('content')
		@section('panels')

			<div class="container">
				<div class="row">&nbsp;</div>
				<div class="row global-panels">

					{{-- left panel --}}
					@if (isset($panel['left']))
						{{-- desktops validation --}}
						<div class="col-sm-{{ $panel['left']['width'] or '2' }} col-md-{{ $panel['left']['width'] or '2' }} {{ $panel['left']['class'] or '' }}">
							@section('panel_left_content')
								Left content
							@show
						</div>
					@endif

					{{-- center content --}}
					<div class="col-xs-12 col-sm-{{ $panel['center']['width'] or '10' }} col-md-{{ $panel['center']['width'] or '10' }}">
						@section('center_content')
							Center content
						@show
					</div>

					{{-- right panel --}}
					@if (isset($panel['right']))
						<div class="hidden-xs col-sm-{{ $panel['right']['width'] or '2' }} col-md-{{ $panel['right']['width'] or '2' }} {{ $panel['right']['class'] or '' }}">
							@section('panel_right_content')
								Right content
							@show
						</div>
					@endif

				</div> {{-- globlas panels --}}
			</div> {{-- container --}}

		@show
	@show

</section>

@section('footer')
	<footer>
		@include('partial.footer')
	</footer>
@show

{{-- Antvel - Bower Components --}}
{!! Html::script('/antvel-bower/jquery/dist/jquery.min.js') !!}
{!! Html::script('/antvel-bower/angular/angular.min.js') !!}
{!! Html::script('/antvel-bower/angular-route/angular-route.min.js') !!}
{!! Html::script('/antvel-bower/angular-sanitize/angular-sanitize.min.js') !!}
{!! Html::script('/antvel-bower/angular-bootstrap/ui-bootstrap-tpls.min.js') !!}
{!! Html::script('/antvel-bower/angular-animate/angular-animate.min.js') !!}
{!! Html::script('/antvel-bower/angular-loading-bar/build/loading-bar.min.js') !!}
{!! Html::script('/antvel-bower/angular-mocks/angular-mocks.js') !!}
{!! Html::script('/antvel-bower/angular-touch/angular-touch.min.js') !!}
{!! Html::script('/antvel-bower/bootstrap/dist/js/bootstrap.min.js') !!}

{!! Html::script('/js/vendor/xtForms/xtForm.js') !!}
{!! Html::script('/js/vendor/xtForms/xtForm.tpl.min.js') !!}

<script>

	/**
	 * ngModules
	 * Angularjs modules requires by antvel
	 * @type {Array}
	 */
	var ngModules = [
		'ngRoute', 'ngSanitize', 'LocalStorageModule',
		'ui.bootstrap', 'chieffancypants.loadingBar', 'xtForm',
		'cgNotify', 'ngTouch', 'angucomplete-alt'
	];

	@section('before.angular') @show

	(function(){
		angular.module('AntVel',ngModules,
		function($interpolateProvider){
			$interpolateProvider.startSymbol('[[');
			$interpolateProvider.endSymbol(']]');
		}).config(function(localStorageServiceProvider, cfpLoadingBarProvider,$locationProvider){
			cfpLoadingBarProvider.includeSpinner = false;
			localStorageServiceProvider.setPrefix('tb');
			$locationProvider.html5Mode({enabled:true,rewriteLinks:false});
		});
	})();

</script>

{{-- Antvel functions --}}
{!! Html::script('/js/app.js') !!}

@section('scripts')
	{{-- Antvel angucomplete-alt.js version --}}
	{!! Html::script('/js/vendor/angucomplete-alt.js') !!}

	{{-- Antvel-bower components --}}
	{!! Html::script('/antvel-bower/angular-notify/dist/angular-notify.min.js') !!}
	{!! Html::script('/antvel-bower/angular-local-storage/dist/angular-local-storage.min.js') !!}
@show

</body>
</html>
