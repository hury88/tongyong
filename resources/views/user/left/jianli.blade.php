<?php
if(empty($GLOBALS['uri'][2])){
    $sty='jianli';
} else{
    $sty=$GLOBALS['uri'][2];
}

?>

<h2 class="personal-order">简历中心</h2>
<div class="personal-order-nav">
    <ul>
        <li class="nav-on">
            <a class="yiji-a" href="javascript:;">我的求职<i></i></a>
            <div class="personal-erji-nav" style="display:block;">
                <a href="{{u("person","jianli")}}" class="erji-a @if($sty=='jianli') erji-a-on @endif">我的简历</a>
                <a href="{{u("person","jianli","toudi")}}" class="erji-a @if($sty=='toudi') erji-a-on @endif">简历投递记录</a>
                <a href="{{u("person","jianli","down")}}" class="erji-a @if($sty=='down') erji-a-on @endif">谁下载了我的简历</a>
                <a href="{{u("person","jianli","msyq")}}" class="erji-a @if($sty=='msyq') erji-a-on @endif">工作邀请</a>
            </div>
        </li>
        <li>
            <a class="yiji-a" href="{{u("person","jianli","wdsc")}}">我的收藏<i></i></a>
        </li>
        {{--<li>--}}
            {{--<a class="yiji-a" href="{{u("person","jianli","wdbmb")}}">我的报名表<i></i></a>--}}
        {{--</li>--}}
    </ul>
</div>