@extends('layouts.master')

@section('title') @parent @stop
@section('css')
    <link rel='stylesheet' type='text/css' href='/css/guojijiaoyu.css'/>
    <link rel='stylesheet' type='text/css' href='/css/common_guojijiaoyu.css'/>
@stop
@section('bodyNextLabel')
    <body>
    <div class='pager-wrap personal-center'>
        @stop
        @section('breadcrumbs')
            <div class='gjlhBanner' style='margin-top: 67px;'>
                <img src='{{$banimgsrc}}' style='width: 100%;'/>
            </div>
        @stop

        @section('content')
            <div class='gjlhbx'>
               <p class='xwdtmbx' style='width: 1100px;margin: 0 auto;'>
                    <a href='/'><img src='/img/sqzwtop.png' style='vertical-align: middle'/>所在位置：首页 </a>> <a href='{{u($GLOBALS['pid_path'])}}'>{{$GLOBALS['pid_data']->catname}}</a>> <a href='{{u($GLOBALS['pid_path'], $GLOBALS['ty_path'])}}'>{{$GLOBALS['ty_data']->catname}}</a>
                </p>
                <div class='guojiyouxue'>
                    <h3><a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'])}}' style='color: #444'>{{$sanlist[0]['catname']}}</a></h3>
                    <p class='pp1'>让世界更近，成长更大，梦想更精彩</p>
                    <ul>
                        <li class='list1'>
                            <img src='{{img($youxuegood[0]['img1'])}}'/>
                            <div class='guojiyouxuelay'>
                                <p class='pc1'>
                                    <a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$youxuegood[0]['id'])}}'>{{$youxuegood[0]['title']}}</a>
                                </p>
                                <p class='pc2'>
                                    <a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$youxuegood[0]['id'])}}'>{!! str_limit(strip_tags(htmlspecialchars_decode($youxuegood[0]['content'])), 120, '...') !!}</a>
                                </p>
                                <p class='pc3'>
                                    <a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$youxuegood[0]['id'])}}'>查看详情</a>
                                </p>
                            </div>
                        </li>
                        <li class='list2'>
                            <div class='list2Top'>
                                <img src='/img/guojiyouxue2.jpg'/>
                                <div class='zxbm'>
                                    <a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'])}}'>查看更多</a>
                                </div>
                            </div>
                            <div class='list2Center'>
                                <div class='list2CenterLeft'>
                                    <a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$youxuegood[1]['id'])}}'><img src='{{img($youxuegood[1]['img1'])}}'  /></a>
                                </div>
                                <div class='list2CenterRight'>
                                    <p class='pu1'><a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$youxuegood[1]['id'])}}'>{{$youxuegood[1]['title']}}</a></p>
                                    <p class='pu2'><a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$youxuegood[1]['id'])}}'>{!! str_limit(strip_tags(htmlspecialchars_decode($youxuegood[1]['content'])), 100, '...') !!}</a></p>

                                </div>
                            </div>
                            <div class='list2Center'>
                                <div class='list2CenterLeft'>
                                    <a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$youxuegood[2]['id'])}}'><img src='{{img($youxuegood[2]['img1'])}}' /></a>
                                </div>
                                <div class='list2CenterRight'>
                                    <p class='pu1'><a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$youxuegood[2]['id'])}}'>{{$youxuegood[2]['title']}}</a></p>
                                    <p class='pu2'><a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$youxuegood[2]['id'])}}'>{!! str_limit(strip_tags(htmlspecialchars_decode($youxuegood[2]['content'])), 100, '...') !!}</a></p>

                                </div>
                            </div>
                        </li>
                        <li class='list2 list3'>
                            <div class='list2Top'>
                                <img src='/img/guojiyouxue3.jpg'/>
                                <div class='zxbm'>
                                    <a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'])}}'>查看更多</a>
                                </div>
                            </div>
                            <div class='list2Center'>
                                <div class='list2CenterLeft'>
                                    <a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$youxuegood[3]['id'])}}'><img src='{{img($youxuegood[3]['img1'])}}'/></a>
                                </div>
                                <div class='list2CenterRight'>
                                    <p class='pu1'><a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$youxuegood[3]['id'])}}'>{{$youxuegood[3]['title']}}</a></p>
                                    <p class='pu2'><a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$youxuegood[3]['id'])}}'>{!! str_limit(strip_tags(htmlspecialchars_decode($youxuegood[3]['content'])), 100, '...') !!}</a></p>

                                </div>
                            </div>
                            <div class='list2Center'>
                                <div class='list2CenterLeft'>
                                    <a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$youxuegood[4]['id'])}}'><img src='{{img($youxuegood[4]['img1'])}}' /></a>
                                </div>
                                <div class='list2CenterRight'>
                                    <p class='pu1'><a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$youxuegood[4]['id'])}}'>{{$youxuegood[4]['title']}}</a></p>
                                    <p class='pu2'><a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[0]['path'],$youxuegood[4]['id'])}}'>{!! str_limit(strip_tags(htmlspecialchars_decode($youxuegood[4]['content'])), 100, '...') !!}</a></p>

                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class='youxuellAll'>
                    <div class='youxuell'>
                        <h3><a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'])}}' style='color: #444'>{{$sanlist[1]['catname']}}</a></h3>
                        <p>拓展国际视野，丰富人生阅历，培养国际化思维！<a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'])}}'>更多<img src='/img/gengduo.jpg'></a></p>
                        <ul>
                            @foreach($luxiangood as $val)
                            <li style="margin-bottom: 15px;">
                                <div class='tesellTop'>
                                    <a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'],$val['id'])}}'><img src='{{img($val['img1'])}}'/></a>
                                    <div class='tesellTop1'>
                                        <a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'],$val['id'])}}'>{{$val['title']}}</a>
                                    </div>
                                </div>
                                <div class='tesellBom'>
                                    <span><i>{{$val['enroll_num']}}</i>人已报名</span>
                                    <a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[1]['path'],$val['id'])}}'>查看详情>></a>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class='kyzxall'>
                    <div class='kyzx'>
                        <div class='kyfdTit'>
                            <p class='p1'>
                           {{$sanlist[2]['catname']}}
                                <a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[2]['path'])}}' class='span2'>更多<img src='/img/zsnext.png'/></a>
                            </p>
                            <p>海外游学常见问题解答</p>
                        </div>
                    </div>
                    <div class='kyzxall1'>
                        <div class="certical-lists-warp">
                          @foreach($zixungood as $val)
                        <div class='kyzxCon'>
                            <div class='kyzxConleft'>
                                <a href=''><img src='{{img($val['img1'])}}'/></a>
                            </div>
                            <div class='kyzxConright'>
                                <a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[2]['path'],$val['id'])}}' class='a1'>{{$val['title']}}</a>
                                <a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[2]['path'],$val['id'])}}' class='a2'>{!! str_limit(strip_tags(htmlspecialchars_decode($val['content'])), 140, '...') !!}</a>
                                <a href='{{u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$sanlist[2]['path'],$val['id'])}}' class='a3'>查看详情</a>
                            </div>
                        </div>
                          @endforeach
                        </div>
                    </div>
                </div>
                <div class='yxbaozhang'>
                    <p class='pt1'><a href='javascript:void(0);' style="color: #444">{{$sanlist[3]['catname']}}</a></p>

                    <p class='pt2'>专注游学、优质服务，为游学保驾护航</p>
                    <div class="tour_yxbz">
                    <ul>
                        @foreach($baozhanggood as $val)
                        <li>
                            <a href='javascript:void(0);'>
                                <img src='{{img($val['img1'])}}'/>
                                <p>{{$val['title']}}</p>
                            </a>
                        </li>
                        @endforeach

                    </ul>
                    </div>


            </div>



@stop


