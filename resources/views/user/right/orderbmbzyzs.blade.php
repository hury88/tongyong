<?php
$key=$_GET['key'];
$typeid=(int)$_GET['typeid'];
$pid=v_id($typeid,'pid','news_cats');
?>
<h3>职业证书报名表</h3>
<div class="nation-edu-cate clearfix">
    <div class="nation-edu-cate-left fl">
        <ul>
            @foreach($tyarr as $val)
                <li @if($typeid==$val->id) class="education-li-active" @endif>
                    <a href="{{u('person','order','bmbzyzs').'?typeid='.$val->id}}"}>{{$val->catname}}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="nation-edu-cate-right fr">
        <form action="" method="get">
            <div class="education-form">
                <input name="typeid" value="{{$typeid}}" type="hidden">
                <input class="eduform-inp" name="key" value="{{$key}}" type="text" placeholder="请输入关键词"/>
                <input class="eduform-sub" type="submit" value="搜索"/>
            </div>
        </form>
        <script src="/js/jquery.js"></script>
        <script>
            $('.eduform-sub').click(function () {
                var ss=$('.eduform-inp').val()
                if(!ss){
                    alert("请输入关键词")
                    return false
                }

            })
        </script>
    </div>
</div>
<div class="nation-education-table">
    <table width="100%">
        <tr class="edu-first-tr">
            <th class="edu-table-firstth">主要信息</th>
            <th class="edu-table-secondth">报名时间</th>
            <th class="edu-table-thirldth">操作</th>
        </tr>
        @foreach($pagenewslist['data'] as $val)
            <tr>
                <td class="edu-table-firsttd"><a href="{{$val['path']}}" style="display: block" target="_blank">{{$val['title']}}</a></td>
                <td>{{substr($val['created_at'],0,10)}}</td>
                <td>
                    <a href="{{route('p_e_v')}}?typeid={{$typeid}}&tid={{$val['tid']}}&eid={{$val['id']}}">下载报名表</a><br>
                    <a href="{{route('p_e_v')}}?typeid={{$typeid}}&tid={{$val['tid']}}&eid={{$val['id']}}">打印报名表</a><br>
                    <a href="{{route('p_e_v')}}?typeid={{$typeid}}&tid={{$val['tid']}}&eid={{$val['id']}}">完善报名表</a>
                    {{--                    <a href="{{route('p_e_v')}}?pid=3" >完善报名表</a>--}}
                </td>
            </tr>
        @endforeach
    </table>
</div>
@include('partial.paginator')