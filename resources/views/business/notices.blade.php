@extends('business.layouts.public')
<?php define('AT_NO', 1);
$notices = config('config.notices');
?>
@section('inbox')
<div class="system-messages">
    <ul class="system-messages-ul">
        @foreach($pagenewslist['data'] as $key => $list)<?php extract($list)?>
        <li class="system-messages-li {{$status == 1 ? 'no-read' : ''}}">
            <a href="javascript:;" class="clearfix">
                <div class="system-mess-left fl">
                    <div class="system-mess-txt">
                        <p>{{$title}}</p>
                        <span>{{$content}}</span>
                        {{-- @if ($action_type_id == 2) --}}
                        {{-- @endif --}}
                    </div>
                </div>
                <div class="system-mess-right fr">
                    {{$created_at}}
                </div>
            </a>
        </li>
        @endforeach
    </ul>
    @include('partial.paginator')
</div>
@stop