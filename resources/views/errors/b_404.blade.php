@extends('business.layouts.public')
@section('title') @parent @stop
@section('css') @parent
<style>
    .zhengzai-kaifazhogn{
        text-align: center;
        padding:367px 0 316px 0;
    }
    .zhengzai-kaifazhogn img{
        display: inline-block;
        margin-bottom: 30px;
    }
    .zhengzai-kaifazhogn h1{
         font-size: 40px;
        color: #333;;
    }
</style>
@stop
<?php define('AT_NO', 1) ?>
@section('inbox')
   <div class="wrap-box zhengzai-kaifazhogn">
       <img src="/img/loading.gif"/>
       <h1 class="kefai-going">正在开发中！！！！</h1>
   </div>
@stop

