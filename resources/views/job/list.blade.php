@extends('layouts.master')

@section('title') @parent @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/common_zhiyezhaopin.css"/>
    <link rel="stylesheet" type="text/css" href="/css/zhiyezhaopin.css"/>
@stop
@section('bodyNextLabel')
    <body>
    <div class="pager-wrap personal-center" style="background: #f4f4f4;">
@stop
    @section('content')
        @section('breadcrumbs')
            <div class="sqzw">
                <!--banner-->
                <div class="">
                    <img src="{{$banimgsrc}}" style="width: 100%;"/>
                </div>
        @stop

                <!--搜素-->
                <div class="sqzwNav">
                    <div class="sqzwNavsech">
                        <select name="">
                            <option value="">合肥</option>
                            <option value="">合肥</option>
                            <option value="">合肥</option>
                        </select>
                        <input type="text" name="title" id="" value="" placeholder="输入职位关键词：如技术总监" class="txt"/>
                        <input type="submit" name="" id="" value="搜索" class="btn"/>
                    </div>
                    <div class="sqzwNavlist">
                        <p>
                            <a href="">销售总监</a>
                            <a href="">销售人员</a>
                            <a href="">销售人员</a>
                            <a href="">销售总监</a>
                            <a href="">销售人员</a>
                            <a href="">销售人员</a>
                            <a href="">销售总监</a>
                            <a href="">销售人员</a>
                            <a href="">销售人员</a>
                        </p>
                        <p>
                            <a href="">计算机硬件</a>
                            <a href="">计算机硬件</a>
                            <a href="">计算机硬件</a>
                            <a href="">计算机硬件</a>
                            <a href="">计算机硬件</a>
                        </p>
                    </div>
                </div>
                <div class="zplbCon">
                    <div class="zplbTop">
                        <ul>
                            <?php $ccs=['18','15','16','18','20']?>
                            @foreach($sanlist as $key=>$val)
                            <li @if($key==4) class="last1" @endif>
                                <a href="{{u($GLOBALS['pid_path'],$val['path'])}}"  @if($GLOBALS['ty']==$val['id']) class="zplbon" @endif  style="padding: {{$ccs[$key]}}px 0;">
                                    <div class="zplbimg">
                                        <img src="/img/zplb{{$key+1}}.png"/>
                                    </div>
                                    <p>{{$val['catname']}}</p>
                                </a>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="zplbban">
                        <img src="/img/zplb1.jpg" style="width: 100%;"/>
                    </div>
                    <!--开始-->
                    <div class="zplbxzwz">
                        <div class="zplbxzwz1">
                            您已选择：<img src="img/sqzwwz.jpg"><i>合肥</i><img src="img/zplbxx5.jpg">
                        </div>
                        <div class="zplbxzwz2">
                            <div class="zplbxzwz2a">
                                <div class="zplbxzwz2al">
                                    年  薪
                                </div>
                                <div class="zplbxzwz2ar">
                                    <span>全部</span>
                                    <span>10-15万 </span>
                                    <span>15-20万</span>
                                    <span>20-30万 </span>
                                    <span>30-50万 </span>
                                    <span>50-100万 </span>
                                    <span>100万以上 </span>
                                    <i>自定义 </i>
                                    <span class="sp1">
   	    						<input type="text" name="" id="" value="10" />
   	    						-
   	    						<input type="text" name="" id="" value="" placeholder="万元"/>
   	    						<a href="">确定</a>
   	    					</span>
                                </div>
                            </div>
                            <div class="zplbxzwz2a">
                                <div class="zplbxzwz2al">
                                    更  多
                                </div>
                                <div class="zplbxzwz2ar">
                                    <select name="">
                                        <option value="">企业性质</option>
                                        <option value="">企业性质1</option>
                                        <option value="">企业性质2</option>
                                        <option value="">企业性质3</option>
                                    </select>
                                    <select name="">
                                        <option value="">发布时间</option>
                                        <option value="">发布时间1</option>
                                        <option value="">发布时间2</option>
                                        <option value="">发布时间3</option>
                                    </select>
                                    <select name="">
                                        <option value="">工作类型</option>
                                        <option value="">工作类型1</option>
                                        <option value="">工作类型2</option>
                                        <option value="">工作类型3</option>
                                    </select>
                                    <b>
                                        <a href=""><input type="checkbox" name="" id="" value="" />&nbsp;&nbsp;高学历</a>
                                        <a href=""><input type="checkbox" name="" id="" value="" />&nbsp;&nbsp;高工资</a>
                                        <a href=""><input type="checkbox" name="" id="" value="" />&nbsp;&nbsp;高技能</a>

                                    </b>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="zplbmr">
                        <a href="" class="zplbmron">默认</a>
                        <a href="">最新发布职位 </a>
                        <a href="">高薪推荐职位 </a>
                        <a href="">热门招聘职位</a>
                        <a href="">最佳信用职位</a>
                    </div>
                    <!--结束-->
                    <p style="color: #999999;padding: 20px 0;">共123456家高端招聘信息</p>
                    <div class="zplbxx">
                        <ul>
                            <li>
                                <div class="zplbxxl">
                                    <a href=""><img src="img/zplbxx1.jpg"/></a>
                                </div>
                                <div class="zplbxxc">
                                    <p class="p1">网页制作，程序编辑</p>
                                    <p class="p2"><i>10K-15K/月</i>  |   合肥   |  全职   |  本科  |   3年及以上工作经验</p>
                                    <p class="p3">联想集团 --- 互联网·游戏·软件</p>
                                    <p class="p4">
                                        <span>高学历</span>
                                        <span>绩效奖金</span>
                                        <span>带薪年假</span>
                                        <span>交通补助</span>
                                    </p>
                                </div>
                                <div class="zplbxxr">
                                    <p>1小时前发布</p>
                                    <a href="">申请职位</a>
                                </div>
                            </li>
                            <li>
                                <div class="zplbxxl">
                                    <a href=""><img src="img/zplbxx2.jpg"/></a>
                                </div>
                                <div class="zplbxxc">
                                    <p class="p1">网页制作，程序编辑</p>
                                    <p class="p2"><i>10K-15K/月</i>  |   合肥   |  全职   |  本科  |   3年及以上工作经验</p>
                                    <p class="p3">联想集团 --- 互联网·游戏·软件</p>
                                    <p class="p4">
                                        <span>高学历</span>
                                        <span>绩效奖金</span>
                                        <span>带薪年假</span>
                                        <span>交通补助</span>
                                    </p>
                                </div>
                                <div class="zplbxxr">
                                    <p>1小时前发布</p>
                                    <a href="">申请职位</a>
                                </div>
                            </li>
                            <li>
                                <div class="zplbxxl">
                                    <a href=""><img src="img/zplbxx3.jpg"/></a>
                                </div>
                                <div class="zplbxxc">
                                    <p class="p1">网页制作，程序编辑</p>
                                    <p class="p2"><i>10K-15K/月</i>  |   合肥   |  全职   |  本科  |   3年及以上工作经验</p>
                                    <p class="p3">联想集团 --- 互联网·游戏·软件</p>
                                    <p class="p4">
                                        <span>高学历</span>
                                        <span>绩效奖金</span>
                                        <span>带薪年假</span>
                                        <span>交通补助</span>
                                    </p>
                                </div>
                                <div class="zplbxxr">
                                    <p>1小时前发布</p>
                                    <a href="">申请职位</a>
                                </div>
                            </li>
                            <li>
                                <div class="zplbxxl">
                                    <a href=""><img src="img/zplbxx4.jpg"/></a>
                                </div>
                                <div class="zplbxxc">
                                    <p class="p1">网页制作，程序编辑</p>
                                    <p class="p2"><i>10K-15K/月</i>  |   合肥   |  全职   |  本科  |   3年及以上工作经验</p>
                                    <p class="p3">联想集团 --- 互联网·游戏·软件</p>
                                    <p class="p4">
                                        <span>高学历</span>
                                        <span>绩效奖金</span>
                                        <span>带薪年假</span>
                                        <span>交通补助</span>
                                    </p>
                                </div>
                                <div class="zplbxxr">
                                    <p>1小时前发布</p>
                                    <a href="">申请职位</a>
                                </div>
                            </li>
                            <li>
                                <div class="zplbxxl">
                                    <a href=""><img src="img/zplbxx1.jpg"/></a>
                                </div>
                                <div class="zplbxxc">
                                    <p class="p1">网页制作，程序编辑</p>
                                    <p class="p2"><i>10K-15K/月</i>  |   合肥   |  全职   |  本科  |   3年及以上工作经验</p>
                                    <p class="p3">联想集团 --- 互联网·游戏·软件</p>
                                    <p class="p4">
                                        <span>高学历</span>
                                        <span>绩效奖金</span>
                                        <span>带薪年假</span>
                                        <span>交通补助</span>
                                    </p>
                                </div>
                                <div class="zplbxxr">
                                    <p>1小时前发布</p>
                                    <a href="">申请职位</a>
                                </div>
                            </li>
                            <li>
                                <div class="zplbxxl">
                                    <a href=""><img src="img/zplbxx2.jpg"/></a>
                                </div>
                                <div class="zplbxxc">
                                    <p class="p1">网页制作，程序编辑</p>
                                    <p class="p2"><i>10K-15K/月</i>  |   合肥   |  全职   |  本科  |   3年及以上工作经验</p>
                                    <p class="p3">联想集团 --- 互联网·游戏·软件</p>
                                    <p class="p4">
                                        <span>高学历</span>
                                        <span>绩效奖金</span>
                                        <span>带薪年假</span>
                                        <span>交通补助</span>
                                    </p>
                                </div>
                                <div class="zplbxxr">
                                    <p>1小时前发布</p>
                                    <a href="">申请职位</a>
                                </div>
                            </li>
                            <li>
                                <div class="zplbxxl">
                                    <a href=""><img src="img/zplbxx3.jpg"/></a>
                                </div>
                                <div class="zplbxxc">
                                    <p class="p1">网页制作，程序编辑</p>
                                    <p class="p2"><i>10K-15K/月</i>  |   合肥   |  全职   |  本科  |   3年及以上工作经验</p>
                                    <p class="p3">联想集团 --- 互联网·游戏·软件</p>
                                    <p class="p4">
                                        <span>高学历</span>
                                        <span>绩效奖金</span>
                                        <span>带薪年假</span>
                                        <span>交通补助</span>
                                    </p>
                                </div>
                                <div class="zplbxxr">
                                    <p>1小时前发布</p>
                                    <a href="">申请职位</a>
                                </div>
                            </li>
                            <li>
                                <div class="zplbxxl">
                                    <a href=""><img src="img/zplbxx4.jpg"/></a>
                                </div>
                                <div class="zplbxxc">
                                    <p class="p1">网页制作，程序编辑</p>
                                    <p class="p2"><i>10K-15K/月</i>  |   合肥   |  全职   |  本科  |   3年及以上工作经验</p>
                                    <p class="p3">联想集团 --- 互联网·游戏·软件</p>
                                    <p class="p4">
                                        <span>高学历</span>
                                        <span>绩效奖金</span>
                                        <span>带薪年假</span>
                                        <span>交通补助</span>
                                    </p>
                                </div>
                                <div class="zplbxxr">
                                    <p>1小时前发布</p>
                                    <a href="">申请职位</a>
                                </div>
                            </li>
                            <li>
                                <div class="zplbxxl">
                                    <a href=""><img src="img/zplbxx1.jpg"/></a>
                                </div>
                                <div class="zplbxxc">
                                    <p class="p1">网页制作，程序编辑</p>
                                    <p class="p2"><i>10K-15K/月</i>  |   合肥   |  全职   |  本科  |   3年及以上工作经验</p>
                                    <p class="p3">联想集团 --- 互联网·游戏·软件</p>
                                    <p class="p4">
                                        <span>高学历</span>
                                        <span>绩效奖金</span>
                                        <span>带薪年假</span>
                                        <span>交通补助</span>
                                    </p>
                                </div>
                                <div class="zplbxxr">
                                    <p>1小时前发布</p>
                                    <a href="">申请职位</a>
                                </div>
                            </li>
                            <li>
                                <div class="zplbxxl">
                                    <a href=""><img src="img/zplbxx2.jpg"/></a>
                                </div>
                                <div class="zplbxxc">
                                    <p class="p1">网页制作，程序编辑</p>
                                    <p class="p2"><i>10K-15K/月</i>  |   合肥   |  全职   |  本科  |   3年及以上工作经验</p>
                                    <p class="p3">联想集团 --- 互联网·游戏·软件</p>
                                    <p class="p4">
                                        <span>高学历</span>
                                        <span>绩效奖金</span>
                                        <span>带薪年假</span>
                                        <span>交通补助</span>
                                    </p>
                                </div>
                                <div class="zplbxxr">
                                    <p>1小时前发布</p>
                                    <a href="">申请职位</a>
                                </div>
                            </li>
                            <li>
                                <div class="zplbxxl">
                                    <a href=""><img src="img/zplbxx3.jpg"/></a>
                                </div>
                                <div class="zplbxxc">
                                    <p class="p1">网页制作，程序编辑</p>
                                    <p class="p2"><i>10K-15K/月</i>  |   合肥   |  全职   |  本科  |   3年及以上工作经验</p>
                                    <p class="p3">联想集团 --- 互联网·游戏·软件</p>
                                    <p class="p4">
                                        <span>高学历</span>
                                        <span>绩效奖金</span>
                                        <span>带薪年假</span>
                                        <span>交通补助</span>
                                    </p>
                                </div>
                                <div class="zplbxxr">
                                    <p>1小时前发布</p>
                                    <a href="">申请职位</a>
                                </div>
                            </li>
                            <li>
                                <div class="zplbxxl">
                                    <a href=""><img src="img/zplbxx4.jpg"/></a>
                                </div>
                                <div class="zplbxxc">
                                    <p class="p1">网页制作，程序编辑</p>
                                    <p class="p2"><i>10K-15K/月</i>  |   合肥   |  全职   |  本科  |   3年及以上工作经验</p>
                                    <p class="p3">联想集团 --- 互联网·游戏·软件</p>
                                    <p class="p4">
                                        <span>高学历</span>
                                        <span>绩效奖金</span>
                                        <span>带薪年假</span>
                                        <span>交通补助</span>
                                    </p>
                                </div>
                                <div class="zplbxxr">
                                    <p>1小时前发布</p>
                                    <a href="">申请职位</a>
                                </div>
                            </li>
                        </ul>
                        <div class="web-pager">
                            <a class="pager-now" href="javascript:;">1</a>
                            <a href="javascript:;">2</a>
                            <a href="javascript:;">3</a>
                            <a href="javascript:;">4</a>
                            <a href="javascript:;">5</a>
                            <a href="javascript:;">6</a>
                            <a href="javascript:;">7</a>
                            <a href="javascript:;">8</a>
                            <a href="javascript:;">9</a>
                            <a href="javascript:;">10</a>
                            <span>…</span>
                            <a href="javascript:;">100</a>
                            <a href="javascript:;" class="scrip-a"><img src="img/zhizhen.jpg"></a>
                            <form>
                                <span class="script-span">跳转到：</span>
                                <input class="pager-form-inp" type="text"/>
                                <input class="pager-form-sub" type="button" value="GO">
                            </form>

                        </div>
                        <div class="zhuyi">
                            <i>注意：</i>提示凡在中国职业培训网发布信息的企业不会以任何形式向求职者收取报名费、抵押金、保证金等费用。举报投诉电话：400-000-0000
                        </div>
                    </div>



                </div>
            </div>
            <div class="gap" style="height: 40px;"></div>



@stop {{-- end content --}}


@section('footer')
  @parent

@stop

@section('scripts')
  @parent

@stop
