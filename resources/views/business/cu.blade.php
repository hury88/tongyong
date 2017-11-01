@extends('business.layouts.public')
<?php $form = new Form ?>
@section('inbox')
<div class="job-posted">
    <form id="#dataForm">
        @if($table == 'certificate')
        <?php
            $d = config('config.webarr.certificate');
            $form->select($d, '选择证书类型', 'certificate_lid');
            $form->input('证书名称','title')
            // ->editor('详情');
        ?>
        @endif
        <div class="job-posted-dv">
            <span class="job-posted-property">培训详情</span>
            <div class="job-posted-values">
                <img src="/img/edit.jpg"/>
            </div>
        </div>



        <div class="job-posted-dv">
            <span class="job-posted-property"></span>
            <div class="job-posted-values">
                <!-- <input class="save-publish" type="submit" value="保存并发布"/> -->
                <input class="only-save" type="button" value="保存"/>
                <input class="only-save" onclick="window.history.back()" type="button" value="返回"/>
            </div>
        </div>
        <div class="black77"></div>
    </form>
</div>
@stop