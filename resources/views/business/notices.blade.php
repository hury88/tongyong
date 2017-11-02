@extends('business.layouts.public')
@section('inbox')
<div class="system-messages">
    <ul class="system-messages-ul">
        @foreach($pagenewslist['data'] as $key => $list)<?php extract($list) ?>
        <li class="system-messages-li no-read">
            <a href="javascript:;" class="clearfix">
                <div class="system-mess-left fl">
                    <div class="system-mess-txt">
                        <p>输入神秘口令，免费领超大素材包！</p>
                        <span>套路什么的，不存在的~</span>
                    </div>
                </div>
                <div class="system-mess-right fr">
                    系统消息--2017-06-20
                </div>
            </a>
        </li>
        @endforeach
    </ul>
    <div class="web-pager">
       @include('partial.paginator')
    </div>
</div>
@stop