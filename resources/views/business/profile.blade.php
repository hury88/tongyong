@extends('business.layouts.master')

@section('title') @parent @stop
@section('main')
<div class="pe  rsonal-member-index clearfix">
    <div class="member-index-left fl">
        <div class="member-index-header clearfix">
            <img class="mem-hearimg" src="{{img($user['headimg'], '/img/member-headerimg.png')}}"/>
            <div class="member-information">
                <h2>{{$user['business_name']}}<a title="{{$user['business_name']}}" href=""><img class="mem-link" src="/img/link.png"/></a>
                    @if($user['certified'])
                    <i><img class="mem-renzheng" src="/img/renzhe.png"/>{{$boot_config['sitename']}}认证</i>
                    @else
                    <i style="width:88px" class="no-authentication"><img class="mem-renzheng" src="/img/renzhe.png"/>未认证</i>
                    @endif

                </h2>
                <span>{{$user['location']}}</span>
                <p>公司描述：{!! str_limit(strip_tags($user['business_introduction']), 500) !!}</p>
            </div>
        </div>
        <div class="mem-index-recruit clearfix">
            <div class="index-recruit-left fl">
                <h3 style="cursor:pointer" onclick="window.location.href='{{route('b_resume')}}'">职位招聘<i>有人投简历 {{\Auth::user()->hasManyResume('business_id')->count()}} 份</i></h3>
                <ul class="index-recruit-ul">
                    <li class="index-recruit-li">
                        <p>高端招聘</p>
                        <a href="{{route('b_job')}}/high_level">编辑招聘信息</a>
                    </li>
                    <li class="index-recruit-li">
                        <p>企业招聘</p>
                        <a href="{{route('b_job')}}/enterprise">编辑招聘信息</a>
                    </li>
                    <li class="index-recruit-li index-recruit-on">
                        <p>校园招聘</p>
                        <a href="{{route('b_job')}}/campus">暂无校园招聘信息 </a>
                    </li>
                </ul>
            </div>
            <div class="index-recruit-left fr">
                <h3>职业培训管理<a href="{{route('b_training')}}">查看更多 > </a></h3>
                <ul class="index-recruit-ul">
                    @if(true || $user['has2'])
                    <li class="index-recruit-li">
                        <p>技能培训</p>
                        <a href="{{route('b_training')}}">编辑上传技能培训信息</a>
                    </li>
                    <li class="index-recruit-li">
                        <p>企业培训</p>
                        <a href="{{route('b_training')}}/enterprise">编辑上传企业培训信息</a>
                    </li>
                    <li class="index-recruit-li">
                        <p>在线学习</p>
                        <a href="{{route('b_training')}}/online">编辑上传在线学习资料</a>
                    </li>
                    @else
                    <li class="index-recruit-li index-recruit-on">
                        <p>技能培训</p>
                        <a href="javascript:;">编辑上传技能培训信息</a>
                    </li>
                    <li class="index-recruit-li index-recruit-on">
                        <p>企业培训</p>
                        <a href="javascript:;">编辑上传企业培训信息</a>
                    </li>
                    <li class="index-recruit-li index-recruit-on">
                        <p>在线学习</p>
                        <a href="javascript:;">编辑上传在线学习资料</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="mem-index-recruit">
            <div class="index-orderlists">
                <h3>订单管理<a href="{{route('b_order')}}">查看更多 ></a></h3>
                <div class="order-manager-content">
                    <form>
                        <table>
                            <tr class="manager-firsttr">
                                <th class="manager-secondth">订单编号</th>
                                <th class="index-fiveth">用户</th>
                                <th class="manager-fourtd">培训课程</th>
                                <th>价格</th>
                                <th>到账时间</th>
                                <th>状态</th>
                            </tr>
                            @foreach($orders as $row)<?php extract($row) ?>
                            <tr>
                                <td>{{$orderno}}</td>
                                <td>{{$buyer_name}}</td>
                                <td class="manager-fourtd">
                                    <img class="order-mess-img" src="{{img($training_img)}}"/>
                                    <div class="order-name">
                                        <p>{{$training_title}}</p>
                                        <span>{{$pay_style}}</span>
                                    </div>
                                </td>
                                <td class="pro-price">￥{{$price}}</td>
                                <td>{{$status}}</td>
                                <td>{{$created_at}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="black36"></div>
        @include('partial.copyright')
    </div>
    <div class="member-index-right fr">
       <div class="mem-message">
           <h4>系统消息<a href="{{route('b_notices')}}">更多 > </a></h4>
           <ul class="mem-message-ul">
            @foreach($notices as $row)
               <li class="mem-message-li">
                   <a href="{{route('b_notices')}}">{{$row['title']}}{!! $row['status'] == 1 ? '<i></i>' : '' !!}</a>
                   <p>{{$row['created_at']}}</p>
               </li>
           @endforeach
           </ul>
       </div>
        <div class="mem-message">
            <h4>推荐人才<a href="javascript:;">更多 > </a></h4>
            <ul class="mem-message-ul">
                <li class="mem-message-li">
                    <a href="javascript:;">张玲玲<b>合肥</b></a>
                    <span>意向职位：<b>销售经理</b></span>
                </li>
                <li class="mem-message-li">
                    <a href="javascript:;">张玲玲<b>合肥</b></a>
                    <span>意向职位：<b>销售经理</b></span>
                </li>
                <li class="mem-message-li">
                    <a href="javascript:;">张玲玲<b>合肥</b></a>
                    <span>意向职位：<b>销售经理</b></span>
                </li>
                <li class="mem-message-li">
                    <a href="javascript:;">张玲玲<b>合肥</b></a>
                    <span>意向职位：<b>销售经理</b></span>
                </li>
                <li class="mem-message-li">
                    <a href="javascript:;">张玲玲<b>合肥</b></a>
                    <span>意向职位：<b>销售经理</b></span>
                </li>
                <li class="mem-message-li">
                    <a href="javascript:;">张玲玲<b>合肥</b></a>
                    <span>意向职位：<b>销售经理</b></span>
                </li>
            </ul>
        </div>
    </div>
</div>
@stop