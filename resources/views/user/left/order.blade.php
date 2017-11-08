<h2 class="personal-order">订单中心</h2>
<?php
if(empty($GLOBALS['uri'][2])){
    $sty='order';
} else{
    $sty=$GLOBALS['uri'][2];
}
?>
<div class="personal-order-nav">
    <ul>
        <li class="@if($sty=='order') order-nav-on @endif">
            <a class="yiji-a" href="{{u("person","order")}}">我的订单<span></span></a>
        </li>
        <li>
            <a class="yiji-a" href="javascript:javascript:void(0);">我的报名表<i></i></a>
            <div class="personal-erji-nav" style="display: block">
                <a href="{{u("person","order","bmbzypx")}}" class="erji-a @if($sty=='bmbzypx') erji-a-on @endif">职业培训报名表</a>
                <a href="{{u("person","order","bmbzyzs")}}" class="erji-a @if($sty=='bmbzyzs') erji-a-on @endif">职业证书报名表</a>
                <a href="{{u("person","order","bmbgjjy")}}" class="erji-a @if($sty=='bmbgjjy') erji-a-on @endif">国际教育报名表</a>
            </div>
        </li>
    </ul>
</div>