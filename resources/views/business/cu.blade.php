@extends('business.layouts.public')
<?php
    $tty = $GLOBALS['tty'];
    $form = new Form($row);
    define('AT_CU', 1);
?>

@section('inbox')
@include('partial.editor')
<div class="job-posted">
    <form class="form" action="{{route('b_'.$GLOBALS['pid_path']).u($GLOBALS['ty_path'], $GLOBALS['tty_path'], 'cu', $form->id)}}" onsubmit="return model($('.save'));">
@if($table == 'certificate')
        <?php
            if ($tty==54){
                $d = config('config.webarr.certificate');
                $form->select($d, '选择证书类型', 'certificate_lid')
                ->input('证书名称','title')
                ->editor('详情');
            }else{
                if($tty==61){
                    $form ->img('学院logo图','img2',"120*120");
                }
                if(in_array($tty,array(59,63))){
                    $form->input('问题','title');
                }else{
                    $form->input('标题','title');
                }
                if (in_array($tty,array(56,61,55,58,62))) {
                    $form->img('配图', 'img1');
                }

                if(in_array($tty,array(59,63))){
                    $form->editor('  答案');
                }else{
                    $form->editor('信息内容');
                }
            }
         ?>
@elseif($table == 'education')
            <?php
                $form->img('配图','img1');

                if($tty==21){
                    $form->img('学院logo图','img2',"100*120");
                }
                $form->input('标题','title');
                if(in_array($tty, [24,25,29,30])){
                    $form
                        ->input('推荐人群', 'ftitle')
                        ->input('出发地','from')
                        ->input('目的地','destination')
                        ->input('席位情况','introduce')
                        ->time('游学开始时间', 'starttime')->time('游学结束时间', 'endtime')
                        ->time('报名开始时间', 'bstarttime')->time('报名结束时间', 'bendtime')
                        ->editor('路线详情')
                        ->editor('详情介绍','content2');
                }elseif($tty<>27){
                    $form->editor('信息内容');
                }
            ?>
@endif
        <div class="post-message-div clearfix">
            <div class="post-message-right fr">
                <input class="post-message-inp save" type="submit" value="发布"/>
                <a href="javascript:window.history.back();"  class="post-message-sub">返回</a>
            </div>
        </div>
        <div class="black77"></div>
        {{csrf_field()}}
    </form>
</div>
@stop