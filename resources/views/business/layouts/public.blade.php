@extends('business.layouts.master')

@section('title') @parent @stop

@section('main')
    <div class="safety-setting-content">
	    @include('business.partial.breadcams')
        <div class="safety-content-box">
            <h3>{{current($_title)}}</h3>
            @yield('inbox')
        </div>
        @parent
    </div>
@stop