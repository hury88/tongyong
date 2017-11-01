@extends('business.layouts.public')
<?php
$th = ['证书名称', '所属分类', '报名人数'];
$td = [];
$form = new Form();
?>
@section('inbox')
    <div class="resume-inbox">
        <div class="order-manager-header clearfix">
            <div class="manager-header-right fr">
                <form>
                    <div class="order-search">
                        <?php $d = config('config.webarr.certificate');Form::select2($d, '选择证书类型', 'certificate_lid')?>
                        <input name="title" value="{{$_GET['title']}}" class="order-manager-inp" type="text" placeholder="输入证书名称"/>
                        <input class="order-manager-sub" type="submit" value="搜索结果">
                        <input class="certificate-but" type="button" value="发布信息">
                    </div>
                </form>
            </div>
        </div>
        <div class="order-manager-content">
            <form>
                <table class="academy-table" width="101%" cellpadding="0" cellspacing="0">
                    <tr class="manager-firsttr">
                        <th class="manager-firstth">
                            <label><input class="quanxuan" type="checkbox"/>全选</label>
                        </th>
                        @foreach($th as $title)
                        <th>{{$title}}</th>
                        @endforeach
                        <th>时间</th>
                        <th>操作</th>
                    </tr>
                    <tbody>
                    @foreach($pagenewslist['data'] as $key => $list)<?php extract($list) ?>
                    <tr>
                        <td class="manager-firstth">
                            <label><input class="xuanze" value="{{$id}}" type="checkbox"/>{{$key+1}}</label>
                        </td>
                        <td>{{$title}}</td>
                        <td>{{$d[$certificate_lid]}}</td>
                        <td>{{$enroll_num}}人</td>
                        <td>{{date('Y-m-d', $sendtime)}}</td>
                        <td>
                            <a class="resume-remove color-trblue" href="javascript:;">修改</a>
                            <a class="resume-delete color-trblue" href="{{javascript:;}}">删除</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="manager-lasttr clearfix">
                    <div class="manager-firstth">
                        <label><input class="quanxuan" type="checkbox"/>全选</label>
                    </div>
                    <div class="manager-deletetd">
                        <a id="del" href="javascript:;" class="batchs-delete"><img src="/img/dele.png"/>批量删除</a>
                    </div>
                    <div class="table-pager">
                        @include('partial.paginator')
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop