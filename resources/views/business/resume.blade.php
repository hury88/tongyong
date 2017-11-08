@extends('business.layouts.public-list')
<?php
$th = ['求职者', '求职意向', '性别', '学历', '工作经验', '期望月薪', '招聘类别', '反馈状态'];
?>
@section('form')
<style>
    .caozuo {display: none;}
</style>
    <form>
        <div class="order-search">
            <?php // Form::select2(config('config.order.orderBy'), '选择排序方式', 'orderBy')?>
            <!-- <input name="orderno" value="" class="order-manager-inp" type="text" placeholder="输入订单编号"/> -->
            <!-- <input class="order-manager-sub" type="submit" value="搜索结果"> -->
        </div>
    </form>
@stop
@section('tbody')
    @foreach($pagenewslist['data'] as $key => $list)
    <?php
        extract($list);
        if ($cvs = App\CVS::find($cvs_id)) {

        } else {
            unset($csv);
            continue;
        }
    ?>
    <tr>
        <td class="manager-firstth">
            <label><input id="delid{{$id}}" class="xuanze" value="{{$id}}" type="checkbox"/>{{$key+1}}</label>
        </td>
        <td>{{$cvs->name}}</td>
        <td>{{$cvs->gzxz}}-{{$cvs->cshy}}</td>
        <td>{{$cvs->sex}}</td>
        <td>{{$cvs->zgxl}}</td>
        <td>{{$cvs->gznf}}</td>
        <td>{{$cvs->price}}</td>
        <td>{{$job_cate_name}}</td>
        <td>{{$status}}&emsp;{!! $dao !!}</td>
        <td>{{$created_at}}</td>
    </tr>
    @endforeach
    <script>
        $(".feedback").click(function(){
            var that = $(this);
            $.post("{{route('b_resume').'/changeStatus'}}/" + that.data("id"), function(){
                var state = response.state,
                    title = response.title,
                    message = response.message,
                    status = response.status,
                    redirect = response.redirect;

                handing(status,state,title,message,redirect,function(){
                    that.removeAttr('disabled');//解除锁定
                });
            });
        })
    </script>
@stop
