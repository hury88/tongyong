<h3 class="nation-edu-right-titel">
    <a href="javascript:;">消息管理</a>
</h3>
<div class="station-message">
    <ul class="system-messages-ul">
        @foreach($pagenewslist['data'] as $key => $list)<?php extract($list)?>
        <li class="system-messages-li {{$status == 1 ? 'no-read' : ''}}">
            <a href="javascript:;" class="clearfix">
                <div class="system-mess-left fl">
                    <div class="system-mess-txt">
                        <p>{{$title}}</p>
                        <span>{{$content}}</span>
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