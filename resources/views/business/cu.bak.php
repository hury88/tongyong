@extends('business.layouts.public')
<?php
    $form = new Form($row);
    define('AT_CU', 1);
?>

@section('inbox')
@include('partial.editor')

<div class="job-posted">
    <form class="form" action="{{u('business', $table, 'cu', $form->id)}}" onsubmit="return model($('.save'));">
        @if($table == 'certificate')
        <?php
            $d = config('config.webarr.certificate');
            $form->select($d, '选择证书类型', 'certificate_lid')
            ->input('证书名称','title')
            ->editor('详情');
        ?>
        @endif

        <div class="job-posted-dv">
            <span class="job-posted-property"></span>
            <div class="job-posted-values">
                <!-- <input class="save-publish" type="submit" value="保存并发布"/> -->
                <input class="only-save save" type="button" value="保存"/>
                <input class="only-save" onclick="window.history.back()" type="button" value="返回"/>
            </div>
        </div>
        <div class="black77"></div>
        {{csrf_field()}}
    </form>
</div>
@stop